<?php
session_start();

// Initialisation des joueurs
if (!isset($_SESSION['joueur1']) || !isset($_SESSION['joueur2'])) {
    $_SESSION['joueur1'] = '';
    $_SESSION['joueur2'] = '';
}

// Initialisation de la partie
if (!isset($_SESSION['grille']) || isset($_POST['reset'])) {
    $_SESSION['grille'] = array_fill(0, 3, array_fill(0, 3, '-'));
    $_SESSION['tour'] = 'X';
    $_SESSION['game_over'] = false;
    $_SESSION['winner'] = '';
    $_SESSION['current_player'] = 1;
}

// Traitement du formulaire de configuration
if (isset($_POST['joueur1']) && isset($_POST['joueur2']) && !empty($_POST['joueur1']) && !empty($_POST['joueur2'])) {
    $_SESSION['joueur1'] = $_POST['joueur1'];
    $_SESSION['joueur2'] = $_POST['joueur2'];
}

// Vérification si une case a été cliquée
if (
    isset($_POST['ligne']) && isset($_POST['colonne']) &&
    $_POST['ligne'] !== '' && $_POST['colonne'] !== '' &&
    !$_SESSION['game_over'] && $_SESSION['joueur1'] != '' && $_SESSION['joueur2'] != ''
) {
    $ligne = $_POST['ligne'];
    $colonne = $_POST['colonne'];
    // Vérification que la case est vide
    if ($_SESSION['grille'][$ligne][$colonne] === '-') {
        $_SESSION['grille'][$ligne][$colonne] = $_SESSION['tour'];
        // Vérification de victoire
        if (verifierVictoire($_SESSION['grille'], $_SESSION['tour'])) {
            $_SESSION['game_over'] = true;
            $_SESSION['winner'] = $_SESSION['tour'];
        } 
        // Vérification d'égalité
        elseif (verifierEgalite($_SESSION['grille'])) {
            $_SESSION['game_over'] = true;
            $_SESSION['winner'] = 'match nul';
        } 
        // Changement de tour
        else {
            $_SESSION['tour'] = ($_SESSION['tour'] === 'X') ? 'O' : 'X';
            $_SESSION['current_player'] = ($_SESSION['current_player'] === 1) ? 2 : 1;
        }
    }
}

// Fonction pour vérifier la victoire
function verifierVictoire($grille, $joueur) {
    // Vérification des lignes
    for ($i = 0; $i < 3; $i++) {
        if ($grille[$i][0] === $joueur && $grille[$i][1] === $joueur && $grille[$i][2] === $joueur) {
            return true;
        }
    }
    // Vérification des colonnes
    for ($i = 0; $i < 3; $i++) {
        if ($grille[0][$i] === $joueur && $grille[1][$i] === $joueur && $grille[2][$i] === $joueur) {
            return true;
        }
    }
    // Vérification des diagonales
    if ($grille[0][0] === $joueur && $grille[1][1] === $joueur && $grille[2][2] === $joueur) {
        return true;
    }
    if ($grille[0][2] === $joueur && $grille[1][1] === $joueur && $grille[2][0] === $joueur) {
        return true;
    }
    return false;
}

// Fonction pour vérifier l'égalité
function verifierEgalite($grille) {
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            if ($grille[$i][$j] === '-') {
                return false;
            }
        }
    }
    return true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Jeu du Morpion</title>
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
        }
        table {
            border-collapse: collapse;
            margin: 20px auto;
        }
        td {
            width: 80px;
            height: 80px;
            border: 2px solid #333;
            text-align: center;
            vertical-align: middle;
            font-size: 36px;
            font-weight: bold;
        }
        .cell {
            cursor: pointer;
            background-color: #e9e9e9;
        }
        .cell:hover {
            background-color: #ddd;
        }
        .message {
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
            color: #333;
        }
        .win-message {
            color: #4CAF50;
        }
        .draw-message {
            color: #ff9800;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .player-info {
            margin: 15px 0;
            font-size: 18px;
        }
        .form-container {
            margin: 20px 0;
        }
        input[type="text"] {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Jeu du Morpion</h1>
        
        <?php if ($_SESSION['joueur1'] == '' || $_SESSION['joueur2'] == ''): ?>
            <div class="form-container">
                <h2>Configuration des joueurs</h2>
                <form method="post">
                    <input type="text" name="joueur1" placeholder="Joueur 1 (X)" required>
                    <input type="text" name="joueur2" placeholder="Joueur 2 (O)" required>
                    <br><br>
                    <input type="submit" value="Démarrer la partie">
                </form>
            </div>
        <?php else: ?>
            <div class="player-info">
                <p> C'est le tour de : <?php echo ($_SESSION['current_player'] == 1) ? $_SESSION['joueur1'] : $_SESSION['joueur2']; ?></p>
                <p>Tour: <?php echo $_SESSION['tour']; ?></p>
            </div>
            
            <?php if ($_SESSION['game_over']): ?>
                <div class="message <?php echo ($_SESSION['winner'] === 'match nul') ? 'draw-message' : 'win-message'; ?>">
                    <?php 
                    if ($_SESSION['winner'] === 'match nul') {
                        echo "Match nul !";
                    } else {
                        $winner_name = ($_SESSION['winner'] === 'X') ? $_SESSION['joueur1'] : $_SESSION['joueur2'];
                        echo $winner_name . " a gagné !";
                    }
                    ?>
                </div>
            <?php endif; ?>
            
            <form method="post">
                <table>
                    <?php for ($i = 0; $i < 3; $i++): ?>
                        <tr>
                            <?php for ($j = 0; $j < 3; $j++): ?>
                                <td>
                                    <?php if ($_SESSION['grille'][$i][$j] === '-'): ?>
                                        <input type="submit" name="case" value="-" class="cell" 
                                               onclick="this.form.ligne.value='<?php echo $i; ?>'; this.form.colonne.value='<?php echo $j; ?>'; this.form.submit();">
                                        <input type="hidden" name="ligne" value="">
                                        <input type="hidden" name="colonne" value="">
                                    <?php else: ?>
                                        <?php echo $_SESSION['grille'][$i][$j]; ?>
                                    <?php endif; ?>
                                </td>
                            <?php endfor; ?>
                        </tr>
                    <?php endfor; ?>
                </table>
            </form>
            
            <form method="post">
                <input type="submit" name="reset" value="Réinitialiser la partie">
            </form>
        <?php endif; ?>
    </div>
</body>
</html>