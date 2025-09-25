<?php
session_start();

// Initialisation du tableau de prénoms dans la session
if (!isset($_SESSION['prenoms'])) {
    $_SESSION['prenoms'] = array();
}

// Ajout du prénom si le formulaire est soumis
if (isset($_POST['prenom']) && !empty($_POST['prenom'])) {
    $_SESSION['prenoms'][] = $_POST['prenom'];
}

// Réinitialisation si le bouton reset est cliqué
if (isset($_POST['reset'])) {
    $_SESSION['prenoms'] = array();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion des prénoms</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            display: inline-block;
            min-width: 300px;
        }
        form {
            margin: 20px 0;
        }
        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
            width: 200px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .reset-btn {
            background-color: #ff4444;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }
        .reset-btn:hover {
            background-color: #cc0000;
        }
        .prenoms-list {
            margin-top: 20px;
            text-align: left;
        }
        .prenoms-list p {
            background-color: #e9f7ef;
            padding: 8px;
            margin: 5px 0;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Gestion des prénoms</h2>
        
        <form method="post">
            <input type="text" name="prenom" placeholder="Entrez un prénom" required>
            <input type="submit" value="Ajouter">
        </form>
        
        <div class="prenoms-list">
            <h3>Prénoms enregistrés :</h3>
            <?php if (!empty($_SESSION['prenoms'])): ?>
                <?php foreach ($_SESSION['prenoms'] as $prenom): ?>
                    <p><?php echo htmlspecialchars($prenom); ?></p>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun prénom enregistré</p>
            <?php endif; ?>
        </div>
        
        <form method="post">
            <input type="submit" name="reset" value="Reset" class="reset-btn">
        </form>
    </div>
</body>
</html>
