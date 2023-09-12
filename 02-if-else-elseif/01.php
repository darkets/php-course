<?php

// Given variables (int) 10, string "10" determine if they both are the same.

$intNum = 10;
$strNum = '10';

if ($intNum == $strNum) {
    echo 'Variables have the same value' . PHP_EOL;
}

if ($intNum === $strNum) {
    echo 'Variables have the same type';
}

// Output
// Variables have the same value
// Variables do not have the same type
