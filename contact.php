<?php include 'nav.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact & Recrutement - Lumen Cinéma</title>
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="stylenav.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="contact-container">
    <h1 class="contact-title">CONTACTEZ-NOUS</h1>

    <div class="contact-grid">
        
        <div class="contact-info">
            <h3>REJOIGNEZ LA COMMUNAUTÉ</h3>
            <p>Suivez l'actualité de **Lumen Cinéma** sur nos réseaux officiels :</p>
            
            <div class="social-links">
                <a href="#" class="social-item instagram">Instagram</a>
                <a href="#" class="social-item tiktok">TikTok</a>
                <a href="#" class="social-item facebook">Facebook</a>
                <a href="#" class="social-item twitter">X (Twitter)</a>
            </div>

            <div class="cinema-address">
                <h3>NOTRE ADRESSE</h3>
                <p>12 Avenue des Lumières<br>75000 Paris</p>
                <p>📧 contact@lumencinema.fr</p>
            </div>
        </div>

        <div class="contact-forms">
            
            <div class="form-section">
                <h3>LAISSER UN AVIS</h3>
                <form action="#" method="POST">
                    <input type="text" name="name" placeholder="Votre nom" required>
                    <select name="note">
                        <option value="5">⭐⭐⭐⭐⭐ (Excellent)</option>
                        <option value="4">⭐⭐⭐⭐ (Très bien)</option>
                        <option value="3">⭐⭐⭐ (Moyen)</option>
                        <option value="2">⭐⭐ (nul)</option>
                        <option value="1">⭐ (exécrable)</option>
                    </select>
                    <textarea name="message" placeholder="Votre message..." rows="4" required></textarea>
                    <button type="submit" class="btn-submit">ENVOYER L'AVIS</button>
                </form>
            </div>

            <hr class="separator">

            <div class="form-section">
                <h3>RECRUTEMENT (POSTULER)</h3>
                <p style="font-size: 0.85rem; color: #888; margin-bottom: 15px;">Envie de rejoindre l'équipe ? Envoyez-nous votre CV.</p>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <input type="email" name="email" placeholder="Votre email" required>
                    <div class="file-input-wrapper">
                        <label for="cv">Choisir mon CV (PDF)</label>
                        <input type="file" id="cv" name="cv" accept=".pdf" required>
                    </div>
                    <button type="submit" class="btn-submit secondary">POSTULER</button>
                </form>
            </div>

        </div>
    </div>
</div>

</body>
</html>