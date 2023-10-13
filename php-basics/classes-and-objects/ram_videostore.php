<?php declare(strict_types=1);

class Episode
{
    private int $id;
    private string $name;
    private string $episodeNumber;
    private array $ratings;

    public function __construct(int $id, string $name, string $episodeNumber)
    {
        $this->id = $id;
        $this->name = $name;
        $this->episodeNumber = $episodeNumber;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEpisodeNumber(): string
    {
        return $this->episodeNumber;
    }

    public function getRating(): float
    {
        if (empty($this->ratings)) {
            return 0;
        }
        return array_sum($this->ratings) / count($this->ratings);
    }

    public function setRating(int $rating): void
    {
        if ($rating >= 1 && $rating <= 10) {
            $this->ratings[] = $rating;
        }
    }

}

class VideoStore
{
    private string $name;
    private array $episodes = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addEpisode(Episode $episode): void
    {
        $this->episodes[] = $episode;
    }

    public function getEpisodes(): array
    {
        return $this->episodes;
    }

    public function getEpisodeById(int $id): ?Episode
    {
        foreach ($this->episodes as $episode) {
            /** @var Episode $episode */
            if ($episode->getId() === $id) {
                return $episode;
            }
        }

        return null;
    }
}

class RickAndMortyAPI
{
    private const API_URL = 'https://rickandmortyapi.com/api/episode';

    public static function fetchAllEpisodes(): array
    {
        $episodes = [];
        $page = 1;

        do {
            $data = json_decode(file_get_contents(self::API_URL . '?page=' . $page), true);
            foreach ($data['results'] as $episodeData) {
                $episode = new Episode(
                    $episodeData['id'],
                    $episodeData['name'],
                    $episodeData['episode'],
                );

                $episodes[] = $episode;
            }

            $page++;
        } while ($page !== 4);

        return $episodes;
    }
}

class Application
{
    private VideoStore $store;

    public function run(): void
    {
        $this->initialize();

        $store = $this->store;

        while (true) {
            echo "Welcome to {$store->getName()}" . PHP_EOL;
            echo 'Choose the operation you want to perform' . PHP_EOL;
            echo 'Choose 0 for EXIT' . PHP_EOL;
            echo 'Choose 1 to list episodes' . PHP_EOL;
            echo 'Choose 2 to rate an episode' . PHP_EOL;

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!\n";
                    die;
                case 1:
                    $this->displayEpisodes();
                    break;
                case 2:
                    $this->rateEpisode();
                    break;
                default:
                    echo "Sorry, I don't understand you.\n";
            }
        }
    }

    private function initialize()
    {
        $this->store = new VideoStore('Rick and Morty Video Store');

        $episodes = RickAndMortyAPI::fetchAllEpisodes();
        foreach ($episodes as $episode) {
            $this->store->addEpisode($episode);
        }
    }

    private function displayEpisodes(): void
    {
        $episodes = $this->store->getEpisodes();

        foreach ($episodes as $episode) {
            /** @var Episode $episode */
            $rating = $episode->getRating();
            if ($rating < 1) {
                $rating = 'Not rated';
            }

            echo "ID: {$episode->getId()}" . PHP_EOL;
            echo "Episode: {$episode->getEpisodeNumber()}" . PHP_EOL;
            echo "Name: {$episode->getName()}" . PHP_EOL;
            echo "Rating: $rating" . PHP_EOL;
            echo '-------------------------' . PHP_EOL;
        }
    }

    private function rateEpisode(): void
    {
        start:
        echo 'Enter the ID of the episode you want to rate: ';
        $id = (int)readline();

        $episode = $this->store->getEpisodeById($id);

        if ($episode === null) {
            echo 'Episode not found.' . PHP_EOL;
            goto start;
        }

        echo 'Rate this episode from 1 to 10: ';
        $rating = readline();

        if (!ctype_digit($rating)) {
            echo 'Rating must be an integer.' . PHP_EOL;
            goto start;
        }

        if ($rating < 1 || $rating > 10) {
            echo 'Invalid rating. Please enter a rating between 1 and 10.' . PHP_EOL;
            goto start;
        }

        echo '--------------' . PHP_EOL;
        echo 'You gave a rating of ' . $rating . ' to episode ' . $episode->getName() . PHP_EOL;
        echo '--------------' . PHP_EOL;
        $episode->setRating((int)$rating);
    }
}

$application = new Application();
$application->run();
