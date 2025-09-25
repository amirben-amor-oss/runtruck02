<?php
session_start();

// Démarrer une nouvelle partie avec les noms
if (isset($_POST['start'])) {
    $_SESSION['playerX'] = htmlspecialchars($_POST['playerX']);
    $_SESSION['playerO'] = htmlspecialchars($_POST['playerO']);
    $_SESSION['board'] = array_fill(0, 9, '');
    $_SESSION['turn'] = 'X';
    $_SESSION['winner'] = '';
}

// Réinitialiser toute la session = retour au formulaire
if (isset($_POST['reset'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Jeu du Morpion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: #f0f0f0;
            padding-top: 30px;
        }
        h1 {
            color: #333;
        }
        form {
            margin: 20px;
        }
        input[type="text"] {
            padding: 10px;
            margin: 5px;
            width: 200px;
            font-size: 16px;
        }
        .board {
            display: grid;
            grid-template-columns: repeat(3, 100px);
            gap: 5px;
            justify-content: center;
            margin-top: 30px;
        }
        .cell {
            width: 100px;
            height: 100px;
            font-size: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            border: 2px solid #ccc;
            cursor: pointer;
        }
        .info {
            margin-top: 20px;
            font-size: 20px;
        }
        button {
            margin-top: 20px;
            padding: 10px 25px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php if (!isset($_SESSION['playerX']) || !isset($_SESSION['playerO'])): ?>
    <h1>Jeu du Morpion</h1>
    <form method="post">
        <input type="text" name="playerX" placeholder="Nom du joueur X" required>
        <input type="text" name="playerO" placeholder="Nom du joueur O" required><br>
        <button type="submit" name="start">Commencer la partie</button>
    </form>

<?php else: ?>
    <h1>Morpion</h1>
    <div class="info" id="gameInfo">
        C'est le tour de <strong><?= $_SESSION['turn'] === 'X' ? $_SESSION['playerX'] : $_SESSION['playerO'] ?></strong> (<?= $_SESSION['turn'] ?>)
    </div>

    <div class="board" id="board">
        <?php
        foreach ($_SESSION['board'] as $index => $value) {
            echo "<div class='cell' data-index='$index'>$value</div>";
        }
        ?>
    </div>

    <form method="post">
        <button type="submit" name="reset">Nouvelle Partie</button>
    </form>

    <script>
        const board = document.getElementById("board");
        const cells = document.querySelectorAll(".cell");
        let turn = "<?= $_SESSION['turn'] ?>";
        let playerX = "<?= $_SESSION['playerX'] ?>";
        let playerO = "<?= $_SESSION['playerO'] ?>";
        let gameOver = false;

        const combos = [
            [0,1,2], [3,4,5], [6,7,8], // lignes
            [0,3,6], [1,4,7], [2,5,8], // colonnes
            [0,4,8], [2,4,6]           // diagonales
        ];

        function checkWinner() {
            for (let combo of combos) {
                const [a, b, c] = combo;
                if (cells[a].textContent && cells[a].textContent === cells[b].textContent && cells[a].textContent === cells[c].textContent) {
                    return cells[a].textContent;
                }
            }
            return null;
        }

        function isDraw() {
            return [...cells].every(cell => cell.textContent);
        }

        board.addEventListener("click", function(e) {
            if (gameOver || !e.target.classList.contains("cell")) return;
            if (e.target.textContent !== "") return;

            e.target.textContent = turn;

            let winner = checkWinner();
            if (winner) {
                document.getElementById("gameInfo").innerHTML = `🎉 Bravo <strong>${winner === "X" ? playerX : playerO}</strong> ! Vous avez gagné.`;
                gameOver = true;
                return;
            }

            if (isDraw()) {
                document.getElementById("gameInfo").textContent = "Match nul !";
                gameOver = true;
                return;
            }

            turn = turn === "X" ? "O" : "X";
            document.getElementById("gameInfo").innerHTML = `C'est le tour de <strong>${turn === "X" ? playerX : playerO}</strong> (${turn})`;
        });
    </script>

<?php endif; ?>

</body>
</html>
