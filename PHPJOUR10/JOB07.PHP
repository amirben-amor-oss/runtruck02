<?php
// Informations de connexion à la base de données
$host = 'localhost';
$dbname = 'jour9';
$username = 'root'; // Remplacez par vos identifiants
$password = '';     // Mot de passe MySQL

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL : somme de la superficie des étages
    $sql = "SELECT SUM(superficie) AS superficie_totale FROM etages";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Gestion des erreurs de connexion
    die("Erreur de connexion : " . $e->getMessage());
}
?>

<!-- Affichage HTML -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Superficie Totale des Étages</title>
    <style>
        table { border-collapse: collapse; width: 400px; }
        th, td { border: 1px solid black; padding: 10px; text-align: center; }
    </style>
</head>
<body>

    <h2>Superficie Totale des Étages</h2>
    <table>
        <tr>
            <th>superficie_totale</th>
        </tr>
        <tr>
            <td><?= htmlspecialchars($result['superficie_totale']) ?></td>
        </tr>
    </table>

</body>
</html>
