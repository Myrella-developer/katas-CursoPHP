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
            $actividadesPendientes = [];
        
            foreach ($this->planificador as $plan) {
                $fechaPlan = DateTime::createFromFormat('Y-m-d', $plan->fecha);
        
                if ($fechaPlan < $hoy) {
                   echo "Actividades ya Realizadas: ".$plan-> __toString().PHP_EOL;
                } else {    
                    echo PHP_EOL."Actividade Pendiente: ".$plan-> __toString().PHP_EOL;
                    echo PHP_EOL."Deseas Anular actividad?".PHP_EOL;
                    echo "1. Si".PHP_EOL;       
                    echo "2. No".PHP_EOL;
                    if (readline() ==1){
                        $this->AnularPlan($plan);
                    }else{
                        echo "Actividad no anulada".PHP_EOL;
                        $actividadesPendientes[] = $plan;
                      
                    }                
                }
            } 

            echo PHP_EOL."Actividades pendientes actualizadas: ".$plan->__toString().PHP_EOL;
            foreach ($actividadesPendientes as $actividad) {
                echo $actividad->__toString().PHP_EOL;
            }
        }
        
        public function AnularPlan(PlanVac $plan) {
            $plan->fecha = "0000-00-00";
            echo "Actividad Anulada".PHP_EOL;
        }
           
        }
    
?>