<?php include 'nav.php'; ?>
<?php
$idFilm = $_GET['id'] ?? null;
$filmTrouve = null;

if ($idFilm && ($fichier = fopen("stats.csv", "r")) !== false) {
    fgetcsv($fichier, 0, ";");
    while (($ligne = fgetcsv($fichier, 0, ";")) !== false) {
        if (isset($ligne[0]) && $ligne[0] == $idFilm) {
            $filmTrouve = $ligne;
            break;
        }
    }
    fclose($fichier);
}

if (!$filmTrouve) {
    echo "<h2 style='color:white; text-align:center;'>Film non trouvé.</h2>";
    exit;
}

$id             = $filmTrouve[0] ?? '';
$titre          = $filmTrouve[1] ?? '';
$description    = $filmTrouve[2] ?? '';
$dureeMin       = $filmTrouve[3] ?? '';
$genre          = $filmTrouve[4] ?? '';
$annee          = $filmTrouve[5] ?? '';
$realisateur    = $filmTrouve[6] ?? '';
$casting        = $filmTrouve[7] ?? '';
$note           = $filmTrouve[8] ?? '';
$afficheUrl     = $filmTrouve[9] ?? 'film.jpg';
$trailerUrl     = $filmTrouve[10] ?? '';
$ageMin         = $filmTrouve[11] ?? '';
$languesDispo   = $filmTrouve[12] ?? '';
$formatsDispo   = $filmTrouve[13] ?? '';
$seancesBrut    = $filmTrouve[14] ?? '';

$castList   = array_filter(array_map('trim', explode(',', $casting)));
$seancesRaw = array_filter(array_map('trim', explode('|', $seancesBrut)));

function calcFinHeure(string $heureDebut, int $dureeMinutes): ?string {
    if (!preg_match('/^\d{2}:\d{2}$/', $heureDebut)) return null;
    [$h, $m] = array_map('intval', explode(':', $heureDebut));
    $total = ($h * 60 + $m) + $dureeMinutes;
    $total = $total % (24 * 60);
    $fh = floor($total / 60);
    $fm = $total % 60;
    return sprintf("%02d:%02d", $fh, $fm);
}

$dureeInt = (int)$dureeMin;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($titre); ?> - Lumen Cinéma</title>
    <link rel="stylesheet" href="info.css">
    <link rel="stylesheet" href="stylenav.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="movie-detail-container">
    
    <div class="movie-header">
        
        <div class="movie-text">
            <h1 class="movie-title"><?php echo strtoupper(htmlspecialchars($titre)); ?></h1>
            
            <p style="color:#e50914; font-weight:bold; margin: 6px 0 10px 0;">
                <?php if ($annee) echo htmlspecialchars($annee) . " • "; ?>
                <?php if ($genre) echo htmlspecialchars($genre) . " • "; ?>
                <?php if ($dureeMin) echo htmlspecialchars($dureeMin) . " min "; ?>
                <?php if ($ageMin !== '') echo " • " . htmlspecialchars($ageMin); ?>
            </p>

            <div class="movie-infos-secondary" style="color:white; opacity:0.9; font-size: 0.9rem;">
                <?php if ($note) echo "<p>Note : ".htmlspecialchars($note)."</p>"; ?>
                <?php if ($realisateur) echo "<p>Réalisateur : ".htmlspecialchars($realisateur)."</p>"; ?>
                <?php if (!empty($castList)) echo "<p>Casting : ".htmlspecialchars(implode(', ', $castList))."</p>"; ?>
                <?php if ($languesDispo) echo "<p>Langues : ".htmlspecialchars($languesDispo)."</p>"; ?>
                <?php if ($formatsDispo) echo "<p>Formats : ".htmlspecialchars($formatsDispo)."</p>"; ?>
            </div>

            <p class="movie-description" style="margin-top: 15px;">
                <?php echo nl2br(htmlspecialchars($description)); ?>
            </p>

            <?php if ($trailerUrl) : ?>
                <p style="margin-top:14px;">
                    <a href="<?php echo htmlspecialchars($trailerUrl); ?>" target="_blank" style="color:#e50914; font-weight:bold; text-decoration:none;">
                        ▶ Voir la bande-annonce
                    </a>
                </p>
            <?php endif; ?>
        </div>

        <div class="movie-poster">
            <img src="<?php echo htmlspecialchars($afficheUrl); ?>" alt="Affiche">
        </div>

    </div>

    <div class="showtimes-section">
        <h3>SÉANCES</h3>
        <div class="showtimes-slider">
            <?php foreach ($seancesRaw as $index => $s): 
                $parts = array_map('trim', explode(',', $s));
                $heure = $parts[0] ?? '';
                $lang  = $parts[1] ?? '';
                $fin   = ($dureeInt > 0 && $heure) ? calcFinHeure($heure, $dureeInt) : null;
                $modalID = "res-" . str_replace(':', '', $heure) . "-" . $index;
            ?>
                <a href="#<?php echo $modalID; ?>" class="showtime-link" style="text-decoration: none;">
                    <div class="showtime-card">
                        <div class="st-left"><?php echo htmlspecialchars($heure); ?></div>
                        <div class="st-right">
                            <span class="st-lang"><?php echo htmlspecialchars($lang); ?></span>
                            <span class="st-end">Fin: <?php echo htmlspecialchars($fin); ?></span>
                        </div>
                    </div>
                </a>

                <div id="<?php echo $modalID; ?>" class="modal">
                    <form action="panier.php" method="POST" class="modal-content">
                        <a href="#" class="close-btn">&times;</a>
                        <h2>Réserver vos places</h2>
                        <p style="color:white; margin-bottom:5px;">Film : <strong><?php echo htmlspecialchars($titre); ?></strong></p>
                        <p style="color:white; margin-bottom:20px;">Séance : <span style="color:#e50914; font-weight:bold;"><?php echo htmlspecialchars($heure); ?></span></p>

                        <input type="hidden" name="film_id" value="<?php echo htmlspecialchars($id); ?>">
                        <input type="hidden" name="heure_seance" value="<?php echo htmlspecialchars($heure); ?>">

                        <div class="pricing-list">
                            <div class="price-row">
                                <label>Plein Tarif</label>
                                <div class="price-action">
                                    <span class="inline-price">10€</span>
                                    <input type="number" name="qty_plein" value="0" min="0" class="qty-input">
                                </div>
                            </div>
                            <div class="price-row">
                                <label>Étudiant / -18 ans</label>
                                <div class="price-action">
                                    <span class="inline-price">5€</span>
                                    <input type="number" name="qty_edu" value="0" min="0" class="qty-input">
                                </div>
                            </div>
                            <div class="price-row">
                                <label>Moins de 12 ans</label>
                                <div class="price-action">
                                    <span class="inline-price">4€</span>
                                    <input type="number" name="qty_kids" value="0" min="0" class="qty-input">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn-panier">Ajouter au panier</button>
                        </div>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
</html>