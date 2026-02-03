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
$accountIcon = $userName ? "images/compte.png" : "images/connexion.png";
$accountTitle = $userName ? $userName : "Se connecter";
?>

<nav class="main-nav">
  <div class="nav-inner">
    <a href="index.php" class="logo-link">
      <img src="images/lumen logo.png" alt="Lumen Cinéma" class="logo-img">
    </a>

    <input type="checkbox" id="nav-toggle" class="nav-toggle" aria-label="Ouvrir le menu">
    <label for="nav-toggle" class="burger" aria-hidden="true">
      <span></span><span></span><span></span>
    </label>

    <ul class="menu">
      <li><a href="index.php">Films</a></li>
      <li><a href="cinema.php">Cinéma</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="recherche.php">Recherche</a></li>
    </ul>

    <div class="nav-icons">
      <a href="panier.php" class="icon-link" aria-label="Panier" title="Panier">
        <span class="icon-wrap">
          <img src="images/panier.png" alt="" class="nav-icon">
          <?php if ($countPanier > 0): ?>
            <span class="cart-badge"><?php echo $countPanier; ?></span>
          <?php endif; ?>
        </span>
      </a>

      <a href="compte.php" class="icon-link" aria-label="Compte" title="<?php echo $accountTitle; ?>">
        <span class="icon-wrap">
          <img src="<?php echo $accountIcon; ?>" alt="" class="nav-icon">
        </span>
      </a>
    </div>
  </div>
</nav>
