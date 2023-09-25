<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

echo "Enter the value to search for: ";
$select = readline();

if (in_array($select, $numbers)) {
    echo $select . ' is in the array';
} else {
    echo $select . ' is not in the array';
}
