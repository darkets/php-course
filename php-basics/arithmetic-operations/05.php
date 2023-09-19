<?php declare(strict_types = 1);

// Write a program that picks a random number from 1-100. Give the user a chance to guess it.
// If they get it right, tell them so. If their guess is higher than the number, say "Too high."
// If their guess is lower than the number, say "Too low." Then quit. (They don't get any more guesses for now.)

$correctNum = random_int(1, 100);

$guesses = 2;
while ($guesses > 0) {
    $inputNum = readline('Choose a number between 1 and 100: ');

    if ($inputNum > $correctNum) {
        echo 'Too high' . PHP_EOL;
    } elseif ($inputNum < $correctNum) {
        echo 'Too low' . PHP_EOL;
    } else {
        echo 'You won!';
        break;
    }

    $guesses--;
}

echo 'No more guesses left.';
