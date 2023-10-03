<?php declare(strict_types=1);

require_once 'php-basics/classes-and-objects/01/Product.php';


$mouse = new Product('Logitech Mouse', 70.00, 14);
$phone = new Product('iPhone 5s', 999.99, 3);
$projector = new Product('Epson EB-U05', 440.46, 1);

$mouse->printProduct();
$phone->printProduct();
$projector->printProduct();

$mouse->setPrice(64.99);
$projector->setAmount(3);
