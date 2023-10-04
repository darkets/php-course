<?php declare(strict_types=1);

$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;

function calculate_energy_drinkers(int $numberSurveyed, float $percentage): float
{
    return round($numberSurveyed * $percentage);
}

function calculate_prefer_citrus(int $numberSurveyed, float $percentage): float
{
    return round(calculate_energy_drinkers($numberSurveyed, $percentage) * $percentage);
}

echo 'Total number of people surveyed: ' . $surveyed . PHP_EOL;
echo 'Approximately ' . calculate_energy_drinkers($surveyed, $purchased_energy_drinks) . ' bought at least one energy drink.' . PHP_EOL;
echo calculate_prefer_citrus($surveyed, $prefer_citrus_drinks) . ' of those prefer citrus flavored energy drinks.' . PHP_EOL;
