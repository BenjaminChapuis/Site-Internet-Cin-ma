
<?php include 'nav.php'; ?>

<?php
$idFilm = $_GET['id'] ?? null;
$filmTrouve = null;

if ($idFilm && ($fichier = fopen("stats.csv", "r")) !== false) {
    // sauter l'en-tête
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

/**
 * Format films.csv (séparateur ;) :
 * 0 id
 * 1 titre
 * 2 description
 * 3 duree_minutes
 * 4 genre
 * 5 annee
 * 6 realisateur
 * 7 casting (séparé par ,)
 * 8 note (ex: 4.6/5)
 * 9 affiche_url
 * 10 bande_annonce_url (youtube)
 * 11 classification_age (ex: 12)
 * 12 langues_dispo (ex: VF,VO)
 * 13 formats_dispo (ex: 2D,IMAX)
 * 14 seances (format: "14:30,VF|17:00,VO|20:00,VF")
 */

$id            = $filmTrouve[0] ?? '';
$titre         = $filmTrouve[1] ?? '';
$description   = $filmTrouve[2] ?? '';
$dureeMin      = $filmTrouve[3] ?? '';
$genre         = $filmTrouve[4] ?? '';
$annee         = $filmTrouve[5] ?? '';
$realisateur   = $filmTrouve[6] ?? '';
$casting       = $filmTrouve[7] ?? '';
$note          = $filmTrouve[8] ?? '';
$afficheUrl    = $filmTrouve[9] ?? 'film.jpg';
$trailerUrl    = $filmTrouve[10] ?? '';
$ageMin        = $filmTrouve[11] ?? '';
$languesDispo  = $filmTrouve[12] ?? '';
$formatsDispo  = $filmTrouve[13] ?? '';
$seancesBrut   = $filmTrouve[14] ?? '';

$castList   = array_filter(array_map('trim', explode(',', $casting)));
$seancesRaw = array_filter(array_map('trim', explode('|', $seancesBrut)));

function calcFinHeure(string $heureDebut, int $dureeMinutes): ?string {
    // Attend "HH:MM"
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
    <title><?php echo htmlspecialchars($titre); ?> - Mon Cinéma</title>
    <link rel="stylesheet" href="info.css">
</head>

<body>

<div class="movie-detail-container">

    <div class="movie-header">

        <div class="movie-text">
            <h1 class="movie-title"><?php echo strtoupper(htmlspecialchars($titre)); ?></h1>

            <!-- Infos principales (plus riche) -->
            <p style="color:#e50914; font-weight:bold; margin: 6px 0 10px 0;">
                <?php if ($annee) : ?>
                    <?php echo htmlspecialchars($annee); ?> •
                <?php endif; ?>

                <?php if ($genre) : ?>
                    <?php echo htmlspecialchars($genre); ?> •
                <?php endif; ?>

                <?php if ($dureeMin) : ?>
                    <?php echo htmlspecialchars($dureeMin); ?> min
                <?php endif; ?>

                <?php if ($ageMin !== '') : ?>
                    • <?php echo htmlspecialchars($ageMin); ?>
                <?php endif; ?>
            </p>

            <?php if ($note) : ?>
                <p style="color:white; opacity:0.9; margin: 0 0 10px 0;">
                     Note : <?php echo htmlspecialchars($note); ?>
                </p>
            <?php endif; ?>

            <?php if ($realisateur) : ?>
                <p style="color:white; opacity:0.9; margin: 0 0 10px 0;">
                     Réalisateur : <?php echo htmlspecialchars($realisateur); ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($castList)) : ?>
                <p style="color:white; opacity:0.9; margin: 0 0 10px 0;">
                     Casting : <?php echo htmlspecialchars(implode(', ', $castList)); ?>
                </p>
            <?php endif; ?>

            <?php if ($languesDispo) : ?>
                <p style="color:white; opacity:0.9; margin: 0 0 10px 0;">
                     Langues : <?php echo htmlspecialchars($languesDispo); ?>
                </p>
            <?php endif; ?>

            <?php if ($formatsDispo) : ?>
                <p style="color:white; opacity:0.9; margin: 0 0 10px 0;">
                     Formats : <?php echo htmlspecialchars($formatsDispo); ?>
                </p>
            <?php endif; ?>

            <p class="movie-description">
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

        <!-- Comme la base avant : affiche à droite -->
        <div class="movie-poster">
            <img src="<?php echo htmlspecialchars($afficheUrl); ?>" alt="Affiche format large">
        </div>

    </div>

    <div class="showtimes-section">
        <h3>SÉANCES</h3>

        <div class="showtimes-slider">
            <?php if (empty($seancesRaw)) : ?>
                <div style="color:white; opacity:0.8;">Aucune séance disponible.</div>
            <?php else: ?>
                <?php foreach ($seancesRaw as $s): ?>
                    <?php
                        // attendu : "HH:MM,VF" ou "HH:MM,VO"
                        $parts = array_map('trim', explode(',', $s));
                        $heure = $parts[0] ?? '';
                        $lang  = $parts[1] ?? '';
                        $fin   = ($dureeInt > 0 && $heure) ? calcFinHeure($heure, $dureeInt) : null;
                    ?>

                    <div class="showtime-card">
                        <div class="st-left"><?php echo htmlspecialchars($heure); ?></div>
                        <div class="st-right">
                            <?php if ($lang): ?>
                                <span class="st-lang"><?php echo htmlspecialchars($lang); ?></span>
                            <?php endif; ?>
                            <?php if ($fin): ?>
                                <span class="st-end">Fin: <?php echo htmlspecialchars($fin); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </div>

</div>

</body>
</html>

