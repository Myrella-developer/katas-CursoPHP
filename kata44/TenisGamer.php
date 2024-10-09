<?php

class PartidoTenis {
    private $Player1;
    private $Player2;
    private $sets;

    public function __construct($jugador1, $jugador2, $sets) {
        $this->Player1 = $jugador1;
        $this->Player2 = $jugador2;
        $this->sets = $sets; 
    }


    public function mostrarMarcador() {
        echo "Resultado del partido: \n";
        echo "{$this->Player1} vs {$this->Player2}\n";

        for ($i = 0; $i < count($this->sets); $i++) {
            echo "Set " . ($i + 1) . ": " . $this->sets[$i][$this->Player1] . " - " . $this->sets[$i][$this->Player2] . "\n";
        }
    }

 
    public function mostrarGanador() {
        $victoriasPlayer1 = 0;
        $victoriasPlayer2 = 0;

        foreach ($this->sets as $set) {
            if ($set[$this->Player1] > $set[$this->Player2]) {
                $victoriasPlayer1++;
            } else {
                $victoriasPlayer2++;
            }
        }

        if ($victoriasPlayer1 > $victoriasPlayer2) {
            echo "El ganador es: {$this->Player1}\n";
        } else {
            echo "El ganador es: {$this->Player2}\n";
        }
    }
}

$partido = new PartidoTenis(
    "Player 1", 
    "Player 2", 
    [
        ["Player 1" => 4, "Player 2" => 3], // Set 1
        ["Player 1" => 6, "Player 2" => 2], // Set 2
        ["Player 1" => 5, "Player 2" => 2], // Set 3
        ["Player 1" => 4, "Player 2" => 3], // Set 4
        ["Player 1" => 6, "Player 2" => 1], // Set 5
    ]
);


$partido->mostrarMarcador();


$partido->mostrarGanador();
?>
