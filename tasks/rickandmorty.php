<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://rickandmortyapi.com/api/episode");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);

if (!empty($data)) {
    foreach ($data['results'] as $episode) {
        echo "Episode Name: " . $episode['name'] . "<br>";
        echo "Episode ID: " . $episode['id'] . "<br>";
        echo "Air Date: " . $episode['air_date'] . "<br>";
        echo "------------------------------------------<br>";
    }
}
