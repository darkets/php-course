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