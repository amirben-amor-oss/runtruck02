<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Affichage des nombres filtrés</title>
</head>
<body>
<?php
$exclus = [26, 37, 88, 1111, 3233];
for ($i = 0; $i <= 1337; $i++) {
    if (!in_array($i, $exclus)) {
        echo "$i<br />";
    }
}
?>
</body>
</html>