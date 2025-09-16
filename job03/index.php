<?php
$boolean = true;
$integer = 42;
$string = "la plateforme";
$float = 3.14;

$variables = [
    ["type" => "boolean", "nom" => "boolean", "valeur" => $boolean ? 'true' : 'false'],
    ["type" => "integer", "nom" => "integer", "valeur" => $integer],
    ["type" => "string", "nom" => "string", "valeur" => $string],
    ["type" => "float", "nom" => "float", "valeur" => $float],
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tableau des variables</title>
    <style>
        table { border-collapse: collapse; width: 50%; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Tableau des variables</h1>
    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Nom</th>
                <th>Valeur</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($variables as $var): ?>
                <tr>
                    <td><?= $var["type"] ?></td>
                    <td><?= $var["nom"] ?></td>
                    <td><?= $var["valeur"] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>