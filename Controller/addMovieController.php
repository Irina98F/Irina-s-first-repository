<?php

class addMovieController
{
    private $movieService;

    public function __construct($movieService)
    {
        $this->movieService = $movieService;
    }

    public function addMovie(){

        try{
            if(isset($_POST['submitButton'])) {
                $movieName = $_POST['movie_name'];
                $lastSeen = $_POST['last_seen'];
                $notes = $_POST['notes'];
                $watched_count = 1;
                $repository = $this->movieService->getRepository();

                if($repository->getDataByName($movieName)!= false)
                {
                    $movie = new Movie($movieName,$lastSeen,$notes,$watched_count);
                    $this->movieService->updateData($movie,$repository->getDataByName($movieName));
                }
                else{
                    $this->movieService->submitData($movieName, $lastSeen, $notes, $watched_count);
                }
            }}
            catch (PDOException $exception)
            {
                die($exception->getMessage());
            }
    }

}