<?php
class Film
{
    private $id;
    private $name;
    private $categoryId;
    private $imdb;
    private $country;
    private $isPopular;
    private $isPremium;
    private $subscribe;


    public function __construct($name,$categoryId,$imdb,$country,$isPopular,$isPremium,$subscribe)
    {
        $this->name=$name;
        $this->categoryId=$categoryId;
        $this->imdb=$imdb;
        $this->country=$country;
        $this->isPopular=$isPopular;
        $this->isPremium=$isPremium;
        $this->subscribe=$subscribe;
    }

    public function setPremium($isPremium)
    {
        $this->isPremium=$isPremium;
    }
    public function setPopular($isPopular)
    {
        $this->isPopular=$isPopular;
    }
    public function setImdb($imdb)
    {
        $this->imdb=$imdb;
    }

}
