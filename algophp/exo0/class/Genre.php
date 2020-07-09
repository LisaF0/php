<?php

class Genre{
    private $genre;

    public function __construct($genre)
    {
        $this->genre = $genre;
        
    }
    public function getGenre()
    {
            return $this->genre;
    }
    public function __toString(){
        return $this->genre;
    }
}