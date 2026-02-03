<?php
session_start();

$message = "";

function loadPanierFromFile(string $pseudo): array {
    $file = "paniers.csv";
    if (!file_exists($file)) return [];

    if (($f = fopen($file, "r")) !== false) {
        while (($line = fgetcsv($f, 0, ";")) !== false) {
            if (!isset($line[0], $line[1])) continue;
            if ($line[0] === $pseudo) {
                $data = json_decode($line[1], true);
                fclose($f);
                return is_array($data) ? $data : [];
            }
        }
        fclose($f);
    }
    return [];
}

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

    if (!$found) {
        $rows[] = [$pseudo, json_encode($panier, JSON_UNESCAPED_UNICODE)];
    }

    $f = fopen($file, "w");
    foreach ($rows as $r) fputcsv($f, $r, ";");
    fclose($f);
}

function mergePaniers(array $panierCompte, array $panierInvite): array {
    $map = [];

    $push = function(array $item) use (&$map) {
        $id = trim((string)($item['id'] ?? ''));
        $heure = trim((string)($item['heure'] ?? '--:--'));
        if ($id === '') return;

        $key = $id . '|' . $heure;

        $qP = (int)($item['q_plein'] ?? 0);
        $qE = (int)($item['q_edu'] ?? 0);
        $qK = (int)($item['q_kids'] ?? 0);

        if (!isset($map[$key])) {
            $map[$key] = [
                'id'      => $id,
                'titre'   => (string)($item['titre'] ?? 'Film'),
                'affiche' => (string)($item['affiche'] ?? ''),
                'heure'   => $heure,
                'q_plein' => $qP,
                'q_edu'   => $qE,
                'q_kids'  => $qK,
            ];
        } else {
            $map[$key]['q_plein'] += $qP;
            $map[$key]['q_edu']   += $qE;
            $map[$key]['q_kids']  += $qK;

            if (empty($map[$key]['titre']) && !empty($item['titre'])) $map[$key]['titre'] = (string)$item['titre'];
            if (empty($map[$key]['affiche']) && !empty($item['affiche'])) $map[$key]['affiche'] = (string)$item['affiche'];
        }
    };

    foreach ($panierCompte as $it)  if (is_array($it)) $push($it);
    foreach ($panierInvite as $it)  if (is_array($it)) $push($it);

    $result = array_values($map);

    $result = array_values(array_filter($result, function($it){
        return ((int)($it['q_plein'] ?? 0) + (int)($it['q_edu'] ?? 0) + (int)($it['q_kids'] ?? 0)) > 0;
    }));

    return $result;
}

if (isset($_POST['inscription'])) {
    $pseudo = trim($_POST['pseudo'] ?? '');
    $mdpRaw = $_POST['mdp'] ?? '';
    $mdp = password_hash($mdpRaw, PASSWORD_DEFAULT);

    if ($pseudo !== '' && $mdpRaw !== '') {
        $fichier = fopen("utilisateurs.csv", "a+");
        fputcsv($fichier, [$pseudo, $mdp], ";");
        fclose($fichier);
        $message = "<p style='color:green;'>Inscription réussie ! Connectez-vous.</p>";
    }
}

if (isset($_POST['connexion'])) {
    $pseudo_tente = trim($_POST['pseudo'] ?? '');
    $mdp_tente = $_POST['mdp'] ?? '';

    if (($fichier = fopen("utilisateurs.csv", "r")) !== false) {
        $trouve = false;
        while (($ligne = fgetcsv($fichier, 0, ";")) !== false) {
            if (!isset($ligne[0], $ligne[1])) continue;

            if ($ligne[0] === $pseudo_tente && password_verify($mdp_tente, $ligne[1])) {
                $trouve = true;

                $panierInvite = $_SESSION['panier'] ?? [];
                $panierCompte = loadPanierFromFile($pseudo_tente);

                $panierFusionne = mergePaniers($panierCompte, $panierInvite);

                $_SESSION['user'] = $pseudo_tente;
                $_SESSION['panier'] = $panierFusionne;

                savePanierToFile($pseudo_tente, $panierFusionne);

                header("Location: index.php");
                exit;
            }
        }
        fclose($fichier);

        if (!$trouve) $message = "<p style='color:red;'>Identifiant ou mot de passe incorrect.</p>";
    }
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['user'])) {
        $u = $_SESSION['user'];
        $p = $_SESSION['panier'] ?? [];
        savePanierToFile($u, $p);
    }

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
