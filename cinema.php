<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nos Cinémas - Lumen Cinéma</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS global + nav -->
    <link rel="stylesheet" href="stylenav.css">
    <!-- CSS spécifique à la page cinéma -->
    <link rel="stylesheet" href="cinema.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

<?php include 'nav.php'; ?>

<div class="cinema-page">

    <h1 class="page-title">Nos Cinémas</h1>

    <div class="cinema-grid">

        <!-- CINÉMA 1 -->
        <div class="cinema-card">
            <img src="images/cinema1.jpg" alt="Cinéma Paris Centre">

            <div class="cinema-info">
                <h2>Lumen Cinéma – Paris Centre</h2>
                <p>📍 12 rue du Cinéma, 75001 Paris</p>
                <p>📞 01 45 00 00 01</p>
                <p>🕒 Tous les jours : 10h – 23h</p>

                <ul class="cinema-features">
                    <li>IMAX</li>
                    <li>Dolby Atmos</li>
                    <li>3D</li>
                </ul>

                <a href="#" class="cinema-btn">Voir les séances</a>
            </div>
        </div>

        <!-- CINÉMA 2 -->
        <div class="cinema-card">
            <img src="images/cinema2.jpg" alt="Cinéma Lyon">

            <div class="cinema-info">
                <h2>Lumen Cinéma – Lyon Part-Dieu</h2>
                <p>📍 45 avenue Lumière, 69003 Lyon</p>
                <p>📞 04 78 00 00 02</p>
                <p>🕒 Tous les jours : 9h30 – 22h30</p>

                <ul class="cinema-features">
                    <li>4DX</li>
                    <li>Dolby Atmos</li>
                    <li>Accès PMR</li>
                </ul>

                <a href="#" class="cinema-btn">Voir les séances</a>
