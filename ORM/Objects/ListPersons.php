<?php

namespace Objects;
class listPersons
{
    private $id;
    private $filmId;
    private $personId;


    public function __construct($filmId, $personId)
    {
        $this->filmId = $filmId;
        $this->personId = $personId;

    }

    public function __getFilmId()
    {
        return $this->filmId;
    }

    public function __getPersonId()
    {
        return $this->personId;
    }

    public function isCompare($item)
    {
        if ($this->filmId === $item->getFilmId() && $this->personId === $item->getPersonId()) {
            return true;
        } else return false;
    }

    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return 'Film Id :' . $this->filmId . ' Person Id: ' . $this->personId;
    }

}