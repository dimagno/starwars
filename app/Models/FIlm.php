<?php

namespace App\Models;

class Film
{
    protected $title, $director, $created, $episode, $producer, $release_data, $opening_crawl;
    protected $characters = [], $species = [], $vehicles = [], $planets = [], $starships = [];
    public function __construct(
        $title = null,
        $director = null,
        $created = null,
        $episode = null,
        $producer = null,
        $release_data = null,
        $opening_crawl = null,
        $characters = [],
        $species = [],
        $vehicles = [],
        $planets = [],
        $starships = []
    ) {
        $this->title = $title;
        $this->director = $director;
        $this->created = $created;
        $this->episode = $episode;
        $this->producer = $producer;
        $this->release_data = $release_data;
        $this->opening_crawl = $opening_crawl;
        $this->characters = $characters;
        $this->species = $species;
        $this->vehicles = $vehicles;
        $this->planets = $planets;
        $this->starships = $starships;
    }

    // Getters e Setters

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDirector()
    {
        return $this->director;
    }

    public function setDirector($director)
    {
        $this->director = $director;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getEpisode()
    {
        return $this->episode;
    }

    public function setEpisode($episode)
    {
        $this->episode = $episode;
    }

    public function getProducer()
    {
        return $this->producer;
    }

    public function setProducer($producer)
    {
        $this->producer = $producer;
    }

    public function getReleaseData()
    {
        return $this->release_data;
    }

    public function setReleaseData($release_data)
    {
        $this->release_data = $release_data;
    }

    public function getOpeningCrawl()
    {
        return $this->opening_crawl;
    }

    public function setOpeningCrawl($opening_crawl)
    {
        $this->opening_crawl = $opening_crawl;
    }

    public function getCharacters()
    {
        return $this->characters;
    }

    public function setCharacters($characters)
    {
        $this->characters = $characters;
    }

    public function getSpecies()
    {
        return $this->species;
    }

    public function setSpecies($species)
    {
        $this->species = $species;
    }

    public function getVehicles()
    {
        return $this->vehicles;
    }

    public function setVehicles($vehicles)
    {
        $this->vehicles = $vehicles;
    }

    public function getPlanets()
    {
        return $this->planets;
    }

    public function setPlanets($planets)
    {
        $this->planets = $planets;
    }

    public function getStarships()
    {
        return $this->starships;
    }

    public function setStarships($starships)
    {
        $this->starships = $starships;
    }
}
