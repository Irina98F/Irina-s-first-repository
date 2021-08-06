<?php

class Movie
{
    private int $id;
    private string $movieName;
    private $lastSeen;
    private string $notes;
    private int $watchedcount;

    public function __construct($movieName, $lastSeen, $notes, $watchedcount)
    {
        $this->movieName = $movieName;
        $this->lastSeen = $lastSeen;
        $this->notes = $notes;
        $this->watchedcount = $watchedcount;
    }

    public function getWatchedcount(): int
    {
        return $this->watchedcount;
    }

    public function setWatchedcount(int $watchedcount): void
    {
        $this->watchedcount = $watchedcount;
    }

    public function  getMovieName():string
    {
        return  $this->movieName;
    }

    public function  getLastSeen():string
    {
        return  $this->lastSeen;
    }

    public function getNotes(): string
    {
        return $this->notes;
    }


    public function setNotes(string $notes): void
    {
        $this->notes = $notes;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function setMovieName(string $movieName): void
    {
        $this->movieName = $movieName;
    }

    public function setLastSeen($lastSeen): void
    {
        $this->lastSeen = $lastSeen;
    }

    public function incremenetWatchedCount($watched_count)
    {
        $this->watchedcount = $watched_count +1;

    }

    public function verifyLastSeen($last_seen_db)
    {
        if($this->lastSeen < $last_seen_db)
        {
            $this->lastSeen = $last_seen_db;
        }
    }


}