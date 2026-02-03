<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$countPanier = 0;
if (isset($_SESSION['panier'])) {
    foreach ($_SESSION['panier'] as $item) {
        $countPanier += ($item['q_plein'] ?? 0) + ($item['q_edu'] ?? 0) + ($item['q_kids'] ?? 0);
    }
}

$userName = isset($_SESSION['user']) ? strtoupper(htmlspecialchars($_SESSION['user'])) : null;
?>

<nav class="main-nav">
  <ul class="menu">
    <li class="menu-logo">
      <a href="index.php" class="logo-link">
        <img src="images/lumen logo.png" alt="Lumen Cinéma" class="logo-img">
      </a>
    </li>

    <li><a href="index.php">Films</a></li>
    <li><a href="cinema.php">Cinéma</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a href="recherche.php">Recherche</a></li>

    <li class="menu-spacer"></li>

    <li class="menu-icon">
      <a href="panier.php" class="icon-link" aria-label="Panier" title="Panier">
        <span class="icon-wrap">
          <img src="images/panier.png" alt="" class="nav-icon">
          <?php if ($countPanier > 0): ?>
            <span class="cart-badge"><?php echo $countPanier; ?></span>
          <?php endif; ?>
        </span>
      </a>
    </li>

    <li class="menu-icon">
      <a href="compte.php" class="icon-link" aria-label="Compte" title="<?php echo $userName ? $userName : 'Mon compte'; ?>">
        <span class="icon-wrap">
          <img src="images/compte.png" alt="" class="nav-icon">
        </span>
      </a>
    </li>
  </ul>
</nav>
