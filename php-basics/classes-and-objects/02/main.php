<?php declare(strict_types=1);

require_once 'php-basics/classes-and-objects/02/Point.php';

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
$p1->swapPoints($p1, $p2);

echo "(" . $p1->getX() . ", " . $p1->getY() . ")";
echo "(" . $p2->getX() . ", " . $p2->getY() . ")";
