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

//Program should display concatenated value of - Jane Doe 41

$item = $items[1];
$personInfo = $item['name'] . ' ' . $item['surname'] . ' ' . $item['age'];

echo $personInfo;

// Output
// Jane Doe 41
