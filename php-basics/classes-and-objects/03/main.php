<?php declare(strict_types=1);

require_once 'php-basics/classes-and-objects/03/FuelGauge.php';
require_once 'php-basics/classes-and-objects/03/Odometer.php';

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
