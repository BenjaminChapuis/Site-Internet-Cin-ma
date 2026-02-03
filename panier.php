<?php
session_start();

function savePanierToFile(string $pseudo, array $panier): void {
    $file = "paniers.csv";
    if (!file_exists($file)) file_put_contents($file, "");

    $rows = [];
    $found = false;

    if (($f = fopen($file, "r")) !== false) {
        while (($line = fgetcsv($f, 0, ";")) !== false) {
            if (!isset($line[0])) continue;
            if ($line[0] === $pseudo) {
                $rows[] = [$pseudo, json_encode($panier, JSON_UNESCAPED_UNICODE)];
                $found = true;
            } else {
                $rows[] = $line;
            }
        }
        fclose($f);
    }

    if (!$found) $rows[] = [$pseudo, json_encode($panier, JSON_UNESCAPED_UNICODE)];

    $f = fopen($file, "w");
    foreach ($rows as $r) fputcsv($f, $r, ";");
    fclose($f);
}

if (!isset($_SESSION['panier'])) $_SESSION['panier'] = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['film_id'])) {
    $qPlein = (int)($_POST['qty_plein'] ?? 0);
    $qEdu   = (int)($_POST['qty_edu'] ?? 0);
    $qKids  = (int)($_POST['qty_kids'] ?? 0);

    $item = [
        'id'      => trim((string)($_POST['film_id'] ?? '')),
        'titre'   => trim((string)($_POST['film_titre'] ?? 'Film')),
        'affiche' => trim((string)($_POST['film_affiche'] ?? '')),
        'heure'   => trim((string)($_POST['heure_seance'] ?? '--:--')),
        'q_plein' => $qPlein,
        'q_edu'   => $qEdu,
        'q_kids'  => $qKids
    ];

    if (($qPlein + $qEdu + $qKids) > 0) {
        $_SESSION['panier'][] = $item;
    }

    if (isset($_SESSION['user'])) {
        savePanierToFile($_SESSION['user'], $_SESSION['panier']);
    }

    header("Location: panier.php");
    exit;
}

if (isset($_GET['delete'])) {
    $index = (int)$_GET['delete'];
    if (isset($_SESSION['panier'][$index])) {
        unset($_SESSION['panier'][$index]);
        $_SESSION['panier'] = array_values($_SESSION['panier']);
    }

    if (isset($_SESSION['user'])) {
        savePanierToFile($_SESSION['user'], $_SESSION['panier']);
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
                    $sousTotal = ((int)$res['q_plein'] * 10) + ((int)$res['q_edu'] * 5) + ((int)$res['q_kids'] * 4);
                    $totalGeneral += $sousTotal;

                    $aff = trim((string)($res['affiche'] ?? ''));
                    if ($aff === '') $aff = 'images/film.jpg';
                ?>
                <tr>
                    <td class="td-film">
                        <img src="<?php echo htmlspecialchars($aff); ?>" class="cart-img" alt="">
                        <span><?php echo htmlspecialchars($res['titre'] ?? 'Film'); ?></span>
                    </td>
                    <td><b style="color:#e50914;"><?php echo htmlspecialchars($res['heure'] ?? '--:--'); ?></b></td>
                    <td class="td-qty">
                        <?php if(!empty($res['q_plein'])) echo "Plein x".(int)$res['q_plein']."<br>"; ?>
                        <?php if(!empty($res['q_edu']))   echo "Réduit x".(int)$res['q_edu']."<br>"; ?>
                        <?php if(!empty($res['q_kids']))  echo "Enfant x".(int)$res['q_kids']; ?>
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
