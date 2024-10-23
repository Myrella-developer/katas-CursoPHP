<?php

class TennisMatch {
    private string $player1;
    private string $player2;
    private array $sets; 
    
    public function __construct(string $player1, string $player2) {
        $this->player1 = $player1;
        $this->player2 = $player2;
        $this->sets = [];
    }

    
    public function addSet(int $gamesPlayer1, int $gamesPlayer2): void {
        $this->sets[] = [$gamesPlayer1, $gamesPlayer2];
    }

    
    public function getScore(): string {
        $scoreString = "Marcador del partido:\n";
        foreach ($this->sets as $index => [$gamesPlayer1, $gamesPlayer2]) {
            $scoreString .= "Set " . ($index + 1) . ": {$this->player1} {$gamesPlayer1} - {$this->player2} {$gamesPlayer2}\n";
        }
        return $scoreString;
    }

    
    public function getWinner(): string {
        $player1Sets = 0;
        $player2Sets = 0;

        foreach ($this->sets as [$gamesPlayer1, $gamesPlayer2]) {
            if ($gamesPlayer1 > $gamesPlayer2) {
                $player1Sets++;
            } else {
                $player2Sets++;
            }
        }

        if ($player1Sets > $player2Sets) {
            return "{$this->player1} gana el partido.";
        } else {
            return "{$this->player2} gana el partido.";
        }
    }

    
    public function getSetWithMaxDifference(): string {
        $maxDifference = 0;
        $setIndex = -1;

        foreach ($this->sets as $index => [$gamesPlayer1, $gamesPlayer2]) {
            $difference = abs($gamesPlayer1 - $gamesPlayer2);
            if ($difference > $maxDifference) {
                $maxDifference = $difference;
                $setIndex = $index;
            }
        }

        if ($setIndex !== -1) {
            return "El set con mayor diferencia de juegos es el " . ($setIndex + 1) . 
                   " con una diferencia de {$maxDifference} juegos.";
        }
        return "No hay sets registrados.";
    }
}


$match = new TennisMatch("Jugador 1", "Jugador 2");
$match->addSet(6, 4); 
$match->addSet(3, 6); 
$match->addSet(6, 2); 
$match->addSet(6, 3); 
$match->addSet(7, 5); 

echo $match->getScore();
echo $match->getWinner() . PHP_EOL;
echo $match->getSetWithMaxDifference() . PHP_EOL;

?>
