<?php declare(strict_types=1);

// Create a person object with name, surname and age.
// Create a function that will determine if the person has reached 18 years of age.
// Print out if the person has reached age of 18 or not.

function isAdult(int $age): bool {
    return $age >= 18;
}

$person = new stdClass();
$person->name = 'John';
$person->surname = 'Doe';
$person->age = 17;

if (isAdult($person->age)) {
    echo 'Person is over 18';
} else {
    echo 'Person is under 18';
}

// Output
// Person is under 18
