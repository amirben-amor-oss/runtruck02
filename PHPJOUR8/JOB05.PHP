<?php
session_start();

// Démarrer une nouvelle partie avec les noms
if (isset($_POST['start'])) {
    $_SESSION['playerX'] = htmlspecialchars($_POST['playerX']);
    $_SESSION['playerO'] = htmlspecialchars($_POST['playerO']);
    $_SESSION['board'] = array_fill(0, 9, '');
    $_SESSION['turn'] = 'X';
    $_SESSION['winner'] = '';
}

// Réinitialiser toute la session = retour au formulaire
if (isset($_POST['reset'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Jeu du Morpion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: #f0f0f0;
            padding-top: 30px;
        }
        h1 {
            color: #333;
        }
        form {
            margin: 20px;
        }
        input[type="text"] {
            padding: 10px;
            margin: 5px;
            width: 200px;
            font-size: 16px;
        }
        .board {
            display: grid;
            grid-template-columns: repeat(3, 100px);
            gap: 5px;
            justify-content: center;
            margin-top: 30px;
        }
        .cell {
            width: 100px;
            height: 100px;
            font-size: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            border: 2px solid #ccc;
            cursor: pointer;
        }
        .info {
            margin-top: 20px;
            font-size: 20px;
        }
        button {
            margin-top: 20px;
            padding: 10px 25px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php if (!isset($_SESSION['playerX']) || !isset($_SESSION['playerO'])): ?>
    <h1>Jeu du Morpion</h1>
    <form method="post">
        <input type="text" name="playerX"
