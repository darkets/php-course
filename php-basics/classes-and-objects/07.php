<?php declare(strict_types=1);

class Dog
{
    private string $name;
    private string $sex;
    private string $mother;
    private string $father;

    public function __construct(string $name, string $sex, string $mother = 'Unknown', string $father = 'Unknown')
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = $mother;
        $this->father = $father;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function getFather(): string
    {
        return $this->father ?: 'Unknown';
    }

    public function getMother(): string
    {
        return $this->mother ?: 'Unknown';
    }

    public function hasSameMother(Dog $otherDog): bool
    {
        return !($this->getMother() === 'Unknown' || $otherDog->getMother() === 'Unknown') &&
            $this->getMother() === $otherDog->getMother();
    }
}

class DogTest
{
    public static function Test()
    {
        $dogs = [
            new Dog('Max', 'male', 'Lady', 'Rocky'),
            new Dog('Rocky', 'male', 'Molly', 'Sam'),
            new Dog('Sparky', 'male'),
            new Dog('Buster', 'male', 'Lady', 'Sparky'),
            new Dog('Sam', 'male'),
            new Dog('Lady', 'female'),
            new Dog('Molly', 'female'),
            new Dog('Coco', 'female', 'Molly', 'Buster')
        ];

        foreach ($dogs as $dog) {
            /** @var Dog $dog */

            echo '-----------------' . PHP_EOL;
            echo "Name: {$dog->getName()}, Sex: {$dog->getSex()}" . PHP_EOL;
            echo "Mother: {$dog->getMother()}, Father: {$dog->getFather()}" . PHP_EOL;

            foreach ($dogs as $suns) {
                if ($dog->hasSameMother($suns) && $suns !== $dog) {
                    echo "{$dog->getName()} has the same mother as {$suns->getName()}" . PHP_EOL;
                }
            }
        }
    }
}

DogTest::Test();
