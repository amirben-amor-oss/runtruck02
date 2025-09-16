<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Affichage des nombres avec styles</title>
</head>
<body>
<?php
for ($i = 0; $i <= 100; $i++) {
    if ($i == 42) {
        echo "La Plateforme_<br />";
    } elseif ($i >= 0 && $i <= 20) {
        echo "<i>$i</i><br />";
    } elseif ($i >= 25 && $i <= 50) {
        echo "<u>$i</u><br />";
    } else {
        echo "$i<br />";
    }
}
?>
</body>
</html>