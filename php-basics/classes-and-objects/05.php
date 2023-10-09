<?php declare(strict_types=1);

class Date
{
    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $month, int $day, int $year)
    {
        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setDay(int $day): void
    {
        $this->day = $day;
    }

    public function setMonth(int $month): void
    {
        $this->month = $month;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function displayDate(): string
    {
        return "{$this->month}/{$this->day}/{$this->year}";
    }
}

$date = new Date(10, 04, 2023);

echo "Date using displayDate method: " . $date->displayDate() . PHP_EOL;

$date->setMonth(12);
$date->setDay(25);
$date->setYear(2024);

echo "Updated Date: {$date->getMonth()}/{$date->getDay()}/{$date->getYear()}" . PHP_EOL;

