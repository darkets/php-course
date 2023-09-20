<?php declare(strict_types=1);

// Write a program that calculates and displays a person's body mass index (BMI).
// A person's BMI is calculated with the following formula: BMI = weight x 703 / height ^ 2.
// Where weight is measured in pounds and height is measured in inches.
// Display a message indicating whether the person has optimal weight, is underweight, or is overweight.
// A sedentary person's weight is considered optimal if his or her BMI is between 18.5 and 25.
// If the BMI is less than 18.5, the person is considered underweight.
// If the BMI value is greater than 25, the person is considered overweight.

const KILOGRAMS_TO_POUNDS = 2.2;
function convertToPounds(float $weight): float
{
    return $weight * KILOGRAMS_TO_POUNDS;
}

const CENTIMETERS_TO_INCHES = 2.54;
function convertToInches(float $height): float
{
    return $height / CENTIMETERS_TO_INCHES;
}

$yourWeight = (int)readline('Input your weight (kg): ');
$convertedWeight = convertToPounds($yourWeight);

$yourHeight = (int)readline('Input your height (cm): ');
$convertedHeight = convertToInches($yourHeight);

$yourBMI = ($convertedWeight * 703) / pow($convertedHeight, 2);

echo 'Your BMI is ' . number_format($yourBMI, 2) . PHP_EOL;
if ($yourBMI > 25) {
    echo 'You are overweight' . PHP_EOL;
} elseif ($yourBMI < 18.5) {
    echo 'You are underweight' . PHP_EOL;
} else {
    echo 'You are normal weight' . PHP_EOL;
}

// Output
// Input your weight (kg): 102
// Input your height (cm): 194
// Your BMI is 27.04
// You are overweight
