<?php
class listPersons
{
    private $id;
    private $filmId;
    private $personId;


    public function __construct($filmId,$personId)
    {
        $this->filmId=$filmId;
        $this->personId=$personId;

    }

}