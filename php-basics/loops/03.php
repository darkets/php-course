<?php declare(strict_types=1);

$wordA = trim(readline('Word 1: '));
$wordB = trim(readline('Word 2: '));

$wordALen = strlen($wordA);
$wordBLen = strlen($wordB);

if ($wordALen < 1 || $wordBLen < 1) die('Input can\'t be empty.');

$dotCount = 30 - ($wordALen + $wordBLen);
echo $wordA;

for ($i = 0; $i < $dotCount; $i++) {
    echo '.';
}

echo $wordB;
