<?php

declare(strict_types=1);

class Video
{
    private string $title;
    private bool $checkedOut = false;
    private float $averageRating = 0.0;
    private int $totalRatings = 0;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function isCheckedOut(): bool
    {
        return $this->checkedOut;
    }

    public function checkOut(): void
    {
        $this->checkedOut = true;
    }

    public function returnVideo(): void
    {
        $this->checkedOut = false;
    }

    public function receiveRating(float $rating): void
    {
        $this->averageRating = ($this->averageRating * $this->totalRatings + $rating) / ($this->totalRatings + 1);
        $this->totalRatings++;
    }

    public function getAverageRating(): float
    {
        return $this->averageRating;
    }
}

class VideoStore
{
    private array $inventory = [];

    public function addVideo(string $title): void
    {
        $this->inventory[] = new Video($title);
    }

    public function listInventory(): array
    {
        return $this->inventory;
    }

    public function findVideoByTitle(string $title): ?Video
    {
        foreach ($this->inventory as $video) {
            if ($video->getTitle() === $title) {
                return $video;
            }
        }
        return null;
    }

    public function giveRating(string $title, int $rating): void
    {
        $video = $this::findVideoByTitle($title);
        $video->receiveRating($rating);
    }
}

class Application
{
    private VideoStore $videoStore;

    public function __construct()
    {
        $this->videoStore = new VideoStore();
    }

    public function run()
    {
        while (true) {
            echo 'Choose the operation you want to perform:' . PHP_EOL;
            echo 'Choose 0 for EXIT' . PHP_EOL;
            echo 'Choose 1 to add videos' . PHP_EOL;
            echo 'Choose 2 to rent a video' . PHP_EOL;
            echo 'Choose 3 to return a video' . PHP_EOL;
            echo 'Choose 4 to list inventory' . PHP_EOL;
            echo 'Choose 5 to rate a video' . PHP_EOL;

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->addMovies();
                    break;
                case 2:
                    $this->rentVideo();
                    break;
                case 3:
                    $this->returnVideo();
                    break;
                case 4:
                    $this->listInventory();
                    break;
                case 5:
                    $this->rateVideo(); // Call the new method for rating
                    break;
                default:
                    echo 'Invalid command.' . PHP_EOL;
            }
        }
    }

    private function addMovies()
    {
        echo 'Enter the titles of the movies (separated by commas):' . PHP_EOL;
        $titles = explode(',', readline());
        foreach ($titles as $title) {
            $title = trim($title);
            if (!empty($title)) {
                $this->videoStore->addVideo($title);
            }
        }
        echo 'Movies added to the inventory.' . PHP_EOL;
    }

    private function rentVideo()
    {
        echo 'Enter the title of the video to rent:' . PHP_EOL;
        $title = readline();
        $video = $this->videoStore->findVideoByTitle($title);
        if ($video) {
            if (!$video->isCheckedOut()) {
                $video->checkOut();
                echo "You have rented '{$video->getTitle()}'. Enjoy!" . PHP_EOL;
            } else {
                echo "Sorry, '{$video->getTitle()}' is already rented." . PHP_EOL;
            }
        } else {
            echo 'Video not found in the inventory' . PHP_EOL;
        }
    }

    private function returnVideo()
    {
        echo 'Enter the title of the video to return:' . PHP_EOL;
        $title = readline();
        $video = $this->videoStore->findVideoByTitle($title);
        if ($video) {
            if ($video->isCheckedOut()) {
                $video->returnVideo();
                echo "Thank you for returning '{$video->getTitle()}'." . PHP_EOL;
            } else {
                echo 'This video is not currently rented.' . PHP_EOL;
            }
        } else {
            echo 'Video not found in the inventory.' . PHP_EOL;
        }
    }

    private function listInventory()
    {
        $inventory = $this->videoStore->listInventory();
        if (empty($inventory)) {
            echo 'Inventory is empty.' . PHP_EOL;
        } else {
            echo 'Inventory:' . PHP_EOL;
            foreach ($inventory as $video) {
                /** @var Video $video */
                $status = $video->isCheckedOut() ? 'Checked Out' : 'On Shelves';
                $averageRating = $video->getAverageRating();
                echo "{$video->getTitle()} | Status: $status | Average Rating: $averageRating" . PHP_EOL;
                echo '-------------------' . PHP_EOL;
            }
        }
    }

    private function rateVideo()
    {
        echo 'Enter the title of the video to rate:' . PHP_EOL;
        $title = readline();
        $video = $this->videoStore->findVideoByTitle($title);
        if ($video) {
            if (!$video->isCheckedOut()) {
                echo "Enter your rating for '{$video->getTitle()}' (0-5):" . PHP_EOL;
                $rating = (float)readline();
                if ($rating >= 0 && $rating <= 5) {
                    $video->receiveRating($rating);
                    echo "Thank you for rating '{$video->getTitle()}' with a rating of $rating." . PHP_EOL;
                } else {
                    echo 'Invalid rating. Please enter a rating between 0 and 5.' . PHP_EOL;
                }
            } else {
                echo "Sorry, '{$video->getTitle()}' is currently rented. You cannot rate it." . PHP_EOL;
            }
        } else {
            echo 'Video not found in the inventory.' . PHP_EOL;
        }
    }
}

$app = new Application();
$app->run();
