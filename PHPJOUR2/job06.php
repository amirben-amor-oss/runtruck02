<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Affichage d'un rectangle net</title>
    <style>
        body { font-family: monospace; }
    </style>
</head>
<body>
<?php
$largeur = 20;
$hauteur = 10;

for ($h = 0; $h < $hauteur; $h++) {
    for ($l = 0; $l < $largeur; $l++) {
        // Bord haut ou bas
        if ($h == 0 || $h == $hauteur - 1) {
            echo "-";
        }
        // Bord gauche ou droit
        else if ($l == 0 || $l == $largeur - 1) {
            echo "-";
        }
        // Intérieur
        else {
            echo " ";
        }
    }
    echo "<br />";
}
?>
</body>
</html>