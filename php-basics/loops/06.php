<?php declare(strict_types=1);

class Ascii
{
    const SIZE = 3;

    public static function asciiFigure(): void
    {
        $size = self::SIZE;
        $rowLength = ($size - 1) * 8;

        for ($i = 0; $i < $size; $i++) {
            $slashes = "";
            $asterisks = "";
            $backslashes = "";

            for ($j = 0; $j < ($rowLength / 2 - $i * 4); $j++) {
                $slashes .= "/";
            }

            for ($j = 0; $j < ($i * 8); $j++) {
                $asterisks .= "*";
            }

            for ($j = 0; $j < ($rowLength / 2 - $i * 4); $j++) {
                $backslashes .= "\\";
            }

//            $slashes = str_repeat("/", ($rowLength / 2 - $i * 4));
//            $asterisks = str_repeat("*", ($i * 8));
//            $backslashes = str_repeat("\\", ($rowLength / 2 - $i * 4));

            echo $slashes . $asterisks . $backslashes . PHP_EOL;
        }
    }
}

Ascii::asciiFigure();

