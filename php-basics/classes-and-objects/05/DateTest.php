<?php declare(strict_types=1);

class DateTest
{
    public static function main()
    {
        $date = new Date(10, 04, 2023);

        echo "Date using displayDate method: " . $date->displayDate() . PHP_EOL;

        $date->setMonth(12);
        $date->setDay(25);
        $date->setYear(2024);

        echo "Updated Date: {$date->getMonth()}/{$date->getDay()}/{$date->getYear()}" . PHP_EOL;
    }
}
