<?php
// Informations de connexion
$host = 'localhost';
$dbname = 'jour9';
$username = 'root'; // remplacez par votre nom d'utilisateur
$password = '';     // remplacez par votre mot de passe

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Définir le mode d'erreur de PDO sur Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour compter le nombre total d'étudiants
    $sql = "SELECT COUNT(*) AS nb_etudiants FROM etudiants";
    $stmt = $pdo->query($sql);

    // Récupération du résultat
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Gestion des erreurs de connexion
    die("Erreur de connexion : " . $e->getMessage());
}
?>

<!-- Affichage du résultat dans un tableau HTML -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nombre d'étudiants</title>
    <style>
        table { border-collapse: collapse; width: 300px; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
    </style>
</head>
<body>

    <h2>Nombre total d'étudiants</h2>
    <table>
        <tr>
            <th>nb_etudiants</th>
        </tr>
        <tr>
            <td><?= htmlspecialchars($result['nb_etudiants']) ?></td>
        </tr>
    </table>

</body>
</html>
