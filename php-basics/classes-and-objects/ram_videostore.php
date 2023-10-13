<?php declare(strict_types=1);


class Episode
{
    private int $id;
    private string $title;
    private string $episodeNumber;
    private array $ratings = [];

    public function __construct(int $id, string $title, string $episodeNumber)
    {
        $this->id = $id;
        $this->title = $title;
        $this->episodeNumber = $episodeNumber;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getEpisodeNumber(): string
    {
        return $this->episodeNumber;
    }

    public function setRating(int $rating): void
    {
        $this->ratings[] = $rating;
    }

    public function getRating(): float
    {
        if (empty($this->ratings)) {
            return 0;
        }
        return array_sum($this->ratings) / count($this->ratings);
    }
}

class VideoStore
{
    private string $name;
    private array $inventory = [];

    public function __construct(string $name)
    {
        $this->name = $name;

        $url = 'https://rickandmortyapi.com/api/episode';
        $page = 1;

        do {
            $data = json_decode(file_get_contents($url . '?page=' . $page), true);
            foreach ($data['results'] as $episodeData) {
                $episode = new Episode(
                    $episodeData['id'],
                    $episodeData['name'],
                    $episodeData['episode'],
                );
                $this->inventory[] = $episode;
            }
            $page++;
        } while ($page !== 4);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getInventory(): array
    {
        return $this->inventory;
    }

    public function getEpisodeById(int $id): ?Episode
    {
        foreach ($this->inventory as $episode) {
            /** @var Episode $episode */
            if ($episode->getId() === $id) {
                return $episode;
            }
        }

        return null;
    }

    public function loadRatings(): void
    {
        if (!file_exists('data.json')) {
            return;
        }

        $ratings = json_decode(file_get_contents('data.json'), true);

        foreach ($ratings as $rating) {
            $episode = $this->inventory[$rating['id'] - 1];
            if (isset($rating['rating'])) {
                $episode->setRating((int)$rating['rating']);
            }
        }
    }

    public function saveRating(): void
    {
        $ratings = [];
        foreach ($this->inventory as $episode) {
            $ratings[] = [
                'id' => $episode->getId(),
                'rating' => $episode->getRating(),
            ];
        }
        file_put_contents('data.json', json_encode($ratings));
    }
}

class Application
{
    private VideoStore $store;

    public function __construct()
    {
        $this->store = new VideoStore('Rick And Morty Video Store');
        $this->store->loadRatings();
    }

    public function run(): void
    {
        while (true) {
            echo "Welcome to {$this->store->getName()}" . PHP_EOL;
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

    private function displayEpisodes(): void
    {
        $episodes = $this->store->getInventory();

        foreach ($episodes as $episode) {
            /** @var Episode $episode */
            $rating = $episode->getRating();
            if ($rating < 1) {
                $rating = 'Not rated';
            }

            echo "ID: {$episode->getId()}" . PHP_EOL;
            echo "Episode: {$episode->getEpisodeNumber()}" . PHP_EOL;
            echo "Name: {$episode->getTitle()}" . PHP_EOL;
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
        echo 'You gave a rating of ' . $rating . ' to episode ' . $episode->getTitle() . PHP_EOL;
        echo '--------------' . PHP_EOL;
        $episode->setRating((int)$rating);
        $this->store->saveRating();
    }
}

$app = new Application;
$app->run();
