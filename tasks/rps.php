<?php declare(strict_types=1);

$elements = [
    // element => [...kills]
    'rock' => ['scissors', 'lizard'],
    'paper' => ['rock', 'spock'],
    'scissors' => ['paper', 'lizard'],
    'lizard' => ['spock', 'paper'],
    'spock' => ['rock', 'scissors'],
];

$validSelections = array_keys($elements);

$userSelection = '';
while (!in_array($userSelection, $validSelections)) {
    $userSelection = readline('Enter your element ( ' . implode(', ', $validSelections) . ' ): ');
}

$computerSelectionKey = array_rand($validSelections);
$computerSelection = $validSelections[$computerSelectionKey];

echo "You selected: $userSelection, Computer selected: $computerSelection" . PHP_EOL;
if (in_array($computerSelection, $elements[$userSelection])) {
    echo 'You win!';
} elseif (in_array($userSelection, $elements[$computerSelection])) {
    echo 'You lost!';
} else {
    echo 'It\'s a tie!';
}


