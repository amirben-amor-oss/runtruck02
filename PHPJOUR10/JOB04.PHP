<?php
// Informations de connexion
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$base_de_donnees = "jour9";

// Création de la connexion
$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $base_de_donnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("Erreur de connexion : " . $connexion->connect_error);
}

// Requête SQL pour récupérer tous les étudiants dont le prénom commence par "T"
$sql = "SELECT * FROM etudiants WHERE prenom LIKE 'T%'";
$resultat = $connexion->query($sql);

// Affichage dans un tableau HTML avec CSS
echo "<!DOCTYPE html>
<html>
<head>
    <title>Étudiants dont le prénom commence par 'T'</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
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
            background-color: #e8f5e8;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class='container'>
        <h1>Étudiants dont le prénom commence par 'T'</h1>";
        
if ($resultat->num_rows > 0) {
    echo "<table>";
    echo "<thead>";
    
    // Récupération des noms de champs
    $meta = $resultat->fetch_fields();
    echo "<tr>";
    foreach ($meta as $field) {
        echo "<th>" . $field->name . "</th>";
    }
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    // Affichage des données
    while($ligne = $resultat->fetch_assoc()) {
        echo "<tr>";
        foreach ($ligne as $valeur) {
            echo "<td>" . $valeur . "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>Aucune donnée trouvée</p>";
}

echo "</div>
</body>
</html>";

// Fermeture de la connexion
$connexion->close();
?>
<?php
// Informations de connexion
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$base_de_donnees = "jour9";

// Création de la connexion
$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $base_de_donnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("Erreur de connexion : " . $connexion->connect_error);
}

// Requête SQL pour récupérer tous les étudiants dont le prénom commence par "T"
$sql = "SELECT * FROM etudiants WHERE prenom LIKE 'T%'";
$resultat = $connexion->query($sql);

// Affichage dans un tableau HTML avec CSS
echo "<!DOCTYPE html>
<html>
<head>
    <title>Étudiants dont le prénom commence par 'T'</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
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
            background-color: #e8f5e8;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class='container'>
        <h1>Étudiants dont le prénom commence par 'T'</h1>";
        
if ($resultat->num_rows > 0) {
    echo "<table>";
    echo "<thead>";
    
    // Récupération des noms de champs
    $meta = $resultat->fetch_fields();
    echo "<tr>";
    foreach ($meta as $field) {
        echo "<th>" . $field->name . "</th>";
    }
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    // Affichage des données
    while($ligne = $resultat->fetch_assoc()) {
        echo "<tr>";
        foreach ($ligne as $valeur) {
            echo "<td>" . $valeur . "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>Aucune donnée trouvée</p>";
}

echo "</div>
</body>
</html>";

// Fermeture de la connexion
$connexion->close();
?>
