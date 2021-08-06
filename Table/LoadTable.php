<?php

class LoadTable
{
    private $movieService;
    public function __construct()
    {
        $this->movieService = new MovieService();
    }

    public function populateTable()
    {
        $tableRows = $this->movieService->getDataFromDB();
        $writeLines = new TableLines();
        $writeLines->write($tableRows);
    }
}