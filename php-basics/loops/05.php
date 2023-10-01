<?php declare(strict_types=1);

class Piglet
{
    public static function playPiglet(): void
    {
        $totalPoints = 0;

        echo 'Lets play!' . PHP_EOL;
        while (true) {
            $roll = self::rollDice();

            if ($roll === 1) {
                echo 'You rolled a 1. You lost all your points.' . PHP_EOL;
                $totalPoints = 0;
                break;
            }

            $totalPoints += $roll;
            echo "You rolled a $roll!" . PHP_EOL;

            $playAgain = readline('Play again? (y/n): ');
            if ($playAgain !== 'y') {
                break;
            }
        }

        echo "You got a total of $totalPoints points.";
    }

    public static function rollDice(): int
    {
        return rand(1, 6);
    }
}

Piglet::playPiglet();
