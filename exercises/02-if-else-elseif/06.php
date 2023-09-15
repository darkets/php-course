<?php

// Create a variable $plateNumber that stores your car plate number.
// Create a switch statement that prints out that it's your car in case of your number.

$plateNumber = readline('Your plate number: ');

switch ($plateNumber) {
    case 'AB1234':
        echo 'It\'s your car';
        break;
    default:
        echo 'It\'s not your car';
}

// Output
// Your plate number: AB1234
// It's your car
