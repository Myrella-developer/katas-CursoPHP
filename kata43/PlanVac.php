<?php
    require_once 'tipovac.php';

    class PlanVac {

        public string $local;
        public string $fecha;
        public string $nombre;
        public tipoVac $tipo;

        public function __construct(string $local, string $fecha, string $nombre, tipoVac $tipo) {
            $this->local = $local;
            $this->fecha = $fecha;
            $this->nombre = $nombre;
            $this->tipo = $tipo;
        }
    
        public function __toString(): string {
            return "Local: $this->local, fecha: $this->fecha, Nombre: $this->nombre, Tipo: " . $this->tipo->value;
        }
    }
    ?>