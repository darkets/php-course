<?php declare(strict_types=1);

// Modify the example program to compute the position of an object after falling for 10 seconds,
//      outputting the position in meters.
// Note: The correct value is -490.5m.

$time = 10;
$gravity = -9.81;

$position = 0.5 * $gravity * pow($time, 2);

echo "The object, after falling for $time seconds, is at position $position." . PHP_EOL;

// Output
// The object, after falling for 10 seconds, is at position -490.5.
