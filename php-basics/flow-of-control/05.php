<?php declare(strict_types=1);

$input = strtolower(readline('Enter a string: '));

$convertedInput = "";
for ($i = 0; $i < strlen($input); $i++) {
    $char = $input[$i];

    switch ($char) {
        case 'a':
        case 'b':
        case 'c':
            $convertedInput .= '2';
            break;
        case 'd':
        case 'e':
        case 'f':
            $convertedInput .= '3';
            break;
        case 'g':
        case 'h':
        case 'i':
            $convertedInput .= '4';
            break;
        case 'j':
        case 'k':
        case 'l':
            $convertedInput .= '5';
            break;
        case 'm':
        case 'n':
        case 'o':
            $convertedInput .= '6';
            break;
        case 'p':
        case 'q':
        case 'r':
        case 's':
            $convertedInput .= '7';
            break;
        case 't':
        case 'u':
        case 'v':
            $convertedInput .= '8';
            break;
        case 'w':
        case 'x':
        case 'y':
        case 'z':
            $convertedInput .= '9';
            break;
        default:
            $convertedInput .= $i;
            break;
    }
}

echo 'Converted input: ' . $convertedInput;
