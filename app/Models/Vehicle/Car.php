<?php


namespace App\Models\Vehicle;


class Car extends Vehicle
{

    private string $brand;
    private int $maxSpeed;

    /**
     * Car constructor.
     * @param string $brand
     * @param int $maxSpeed
     */
    public function __construct(string $brand, int $maxSpeed)
    {
        $this->brand = $brand;
        $this->maxSpeed = $maxSpeed;
    }

    /**
     * @return string
     */
    function speed(): string
    {
        return 'Max speed '.$this->brand.': '.$this->maxSpeed.PHP_EOL;
    }
}