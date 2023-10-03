<?php declare(strict_types=1);

class Odometer
{
    const MAX_MILEAGE = 999999;
    private int $mileage;

    public function __construct($mileage)
    {
        $this->mileage = $mileage;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function addMileage(): void
    {
        $this->mileage++;

        if ($this->mileage > $this::MAX_MILEAGE) {
            $this->mileage = 0;
        }
    }
}