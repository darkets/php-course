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

    public function incrementMileage(): void
    {
        $this->mileage++;

        if ($this->mileage > self::MAX_MILEAGE) {
            $this->mileage = 0;
        }

        if ($this->mileage % 10 === 0) {
            $this->fuelGauge->decrementFuel();
        }
    }
}

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
        if ($this->fuel === self::MAX_FUEL) {
            return;
        }

        $this->fuel++;
    }

    public function decrementFuel(): void
    {
        if ($this->fuel === 0) {
            return;
        }

        $this->fuel--;
    }
}

$carFuelGauge = new FuelGauge(rand(55, 65));
$carOdometer = new Odometer(rand(100000, 900000), $carFuelGauge);

echo 'Refueling Vehicle...' . PHP_EOL;

$currentFuel = $carFuelGauge->getFuel();
for ($i = $currentFuel; $i < 70; $i++) {
    usleep(5 * 100000);

    $carFuelGauge->addFuel();
    echo "Fuel: {$carFuelGauge->getFuel()}l" . PHP_EOL;
}

echo 'Refueling done. Let\'s go for a ride!' . PHP_EOL;

while ($carFuelGauge->getFuel() > 0) {
    usleep(2 * 100000);

    $carOdometer->incrementMileage();

    echo "Mileage: {$carOdometer->getMileage()}km" . PHP_EOL;
    echo "Fuel: {$carFuelGauge->getFuel()}l" . PHP_EOL;
}

echo 'The car ran out of fuel.';
