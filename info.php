<?php include 'nav.php'; ?> 
<html>
    <link rel="stylesheet" href="info.css">   
    <div class="movie-detail-container">
    
    <div class="movie-header">
        <div class="movie-text">
            <h1 class="movie-title">NOM DU FILM</h1>
            <p class="movie-description">
                Voici la description complète du film. Un résumé captivant qui donne envie aux spectateurs de réserver leur place immédiatement. Ce film est un chef-d'œuvre du cinéma contemporain.
            </p>
        </div>
        <div class="movie-poster">
            <img src="film.jpg" alt="Affiche format large">
        </div>
    </div>

    <div class="showtimes-section">
        <h3>SÉANCES</h3>
        <div class="showtimes-slider">
            <div class="showtime-card">
                <div class="st-left">14:30</div>
                <div class="st-right">
                    <span class="st-lang">VF</span>
                    <span class="st-end">Fin: 16:45</span>
                </div>
            </div>

            <div class="showtime-card">
                <div class="st-left">17:00</div>
                <div class="st-right">
                    <span class="st-lang">VO</span>
                    <span class="st-end">Fin: 19:15</span>
                </div>
            </div>
            
            <div class="showtime-card">
                <div class="st-left">20:00</div>
                <div class="st-right">
                    <span class="st-lang">VF</span>
                    <span class="st-end">Fin: 22:15</span>
                </div>
            </div>

            <div class="showtime-card">
                <div class="st-left">22:30</div>
                <div class="st-right">
                    <span class="st-lang">VO</span>
                    <span class="st-end">Fin: 00:45</span>
                </div>
            </div>
        </div>
    </div>
</div>
</html>