<?php declare(strict_types=1);

// Write a program that reads a positive integer and count the number of digits the number has.

$num = (int)readline('Enter number: ');

if ($num < 1) die('Only positive numbers!');

echo "Digit count of $num is " . strlen((string)$num);
