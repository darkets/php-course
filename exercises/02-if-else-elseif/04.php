<?php

// By your choice, create condition with 3 checks.
// For example, if value is greater than X, less than Y and is an even number.

$temperature = 27;
$isSunny = true;
$isWeekend = false;

if ($temperature > 25 && $isSunny && !$isWeekend) {
    echo "It's a hot weekday, so let's go for a swim!";
} elseif ($temperature > 25 && $isSunny && $isWeekend) {
    echo "It's a hot weekend, so let's have a barbecue!";
} elseif ($temperature > 20 && $isSunny) {
    echo "It's a nice day, so let's go for a picnic!";
} else {
    echo "The weather isn't great, let's stay indoors.";
}

// Output
// It's a hot weekday, so let's go for a swim!
