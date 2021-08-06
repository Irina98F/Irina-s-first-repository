<?php

class MovieService
{
    private $movieRepository;

    public function __construct()
    {
        $this->movieRepository = new MovieRepository();
        $this->movieRepository->connectTo();
    }

    public function getRepository()
    {
        return $this->movieRepository;
    }

    public function getDataFromDB()
    {
        return $this->movieRepository->getData();
    }

    public function getNewMovie($movieName, $lastSeen, $notes, $watched_count):Movie
    {
        $movie = new Movie($movieName, $lastSeen, $notes, $watched_count);

        return $movie;
    }

    public function submitData($movieName, $lastSeen, $notes, $watched_count)
    {
        $movie = $this->getNewMovie($movieName, $lastSeen, $notes, $watched_count);
        $this->movieRepository->addData($movie);
    }

    public function updateData($movie, $movieDB)
    {
        $movie->verifyLastSeen($movieDB->getLastSeen());
        $movie->incremenetWatchedCount($movieDB->getWatchedCount());
        $this->movieRepository->updateMovie($movie);

    }

}