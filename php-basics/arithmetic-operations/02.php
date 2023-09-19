<?php declare(strict_types=1);

// Write a program called CheckOddEven which prints "Odd Number" if the int variable “number” is odd, or...
//     “Even Number” otherwise. The program shall always print “bye!” before exiting.

function CheckOddEven(int $number): string {
    return $number % 2 === 0 ? 'Even Number' : 'Odd Number';
}

echo CheckOddEven(618902);

echo PHP_EOL . 'bye!';

// Output
// Even Number
// bye!
