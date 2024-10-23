<?php

function evaluateTicTacToe($gameBoard) {
   
    for ($index = 0; $index < 3; $index++) {
        
        
        if ($gameBoard[$index][0] === $gameBoard[$index][1] && $gameBoard[$index][1] === $gameBoard[$index][2] && $gameBoard[$index][0] !== '-') {
            return $gameBoard[$index][0]; 
        }
        
       
        if ($gameBoard[0][$index] === $gameBoard[1][$index] && $gameBoard[1][$index] === $gameBoard[2][$index] && $gameBoard[0][$index] !== '-') {
            return $gameBoard[0][$index]; 
        }
    }

    
    if ($gameBoard[0][0] === $gameBoard[1][1] && $gameBoard[1][1] === $gameBoard[2][2] && $gameBoard[0][0] !== '-') {
        return $gameBoard[0][0]; 
    }
    if ($gameBoard[0][2] === $gameBoard[1][1] && $gameBoard[1][1] === $gameBoard[2][0] && $gameBoard[0][2] !== '-') {
        return $gameBoard[0][2]; 
    }

  
    foreach ($gameBoard as $row) {
        if (in_array('-', str_split($row))) {
            return null; 
        }
    }

    return 'Empate'; 
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
