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

use App\Helpers\ArrayHelper;
use App\Helpers\StringHelper;
use App\Models\Boat;
use App\Models\Car;
use App\Models\Herbivorous;
use App\Models\Predator;
use App\Models\Track;

require __DIR__.'/vendor/autoload.php';

$tiger = new Predator();
echo 'Predator: '.$tiger->eat().'<br>';

$cow = new Herbivorous();
echo 'Herbivorous: '.$cow->eat().'<br>';

$car1 = new Car('BMV',200);
$car2 = new Car('Mercedes',180);

$track = new Track(90);
$boat1 = new Boat(100);
$boat2 = new Boat(110);

echo '<pre>'.
    $car1->speed().
    $car2->speed().
    $track->speed().
    $boat1->speed().
    $boat2->speed().
    '</pre>';

$arr = [2, 3, 4, 5];

echo 'Sum Squares in Array: '.ArrayHelper::sumOfSquaresOfEachElement($arr) . '<br>';
echo 'Count chars: '. StringHelper::countChars('пример строки') . '<br>';