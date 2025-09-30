<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = trim($_POST['login']);
    $password = $_POST['password'];

    if (empty($login) || empty($password)) {
        $error = "Veuillez saisir votre login et mot de passe.";
    } else {
        // Vérifier les identifiants
        $stmt = $pdo->prepare("SELECT id, login, prenom, nom, password FROM utilisateurs WHERE login = ?");
        $stmt->execute([$login]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Connexion réussie
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['login'] = $user['login'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['nom'] = $user['nom'];
            
            header("Location: accueil.php");
            exit();
        } else {
            $error = "Login ou mot de passe incorrect.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Se connecter</h2>

    <?php if (isset($error)) : ?>
        <p class="error" style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" action="connexion.php">
        <label for="login">Login *</label><br>
        <input type="text" name="login" id="login" required><br><br>

        <label for="password">Mot de passe *</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit">Se connecter</button>
    </form>

    <p>Pas encore de compte ? <a href="inscription.php">S'inscrire</a></p>
</body>
</html>