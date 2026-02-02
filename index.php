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

  <body>
    <?php include 'nav.php'; ?>

    <div class="cinema-container">

      <!-- ===================== -->
      <!-- À l'affiche           -->
      <!-- ===================== -->
      <section class="genre-section">
        <h2 class="section-title">À l'affiche</h2>

        <div class="slider-wrapper slider-affiche">
          <!-- 3 positions : 0 / -50 / -100 -->
          <input class="slider-state" type="radio" name="affiche" id="affiche-p1" checked>
          <input class="slider-state" type="radio" name="affiche" id="affiche-p2">
          <input class="slider-state" type="radio" name="affiche" id="affiche-p3">

          <div class="slider-nav">
            <!-- p1 -->
            <label class="slider-btn prev show-on-affiche-p1 is-disabled" for="affiche-p1" aria-label="Précédent">‹</label>
            <label class="slider-btn next show-on-affiche-p1" for="affiche-p2" aria-label="Suivant">›</label>
            <!-- p2 -->
            <label class="slider-btn prev show-on-affiche-p2" for="affiche-p1" aria-label="Précédent">‹</label>
            <label class="slider-btn next show-on-affiche-p2" for="affiche-p3" aria-label="Suivant">›</label>
            <!-- p3 -->
            <label class="slider-btn prev show-on-affiche-p3" for="affiche-p2" aria-label="Précédent">‹</label>
            <label class="slider-btn next show-on-affiche-p3 is-disabled" for="affiche-p3" aria-label="Suivant">›</label>
          </div>

          <div class="cinema-viewport">
            <div class="cinema-track">
              <div class="slide">
                <div class="card-inner">
                  <a href="info.php?id=1"><img src="images/film.jpg" alt="Film"></a>
                  <div class="info">Drame | 2h30<br>Marty Supreme</div>
                </div>
              </div>

              <div class="slide"><div class="card-inner"><a href="info.php?id=2"><img src="images/film1.jpg" alt="Film"></a><div class="info">Aventure SF | 3h18<br>Avatar : De feu et de cendres</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=3"><img src="images/film2.jpg" alt="Film"></a><div class="info">Comédie | 1h30<br>Zootopie</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=4"><img src="images/film3.jpg" alt="Film"></a><div class="info">Thriller | 2h10<br>La femme de ménage</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=5"><img src="images/film4.jpg" alt="Film"></a><div class="info">Horreur Thriller | 1h30<br>Primate</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=6"><img src="images/film5.jpg" alt="Film"></a><div class="info">Comedie | 1h40<br>Marsupilami</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=7"><img src="images/film6.jpg" alt="Film"></a><div class="info">Crime Thriller Drame | 2h20<br>Aucun autre choix</div></div></div>
            </div>
          </div>
        </div>
      </section>


      <!-- ===================== -->
      <!-- Bientôt disponible    -->
      <!-- ===================== -->
      <section class="genre-section">
        <h2 class="section-title">Bientôt disponible</h2>

        <div class="slider-wrapper slider-bientot">
          <!-- 5 positions : 0 / -50 / -100 / -150 / -200 -->
          <input class="slider-state" type="radio" name="bientot" id="bientot-p1" checked>
          <input class="slider-state" type="radio" name="bientot" id="bientot-p2">
          <input class="slider-state" type="radio" name="bientot" id="bientot-p3">
          <input class="slider-state" type="radio" name="bientot" id="bientot-p4">
          <input class="slider-state" type="radio" name="bientot" id="bientot-p5">

          <div class="slider-nav">
            <!-- p1 -->
            <label class="slider-btn prev show-on-bientot-p1 is-disabled" for="bientot-p1">‹</label>
            <label class="slider-btn next show-on-bientot-p1" for="bientot-p2">›</label>
            <!-- p2 -->
            <label class="slider-btn prev show-on-bientot-p2" for="bientot-p1">‹</label>
            <label class="slider-btn next show-on-bientot-p2" for="bientot-p3">›</label>
            <!-- p3 -->
            <label class="slider-btn prev show-on-bientot-p3" for="bientot-p2">‹</label>
            <label class="slider-btn next show-on-bientot-p3" for="bientot-p4">›</label>
            <!-- p4 -->
            <label class="slider-btn prev show-on-bientot-p4" for="bientot-p3">‹</label>
            <label class="slider-btn next show-on-bientot-p4" for="bientot-p5">›</label>
            <!-- p5 -->
            <label class="slider-btn prev show-on-bientot-p5" for="bientot-p4">‹</label>
            <label class="slider-btn next show-on-bientot-p5 is-disabled" for="bientot-p5">›</label>
          </div>

          <div class="cinema-viewport">
            <div class="cinema-track">
              <div class="slide"><div class="card-inner"><a href="info.php?id=8"><img src="images/Ody.jpg" alt="Film"></a><div class="info">Sortie : 2026</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=9"><img src="images/Ave.jpg" alt="Film"></a><div class="info">Sortie : Mai 2026</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=10"><img src="images/Dun.jpg" alt="Film"></a><div class="info">Sortie : Décembre 2026</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=12"><img src="images/Dig.jpg" alt="Film"></a><div class="info">Sortie : 2026</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=13"><img src="images/The.jpg" alt="Film"></a><div class="info">Sortie : 2025</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=14"><img src="images/Pro.jpg" alt="Film"></a><div class="info">Sortie : Mars 2026</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=15"><img src="images/Dis.jpg" alt="Film"></a><div class="info">Sortie : 2026</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=16"><img src="images/Spi.jpg" alt="Film"></a><div class="info">Sortie : Juillet 2026</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=17"><img src="images/Sup.jpg" alt="Film"></a><div class="info">Sortie : Juin 2026</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=18"><img src="images/Sta.jpg" alt="Film"></a><div class="info">Sortie : Mai 2026</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=19"><img src="images/Mic.jpg" alt="Film"></a><div class="info">Sortie : Avril 2025</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=11"><img src="images/hun.jpg" alt="Film"></a><div class="info">Sortie : Mars 2026</div></div></div>
            </div>
          </div>
        </div>
      </section>


      <!-- ===================== -->
      <!-- Classiques à revoir   -->
      <!-- ===================== -->
      <section class="genre-section">
        <h2 class="section-title">Classiques à revoir</h2>

        <div class="slider-wrapper slider-classiques">
          <!-- 5 positions : 0 / -50 / -100 / -150 / -200 -->
          <input class="slider-state" type="radio" name="classiques" id="classiques-p1" checked>
          <input class="slider-state" type="radio" name="classiques" id="classiques-p2">
          <input class="slider-state" type="radio" name="classiques" id="classiques-p3">
          <input class="slider-state" type="radio" name="classiques" id="classiques-p4">
          <input class="slider-state" type="radio" name="classiques" id="classiques-p5">

          <div class="slider-nav">
            <!-- p1 -->
            <label class="slider-btn prev show-on-classiques-p1 is-disabled" for="classiques-p1">‹</label>
            <label class="slider-btn next show-on-classiques-p1" for="classiques-p2">›</label>
            <!-- p2 -->
            <label class="slider-btn prev show-on-classiques-p2" for="classiques-p1">‹</label>
            <label class="slider-btn next show-on-classiques-p2" for="classiques-p3">›</label>
            <!-- p3 -->
            <label class="slider-btn prev show-on-classiques-p3" for="classiques-p2">‹</label>
            <label class="slider-btn next show-on-classiques-p3" for="classiques-p4">›</label>
            <!-- p4 -->
            <label class="slider-btn prev show-on-classiques-p4" for="classiques-p3">‹</label>
            <label class="slider-btn next show-on-classiques-p4" for="classiques-p5">›</label>
            <!-- p5 -->
            <label class="slider-btn prev show-on-classiques-p5" for="classiques-p4">‹</label>
            <label class="slider-btn next show-on-classiques-p5 is-disabled" for="classiques-p5">›</label>
          </div>

          <div class="cinema-viewport">
            <div class="cinema-track">
              <div class="slide"><div class="card-inner"><a href="info.php?id=20"><img src="images/Lep.jpg" alt="Le Parrain"></a><div class="info">1972 • Crime/Drame — Saga mafieuse des Corleone.</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=21"><img src="images/Gla.jpg" alt="Gladiator"></a><div class="info">2000 • Action/Drame — Vengeance dans l’arène.</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=22"><img src="images/Lah.jpg" alt="La haine"></a><div class="info">1995 • Drame — 24h de tension en banlieue.</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=23"><img src="images/Lem.jpg" alt="L'empire contre-attaque"></a><div class="info">1980 • SF/Aventure — La saga prend un tournant.</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=24"><img src="images/Par.jpg" alt="Paris, Texas"></a><div class="info">1984 • Drame — Errance et retrouvailles.</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=25"><img src="images/Iki.jpg" alt="Ikiru"></a><div class="info">1952 • Drame — Redonner un sens à sa vie.</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=26"><img src="images/Aki.jpg" alt="Akira"></a><div class="info">1988 • Animation/SF — Neo-Tokyo en chaos.</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=27"><img src="images/Les.jpg" alt="Les Affranchis"></a><div class="info">1990 • Crime/Drame — Ascension et chute d’un gangster.</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=28"><img src="images/Cor.jpg" alt="Coraline"></a><div class="info">2009 • Animation/Fantastique — Un autre monde trop parfait.</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=29"><img src="images/Gat.jpg" alt="Gattaca"></a><div class="info">1997 • SF/Thriller — Identité volée, rêve spatial.</div></div></div>
              <div class="slide"><div class="card-inner"><a href="info.php?id=30"><img src="images/Lac.jpg" alt="La cité de dieu"></a><div class="info">2002 • Crime/Drame — Destins croisés dans les favelas.</div></div></div>
            </div>
          </div>
        </div>
      </section>

    </div>
  </body>
</html>
