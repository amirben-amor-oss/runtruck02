<?php
// Compte le nombre d'arguments GET
$nombreArguments = 0;

// Parcourt le tableau $_GET pour compter les éléments
foreach ($_GET as $key => $value) {
    $nombreArguments++;
}

// Affiche le nombre d'arguments GET
echo "Le nombre d'argument GET envoyé est : " . $nombreArguments;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Compteur d'arguments GET</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .form-container {
            margin: 30px 0;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        input[type="text"] {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 200px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin: 20px 0;
        }
        .highlight {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Compteur d'arguments GET</h1>
        
        <div class="form-container">
            <h2>Formulaire de test</h2>
            <form method="GET" action="">
                <input type="text" name="nom" placeholder="Nom">
                <br>
                <input type="text" name="email" placeholder="Email">
                <br>
                <input type="text" name="ville" placeholder="Ville">
                <br>
                <input type="submit" value="Envoyer">
            </form>
        </div>
        
        <div class="result">
            Le nombre d'argument GET envoyé est : <span class="highlight"><?php echo $nombreArguments; ?></span>
        </div>
    </div>
</body>
</html>
