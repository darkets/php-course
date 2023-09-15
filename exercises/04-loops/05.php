<?php

// Create an associative array with objects of multiple persons.
// Each person should have a name, surname, age and birthday. Using loop (by your choice) print out every person's personal data.

class Person {
    protected $name;
    protected $surname;
    protected $age;
    protected $dob;

    public function __construct($name, $surname, $age, $dob) {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->dob = $dob;
    }

    public function getPersonalInfo() {
        return "$this->name $this->surname, Age: $this->age, DOB: $this->dob";
    }
}

$personList = [
    'firstPerson' => new Person('Max', 'Verstappen', 25, '30.09.1997'),
    'secondPerson' => new Person('Jane', 'Doe', 21, '18.02.2002'),
    'thirdPerson' => new Person('John', 'Deere', 54, '19.11.1968'),
];

foreach($personList as $person) {
    echo $person->getPersonalInfo() . PHP_EOL;
}

// Output
// Max Verstappen, Age: 25, DOB: 30.09.1997
// Jane Doe, Age: 21, DOB: 18.02.2002
// John Deere, Age: 54, DOB: 19.11.1968
