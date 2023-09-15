<?php declare(strict_types=1);

// Create a 2D associative array in 2nd dimension with fruits and their weight.
// Create a function that determines if fruit has weight over 10kg.
// Create a secondary array with shipping costs per weight.
// Meaning that you can say that over 10 kg shipping costs are 2 euros, otherwise its 1 euro.
// Using foreach loop print out the values of the fruits and how much it would cost to ship this product.

$fruits = [
    'apple' => ['weight' => 1 /* Kilograms */],
    'banana' => ['weight' => 15],
    'strawberry' => ['weight' => 0.3],
];

$shippingCosts = [
    'underTenKg' => 1, // Euros
    'overTenKg' => 2,
];

function isOverWeight(float $fruitWeight): bool {
    $weight = 10; // Kilograms
    return $fruitWeight> $weight;
}

foreach($fruits as $fruit => $data) {
    $weight = $data['weight'];
    $overWeight = isOverWeight($data['weight']);
    $shippingCost = $overWeight ? $shippingCosts['overTenKg'] : $shippingCosts['underTenKg'];

    echo "Fruit: $fruit, Weight: $weight kg, Shipping Cost: $shippingCost". PHP_EOL;
}

// Output
// Fruit: apple, Weight: 1 kg, Shipping Cost: 1
// Fruit: banana, Weight: 15 kg, Shipping Cost: 2
// Fruit: strawberry, Weight: 0.3 kg, Shipping Cost: 1
