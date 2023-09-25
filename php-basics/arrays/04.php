<?php declare(strict_types=1);

$firstArray = [];
for ($i = 1; $i <= 10; $i++) {
    $firstArray[] = rand(1, 100);
}

$secondArray = array_slice($firstArray, 0);
$firstArray[count($firstArray) - 1] = -7;

echo 'Array 1: ' . implode(', ', $firstArray) . PHP_EOL;
echo 'Array 2: ' . implode(', ', $secondArray);
