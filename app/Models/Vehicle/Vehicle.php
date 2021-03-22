<?php


namespace App\Models\Vehicle;


abstract class Vehicle
{
    /**
     * @return string
     */
    abstract function speed(): string;
}