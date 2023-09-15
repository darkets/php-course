<?php declare(strict_types=1);

// Create an array of objects that uses the function of exercise 3 but in loop printing out if the...
// person has reached age of 18.

class Person {
    private string $name;
    private string $surname;
    private int $age;

    public function __construct(string $name, string $surname, int $age) {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }
}

$persons = [
    new Person('Max', 'Verstappen', 25),
    new Person('John', 'Doe', 19),
    new Person('Jane', 'Doe', 15),
    new Person('Alex', 'Jones', 39),
    new Person('Michael', 'Keen', 11),
];

function isAdult(int $age): bool {
    return $age >= 18;
}

foreach($persons as $person) {
    $name = $person->getName();
    $surname = $person->getSurname();
    $age = $person->getAge();

    if (isAdult($age)) {
        echo "$name $surname is over 18" . PHP_EOL;
    } else {
        echo "$name $surname is under 18" . PHP_EOL;
    }
}

// Output
// Max Verstappen is over 18
// John Doe is over 18
// Jane Doe is under 18
// Alex Jones is over 18
// Michael Keen is under 18
