<?php declare(strict_types=1);

echo "Input the 1st number: ";
$x = readline();

echo "Input the 2nd number: ";
$y = readline();

echo "Input the 3rd number: ";
$z = readline();

if (!is_numeric($x) || !is_numeric($y) || !is_numeric($z)) die('One or more inputs weren\'t a number!');

$largestNum = max($x, $y, $z);

echo "Largest number is $largestNum";
