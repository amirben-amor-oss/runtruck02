<?php
// Informations de connexion à la base de données
$host = 'localhost';
$dbname = 'jour9';
$username = 'root'; // Modifier selon vos identifiants
$password = '';     // Mot de passe MySQL

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour calculer la capacité totale des salles
    $sql = "SELECT SUM(capacite) AS capacite_totale FROM salles";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>

<!-- Affichage HTML -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Capacité Totale des Salles</title>
    <style>
        table { border-collapse: collapse; width: 400px; }
        th, td { border: 1px solid #000; padding: 10px; text-align: center; }
    </style>
</head>
<body>

    <h2>Capacité Totale des Salles</h2>
    <table>
        <tr>
            <th>capacite_totale</th>
        </tr>
        <tr>
            <td><?= htmlspecialchars($result['capacite_totale']) ?></td>
        </tr>
    </table>

</body>
</html>
