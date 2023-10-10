<?php

declare(strict_types=1);

class BankAccount
{
    private string $username;
    private float $balance;

    public function __construct(string $username, float $balance)
    {
        $this->username = $username;
        $this->balance = $balance;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getUsernameAndBalance(): string
    {
        $balance = $this::getBalance();
        $symbol = $balance > 0 ? '$' : '-$';
        return $this::getUsername() . ", $symbol" . abs($this::getBalance());
    }
}

class BankAccountTest
{
    public static function Test(): void
    {
        $accounts = [
            new BankAccount('Ben', 1337),
            new BankAccount('Robert', -512),
            new BankAccount('Alex', 50),
            new BankAccount('Karen', 0),
            new BankAccount('Joe', -3),
        ];

        foreach ($accounts as $account) {
            /** @var BankAccount $account */
            echo $account->getUsernameAndBalance() . PHP_EOL;
        }
    }
}

BankAccountTest::Test();
