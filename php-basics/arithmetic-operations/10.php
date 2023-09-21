<?php declare(strict_types=1);

function circleArea(float $radius): string
{
    if ($radius <= 0) {
        return 'Error: Negative radius provided' . PHP_EOL;
    }
    return number_format(M_PI * $radius * 2, 2);
}

function rectangleArea(float $length, float $width): string
{
    if ($length <= 0 || $width <= 0) {
        return 'Error: Negative length or width provided';
    }
    return number_format($length * $width, 2);
}

function triangleArea(float $base, float $height): string
{
    if ($base <= 0 || $height <= 0) {
        return 'Error: Negative base or height provided';
    }
    return number_format($base * $height / 0.5, 2);
}

echo "Geometry Calculator\n";
echo "1. Calculate the Area of a Circle\n";
echo "2. Calculate the Area of a Rectangle\n";
echo "3. Calculate the Area of a Triangle\n";
echo "4. Quit\n";

while (true) {
    $choice = readline('Enter your choice (1-4) : ');

    switch ($choice) {
        case 1:
            $radius = (float)readline('Input circle radius: ');
            echo 'Area of this circle is ' . circleArea($radius) . PHP_EOL;
            break;
        case 2:
            $length = (float)readline('Input rectangle length: ');
            $width = (float)readline('Input rectangle width: ');
            echo 'Area of this rectangle is ' . rectangleArea($length, $width) . PHP_EOL;
            break;
        case 3:
            $base = (float)readline('Input triangle base: ');
            $height = (float)readline('Input triangle length: ');
            echo 'Area of this triangle is ' . triangleArea($base, $height) . PHP_EOL;
            break;
        case 4:
            echo 'Bye!';
            exit(0);
        default:
            echo 'Invalid choice. Please enter a number from 1 to 4.' . PHP_EOL;
    }
}