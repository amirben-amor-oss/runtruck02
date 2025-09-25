<?php
session_start();

// Initialisation de la variable de session si elle n'existe pas
if (!isset($_SESSION['nbvisites'])) {
    $_SESSION['nbvisites'] = 0;
}

// Incrémentation du compteur à chaque visite
$_SESSION['nbvisites']++;

// Réinitialisation si le bouton reset est cliqué
if (isset($_POST['reset'])) {
    $_SESSION['nbvisites'] = 0;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Compteur de visites</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        .counter {
            font-size: 24px;
            margin: 20px;
        }
        .reset-btn {
            background-color: #ff4444;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        .reset-btn:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <div class="counter">
        <p>Nombre de visites : <?php echo $_SESSION['nbvisites']; ?></p>
        <form method="post" style="margin-top: 20px;">
            <input type="submit" name="reset" value="Reset" class="reset-btn">
        </form>
    </div>
</body>
</html>
