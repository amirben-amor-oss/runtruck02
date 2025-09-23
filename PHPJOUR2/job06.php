<!DOCTYPE html>
<<<<<<< HEAD
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Triangle</title>
    <style>
        pre { font-family: monospace; font-size: 18px; }
    </style>
</head>
<body>
    <h2>Triangle dessiné en trait</h2>
    <pre>
<?php
$largeur = 21;  // Largeur de la base (doit être impair pour la symétrie)
$hauteur = 10;  // Hauteur du triangle

$milieu = intval($largeur / 2);

for ($i = 0; $i < $hauteur - 1; $i++) {
    $espace_gauche = $milieu - $i;
    $espace_droit = $milieu + $i;
    for ($j = 0; $j < $largeur; $j++) {
        if ($j == $espace_gauche) {
            echo "|";
        } elseif ($j == $espace_droit) {
            echo "|";
        } else {
            echo " ";
        }
    }
    echo "\n";
}
// Base du triangle
for ($j = 0; $j < $largeur; $j++) {
    echo "_";
}
echo "\n";
?>
    </pre>
=======
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
>>>>>>> d5b8d42c641733818fd6480beb7dfabc9abba5e1
</body>
</html>