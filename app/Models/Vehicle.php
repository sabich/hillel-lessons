<?php


namespace App\Models;


abstract class Vehicle
{
    /**
     * @return string
     */
    abstract function speed(): string;
}