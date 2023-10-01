<?php declare(strict_types=1);

class Dice
{
    public static function roll(): int
    {
        return rand(1, 6);
    }
}

$desiredSum = readline('Enter desired sum: ');

if (!is_numeric($desiredSum) || $desiredSum < 2 || $desiredSum > 12) {
    die('Input must be a number between 2 and 12!');
}

$desiredSum = (int)$desiredSum;

do {
    $firstRoll = Dice::roll();
    $secondRoll = Dice::roll();
    $sum = $firstRoll + $secondRoll;

    echo "$firstRoll + $secondRoll = $sum" . PHP_EOL;
} while ($sum !== $desiredSum);
