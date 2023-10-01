<?php declare(strict_types=1);

class NumberSquare
{
    public static function printSquare(int $min, int $max): void
    {
        $range = range($min, $max);
        $size = $max - $min + 1;

        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                $index = ($i + $j) % $size;
                echo $range[$index];
            }
            echo PHP_EOL;
        }
    }
}

$min = readline('Min: ');
$max = readline('Max: ');

if (!is_numeric($min) || !is_numeric($max) || $min > $max) {
    die('Invalid input. Min should be less than or equal to Max.');
}

NumberSquare::printSquare((int)$min, (int)$max);
