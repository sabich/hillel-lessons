<?php


namespace App\Models;


class Track extends Vehicle
{

    private int $maxSpeed;

    public function __construct(int $maxSpeed)
    {
        $this->maxSpeed = $maxSpeed;
    }

    function speed(): string
    {
        return 'Max speed this track: '.$this->maxSpeed.PHP_EOL;
    }
}