<?php
$message = "";

// Vérifie si le formulaire a été soumis
if (isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
    
    // Vérifie si c'est un nombre valide
    if (is_numeric($nombre)) {
        // Convertit en entier
        $nombre = (int)$nombre;
        
        // Vérifie si c'est pair ou impair
        if ($nombre % 2 == 0) {
            $message = "Nombre pair";
        } else {
            $message = "Nombre impair";
        }
    } else {
        $message = "Veuillez entrer un nombre valide";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vérification de nombre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
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
            width: 200px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #2196F3;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #1976D2;
        }
        .message {
            margin: 20px 0;
            padding: 15px;
            border-radius: 4px;
            font-weight: bold;
        }
        .pair {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .impair {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Vérification de nombre</h1>
        
        <form method="GET" action="">
            <div class="form-group">
                <input type="text" name="nombre" placeholder="Entrez un nombre" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Vérifier">
            </div>
        </form>
        
        <?php if ($message): ?>
            <div class="message <?php echo (strpos($message, 'pair') !== false) ? 'pair' : (strpos($message, 'impair') !== false ? 'impair' : 'error'); ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
