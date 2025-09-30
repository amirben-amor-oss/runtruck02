<?php
include 'config.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}

// Gérer la déconnexion
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: connexion.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
        <h1>Bienvenue, <?= htmlspecialchars($_SESSION['prenom'] ?? $_SESSION['login']) ?> !</h1>
        <p><a href="accueil.php?logout=1">Se déconnecter</a></p>
    </div>

    <div class="content">
        <h2>Tableau de bord</h2>
        
        <div class="user-info">
            <h3>Informations du compte :</h3>
            <p><strong>Login :</strong> <?= htmlspecialchars($_SESSION['login']) ?></p>
            <p><strong>Prénom :</strong> <?= htmlspecialchars($_SESSION['prenom'] ?? 'Non renseigné') ?></p>
            <p><strong>Nom :</strong> <?= htmlspecialchars($_SESSION['nom'] ?? 'Non renseigné') ?></p>
        </div>

        <div class="actions">
            <h3>Actions disponibles :</h3>
            <ul>
                <li><a href="profil.php">Modifier mon profil</a></li>
                <li><a href="connexion.php">Retour à la connexion</a></li>
            </ul>
        </div>
    </div>

    <style>
        .header {
            background-color: #f4f4f4;
            padding: 20px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .content {
            padding: 20px;
        }
        .user-info, .actions {
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .error {
            color: red;
        }
        a {
            color: #007cba;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</body>
</html>