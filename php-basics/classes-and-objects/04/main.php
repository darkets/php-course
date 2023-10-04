<?php declare(strict_types=1);

require_once 'php-basics/classes-and-objects/04/Movie.php';

$movie1 = new Movie('Casino Royale', 'Eon Productions', 'PG-13');
$movie2 = new Movie('Glass', 'Buena Vista International', 'PG-13');
$movie3 = new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG');

$movies = [$movie1, $movie2, $movie3];

$pgRatedMovies = Movie::getPG($movies);

echo 'PG-rated movies:' . PHP_EOL;
foreach ($pgRatedMovies as $movie) {
    echo "Title: {$movie->getTitle()}, Studio: {$movie->getStudio()}, Rating: {$movie->getRating()}" . PHP_EOL;
}
