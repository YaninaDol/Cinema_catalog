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

    public function __getName()
    {
        return $this->name;
    }

    public function __getCategoryId()
    {
        return $this->categoryId;
    }

    public function __getImdb()
    {
        return $this->imdb;
    }
    public function __getCountry()
    {
        return $this->country;
    }
    public function __getisPopular()
    {
        return  $this->isPopular;
    }
    public function __getSubscribe()
    {
        return $this->subscribe;
    }

    public function isCompare($item)
    {
        if($this->name===$item->getName() && $this->categoryId===$item->getCategoryId() && $this->country===$item->getCountry()&& $this->subscribe===$item->getSubscribe())
        {
            return true;
        }
        else return false;
    }


    public function __toString()
    {
        return 'Name:'.$this->name.' Country: '.$this->country.' Imdb : '.$this->imdb.' isPremium: '.$this->isPremium.' Category ID: '.$this->categoryId.' Popular: '.$this->isPopular.' Subscribe: '.$this->subscribe;
    }
}
