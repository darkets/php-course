<?php

// Given array
$items = [
    [
        "name" => "John",
        "surname" => "Doe",
        "age" => 50
    ],
    [
        "name" => "Jane",
        "surname" => "Doe",
        "age" => 41
    ]
];

//Program should display concatenated value of - John & Jane Doe`s
$johnName = $items[0]['name'];
$janeName = $items[1]['name'];
$personSurname = $items[1]['surname'];

echo $johnName . ' & ' . $janeName . ' ' . $personSurname . '`s';

// Output
// John & Jane Doe`s
