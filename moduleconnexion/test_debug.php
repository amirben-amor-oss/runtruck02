<?php
include 'config.php';

echo "<h2>Test de connexion et d'insertion</h2>";

// Test de connexion à la base
try {
    echo "<p style='color: green;'>✅ Connexion à la base de données réussie</p>";
    
    // Afficher tous les utilisateurs
    $stmt = $pdo->query("SELECT id, login, prenom, nom FROM utilisateurs ORDER BY id");
    $users = $stmt->fetchAll();
    
    echo "<h3>Utilisateurs existants :</h3>";
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr><th>ID</th><th>Login</th><th>Prénom</th><th>Nom</th></tr>";
    
    foreach ($users as $user) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($user['id']) . "</td>";
        echo "<td>" . htmlspecialchars($user['login']) . "</td>";
        echo "<td>" . htmlspecialchars($user['prenom'] ?? 'Non renseigné') . "</td>";
        echo "<td>" . htmlspecialchars($user['nom'] ?? 'Non renseigné') . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    // Test d'insertion
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['test_insert'])) {
        $test_login = "test_" . time();
        $test_password = password_hash("TestPassword123!", PASSWORD_DEFAULT);
        
        try {
            $stmt = $pdo->prepare("INSERT INTO utilisateurs (login, prenom, nom, password) VALUES (?, ?, ?, ?)");
            $result = $stmt->execute([$test_login, "Test", "User", $test_password]);
            
            if ($result) {
                echo "<p style='color: green;'>✅ Test d'insertion réussi ! Utilisateur '$test_login' créé.</p>";
                echo "<p><a href='test_debug.php'>Rafraîchir la page</a> pour voir le nouvel utilisateur.</p>";
            } else {
                echo "<p style='color: red;'>❌ Échec de l'insertion</p>";
            }
        } catch (PDOException $e) {
            echo "<p style='color: red;'>❌ Erreur PDO : " . $e->getMessage() . "</p>";
        }
    }
    
} catch (PDOException $e) {
    echo "<p style='color: red;'>❌ Erreur de connexion : " . $e->getMessage() . "</p>";
}
?>

<h3>Test d'insertion manuelle :</h3>
<form method="post">
    <button type="submit" name="test_insert" style="padding: 10px; background: #007cba; color: white; border: none; cursor: pointer;">
        Tester l'insertion d'un utilisateur
    </button>
</form>

<h3>Aller aux pages :</h3>
<p><a href="inscription.php">Page d'inscription</a></p>
<p><a href="connexion.php">Page de connexion</a></p>
<p><a href="accueil.php">Page d'accueil</a></p>