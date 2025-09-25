<?php
// Démarrage de la session
session_start();

// Vérification si l'utilisateur est déjà connecté via un cookie
$connected = false;
if (isset($_COOKIE['prenom'])) {
    $connected = true;
    $prenom = $_COOKIE['prenom'];
}

// Traitement du formulaire de connexion
if (isset($_POST['prenom']) && !empty($_POST['prenom'])) {
    $prenom = $_POST['prenom'];
    // Stockage du prénom dans un cookie qui expire dans 1 heure
    setcookie('prenom', $prenom, time() + 3600);
    $connected = true;
}

// Déconnexion
if (isset($_POST['deco'])) {
    // Suppression du cookie
    setcookie('prenom', '', time() - 3600);
    $connected = false;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            display: inline-block;
        }
        form {
            margin: 20px 0;
        }
        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
            width: 200px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .logout-btn {
            background-color: #ff4444;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        .logout-btn:hover {
            background-color: #cc0000;
        }
        .welcome {
            font-size: 24px;
            color: #333;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (!$connected): ?>
            <h2>Formulaire de connexion</h2>
            <form method="post">
                <input type="text" name="prenom" placeholder="Entrez votre prénom" required>
                <input type="submit" value="Connexion">
            </form>
        <?php else: ?>
            <div class="welcome">
                <p>Bonjour <?php echo htmlspecialchars($prenom); ?> !</p>
            </div>
            <form method="post">
                <input type="submit" name="deco" value="Déconnexion" class="logout-btn">
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
