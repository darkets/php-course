<?php declare(strict_types=1);

class Point
{
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function swapPoints(Point $a, Point $b): void
    {
        $tempX = $a->x;
        $tempY = $a->y;

        $a->x = $b->x;
        $a->y = $b->y;

        $b->x = $tempX;
        $b->y = $tempY;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
$p1->swapPoints($p1, $p2);

echo "(" . $p1->getX() . ", " . $p1->getY() . ")";
echo "(" . $p2->getX() . ", " . $p2->getY() . ")";
