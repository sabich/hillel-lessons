<?php


namespace App\Models;


use App\Interfaces\BodyType;
use App\Interfaces\EngineType;
use App\Interfaces\TransmissionType;
use App\Interfaces\WheelFormula;
use App\Models\Vehicle\Car;
use App\Traits\CalculateVehicle;

class Mazda extends Car implements BodyType,EngineType,TransmissionType,WheelFormula
{
    protected string $bodyType = 'sedan';
    protected string $engineType = 'injector';
    protected string $transmissionType = 'automatic';
    protected string $wheelFormula = '2x4';

    use CalculateVehicle;

    public function getBodyType(): string
    {
        return $this->bodyType;
    }

    public function getEngineType(): string
    {
        return $this->engineType;
    }

    public function getTransmissionType(): string
    {
        return $this->transmissionType;
    }

    public function getWheelFormula(): string
    {
        return $this->wheelFormula;
    }
}