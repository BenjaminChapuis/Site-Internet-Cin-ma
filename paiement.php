<?php
session_start();
$panier = $_SESSION['panier'] ?? [];
$totalGeneral = 0;

foreach ($panier as $item) {
    $totalGeneral += ($item['q_plein'] * 10) + ($item['q_edu'] * 5) + ($item['q_kids'] * 4);
}

if ($totalGeneral <= 0) {
    header("Location: panier.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paiement Sécurisé - Lumen Cinéma</title>
    <link rel="stylesheet" href="stylenav.css">
    <link rel="stylesheet" href="paiement.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <div class="checkout-container">
        <div class="payment-card">
            <h1 class="pay-title">PAIEMENT SÉCURISÉ</h1>
            <p class="pay-total">Montant à régler : <span><?php echo $totalGeneral; ?>€</span></p>

            <form action="confirmation.php" method="POST">
                <div class="input-group">
                    <label>Nom sur la carte</label>
                    <input type="text" placeholder="M. Jean Dupont" required>
                </div>

                <div class="input-group">
                    <label>Numéro de carte</label>
                    <input type="text" placeholder="0000 0000 0000 0000" maxlength="16" required>
                </div>

                <div class="input-row">
                    <div class="input-group">
                        <label>Expiration</label>
                        <input type="text" placeholder="MM/AA" maxlength="5" required>
                    </div>
                    <div class="input-group">
                        <label>CVV</label>
                        <input type="text" placeholder="123" maxlength="3" required>
                    </div>
                </div>

                <button type="submit" class="btn-pay">PAYER MAINTENANT</button>
            </form>
            
            <div class="secure-icons">
                <p>🔒 Paiement crypté SSL 256-bits</p>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>