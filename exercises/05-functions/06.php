<?php declare(strict_types=1);

// Create a non-associative array with 5 elements where 3 are integers, 1 float and 1 string.
// Create a for loop that iterates non-associative array using php in-built function that determines...
//       count of elements in the array.
// Create a function that doubles the integer number.
// Within the loop using php in-built function print out the double of the number value (using your custom function).

$array = [1, 39, 666, 0.98, 'Hello'];

for ($i = 0; $i < count($array); $i++) {
    $currValue = $array[$i];

    if (is_int($currValue)) {
        echo doubleNum($currValue) . PHP_EOL;
    }
}

function doubleNum(int $number): int {
    return $number * 2;
}

// Output
// 2
// 78
// 1332
