<?php

namespace db\Objects;
class listPersons
{
    private $id;
    private $filmId;
    private $personId;


    public function __construct($id,$filmId, $personId)
    {
        $this->id=$id;
        $this->filmId = $filmId;
        $this->personId = $personId;

    }

    public function getFilmId()
    {
        return $this->filmId;
    }

    public function getPersonId()
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
        return 'Id :' . $this->id .'Film Id :' . $this->filmId . ' Person Id: ' . $this->personId;
    }

}