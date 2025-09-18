<!DOCTYPE html>
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
</body>
</html>