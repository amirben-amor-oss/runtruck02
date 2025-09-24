<?php
function bonjour($jour) {
    if ($jour) {
        echo "Bonjour";
    } else {
        echo "Bonsoir";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bonjour ou Bonsoir</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 100px;
            background-color: #f0f0f0;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: inline-block;
        }
        .button {
            padding: 10px 20px;
            margin: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exemple de fonction bonjour()</h1>
        <p>Appel avec true :</p>
        <?php bonjour(true); ?>
        <br><br>
        <p>Appel avec false :</p>
        <?php bonjour(false); ?>
        <br><br>
        <p>Test avec boutons :</p>
        <button class="button" onclick="window.location.href='?jour=true'">Bonjour</button>
        <button class="button" onclick="window.location.href='?jour=false'">Bonsoir</button>
        <?php
        if (isset($_GET['jour'])) {
            echo "<br><br><p>Resultat : ";
            bonjour($_GET['jour'] === 'true');
            echo "</p>";
        }
        ?>
    </div>
</body>
</html>
