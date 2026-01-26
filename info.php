<?php include 'nav.php'; ?> 
<?php
$idFilm = $_GET['id'] ?? null;
$filmTrouve = null;

if ($idFilm && ($fichier = fopen("stats.csv", "r")) !== false) {
    fgetcsv($fichier, 0, ";"); // Sauter l'en-tête

    while (($ligne = fgetcsv($fichier, 0, ";")) !== false) {
        if ($ligne[0] == $idFilm) {
            $filmTrouve = $ligne;
            break;
        }
    }
    fclose($fichier);
}

// Si le film n'est pas trouvé, on affiche un message d'erreur
if (!$filmTrouve) {
    echo "<h2 style='color:white; text-align:center;'>Film non trouvé.</h2>";
    exit;
}

// On assigne des noms clairs à nos colonnes CSV pour plus de lisibilité
// Selon l'ordre de ton CSV : 0=ID, 1=Titre, 2=Description, 3=Image, 4=Duree, 5=Séances
$titre       = $filmTrouve[1];
$description = $filmTrouve[2];
$image       = $filmTrouve[3];
$duree       = $filmTrouve[4];
// Imaginons que les horaires soient stockés comme ceci : "14:30-VF-16:45,17:00-VO-19:15"
$seances     = explode(',', $filmTrouve[5]); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="info.css">
    <title><?php echo $titre; ?> - Mon Cinéma</title>
</head>
<body>
    <div class="movie-detail-container">
    
        <div class="movie-header">
            <div class="movie-text">
                <h1 class="movie-title"><?php echo strtoupper($titre); ?></h1>
                
                <p style="color: #e50914; font-weight: bold;">Durée : <?php echo $duree; ?></p>
                
                <p class="movie-description">
                    <?php echo $description; ?>
                </p>
            </div>
            
            <div class="movie-poster">
                <img src="<?php echo $image; ?>" alt="Affiche de <?php echo $titre; ?>">
            </div>
        </div>

        <div class="showtimes-section">
            <h3>SÉANCES</h3>
            <div class="showtimes-slider">
                
                <?php 
                // Boucle pour afficher chaque séance présente dans le CSV
                foreach ($seances as $seance) : 
                    // On sépare les infos de la séance (Heure-Langue-Fin)
                    $details = explode('-', $seance); 
                    if(count($details) == 3):
                ?>
                    <div class="showtime-card">
                        <div class="st-left"><?php echo $details[0]; ?></div>
                        <div class="st-right">
                            <span class="st-lang"><?php echo $details[1]; ?></span>
                            <span class="st-end">Fin: <?php echo $details[2]; ?></span>
                        </div>
                    </div>
                <?php 
                    endif;
                endforeach; 
                ?>

            </div>
        </div>
    </div>
</body>
</html>