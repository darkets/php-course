<?php declare(strict_types=1);

require_once 'php-basics/classes-and-objects/06/EnergyDrinkSurvey.php';

$surveyed = EnergyDrinkSurvey::PEOPLE_SURVEYED;

echo 'Total number of people surveyed: ' . $surveyed . PHP_EOL;
echo 'Approximately ' . EnergyDrinkSurvey::calculate_energy_drinkers() . ' bought at least one energy drink.' . PHP_EOL;
echo EnergyDrinkSurvey::calculate_prefer_citrus() . ' of those prefer citrus flavored energy drinks.' . PHP_EOL;
