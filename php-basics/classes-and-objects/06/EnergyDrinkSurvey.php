<?php declare(strict_types=1);

class EnergyDrinkSurvey
{
    const PEOPLE_SURVEYED = 12467;
    const PURCHASED_ENERGY_DRINKS = 0.14;
    const PREFER_CITRUS_DRINKS = 0.64;


    public static function calculate_energy_drinkers(float $percentage = self::PURCHASED_ENERGY_DRINKS): float
    {
        return round(self::PEOPLE_SURVEYED * $percentage);
    }

    public static function calculate_prefer_citrus(): float
    {
        return round(self::calculate_energy_drinkers(self::PREFER_CITRUS_DRINKS) * self::PURCHASED_ENERGY_DRINKS);
    }
}