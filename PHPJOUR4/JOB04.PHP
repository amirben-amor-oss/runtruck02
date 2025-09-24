<?php
// Vérifie s'il y a des arguments POST
$hasArguments = isset($_POST) && count($_POST) > 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Arguments POST</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #2196F3;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .form-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        input[type="text"] {
            padding: 8px;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 200px;
        }
        input[type="submit"] {
            padding: 10px 15px;
            background-color: #2196F3;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        .no-arguments {
            color: #666;
            font-style: italic;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <h1>Arguments POST</h1>
    
    <div class="form-container">
        <h2>Formulaire de test</h2>
        <form method="POST" action="">
            <input type="text" name="nom" placeholder="Nom">
            <br>
            <input type="text" name="email" placeholder="Email">
            <br>
            <input type="text" name="ville" placeholder="Ville">
            <br>
            <input type="text" name="age" placeholder="Age">
            <br>
            <input type="submit" value="Envoyer">
        </form>
    </div>
    
    <?php if ($hasArguments): ?>
        <table>
            <thead>
                <tr>
                    <th>Argument</th>
                    <th>Valeur</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_POST as $key => $value): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($key); ?></td>
                        <td><?php echo htmlspecialchars($value); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="no-arguments">
            Aucun argument POST n'a été envoyé.
        </div>
    <?php endif; ?>
</body>
</html>
