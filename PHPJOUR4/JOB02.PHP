<?php
// Afficher les arguments dans un tableau HTML avec style CSS
if (!empty($_GET)) {
    echo "<style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>";
    
    echo "<h2>Arguments GET reçus :</h2>";
    echo "<table>";
    echo "<tr><th>Argument</th><th>Valeur</th></tr>";
    
    foreach ($_GET as $argument => $valeur) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($argument) . "</td>";
        echo "<td>" . htmlspecialchars($valeur) . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "<p>Aucun argument GET reçu.</p>";
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arguments GET</title>
</head>
<body>
    <h1>echo htmlspecialchars($argument) . " : " . htmlspecialchars($valeur);</h1>
</body>
</html>
