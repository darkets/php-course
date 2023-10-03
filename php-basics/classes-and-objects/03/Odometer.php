<?php declare(strict_types=1);

class Odometer
{
    const MAX_MILEAGE = 999999;
    private int $mileage;
    private FuelGauge $fuelGauge;

    public function __construct(int $mileage, FuelGauge $fuelGauge)
    {
        $this->mileage = $mileage;
        $this->fuelGauge = $fuelGauge;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function incrementMileage()
    {
        $this->mileage++;

        if ($this->mileage > $this::MAX_MILEAGE) {
            $this->mileage = 0;
        }

        if ($this->mileage % 10 === 0) {
            $this->fuelGauge->decrementFuel();
        }
    }
}