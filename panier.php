<?php
session_start(); // Indispensable pour garder le panier en mémoire

// 1. AJOUT AU PANIER (si on vient de la page info.php)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['film_id'])) {
    $item = [
        'id'      => $_POST['film_id'],
        'titre'   => $_POST['film_titre'] ?? 'Film',
        'affiche' => $_POST['film_affiche'] ?? '',
        'heure'   => $_POST['heure_seance'] ?? $_POST['heure_choisie'] ?? '--:--',
        'q_plein' => (int)$_POST['qty_plein'],
        'q_edu'   => (int)$_POST['qty_edu'],
        'q_kids'  => (int)$_POST['qty_kids']
    ];

    // On n'ajoute que si au moins une place a été sélectionnée
    if (($item['q_plein'] + $item['q_edu'] + $item['q_kids']) > 0) {
        $_SESSION['panier'][] = $item;
    }
}

// 2. SUPPRESSION D'UN ARTICLE
if (isset($_GET['delete'])) {
    $index = (int)$_GET['delete'];
    if (isset($_SESSION['panier'][$index])) {
        unset($_SESSION['panier'][$index]);
        $_SESSION['panier'] = array_values($_SESSION['panier']); // Réorganise les index
    }
    header("Location: panier.php");
    exit;
}

$panier = $_SESSION['panier'] ?? [];
$totalGeneral = 0;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Panier - Lumen Cinéma</title>
    <link rel="stylesheet" href="stylenav.css">
    <link rel="stylesheet" href="panier.css">
</head>
<body>
<?php include 'nav.php'; ?>

<div class="cart-container">
    <h1 class="cart-title">MON PANIER</h1>

    <?php if (empty($panier)): ?>
        <div class="empty-cart">
            <p>Votre panier est vide.</p>
            <a href="index.php" class="btn-back">Retour aux films</a>
        </div>
    <?php else: ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Film</th>
                    <th>Séance</th>
                    <th>Places</th>
                    <th>Sous-total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($panier as $index => $res): 
                    $sousTotal = ($res['q_plein'] * 10) + ($res['q_edu'] * 5) + ($res['q_kids'] * 4);
                    $totalGeneral += $sousTotal;
                ?>
                <tr>
                    <td class="td-film">
                        <img src="<?php echo htmlspecialchars($res['affiche']); ?>" class="cart-img">
                        <span><?php echo htmlspecialchars($res['titre']); ?></span>
                    </td>
                    <td><b style="color:#e50914;"><?php echo htmlspecialchars($res['heure']); ?></b></td>
                    <td class="td-qty">
                        <?php if($res['q_plein'] > 0) echo "Plein x".$res['q_plein']."<br>"; ?>
                        <?php if($res['q_edu'] > 0) echo "Réduit x".$res['q_edu']."<br>"; ?>
                        <?php if($res['q_kids'] > 0) echo "Enfant x".$res['q_kids']; ?>
                    </td>
                    <td class="td-price"><?php echo $sousTotal; ?>€</td>
                    <td>
                        <a href="panier.php?delete=<?php echo $index; ?>" class="delete-link">Effacer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="cart-footer">
            <div class="total-box">
                <span>TOTAL À PAYER :</span>
                <span class="total-amount"><?php echo $totalGeneral; ?>€</span>
            </div>
            <a href="paiement.php" class="btn-checkout">PROCÉDER AU PAIEMENT</a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>