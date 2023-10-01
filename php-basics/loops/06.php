<?php declare(strict_types=1);

class Ascii
{
    const SIZE = 4;

    public static function AsciiFigure(): void
    {
        $size = self::SIZE;

        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size - $i; $j++) {
                echo '/';
            }
            for ($j = 0; $j < 2 * $i; $j++) {
                echo '*';
            }
            for ($j = 0; $j < $size - $i; $j++) {
                echo '\\';
            }
            echo PHP_EOL;
        }
    }
}

Ascii::AsciiFigure();

