<?php

// Given variable (int) 50, determine if it's in the range of 1 and 100.

$number = 50;
$rangeMin = 1;
$rangeMax = 100;

if ($number >= $rangeMin && $number <= $rangeMax) {
    echo "$number is in the range of $rangeMin and $rangeMax";
} else {
    echo "$number is not in the range of $rangeMin and $rangeMax";
}

// Output
// 50 is in the range of 1 and 100
