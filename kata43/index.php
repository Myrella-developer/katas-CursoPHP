<?php
require_once 'PlanVac.php';
require_once 'tipovac.php';
require_once 'webPlanes.php';


$plan1 = new PlanVac('Marbella', '2024-06-06', 'Escapada', tipoVac::Playa);
$plan2 = new PlanVac('Madrid', '2024-07-06', 'Tarde de Teatro', tipoVac::Ciudad);


$planVac = new WebPlanes('Planes de Junio');
$planVac->planificador = [$plan1, $plan2];

$planVac->Mostrar();

?>