<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// On compte le nombre total de places réservées (pas juste le nombre de films)
$countPanier = 0;
if (isset($_SESSION['panier'])) {
    foreach ($_SESSION['panier'] as $item) {
        $countPanier += $item['q_plein'] + $item['q_edu'] + $item['q_kids'];
    }
}
?>

<nav class="navbar">
    <a href="panier.php" class="nav-cart">
        PANIER
        <?php if ($countPanier > 0): ?>
            <span class="cart-badge"><?php echo $countPanier; ?></span>
        <?php endif; ?>
    </a>
</nav>
<nav>
    
    <ul class="menu">
        <li><img src="logo.png"></li>
        <li><a href="index.php">Films</a></li>
        <li><a href="cinema.php">Cinéma</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a class="nav-link nav-cart" href="panier.php">Panier <?php if ($countPanier > 0): ?><span class="cart-badge"><?php echo $countPanier; ?></span><?php endif; ?></a></li>
        <li><a href="recherche.php">Recherche</a></li>
        <li><a href="contact.html">Compte</a></li>
    </ul>
</nav>