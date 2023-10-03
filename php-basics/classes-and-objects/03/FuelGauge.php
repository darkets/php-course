<?php declare(strict_types=1);

class FuelGauge
{
    const MAX_FUEL = 70;
    private int $fuel;

    public function __construct($fuel)
    {
        $this->fuel = $fuel;
    }

    public function getFuel(): int
    {
        return $this->fuel;
    }

    public function addFuel(): void
    {
        if ($this->fuel === $this::MAX_FUEL) {
            return;
        }

        $this->fuel++;
    }

    public function removeFuel(): void
    {
        if ($this->fuel === 0) {
            return;
        }

        $this->fuel--;
    }
}