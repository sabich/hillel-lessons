<?php


namespace App\Models;


use App\Interfaces\EngineType;
use App\Interfaces\TransmissionType;
use App\Interfaces\WheelFormula;
use App\Models\Vehicle\Track;
use App\Traits\CalculateVehicle;

class Man extends Track implements EngineType,TransmissionType,WheelFormula
{
    protected string $engineType = 'diesel';
    protected string $transmissionType = 'manual';
    protected string $wheelFormula = '8x4';

    use CalculateVehicle;

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