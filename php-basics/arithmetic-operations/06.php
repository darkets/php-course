<?php declare(strict_types=1);

// Write a program called coza-loza-woza.php which prints the numbers 1 to 110, 11 numbers per line.
// The program shall print "Coza" in place of the numbers which are multiples of 3, "Loza" for multiples of 5,
//     "Woza" for multiples of 7, "CozaLoza" for multiples of 3 and 5, and so on.

$start = 1;
$end = 110;

for ($i = $start; $i <= $end; $i++) {
    $result = '';

    if ($i % 3 === 0) {
        $result .= 'Coza';
    }
    if ($i % 5 === 0) {
        $result .= 'Loza';
    }
    if ($i % 7 === 0) {
        $result .= 'Woza';
    }

    if (!$result) {
        $result = $i;
    }

    echo $result . ' ';

    if ($i % 11 === 0) {
        echo PHP_EOL;
    }
}

// Output
// 1 2 Coza 4 Loza Coza Woza 8 Coza Loza 11
// Coza 13 Woza CozaLoza 16 17 Coza 19 Loza CozaWoza 22
// 23 Coza Loza 26 Coza Woza 29 CozaLoza 31 32 Coza
// 34 LozaWoza Coza 37 38 Coza Loza 41 CozaWoza 43 44
// CozaLoza 46 47 Coza Woza Loza Coza 52 53 Coza Loza
// Woza Coza 58 59 CozaLoza 61 62 CozaWoza 64 Loza Coza
// 67 68 Coza LozaWoza 71 Coza 73 74 CozaLoza 76 Woza
// Coza 79 Loza Coza 82 83 CozaWoza Loza 86 Coza 88
// 89 CozaLoza Woza 92 Coza 94 Loza Coza 97 Woza Coza
// Loza 101 Coza 103 104 CozaLozaWoza 106 107 Coza 109 Loza
