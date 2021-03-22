<?php


namespace App\Traits;


trait CalculateVehicle
{
    /**
     * @param float $averageEffectivePressure
     * @param float $engineVolume
     * @param int $numberOfRevolutions
     * @return float|int
     */
    public function calculatePowerEngine(
        float $averageEffectivePressure,
        float $engineVolume,
        int $numberOfRevolutions
    )
    {
        return $averageEffectivePressure * $engineVolume * floatval($numberOfRevolutions/120);
    }

    public function engineHorsepower(float $power): float
    {
        return $power/0.735;
    }
}