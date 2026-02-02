<?php
session_start();

$message = "";


if (isset($_POST['inscription'])) {
    $pseudo = trim($_POST['pseudo']);
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT); 

    if (!empty($pseudo) && !empty($_POST['mdp'])) {
        $fichier = fopen("utilisateurs.csv", "a+");
        fputcsv($fichier, [$pseudo, $mdp], ";");
        fclose($fichier);
        $message = "<p style='color:green;'>Inscription réussie ! Connectez-vous.</p>";
    }
}


if (isset($_POST['connexion'])) {
    $pseudo_tente = $_POST['pseudo'];
    $mdp_tente = $_POST['mdp'];

    if (($fichier = fopen("utilisateurs.csv", "r")) !== false) {
        $trouve = false;
        while (($ligne = fgetcsv($fichier, 0, ";")) !== false) {
            if ($ligne[0] === $pseudo_tente && password_verify($mdp_tente, $ligne[1])) {
                $_SESSION['user'] = $pseudo_tente;
                $trouve = true;
                header("Location: index.php"); 
                exit;
            }
        }
        if (!$trouve) $message = "<p style='color:red;'>Identifiant ou mot de passe incorrect.</p>";
        fclose($fichier);
    }
}


if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: compte.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Compte - Lumen Cinéma</title>
    <link rel="stylesheet" href="stylenav.css">
    <link rel="stylesheet" href="compte.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <div class="account-container">
        <?php if (isset($_SESSION['user'])): ?>
            <div class="welcome-box">
                <h1>Bonjour, <span><?php echo htmlspecialchars($_SESSION['user']); ?></span></h1>
                <p>Vous êtes connecté à votre espace Lumen Cinéma.</p>
                <a href="compte.php?logout=1" class="btn-logout">Se déconnecter</a>
            </div>
        <?php else: ?>
            <div class="auth-grid">
                <div class="auth-box">
                    <h2>SE CONNECTER</h2>
                    <form method="POST">
                        <input type="text" name="pseudo" placeholder="Identifiant" required>
                        <input type="password" name="mdp" placeholder="Mot de passe" required>
                        <button type="submit" name="connexion" class="btn-auth">CONNEXION</button>
                    </form>
                </div>

                <div class="auth-box">
                    <h2>S'INSCRIRE</h2>
                    <form method="POST">
                        <input type="text" name="pseudo" placeholder="Choisir un identifiant" required>
                        <input type="password" name="mdp" placeholder="Choisir un mot de passe" required>
                        <button type="submit" name="inscription" class="btn-auth red">CRÉER MON COMPTE</button>
                    </form>
                </div>
            </div>
            <?php echo $message; ?>
        <?php endif; ?>
    </div>
</body>
</html>