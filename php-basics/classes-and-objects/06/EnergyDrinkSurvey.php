<?php declare(strict_types=1);

class EnergyDrinkSurvey
{
    const PEOPLE_SURVEYED = 12467;
    const PURCHASED_ENERGY_DRINKS = 0.14;
    const PREFER_CITRUS_DRINKS = 0.64;


    public static function calculateEnergyDrinkers(float $percentage = self::PURCHASED_ENERGY_DRINKS): float
    {
        return round(self::PEOPLE_SURVEYED * $percentage);
    }

    public static function calculatePreferCitrus(): float
    {
        return round(self::calculateEnergyDrinkers(self::PREFER_CITRUS_DRINKS) * self::PURCHASED_ENERGY_DRINKS);
    }
}