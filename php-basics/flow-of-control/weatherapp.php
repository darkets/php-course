<?php declare(strict_types=1);

const API_KEY = '04636b245be698e20d32a0fad56f9a9c';

function getLatLon(string $location): array
{
    $url = sprintf("https://api.openweathermap.org/geo/1.0/direct?q=%s&appid=%s", $location, API_KEY);
    $json = file_get_contents($url);

    $data = json_decode($json, true);

    $latlon = [];
    if ($data) {
        $latlon[] = $data[0]['lat'];
        $latlon[] = $data[0]['lon'];
    }

    return $latlon;
}

function getWeatherData(float $lat, float $lon): array
{
    $url = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&units=metric&appid=" . API_KEY;
    $json = file_get_contents($url);

    return json_decode($json, true);
}

function displayWeatherData(array $data): void
{
    echo "----- Current Weather Data for: {$data['name']} -----" . PHP_EOL;
    echo "Weather condition: {$data['weather'][0]['description']}" . PHP_EOL;
    echo "Temperature: {$data['main']['temp']}°C" . PHP_EOL;
    echo "Pressure: {$data['main']['pressure']} hPa" . PHP_EOL;
    echo "Humidity: {$data['main']['humidity']}%" . PHP_EOL;
    echo "Wind speed: {$data['wind']['speed']} m/s" . PHP_EOL;
    echo '--------------------------------' . PHP_EOL;
}

echo 'Weather app. Check the current weather for any location' . PHP_EOL;
while (true) {
    $location = readline('Enter location: ') . PHP_EOL;

    $latlon = getLatLon($location);

    if (!empty($latlon)) {
        $weatherData = getWeatherData($latlon[0], $latlon[1]);
        displayWeatherData($weatherData);
    } else echo 'Location not found' . PHP_EOL;
}
