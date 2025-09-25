<?php
// Initialisation du compteur de visites
if (!isset($_COOKIE['nbvisites'])) {
    $nbvisites = 0;
} else {
    $nbvisites = $_COOKIE['nbvisites'];
}

// Incrémentation du compteur
$nbvisites++;
setcookie('nbvisites', $nbvisites, time() + 3600 * 24 * 30); // Cookie valide 30 jours

// Réinitialisation si le bouton reset est cliqué
if (isset($_POST['reset'])) {
    setcookie('nbvisites', 0, time() - 3600); // Suppression du cookie
    $nbvisites = 0;
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
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            display: inline-block;
        }
        .counter {
            font-size: 24px;
            margin: 20px 0;
            color: #333;
        }
        .reset-btn {
            background-color: #ff4444;
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .reset-btn:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Compteur de visites</h2>
        <div class="counter">
            <p>Nombre de visites : <?php echo $nbvisites; ?></p>
        </div>
        <form method="post">
            <input type="submit" name="reset" value="Reset" class="reset-btn">
        </form>
    </div>
</body>
</html>
