<?php

declare(strict_types=1);

class URApi
{
    const API_URL = 'https://data.gov.lv/dati/lv/api/3/action/datastore_search';
    const RESOURCE_ID = '25e80bf3-f107-4ab4-89ef-251b5b9374e9';

    public static function getCompanies(string $identifier): ?array
    {
        $query = http_build_query([
            'q' => $identifier,
            'resource_id' => self::RESOURCE_ID,
        ]);
        $url = self::API_URL . '?' . $query;

        $data = @file_get_contents($url);

        if ($data === false) {
            return null;
        }

        $decodedData = json_decode($data, true);

        if ($decodedData === null || !isset($decodedData['result']['records'])) {
            return null;
        }

        return $decodedData['result']['records'];
    }
}