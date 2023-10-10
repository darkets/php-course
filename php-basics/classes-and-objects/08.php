<?php

declare (strict_types=1);

class SavingsAccount
{
    private int $balanceInCents;
    private float $interest;

    public function __construct(float $balanceInDollars, float $interest)
    {
        $this->balanceInCents = (int)($balanceInDollars * 100);
        $this->interest = $interest;
    }

    public function deposit(float $amountInDollars): void
    {
        if ($amountInDollars < 0) {
            return;
        }
        $this->balanceInCents += (int)($amountInDollars * 100);
    }

    public function withdraw(float $amountInDollars): void
    {
        if ($amountInDollars < 0) {
            return;
        }
        $this->balanceInCents -= (int)($amountInDollars * 100);
    }

    public function addInterest(): void
    {
        $this->balanceInCents += (int)round(($this->balanceInCents * $this->interest / 1200));
    }

    public function getBalance(): float
    {
        return $this->balanceInCents / 100;
    }
}

class SavingsAccountTest
{
    public static function Test(float $balanceInDollars, float $interest, int $monthsOpened): void
    {
        $account = new SavingsAccount($balanceInDollars, $interest);
        $totalDeposits = 0.0;
        $totalWithdrawals = 0.0;

        for ($i = 1; $i <= $monthsOpened; $i++) {
            $depositInDollars = (float)readline("Enter amount deposited for month $i: ");
            $withdrawInDollars = (float)readline("Enter amount withdrawn for month $i: ");

            $account->deposit($depositInDollars);
            $account->withdraw($withdrawInDollars);
            $account->addInterest();

            $totalDeposits += $depositInDollars;
            $totalWithdrawals += $withdrawInDollars;

            echo PHP_EOL;
        }

        $interestEarned = $account->getBalance() - ($balanceInDollars + $totalDeposits - $totalWithdrawals);

        echo 'Initial investment: $' . number_format($balanceInDollars, 2) . PHP_EOL;
        echo "Investment period: $monthsOpened months" . PHP_EOL;
        echo "Yearly interest: $interest%" . PHP_EOL;
        echo 'Total deposited: $' . number_format($totalDeposits, 2) . PHP_EOL;
        echo 'Total withdrawn: $' . number_format($totalWithdrawals, 2) . PHP_EOL;
        echo 'Interest earned: $' . number_format($interestEarned, 2) . PHP_EOL;
        echo 'Ending balance: $' . number_format($account->getBalance(), 2) . PHP_EOL;
    }
}

$initBalanceInDollars = (float)readline('Enter initial account balance: ');
$interestRate = (float)readline('Enter yearly interest rate: ');
$monthsOpened = (int)readline('How long has the account been opened? ');

SavingsAccountTest::Test($initBalanceInDollars, $interestRate, $monthsOpened);