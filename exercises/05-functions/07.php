<?php

// Imagine you own a gun store. Only certain guns can be purchased with license types.
// Create an object (person) that will be the requester to purchase a gun (object) Person object has a name,
//    valid licenses (multiple) & cash. Guns are objects stored within an array.
// Each gun has license letter, price & name.
// Using PHP in-built functions determine if the requester (person) can buy a gun from the store.

class Weapon {
    private string $name;
    private int $price;
    private string $neededLicense;

    public function __construct(string $name, int $price, string $neededLicense) {
        $this->name = $name;
        $this->price = $price;
        $this->neededLicense = $neededLicense;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): int {
        return $this->price;
    }

    public function getNeededLicense(): string {
        return $this->neededLicense;
    }
}

$weapons = [
    new Weapon('Glock19', 1200, 'standard'),
    new Weapon('Glock18', 1100, 'standard'),
    new Weapon('Rocket Launcher', 5400, 'rocket'),
    new Weapon('M4A1', 3900, 'military'),
];

$person = new stdClass();
$person->name = 'John';
$person->money = 8613;
$person->licenses = ['rocket', 'military'];

foreach($weapons as $weapon) {
    $canBuy = canBuyWeapon($person, $weapon);
    if ($canBuy) {
        echo 'You can buy a ' . $weapon->getName() . PHP_EOL;
    }
}

function canBuyWeapon(stdClass $person, Weapon $weapon): bool {
    $personLicenses = $person->licenses;
    $personMoney = $person->money;
    $neededLicense = $weapon->getNeededLicense();

    $isPermitted = in_array($neededLicense, $personLicenses);
    $hasMoney = $personMoney > $weapon->getPrice();

    return $isPermitted && $hasMoney;
}

// Output
// You can buy a Rocket Launcher
// You can buy a M4A1
