<?php declare(strict_types=1);

// Write a program which prints “Sunday”, “Monday”, ... “Saturday” if the int variable "dayNumber" is 0, 1,
// ..., 6, respectively. Otherwise, it shall print "Not a valid day".

$dayNumber = readline('Day number: ');
if (!is_numeric($dayNumber)) die('Please input a number!');

switch ($dayNumber) {
    case 0:
        echo "Sunday";
        break;
    case 1:
        echo "Monday";
        break;
    case 2:
        echo "Tuesday";
        break;
    case 3:
        echo "Wednesday";
        break;
    case 4:
        echo "Thursday";
        break;
    case 5:
        echo "Friday";
        break;
    case 6:
        echo "Saturday";
        break;
    default:
        echo 'Not a valid day';
        break;
}

// Alternative risinājums izmantojot masīvu

//$days = ['Sunday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Monday'];

//if (array_key_exists($dayNumber, $days)) {
//    echo "The day corresponding to the day number $dayNumber is {$days[$dayNumber]}";
//} else echo 'Not a valid day';
