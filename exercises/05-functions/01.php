<?php declare(strict_types=1);

// Create a function that accepts any string and returns the same value with added "codelex" by the end of it.
// Print this value out.

function addCodelex(string $value): string {
    return "$value codelex";
}

echo addCodelex('You know what is cool?');

// Output
// You know what is cool? codelex
