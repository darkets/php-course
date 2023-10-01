<?php declare(strict_types=1);

class FizzBuzz
{
    public static function runFizzBuzz(int $num): void
    {
        for ($i = 1; $i <= $num; $i++) {
            $output = '';
            if ($i % 3 === 0) {
                $output .= 'Fizz';
            }
            if ($i % 5 === 0) {
                $output .= 'Buzz';
            }

            if (empty($output)) {
                $output .= $i;
            }

            echo $output . ' ';
            if ($i % 20 === 0) echo PHP_EOL;
        }
    }
}

$num = readline('Enter max number: ');
if (!is_numeric($num) || $num < 1) die('Input must be a positive number!');

$num = (int)$num;
FizzBuzz::runFizzBuzz($num);
