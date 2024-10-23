<?php

  abstract class Activity {

    protected string $fecha;
    protected string $nombre;
        

    public function __construct(string $fecha, string $nombre) {
            
        $this->fecha = $fecha;
        $this->nombre = $nombre;
            
    }
    
    public function getFecha(): string {
        return $this->fecha;
    }

    public function getNombre(): string {
        return $this->nombre;
    }


     
    }
?>