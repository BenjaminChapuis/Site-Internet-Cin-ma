<?php include 'nav.php'; ?>
<?php
$query = $_GET['q'] ?? ''; // On récupère la recherche depuis l'URL
$resultats = [];

if ($query !== '') {
    if (($fichier = fopen("stats.csv", "r")) !== false) {
        fgetcsv($fichier, 0, ";"); // Sauter l'en-tête
        while (($ligne = fgetcsv($fichier, 0, ";")) !== false) {
            $titreFilm = $ligne[1] ?? '';
            // Recherche insensible à la casse
            if (stripos($titreFilm, $query) !== false) {
                $resultats[] = $ligne;
            }
        }
        fclose($fichier);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche - Lumen Cinéma</title>
    <link rel="stylesheet" href="recherche.css">
    <link rel="stylesheet" href="stylenav.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="search-page-container">
    <div class="search-header">
        <form action="recherche.php" method="GET" class="search-form">
            <div class="search-input-wrapper">
                <input type="text" name="q" placeholder="Rechercher un film..." value="<?php echo htmlspecialchars($query); ?>" autocomplete="off">
                <button type="submit" class="search-btn">
                    <i>🔍</i> </button>
            </div>
        </form>
    </div>

    <div class="search-results-section">
        <?php if ($query === ''): ?>
            <p class="search-hint">Tapez le nom d'un film pour lancer la recherche.</p>
        <?php elseif (empty($resultats)): ?>
            <p class="search-hint">Aucun résultat trouvé pour "<strong><?php echo htmlspecialchars($query); ?></strong>".</p>
        <?php else: ?>
            <h2 class="results-title">Résultats pour "<?php echo htmlspecialchars($query); ?>"</h2>
            <div class="results-grid">
                <?php foreach ($resultats as $film): ?>
                    <a href="info.php?id=<?php echo $film[0]; ?>" class="film-card">
                        <img src="<?php echo htmlspecialchars($film[9]); ?>" alt="Affiche">
                        <div class="film-info">
                            <span class="film-name"><?php echo htmlspecialchars($film[1]); ?></span>
                            <span class="film-year"><?php echo htmlspecialchars($film[5]); ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

</body>
</html>