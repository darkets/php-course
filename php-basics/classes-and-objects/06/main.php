<?php declare(strict_types=1);

require_once 'php-basics/classes-and-objects/06/EnergyDrinkSurvey.php';

$surveyed = EnergyDrinkSurvey::PEOPLE_SURVEYED;

echo 'Total number of people surveyed: ' . $surveyed . PHP_EOL;
echo 'Approximately ' . EnergyDrinkSurvey::calculateEnergyDrinkers() . ' bought at least one energy drink.' . PHP_EOL;
echo EnergyDrinkSurvey::calculatePreferCitrus() . ' of those prefer citrus flavored energy drinks.' . PHP_EOL;
