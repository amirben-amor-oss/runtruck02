
<?php
// Afficher le nombre d'arguments GET
$nombreArguments = count($_GET);
echo "<h2>Le nombre d'argument GET envoyé est : " . $nombreArguments . "</h2>";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nombre d'arguments GET</title>
</head>
<body>
    <h1>Le nombre d'arguments GET envoyé est : <?php echo $nombreArguments; ?></h1>
</body>
</html>
    