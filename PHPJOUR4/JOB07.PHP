<?php
$maison = "";

// Vérifie si le formulaire a été soumis
if (isset($_GET['largeur']) && isset($_GET['hauteur'])) {
    $largeur = (int)$_GET['largeur'];
    $hauteur = (int)$_GET['hauteur'];
    
    // Vérifie que les valeurs sont valides
    if ($largeur > 0 && $hauteur > 0) {
        // Construction de la maison
        $maison = "";
        
        // Construction du toit (triangle)
        $etoile = "*";
        $espace = " ";
        $nbEspaces = $largeur / 2;
        
        // Ligne du toit
        $maison .= str_repeat($espace, $nbEspaces) . $etoile . str_repeat($espace, $nbEspaces) . "\n";
        
        // Lignes du corps de la maison
        for ($i = 0; $i < $hauteur; $i++) {
            $maison .= str_repeat($espace, $nbEspaces) . str_repeat($etoile, $largeur) . str_repeat($espace, $nbEspaces) . "\n";
        }
        
        // Ligne de base
        $maison .= str_repeat($etoile, $largeur + 2 * $nbEspaces);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Construction de maison</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .form-group {
            margin: 15px 0;
        }
        input[type="text"] {
            padding: 10px;
            width: 150px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .maison {
            font-family: monospace;
            margin: 20px 0;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
            text-align: left;
            white-space: pre;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Construction de maison</h1>
        
        <form method="GET" action="">
            <div class="form-group">
                <input type="text" name="largeur" placeholder="Largeur" required>
            </div>
            <div class="form-group">
                <input type="text" name="hauteur" placeholder="Hauteur" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Construire">
            </div>
        </form>
        
        <?php if ($maison): ?>
            <div class="maison">
                <?php echo $maison; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
