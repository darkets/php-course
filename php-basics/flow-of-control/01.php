<?php declare(strict_types=1);

echo "Input the 1st number: ";
$x = (int)readline();

echo "Input the 2nd number: ";
$y = (int)readline();

echo "Input the 3rd number: ";
$z = (int)readline();

$largestNum = max($x, $y, $z);

echo "Largest number is $largestNum";
