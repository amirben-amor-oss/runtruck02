<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Compteur de voyelles et consonnes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f9f9f9;
        }
        form {
            margin-bottom: 20px;
            background: #fff;
            padding: 15px;
            border-radius: 6px;
            box-shadow: 0 2px 4px #ccc;
            max-width: 400px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 95%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #bbb;
            border-radius: 4px;
            font-size: 1em;
        }
        input[type="submit"] {
            background: #2b85e4;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }
        table {
            border-collapse: collapse;
            width: 300px;
            margin-top: 15px;
            background: #fff;
            box-shadow: 0 2px 4px #ccc;
            border-radius: 6px;
            overflow: hidden;
        }
        thead {
            background: #2b85e4;
            color: #fff;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }
        tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <form method="post">
        <label for="str">Entrez une chaîne de caractères :</label>
        <input type="text" name="str" id="str" required>
        <input type="submit" value="Compter">
    </form>

    <?php
    if (isset($_POST['str'])) {
        $str = $_POST['str'];

        $dic = [
            "voyelles" => 0,
            "consonnes" => 0
        ];

        for ($i = 0; $i < strlen($str); $i++) {
            $char = strtolower($str[$i]);
            if (preg_match('/[aeiouy]/', $char)) {
                $dic["voyelles"]++;
            } elseif (preg_match('/[bcdfghjklmnpqrstvwxz]/', $char)) {
                $dic["consonnes"]++;
            }
        }

        echo "<table>";
        echo "<thead><tr><th>Voyelles</th><th>Consonnes</th></tr></thead>";
        echo "<tbody><tr>";
        echo "<td>{$dic["voyelles"]}</td>";
        echo "<td>{$dic["consonnes"]}</td>";
        echo "</tr></tbody>";
        echo "</table>";
    }
    ?>
</body>
</html>