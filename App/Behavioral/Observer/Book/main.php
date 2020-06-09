<?php

namespace Observer;

require_once 'Vehicle.php';
require_once 'VehicleView.php';

$panda = new Vehicle;

$panda->setDescription('Une belle daube');
$panda->setPrice(500);

$display = new VehicleView('Ecran 1', $panda);
$display->render();
$panda->setPrice(300);

$smartphone = new VehicleView('Petit Ecran', $panda);
$panda->setDescription('Pire que tout !');

$panda->detach($display);
$panda->setPrice(1000);