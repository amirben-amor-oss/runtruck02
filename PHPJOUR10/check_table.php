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

// Vérifier la structure de la table
echo "Structure de la table 'etudiants':\n";
$sql = "DESCRIBE etudiants";
$resultat = $connexion->query($sql);

if ($resultat->num_rows > 0) {
    while($ligne = $resultat->fetch_assoc()) {
        echo "Colonne: " . $ligne["Field"] . " | Type: " . $ligne["Type"] . "\n";
    }
} else {
    echo "Aucune colonne trouvée ou table n'existe pas\n";
}

// Fermeture de la connexion
$connexion->close();
?>