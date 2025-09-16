<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Affichage des nombres</title>
</head>
<body>
<?php
function afficherNombres() {
    $numbers = range(0, 1337);
    foreach ($numbers as $n) {
        if ($n == 42) {
            echo "<b><u>$n</u></b><br />";
        } else {
            echo "$n<br />";
        }
    }
}

// Appel de la fonction
afficherNombres();
?>
</body>
</html>