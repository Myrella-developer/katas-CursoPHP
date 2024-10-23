<?php

require_once 'Activity.php';

enum Tipo{
    case Playa;
    case Ciudad;
    case Campo;
    case Deporte;
}

class Tipovac extends Activity{
    private Tipo $tipo;
    
    public function __construct(string $nombre, string $fecha, Tipo $tipo){
        parent::__construct($nombre, $fecha);
        $this->tipo = $tipo;
    }

    public function __toString(): string {
        return "{$this->nombre} ({$this->fecha}) - Tipo: {$this->tipo->name}";
    }
}
?>