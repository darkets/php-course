<?php declare(strict_types=1);

// Foo Corporation needs a program to calculate how much to pay their hourly employees.
// The US Department of Labor requires that employees get paid time and a half for any hours over 40 that they work...
//     in a single week.
// For example, if an employee works 45 hours, they get 5 hours of overtime, at 1.5 times their base pay.
// The State of Massachusetts requires that hourly employees be paid at least $8.00 an hour.
// Foo Corp requires that an employee not work more than 60 hours in a week.

const MINIMUM_PAY_RATE = 8.00;
const OVERTIME_THRESHOLD = 40;
const OVERTIME_RATE = 1.5;
const MAX_HOURS = 60;

function calculatePay(int $hours, float $rate, string $employeeName): void
{
    if ($hours > MAX_HOURS) {
        echo "$employeeName's hours worked exceed the maximum" . PHP_EOL;
        return;
    }

    if ($rate < MINIMUM_PAY_RATE) {
        echo "$employeeName's pay rate is below the allowed minimum" . PHP_EOL;
        return;
    }

    $regularHours = min($hours, OVERTIME_THRESHOLD);
    $overtimeHours = max($hours - OVERTIME_THRESHOLD, 0);

    $regularPay = $regularHours * $rate;
    $overtimePay = $overtimeHours * $rate * OVERTIME_RATE;

    $totalAmount = $regularPay + $overtimePay;
    echo "$employeeName's wage is $$totalAmount for working $hours hours" . PHP_EOL;
}

function main()
{
    $employees = [
        ["John", 7.50, 35],
        ["Jane", 8.20, 47],
        ["Max", 10.00, 73]
    ];

    foreach ($employees as $employee) {
        $employeeName = $employee[0];
        $basePay = $employee[1];
        $hoursWorked = $employee[2];

        calculatePay($hoursWorked, $basePay, $employeeName);
    }
}

main();

// Output
// John's rate is below the allowed minimum
// Jane's wage is 414.1 for working 47 hours
// Max's hours worked exceed the maximum
