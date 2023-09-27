<?php

$url = 'https://rickandmortyapi.com/api/episode';
$json = file_get_contents($url);

$data = json_decode($json, true);

if ($data) {
    foreach ($data['results'] as $episode) {
        echo "Episode Name: {$episode['name']}" . PHP_EOL;
        echo "Episode ID: {$episode['id']}" . PHP_EOL;
        echo "Air Date: {$episode['air_date']}" . PHP_EOL;
        echo '------------------------------------------' . PHP_EOL;
    }
}
