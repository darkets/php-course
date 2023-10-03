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