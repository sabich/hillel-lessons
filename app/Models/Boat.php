<?php


namespace App\Models;


class Boat extends Vehicle
{

    private int $maxSpeed;

    public function __construct(int $maxSpeed)
    {
        $this->maxSpeed = $maxSpeed;
    }

    function speed(): string
    {
        return 'The maximum speed of this boat on the water: '.$this->maxSpeed.PHP_EOL;
    }
}