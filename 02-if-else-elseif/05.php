<?php

// Given variable (int) 50 create a condition that prints out "correct" if the variable is inside the range.
// Range should be stored within the 2 separated variables $y and $z.

$number = 50;
$y = 10;
$z = 70;

if ($number >= $y && $number <= $z) {
    echo "$number is in the range of $y and $z";
}

// Output
// 50 is in the range of 10 and 70
