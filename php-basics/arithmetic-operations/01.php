<?php

// Write a program to accept two integers and return true if the either one is 15 or if their sum or difference is 15.

function diff(int $x, int $y): bool {
    $addedVal = $x + $y;
    $subtractVal = $x - $y;

    if ($x === 15 || $y === 15 || $addedVal === 15 || $subtractVal === 15) {
        return true;
    }

    return false;
}

echo diff(1, 14);

// Output
// 1
