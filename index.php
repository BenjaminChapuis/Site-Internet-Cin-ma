<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lumen Cinéma</title>
  <meta name="author" content="Benjamin Chapuis et Romain Colin">
  <link rel="icon" href="favicon.ico" type="image/x-icon">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="stylenav.css">
  <link rel="stylesheet" href="styleindex.css">
</head>

<body>
  <?php include 'nav.php'; ?>

  <main class="cinema-container">

    <section class="genre-section">
      <h2 class="section-title">À l'affiche</h2>

      <div class="slider-wrapper" data-slider>
        <button class="slider-btn prev" type="button" aria-label="Précédent">‹</button>

        <div class="cinema-slider">
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

        <button class="slider-btn next" type="button" aria-label="Suivant">›</button>
      </div>
    </section>


    <section class="genre-section">
      <h2 class="section-title">Bientôt disponible</h2>

      <div class="slider-wrapper" data-slider>
        <button class="slider-btn prev" type="button" aria-label="Précédent">‹</button>

        <div class="cinema-slider">
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

        <button class="slider-btn next" type="button" aria-label="Suivant">›</button>
      </div>
    </section>


    <section class="genre-section">
      <h2 class="section-title">Classiques à revoir</h2>

      <div class="slider-wrapper" data-slider>
        <button class="slider-btn prev" type="button" aria-label="Précédent">‹</button>

        <div class="cinema-slider">
          <div class="slide"><div class="card-inner"><a href="info.php?id=20"><img src="images/Lep.jpg" alt="Le Parrain"></a><div class="info">1972 • Crime/Drame</div></div></div>
          <div class="slide"><div class="card-inner"><a href="info.php?id=21"><img src="images/Gla.jpg" alt="Gladiator"></a><div class="info">2000 • Action/Drame</div></div></div>
          <div class="slide"><div class="card-inner"><a href="info.php?id=22"><img src="images/Lah.jpg" alt="La haine"></a><div class="info">1995 • Drame</div></div></div>
          <div class="slide"><div class="card-inner"><a href="info.php?id=23"><img src="images/Lem.jpg" alt="L'empire contre-attaque"></a><div class="info">1980 • SF/Aventure</div></div></div>
          <div class="slide"><div class="card-inner"><a href="info.php?id=24"><img src="images/Par.jpg" alt="Paris, Texas"></a><div class="info">1984 • Drame</div></div></div>
          <div class="slide"><div class="card-inner"><a href="info.php?id=25"><img src="images/Iki.jpg" alt="Ikiru"></a><div class="info">1952 • Drame</div></div></div>
          <div class="slide"><div class="card-inner"><a href="info.php?id=26"><img src="images/Aki.jpg" alt="Akira"></a><div class="info">1988 • Animation/SF</div></div></div>
          <div class="slide"><div class="card-inner"><a href="info.php?id=27"><img src="images/Les.jpg" alt="Les Affranchis"></a><div class="info">1990 • Crime/Drame</div></div></div>
          <div class="slide"><div class="card-inner"><a href="info.php?id=28"><img src="images/Cor.jpg" alt="Coraline"></a><div class="info">2009 • Animation/Fantastique</div></div></div>
          <div class="slide"><div class="card-inner"><a href="info.php?id=29"><img src="images/Gat.jpg" alt="Gattaca"></a><div class="info">1997 • SF/Thriller</div></div></div>
          <div class="slide"><div class="card-inner"><a href="info.php?id=30"><img src="images/Lac.jpg" alt="La cité de dieu"></a><div class="info">2002 • Crime/Drame</div></div></div>
        </div>

        <button class="slider-btn next" type="button" aria-label="Suivant">›</button>
      </div>
    </section>

  </main>

  <script>
    document.querySelectorAll('[data-slider]').forEach(wrapper => {
      const slider = wrapper.querySelector('.cinema-slider');
      const prev = wrapper.querySelector('.slider-btn.prev');
      const next = wrapper.querySelector('.slider-btn.next');

      const num = v => (Number.isFinite(v) ? v : 0);

      const getGap = () => {
        const styles = getComputedStyle(slider);
        const g = parseFloat(styles.gap || styles.columnGap || "0");
        return num(g);
      };

      const getStep = () => {
        const first = slider.querySelector('.slide');
        if (!first) return 300;
        const w = first.getBoundingClientRect().width;
        return Math.round(w + getGap());
      };

      const updateButtons = () => {
        const maxScroll = slider.scrollWidth - slider.clientWidth;
        prev.disabled = slider.scrollLeft <= 1;
        next.disabled = slider.scrollLeft >= maxScroll - 1;
      };

      prev.addEventListener('click', () => {
        slider.scrollBy({ left: -getStep(), behavior: 'smooth' });
      });

      next.addEventListener('click', () => {
        slider.scrollBy({ left: getStep(), behavior: 'smooth' });
      });

      slider.addEventListener('scroll', updateButtons, { passive: true });
      window.addEventListener('resize', updateButtons);

      updateButtons();
    });
  </script>
</body>
</html>
