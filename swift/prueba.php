<?php

require_once('Cliente.php');
require_once('Individual.php');
require_once('Cuenta.php');
require_once('CajaDeAhorro.php');

$nuevo = new Individual(1234, 'cesar', 'val leiva', 34343880);

$gato = new CajaDeAhorro($nuevo, 1234, 100);

echo '<pre>';
var_dump($nuevo);

echo '<br>';
echo '<br>';

echo '<pre>';
var_dump($gato);
