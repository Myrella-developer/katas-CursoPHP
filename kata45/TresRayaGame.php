<?php

function evaluateTicTacToe($gameBoard) {
    
    for ($index = 0; $index < 3; $index++) {
        if (checkWin($gameBoard[$index]) || checkWin([$gameBoard[0][$index], $gameBoard[1][$index], $gameBoard[2][$index]])) {
            return $gameBoard[$index][0] !== '-' ? $gameBoard[$index][0] : $gameBoard[0][$index];
        }
    }

    if (checkWin([$gameBoard[0][0], $gameBoard[1][1], $gameBoard[2][2]]) || 
        checkWin([$gameBoard[0][2], $gameBoard[1][1], $gameBoard[2][0]])) {
        return $gameBoard[1][1]; 
    }

    foreach ($gameBoard as $row) {
        if (strpos($row, '-') !== false) {
            return null; 
        }
    }

    return 'Empate'; 
}

function checkWin($line) {
    return $line[0] === $line[1] && $line[1] === $line[2] && $line[0] !== '-';
}

$matches = [
    ["XOO", 
     "OXO", 
     "-OX"],
    ["OX-", 
     "OX-",  
     "O--"],
    ["OXO", 
     "XOX", 
     "XXO"]
];

foreach ($matches as $gameBoard) {
    $result = evaluateTicTacToe($gameBoard);
    
    if ($result === 'X') {
        echo "Ganan las \"X\"!" . PHP_EOL;
    } elseif ($result === 'O') {
        echo "Ganan las \"O\"!" . PHP_EOL;
    } else {
        echo "Empate!" . PHP_EOL;
    }
}
?>
