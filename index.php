<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lumen Cinéma</title>
        <meta name="Benjamin Chapuis et Romain Colin" content="Lumen Cinéma">
        <link rel="stylesheet" href="stylenav.css">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styleindex.css">
    </head>
<body><?php include 'nav.php'; ?>
<div class="cinema-container">
    <section class="genre-section">
        <h2 class="section-title">À l'affiche</h2>
        <div class="cinema-slider">
            <div class="slide">
                <div class="card-inner">
                    <a href="info.php?id=1"><img src="images/film.jpg" alt="Film"></a>
                    <div class="info">Drame | 2h30<br>Rêvez grand.</div>
                </div>
            </div>
            <div class="slide"><div class="card-inner"><a href="info.php?id=2"><img src="images/film1.jpg" alt="Film"></a><div class="info">Aventure Sci-Fi | 3h18<br>Le monde de Pandora changera à jamais.</div></div></div>
            <div class="slide"><div class="card-inner"><a href="info.php?id=3"><img src="images/film2.jpg" alt="Film"></a><div class="info">Comédie | 1h30<br>Rires garantis !</div></div></div>
            <div class="slide"><div class="card-inner"><a href="info.php?id=4"><img src="images/film3.jpg" alt="Film"></a><div class="info">Horreur | 2h00<br>Frissons assurés.</div></div></div>
            <div class="slide"><div class="card-inner"><a href="info.php?id=5"><img src="images/film4.jpg" alt="Film"></a><div class="info">Sci-Fi | 2h30<br>Le futur est ici.</div></div></div>
            <div class="slide"><div class="card-inner"><a href="info.php?id=6"><img src="images/film5.jpg" alt="Film"></a><div class="info">Animation | 1h20<br>Pour toute la famille.</div></div></div>
            <div class="slide"><div class="card-inner"><a href="info.php?id=7"><img src="images/film6.jpg" alt="Film"></a><div class="info">Animation | 1h20<br>Pour toute la famille.</div></div></div>
        </div>
    </section>
    <section class="genre-section">
        <h2 class="section-title">Bientôt disponible</h2>
        <div class="cinema-slider">
            <div class="slide"><div class="card-inner"><img src="images/film.jpg" alt="Film"><div class="info">Sortie : 15 Mars</div></div></div>
            <div class="slide"><div class="card-inner"><img src="images/film.jpg" alt="Film"><div class="info">Sortie : 22 Mars</div></div></div>
            <div class="slide"><div class="card-inner"><img src="images/film.jpg" alt="Film"><div class="info">Sortie : 02 Avril</div></div></div>
            <div class="slide"><div class="card-inner"><img src="images/film.jpg" alt="Film"><div class="info">Sortie : 10 Avril</div></div></div>
            <div class="slide"><div class="card-inner"><img src="images/film.jpg" alt="Film"><div class="info">Sortie : 15 Avril</div></div></div>
            <div class="slide"><div class="card-inner"><img src="images/film.jpg" alt="Film"><div class="info">Sortie : 30 Avril</div></div></div>
        </div>
    </section>
    <section class="genre-section">
        <h2 class="section-title">Classiques à revoir</h2>
        <div class="cinema-slider">
            <div class="slide"><div class="card-inner"><img src="images/film.jpg" alt="Film"><div class="info">Lundi 20h00</div></div></div>
            <div class="slide"><div class="card-inner"><img src="images/film.jpg" alt="Film"><div class="info">Mardi 19h30</div></div></div>
            <div class="slide"><div class="card-inner"><img src="images/film.jpg" alt="Film"><div class="info">Mercredi 21h00</div></div></div>
            <div class="slide"><div class="card-inner"><img src="images/film.jpg" alt="Film"><div class="info">Jeudi 18h00</div></div></div>
            <div class="slide"><div class="card-inner"><img src="images/film.jpg" alt="Film"><div class="info">Vendredi 22h00</div></div></div>
            <div class="slide"><div class="card-inner"><img src="images/film.jpg" alt="Film"><div class="info">Samedi 14h00</div></div></div>
        </div>
    </section>
</div> 
</body>
</html>