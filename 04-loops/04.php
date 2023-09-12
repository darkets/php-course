<?php

// Create a non-associative array with integers and print out only integers that divides by 3 without any left.

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 123, 999];

foreach($numbers as $number) {
    if ($number % 3 === 0) {
        echo $number, PHP_EOL;
    }
}

// Output
// 3 divides with 3
// 6 divides with 3
// 9 divides with 3
// 123 divides with 3
// 999 divides with 3
