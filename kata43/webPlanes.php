<?php
    require_once 'PlanVac.php';


    class WebPlanes {
        public string $nombre;
        public array $planificador;

        public function __construct($nombre)
        {   $this->nombre = $nombre;
            $this->planificador = array();
            
        }
    
        public function Mostrar() {
            $hoy = new DateTime();
        
            foreach ($this->planificador as $plan) {
                $fechaPlan = DateTime::createFromFormat('Y-m-d', $plan->fecha);
        
                if ($fechaPlan < $hoy) {
                   echo "Actividades ya Realizadas: <br>".$plan-> __toString()."<br>";
                } 

            }
    
         
        }
    }
?>