<?php declare(strict_types=1);

echo "Input number of terms: ";
$n = readline();

if (!is_numeric($n) || $n < 1) die('Input must be a positive number!');

$result = 1;

for ($i = 1; $i <= $n; $i++) {
    $result *= $i;
}

echo 'Result: ' . $result;
