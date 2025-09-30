<?php
include 'config.php';

function motDePasseValide($password) {
    // Min 8 caractères, au moins 1 majuscule, 1 minuscule, 1 chiffre
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = trim($_POST['login']);
    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    // Vérification des champs
    if (empty($login) || empty($password) || empty($confirm)) {
        $error = "Les champs login et mot de passe sont obligatoires.";
    } elseif ($password !== $confirm) {
        $error = "Les mots de passe ne correspondent pas.";
    } elseif (!motDePasseValide($password)) {
        $error = "Le mot de passe doit contenir au moins 15 caractères, avec une majuscule, une minuscule, un chiffre et un caractère spécial.";
    } else {
        // Vérifier si le login existe déjà
        $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE login = ?");
        $stmt->execute([$login]);
        if ($stmt->rowCount() > 0) {
            $error = "Ce login est déjà utilisé.";
        } else {
            try {
                // Insérer l'utilisateur
                $hashed = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO utilisateurs (login, prenom, nom, password) VALUES (?, ?, ?, ?)");
                $result = $stmt->execute([$login, $prenom, $nom, $hashed]);
                
                if ($result) {
                    $success = "Inscription réussie ! Redirection vers la page de connexion...";
                    // Petite pause pour afficher le message
                    echo "<script>
                        alert('Inscription réussie !');
                        setTimeout(function() {
                            window.location.href = 'connexion.php';
                        }, 1000);
                    </script>";
                } else {
                    $error = "Erreur lors de l'insertion en base de données.";
                }
            } catch (PDOException $e) {
                $error = "Erreur de base de données : " . $e->getMessage();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Créer un compte</h2>

    <?php if (isset($error)) : ?>
        <p class="error" style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if (isset($success)) : ?>
        <p class="success" style="color: green; background-color: #d4edda; border: 1px solid #c3e6cb; padding: 10px; border-radius: 4px;"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <form method="post" action="inscription.php">
        <label for="login">Login *</label><br>
        <input type="text" name="login" id="login" required><br><br>

        <label for="prenom">Prénom</label><br>
        <input type="text" name="prenom" id="prenom"><br><br>

        <label for="nom">Nom</label><br>
        <input type="text" name="nom" id="nom"><br><br>

        <label for="password">Mot de passe *</label><br>
        <input type="password" name="password" id="password" required><br>
        <small>Min. 15 caractères, avec majuscule, minuscule, chiffre, caractère spécial</small><br><br>

        <label for="confirm">Confirmer le mot de passe *</label><br>
        <input type="password" name="confirm" id="confirm" required><br><br>

        <button type="submit">S'inscrire</button>
    </form>

    <p>Déjà un compte ? <a href="connexion.php">Se connecter</a></p>
</body>
</html>
