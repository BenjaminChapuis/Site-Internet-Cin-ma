<?php
session_start();
$panierArchive = $_SESSION['panier'] ?? [];
unset($_SESSION['panier']); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation - Lumen Cinéma</title>
    <link rel="stylesheet" href="stylenav.css">
    <style>
        .success-container { text-align: center; padding: 100px 20px; color: white; }
        .check-icon { font-size: 5rem; color: #4CAF50; margin-bottom: 20px; }
        .ticket-box { background: white; color: black; max-width: 400px; margin: 30px auto; padding: 20px; border-radius: 10px; text-align: left; position: relative; }
        .ticket-box::after { content: ''; position: absolute; bottom: -10px; left: 0; width: 100%; height: 20px; background-image: radial-gradient(circle, transparent 70%, white 70%); background-size: 20px 20px; }
        .btn-home { display: inline-block; margin-top: 40px; padding: 15px 30px; background: #e50914; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; }
    </style>
</head>
<body>
    <?php include 'nav.php'; ?>

    <div class="success-container">
        <div class="check-icon">✔</div>
        <h1>PAIEMENT RÉUSSI !</h1>
        <p>Merci pour votre confiance. Vos billets ont été envoyés par e-mail.</p>

        <div class="ticket-box">
            <h3 style="margin-top:0; color:#e50914;">LUMEN CINÉMA</h3>
            <hr>
            <?php foreach ($panierArchive as $res): ?>
                <p><strong><?php echo htmlspecialchars($res['titre']); ?></strong></p>
                <p>Séance : <?php echo htmlspecialchars($res['heure']); ?></p>
                <p style="font-size: 0.8rem; color: #666;">Places : <?php echo ($res['q_plein'] + $res['q_edu'] + $res['q_kids']); ?></p>
                <hr>
            <?php endforeach; ?>
            <p style="text-align:center; font-family: monospace;">#CODE-RESA-<?php echo rand(10000, 99999); ?></p>
        </div>

        <a href="index.php" class="btn-home">RETOURNER À L'ACCUEIL</a>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>