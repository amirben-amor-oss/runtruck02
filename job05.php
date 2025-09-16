<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nombres premiers jusqu'à 1000</title>
</head>
<body>
<?php
function estPremier($n) {
    if ($n < 2) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}

for ($i = 2; $i <= 1000; $i++) {
    if (estPremier($i)) {
        echo "$i<br />";
    }
}
?>
</body>
</html>