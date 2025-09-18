<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Décalage des caractères</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            padding: 30px;
        }
        .block {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px #ccc;
            max-width: 500px;
            padding: 20px;
            margin: 0 auto;
        }
        .result {
            margin-top: 16px;
            background: #eaf4ff;
            border-radius: 6px;
            padding: 12px;
            font-size: 1.1em;
            box-shadow: 0 2px 4px #ccc;
        }
        .title {
            color: #2b85e4;
            font-weight: bold;
            margin-bottom: 8px;
        }
        .input-txt {
            width: 95%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #bbb;
            border-radius: 4px;
            font-size: 1em;
        }
        .btn {
            background: #2b85e4;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }
    </style>
</head>
<body>
    <div class="block">
        <div class="title">Décalage des caractères</div>
        <form method="post">
            <label for="str">Entrez une chaîne de caractères :</label>
            <input class="input-txt" type="text" name="str" id="str" required
                value="<?php echo isset($_POST['str']) ? htmlspecialchars($_POST['str']) : ''; ?>">
            <input class="btn" type="submit" value="Décaler">
        </form>

        <?php
        if (isset($_POST['str'])) {
            $str = $_POST['str'];
            $length = strlen($str);
            $result = '';

            if ($length > 1) {
                for ($i = 0; $i < $length; $i++) {
                    if ($i < $length - 1) {
                        $result .= $str[$i + 1];
                    } else {
                        $result .= $str[0];
                    }
                }
            } else {
                $result = $str; // Pour les chaînes de 1 caractère
            }

            echo "<div class='result'><strong>Résultat :</strong><br>" . htmlspecialchars($result) . "</div>";
        }
        ?>
    </div>
</body>
</html>