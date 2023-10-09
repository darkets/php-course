<?php declare(strict_types=1);

class Product
{
    private string $name;
    private float $price;
    private int $amount;

    public function __construct(string $name, float $price, int $amount)
    {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setAmount(int $amount): void
    {
        $this->$amount = $amount;
    }

    public function printProduct(): void
    {
        echo '---------------' . PHP_EOL;
        echo 'Product: ' . $this->name . PHP_EOL;
        echo 'Price: ' . $this->price . 'EUR' . PHP_EOL;
        echo 'Stock: ' . $this->amount . PHP_EOL;
        echo '---------------' . PHP_EOL;
    }
}

$mouse = new Product('Logitech mouse', 70.00, 14);
$phone = new Product('iPhone 5s', 999.99, 3);
$projector = new Product('Epson EB-U05', 440.46, 1);

$mouse->printProduct();
$phone->printProduct();
$projector->printProduct();

$mouse->setPrice(75.00);
$mouse->setAmount(20);

$mouse->printProduct();
