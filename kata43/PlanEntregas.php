<?php

require_once 'Activity.php';

enum Sprint {
    case HTML_PHP;
    case BASES_DATOS;
    case PATRONES;
    case LARAVEL_MVC;
    case LARAVEL_API;
}

class PlanEntregas extends Activity {
    private Sprint $sprint;
    private string $linkGithub;
    private string $comentarios;

    public function __construct(string $nombre, string $fecha, Sprint $sprint) {
        parent::__construct($nombre, $fecha);
        $this->sprint = $sprint;
        $this->linkGithub = "";
        $this->comentarios = "";
    }

    public function entrega(string $linkGithub, string $comentarios): void {

        echo "Entrega realizada con éxito: " . $this->nombre . PHP_EOL;
    }

    public function reEntrega(string $linkGithub, string $comentarios): void {

        echo "Reentrega realizada con éxito: " . $this->nombre . PHP_EOL;
    }

    public function setHomeworkData(string $linkGithub, string $comentarios): void {
        $this->linkGithub = $linkGithub;
        $this->comentarios = $comentarios;
    }

    public function __toString(): string {
        return "Nombre: $this->nombre, Fecha: $this->fecha, Sprint: " . $this->sprint->name .
               ", Link GitHub: $this->linkGithub, Comentarios: $this->comentarios";
    }
}
?>
