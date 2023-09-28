<?php declare(strict_types=1);

echo "Enter the number:";
$num = readline();
if (!is_numeric($num)) die('Please input a number!');

echo ($num) > 0 ? 'Number is positive' : 'Number is negative';
