<?php

// Create an associative array with objects of multiple persons.
// Each person should have a name, surname, age and birthday. Using loop (by your choice) print out every person's personal data.

$personList = [
    'firstPerson' => [
        'name' => 'Max',
        'surname' => 'Verstappen',
        'age' => 25,
        'dob' => '30.09.1997'
    ],
    'secondPerson' => [
        'name' => 'Jane',
        'surname' => 'Doe',
        'age' => 21,
        'dob' => '18.02.2002'
    ],
    'thirdPerson' => [
        'name' => 'John',
        'surname' => 'Deere',
        'age' => 54,
        'dob' => '19.11.1968'
    ]
];

foreach($personList as $person) {
    $personInfo = "{$person['name']} {$person['surname']}, Age: {$person['age']}, DOB: {$person['dob']}";
    echo $personInfo, PHP_EOL;
}

// Output
// Max Verstappen, Age: 25, DOB: 30.09.1997
// Jane Doe, Age: 21, DOB: 18.02.2002
// John Deere, Age: 54, DOB: 19.11.1968
