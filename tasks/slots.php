<?php

// - Laukuma izmērs 3 x 4
//- Iespēja definēt uzvarošās kombinācijas
//- Spēlēt atkārtoti
//- Uzvarošās kombinācijas piešķirt spēlētājam punktus, atkarībā no tā, kāds elements bija uzvarošajā kombinācijā
//- PAR KATRU SPĒLĒŠANAS REIZI NOŅEM X PUNKTUS!!!!

const MAX_ROWS = 3;
const MAX_COLUMNS = 4;

const ELEMENTS = [
    'x', 'o', '7',
];
const WINNING_ELEMENTS = ['7'];

const WINNING_COMBINATIONS = [
    [0, 1, 2, 3],
    [0, 1, 2, 7],
    [4, 1, 2, 3],
    [4, 5, 6, 7],
    [4, 5, 6, 11],
    [8, 5, 6, 7],
];

function generateBoard(): array
{
    $board = [];
    for ($row = 0; $row < MAX_ROWS; $row++) {
        $board[$row] = [];

        for ($column = 0; $column < MAX_COLUMNS; $column++) {
            $board[$row][] = ELEMENTS[array_rand(ELEMENTS)];
        }
    }

    return $board;
}

function displayBoard(array $board): void
{
    echo '==============' . PHP_EOL;
    foreach ($board as $row) {
        echo implode(' | ', $row) . PHP_EOL;
    }
    echo '==============' . PHP_EOL;
}

function checkWin(array $board): bool
{
    foreach (WINNING_COMBINATIONS as $combination) {
        $elements = [];
        foreach ($combination as $index) {
            $row = floor($index / MAX_COLUMNS);
            $column = $index % MAX_COLUMNS;
            $elements[] = $board[$row][$column];
        }

        $cleanElements = array_unique($elements);
        if (count($cleanElements) === 1 && in_array($cleanElements[0], WINNING_ELEMENTS)) {
            return true;
        }
    }

    return false;
}

$yourPoints = 20;
while ($yourPoints > 0) {
    echo 'Your points: ' . $yourPoints . PHP_EOL;
    $choice = readline('Do you want to play slots? (y/n)');

    if (strtolower($choice) !== 'y') exit;

    $yourPoints--;

    $board = generateBoard();
    displayBoard($board);

    if (checkWin($board)) {
        echo "Congratulations! You won!" . PHP_EOL;
        $yourPoints += 10;
    } else {
        echo 'You lost!' . PHP_EOL;
    }
}

echo 'You ran out of points' . PHP_EOL;
echo 'Thank you for letting us steal your money! Come again!';
