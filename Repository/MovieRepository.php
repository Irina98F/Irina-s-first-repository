<?php

include "./Model/Movie.php";

class MovieRepository
{
    public PDO $dbh;

    public function connectTo()
    {
        $dbase = new DatabaseConnector();
        $this->dbh = $dbase->connect();
    }

    public function getData():PDOStatement
    {
        $sql = "SELECT * FROM imdb";
        return $this->dbh->query($sql);
    }

    public function getDataByName($movieName)
    {
        $sql = "SELECT * FROM imdb WHERE movie_name = :movie_name";

        $statement = $this->dbh->prepare($sql);
        $statement->bindParam(":movie_name",$movieName);

        $pdoMovie = $statement->execute();
        //$dbMovie = new Movie();
        if ($pdoMovie != null) {
            return $this->getMovieFromPDO($statement->fetch());

        }

        return false;
    }

    public function updateMovie($movie)
    {
        $sql = "UPDATE imdb SET watched_count= :watched_count, last_seen= :last_seen, notes= :notes WHERE movie_name= :movie_name";

        $statement= $this->dbh->prepare($sql);

        $statement->bindParam(":movie_name", $movie_name);
        $statement->bindParam(":last_seen", $last_seen);
        $statement->bindParam(":notes", $movie_notes);
        $statement->bindParam(":watched_count", $watched_count);

        $movie_name = $movie->getMovieName();
        $last_seen = $movie->getLastSeen();
        $movie_notes = $movie->getNotes();
        $watched_count = $movie->getWatchedcount();

        $statement->execute();

    }

    public function addData($movie)
    {
        $sql =  "INSERT INTO imdb (movie_name, last_seen, notes) VALUES (:movie_name, :last_seen, :notes)";

        $statement = $this->dbh->prepare($sql);

        $statement->bindParam(":movie_name", $movie_name);
        $statement->bindParam(":last_seen", $last_seen);
        $statement->bindParam(":notes", $movie_notes);
        $movie_name = $movie->getMovieName();
        $last_seen = $movie->getLastSeen();
        $movie_notes = $movie->getNotes();

        $statement->execute();

    }

    public function getMovieFromPDO($pdo)
    {
        $movie = new Movie($pdo['movie_name'],$pdo['last_seen'], $pdo['notes'], $pdo['watched_count']);
        $movie->setId($pdo['id']);
        return $movie;
    }


}