<?php

// Board conf
const ROWS = 3;
const COLUMNS = ROWS;
const BOARD_SIZE = ROWS * COLUMNS;

// Game conf
const PLAYER_SYMBOL = 'O';
const PC_SYMBOL = PLAYER_SYMBOL === 'X' ? 'O' : 'X';

const WINNING_COMBINATIONS = [
    [0, 1, 2], [3, 4, 5], [6, 7, 8],
    [0, 3, 6], [1, 4, 7], [2, 5, 8],
    [0, 4, 8], [2, 4, 6]
];

$gameBoard = [];
for ($row = 0; $row < ROWS; $row++) {
    $gameBoard[$row] = array_fill(0, COLUMNS, ' ');
}

function displayGameBoard($board)
{
    foreach ($board as $index => $row) {
        echo ' ' . implode(' | ', $row) . ' ' . PHP_EOL;
        if ($index + 1 !== ROWS) echo '---+---+---' . PHP_EOL;
    }
}

function getRow($move): int
{
    return floor($move / ROWS);
}

function getColumn(int $move): int
{
    return $move % COLUMNS;
}

function isMoveValid(array $board, int $move): bool
{
    $row = getRow($move);
    $column = getColumn($move);

    $positionValue = $board[$row][$column];

    return $move >= 0 && $move < BOARD_SIZE && $positionValue === ' ';
}

function makeMove($move, &$board)
{
    $row = getRow($move);
    $column = getColumn($move);

    $board[$row][$column] = PLAYER_SYMBOL;
}

function makeComputerMove(array &$board): void
{
    do {
        $move = rand(0, BOARD_SIZE - 1);
    } while (!isMoveValid($board, $move));

    $row = getRow($move);
    $column = getColumn($move);

    $board[$row][$column] = PC_SYMBOL;
}

function getGameWinner($board)
{
    foreach (WINNING_COMBINATIONS as $combination) {
        $elements = [];
        foreach ($combination as $index) {
            $row = getRow($index);
            $column = getColumn($index);

            $pos = $board[$row][$column];
            if (!empty(trim($pos))) {
                $elements[] = $board[$row][$column];
            }
        }

        $uniqueElements = array_unique($elements);
        if (count($uniqueElements) === 1 && count($elements) === ROWS) return $uniqueElements[0];
    }

    foreach ($board as $row) {
        $isNotTie = in_array(' ', $row);
    }

    return $isNotTie ? '' : 'tie';
}

while (true) {
    displayGameBoard($gameBoard);

    $move = (int)readline('Your move (1-9): ');
    $move--;

    if (isMoveValid($gameBoard, $move)) {
        makeMove($move, $gameBoard);
        $gameWinner = getGameWinner($gameBoard);

        if ($gameWinner) {
            break;
        }

        makeComputerMove($gameBoard);
        $gameWinner = getGameWinner($gameBoard);

        if ($gameWinner) {
            break;
        }
    } else {
        echo 'Invalid move. Try again' . PHP_EOL;
    }
}

echo '===============' . PHP_EOL;
displayGameBoard($gameBoard);
echo '===============' . PHP_EOL;

if ($gameWinner === PLAYER_SYMBOL) {
    echo 'You won!' . PHP_EOL;
} elseif ($gameWinner === PC_SYMBOL) {
    echo 'The computer won!' . PHP_EOL;
} else {
    echo 'The game is a tie!' . PHP_EOL;
}

