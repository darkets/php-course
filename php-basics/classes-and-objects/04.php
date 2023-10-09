<?php declare(strict_types=1);

class Movie
{
    private string $title;
    private string $studio;
    private string $rating;

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getStudio(): string
    {
        return $this->studio;
    }

    public function getRating(): string
    {
        return $this->rating;
    }

    public static function getPG(array $movies): array
    {
        $pgMovies = [];
        foreach ($movies as $movie) {
            if ($movie->rating === 'PG') {
                $pgMovies[] = $movie;
            }
        }

        return $pgMovies;
    }
}

$movie1 = new Movie('Casino Royale', 'Eon Productions', 'PG-13');
$movie2 = new Movie('Glass', 'Buena Vista International', 'PG-13');
$movie3 = new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG');

$movies = [$movie1, $movie2, $movie3];

$pgRatedMovies = Movie::getPG($movies);

echo 'PG-rated movies:' . PHP_EOL;
foreach ($pgRatedMovies as $movie) {
    echo "Title: {$movie->getTitle()}, Studio: {$movie->getStudio()}, Rating: {$movie->getRating()}" . PHP_EOL;
}
