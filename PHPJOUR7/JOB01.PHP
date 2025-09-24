<?php
function hello() {
    echo "Hello LaPlateforme!";
}

// Appel de la fonction
hello();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hello LaPlateforme</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 100px;
            background-color: #f0f0f0;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php hello(); ?>
    </div>
</body>
</html>
