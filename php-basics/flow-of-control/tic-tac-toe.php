<?php declare(strict_types=1);

const PLAYER_SYMBOL = 'O';
const PC_SYMBOL = PLAYER_SYMBOL === 'X' ? 'O' : 'X';
const BOARD_SIZE = 9;

$board = array_fill(0, BOARD_SIZE, ' ');

function displayBoard(array $board): void
{
    echo " $board[0] | $board[1] | $board[2]" . PHP_EOL;
    echo '---+---+---' . PHP_EOL;
    echo " $board[3] | $board[4] | $board[5]" . PHP_EOL;
    echo '---+---+---' . PHP_EOL;
    echo " $board[6] | $board[7] | $board[8]" . PHP_EOL;
}

function isMoveValid(array $board, int $move): bool
{
    return $move >= 0 && $move < BOARD_SIZE && $board[$move] === ' ';
}

function makeComputerMove(array &$board): void
{
    do {
        $move = rand(0, BOARD_SIZE - 1);
    } while (!isMoveValid($board, $move));

    $board[$move] = PC_SYMBOL;
}

function getGameWinner(array $board): string
{
    $winningCombinations = [
        [0, 1, 2], [3, 4, 5], [6, 7, 8],
        [0, 3, 6], [1, 4, 7], [2, 5, 8],
        [0, 4, 8], [2, 4, 6]
    ];

    foreach ($winningCombinations as $combination) {
        [$a, $b, $c] = $combination;
        if ($board[$a] === $board[$b] && $board[$b] === $board[$c] && $board[$a] !== ' ') {
            return $board[$a];
        }
    }

    if (!in_array(' ', $board)) {
        return 'tie';
    }

    return '';
}

while (true) {
    displayBoard($board);

    $move = (int)readline('Your move (1-9): ');
    $move--;

    if (isMoveValid($board, $move)) {
        $board[$move] = PLAYER_SYMBOL;
        $gameWinner = getGameWinner($board);

        if ($gameWinner) {
            break;
        }

        makeComputerMove($board);
        $gameWinner = getGameWinner($board);

        if ($gameWinner) {
            break;
        }
    } else {
        echo 'Invalid move. Try again' . PHP_EOL;
    }
}

echo '===============' . PHP_EOL;
displayBoard($board);
echo '===============' . PHP_EOL;

if ($gameWinner === PLAYER_SYMBOL) {
    echo 'You won!' . PHP_EOL;
} elseif ($gameWinner === PC_SYMBOL) {
    echo 'The computer won!' . PHP_EOL;
} else {
    echo 'The game is a tie!' . PHP_EOL;
}
