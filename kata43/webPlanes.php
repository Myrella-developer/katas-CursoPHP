<?php
require_once 'Activity.php';
require_once 'PlanEntregas.php';
require_once 'Tipovac.php';

class WebPlanes {
    public array $planificador;

    public function __construct() {   
        $this->planificador = [];
    }

    public function menu(): void {
        echo "Selecciona una opción:" . PHP_EOL;
        echo "1. Agregar un plan de vacaciones" . PHP_EOL;
        echo "2. Agregar una entrega de IT Academy" . PHP_EOL;
        echo "3. Mostrar actividades" . PHP_EOL;
        echo "4. Anular un plan" . PHP_EOL;
        echo "5. Agregar Reentrega de It Academy". PHP_EOL;
        echo "6. Salir" . PHP_EOL;

        $opcion = readline("Introduce tu opción: ");
        
        switch ($opcion) {
            case 1:
                $this->agregarPlanVacaciones();
                break;
            case 2:
                $this->agregarEntrega();
                break;
            case 3:
                $this->mostrar();
                break;
            case 4:
                $this->anularPlan();
                break;
            case 5:
                $this->agregarReentrega();
                break;
            case 6:
                echo "Saliendo..." . PHP_EOL;
                exit;
            default:
                echo "Opción no válida." . PHP_EOL;
                break;
        }

        
        $this->menu();
    }

    private function agregarPlanVacaciones(): void {
        $nombre = readline("Introduce el nombre del plan: ");
        $fecha = readline("Introduce la fecha del plan (YYYY-MM-DD): ");
        $tipo = readline("Selecciona el tipo (1. Playa, 2. Ciudad, 3. Campo, 4. Deporte): ");

        switch ($tipo) {
            case 1:
                $tipoEnum = Tipo::Playa;
                break;
            case 2:
                $tipoEnum = Tipo::Ciudad;
                break;
            case 3:
                $tipoEnum = Tipo::Campo;
                break;
            case 4:
                $tipoEnum = Tipo::Deporte;
                break;
            default:
                echo "Tipo no válido." . PHP_EOL;
                return;
        }

        $planVacaciones = new Tipovac($nombre, $fecha, $tipoEnum);
        $this->AgregarPlan($planVacaciones);
    }

    private function agregarEntrega(): void {
        $nombre = readline("Introduce el nombre de la entrega: ");
        $fecha = readline("Introduce la fecha de entrega (YYYY-MM-DD): ");
        $linkGithub = readline("Introduce el link de GitHub: ");
        $comentarios = readline("Introduce los comentarios: ");
        $sprint = readline("Selecciona el sprint (1. HTML_PHP, 2. BASES_DATOS, 3. PATRONES, 4. LARAVEL_MVC, 5. LARAVEL_API): ");

        switch ($sprint) {
            case 1:
                $sprintEnum = Sprint::HTML_PHP;
                break;
            case 2:
                $sprintEnum = Sprint::BASES_DATOS;
                break;
            case 3:
                $sprintEnum = Sprint::PATRONES;
                break;
            case 4:
                $sprintEnum = Sprint::LARAVEL_MVC;
                break;
            case 5:
                $sprintEnum = Sprint::LARAVEL_API;
                break;
            default:
                echo "Sprint no válido." . PHP_EOL;
                return;
        }

        $entrega = new PlanEntregas($nombre, $fecha, $sprintEnum);
        $entrega->setHomeworkData($linkGithub, $comentarios);
        $this->AgregarPlan($entrega);
    }

    public function AgregarPlan(Activity $activity): void {
        $fecha = $activity->getFecha();
        if (!array_key_exists($fecha, $this->planificador)) {
            $this->planificador[$fecha] = $activity;
            echo $activity->getNombre() . " Agregada con éxito" . PHP_EOL;
        } else {
            echo "Ya existe una actividad para esa fecha" . PHP_EOL;
        }
    }
    public function agregarReentrega(): void {
        $github_url = readline("Introduce el link de GitHub: ");
        $comments = readline("Introduce los comentarios: ");
        $fecha = readline("Introduce la fecha de la entrega a reentregar: ");
    
        
        if ($this->isDelivered($fecha)) {
            $this->planificador[$fecha]->reEntrega($github_url, $comments);
            echo "Reentrega realizada con éxito" . PHP_EOL;
        } else {
            echo "No se puede reentregar, la actividad no ha sido entregada previamente." . PHP_EOL;
        }
    }
    private function isDelivered(string $fecha): bool {
        return array_key_exists($fecha, $this->planificador) && 
               !empty($this->planificador[$fecha]->getLinkGithub());
    }
    

    public function mostrar(): void {
        foreach ($this->planificador as $plan) {
            echo $plan->__toString() . PHP_EOL;
        }
    }

    public function anularPlan(): void {
        $fecha = readline("Introduce la fecha de la actividad a anular: ");
        
        if (array_key_exists($fecha, $this->planificador)) {
            $plan = $this->planificador[$fecha];
            unset($this->planificador[$fecha]); 
            echo "Plan anulado: " . $plan->getNombre() . PHP_EOL;
        } else {
            echo "No hay actividad para esa fecha." . PHP_EOL;
        }
    }
    

}
?>
