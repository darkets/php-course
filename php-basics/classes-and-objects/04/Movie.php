<?php

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