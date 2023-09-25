<?php declare(strict_types=1);

function isGuessCorrect(string $guess, string $randomWord): bool
{
    return strpos($randomWord, $guess) !== false;
}

function displayGameState(array $guessingWord, array $misses, int $guessCount): void
{
    echo 'Misses: ' . implode(', ', $misses) . PHP_EOL;
    echo 'Guesses left: ' . $guessCount . PHP_EOL;
    echo 'Word: ' . implode(' ', $guessingWord) . PHP_EOL;
}

$wordList = [
    'house',
    'yoga',
    'dinner',
    'monster',
    'restaurant',
    'business',
    'keyboard',
    'monitor',
    'mouse',
    'computer',
];

$randomWord = $wordList[array_rand($wordList)];
$guessingWord = array_fill(0, strlen($randomWord), '_');

$misses = [];
$guessCount = intval(strlen($randomWord) * 1.5);

while (implode('', $guessingWord) !== $randomWord && $guessCount > 0) {
    displayGameState($guessingWord, $misses, $guessCount);
    $guess = strtolower(readline('Your guess: '));

    if (strlen($guess) === 1 && !in_array($guess, $misses)) {
        if (isGuessCorrect($guess, $randomWord)) {
            for ($i = 0; $i < strlen($randomWord); $i++) {
                if ($randomWord[$i] === $guess) {
                    $guessingWord[$i] = $guess;
                }
            }
        } else {
            $misses[] = $guess;
            $guessCount--;
        }
    } else {
        echo 'Invalid guess. Please enter a single character you have not guessed before.' . PHP_EOL;
    }
}

if (implode('', $guessingWord) === $randomWord) {
    echo "Congratulations! You guessed the word: $randomWord" . PHP_EOL;
} else {
    echo "Out of guesses. The word was: $randomWord" . PHP_EOL;
}
