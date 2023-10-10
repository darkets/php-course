<?php

declare(strict_types=1);

class Account
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function deposit(float $amount): void
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    public function withdrawal(float $amount): void
    {
        if ($amount > 0) {
            $this->balance -= $amount;
        }
    }

    public function transfer(Account $to, float $amount): void
    {
        if ($amount > 0 && $this->balance >= $amount) {
            $this->withdrawal($amount);
            $to->deposit($amount);
        }
    }

    public function __toString(): string
    {
        return "$this->name balance: $this->balance" . PHP_EOL;
    }
}

class Bank
{
    public static function transferMoney($from, $to, $amount)
    {
        /** @var Account $from */
        $from->transfer($to, $amount);
    }
}

$firstAccount = new Account('Account 1', 100.0);
$firstAccount->deposit(20.0);
echo 'Your first account:' . PHP_EOL;
echo $firstAccount;

$mattAccount = new Account('Matt\'s account', 1000.0);
$myAccount = new Account('My account', 0.0);

$mattAccount->withdrawal(100.0);
$myAccount->deposit(100.0);

echo 'Your first money transfer:' . PHP_EOL;
echo $mattAccount;
echo $myAccount;

echo PHP_EOL;

$accountA = new Account('A', 100.0);
$accountB = new Account('B', 0.0);
$accountC = new Account('C', 0.0);

Bank::transferMoney($accountA, $accountB, 50.0);
Bank::transferMoney($accountB, $accountC, 25.0);

echo 'Money transfers:' . PHP_EOL;
echo $accountA;
echo $accountB;
echo $accountC;
