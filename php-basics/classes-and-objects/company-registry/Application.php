<?php

declare(strict_types=1);

class Application
{
    public function run(): void
    {
        while (true) {
            echo 'Enter company name or ID (or type "exit" to quit):' . PHP_EOL;
            $identifier = trim(readline());

            if (strtolower($identifier) === 'exit') {
                break;
            }

            if (empty($identifier)) {
                echo 'ERROR: Input empty!' . PHP_EOL;
                continue;
            }

            $data = URApi::getCompanies($identifier);

            if ($data === null) {
                echo 'No company found with this identifier!' . PHP_EOL;
            } else {
                $this->displayCompanyData($data);
            }
        }
    }

    private function displayCompanyData(array $data): void
    {
        echo '=================' . PHP_EOL;
        echo 'Found ' . count($data) . ' companies!' . PHP_EOL;
        echo '=================' . PHP_EOL;

        foreach ($data as $company) {

            $name = $company['name_in_quotes'];
            if (empty($name)) {
                $name = $company['name'];
            }

            echo "Name: $name" . PHP_EOL;
            echo "Type: {$company['type']}" . PHP_EOL;
            echo "Registry Code: {$company['regcode']}" . PHP_EOL;
            echo "SEPA identifier: {$company['sepa']}" . PHP_EOL;
            echo "Registered: {$company['registered']}" . PHP_EOL;
            echo "Address: {$company['address']}" . PHP_EOL;
            echo '---------------------' . PHP_EOL;
        }
    }
}