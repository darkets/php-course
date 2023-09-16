<?php

// Write a program to produce the sum of 1, 2, 3, ..., to 100. Store 1 and 100 in variables lower bound and...
//     upper bound, so that we can change their values easily. Also compute and display the average.

// The output shall look like:
// The sum of 1 to 100 is 5050
// The average is 50.5

$lowerBound = 1;
$upperBound = 100;

$sum = 0;
for ($i = $lowerBound; $i <= $upperBound; $i++) {
    $sum+= $i;
}

// sum of values / number of values
$average = $sum / ($upperBound - $lowerBound + 1);

echo "The sum of $lowerBound to $upperBound is $sum" . PHP_EOL;
echo "The average is $average";

// Output
// The sum of 1 to 100 is 5050
// The average is 50.5
