<?php
enum tipoVac: string {
    case Playa  = 'Playa';
    case Ciudad  = 'Ciudad';
    case Campo   = 'Campo';
    case Deporte = 'Deporte';

    public function getTipo(): string {
        return match($this) {
            self::Playa  => 'Playa',
            self::Ciudad  => 'Ciudad',
            self::Campo   => 'Campo',
            self::Deporte => 'Deporte',
        };
    }
}
?>