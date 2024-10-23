<?php
require_once 'PlanVac.php';
require_once 'tipovac.php';
require_once 'webPlanes.php';


$plan1 = new PlanVac('Marbella', '2024-06-06', 'Escapada', tipoVac::Playa);
$plan2 = new PlanVac('Madrid', '2024-07-06', 'Tarde de Teatro', tipoVac::Ciudad);
$plan3 = new PlanVac('Barcelona','2024-12-24', 'Cena Familia de Navidad', tipoVac::Campo);
$plan4 = new PlanVac('Havaii','2025-01-05', 'Viaje en Familia', tipoVac::Playa);
$plan5 = new PlanVac('Rio de Janeiro','2025-03-10', 'Carnaval Rio', tipoVac::Ciudad);

$planVac = new WebPlanes('Planes de Vacaciones');
$planVac->planificador = [$plan1, $plan2, $plan3, $plan4, $plan5];

$planVac->Mostrar();

?>