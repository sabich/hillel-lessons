<?php
/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/vendor/autoload.php';

$mazda = new \App\Models\Mazda('CX-5', 230);
$powerMazda = $mazda->calculatePowerEngine(0.9,1.99,6000);
$man = new \App\Models\Man(190);
$powerMan = $man->calculatePowerEngine(1.6,10.5,1600);

var_dump($mazda, $man, $man->engineHorsepower($powerMan), $mazda->engineHorsepower($powerMazda));