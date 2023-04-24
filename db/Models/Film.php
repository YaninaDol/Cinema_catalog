<?php

namespace db\Objects;
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


    public function __construct($id,$name, $categoryId, $imdb, $country, $isPopular, $isPremium, $subscribe)
    {
        $this->id=$id;
        $this->name = $name;
        $this->categoryId = $categoryId;
        $this->imdb = $imdb;
        $this->country = $country;
        $this->isPopular = $isPopular;
        $this->isPremium = $isPremium;
        $this->subscribe = $subscribe;
    }

    public function setPremium($isPremium)
    {
        $this->isPremium = $isPremium;
    }

    public function setPopular($isPopular)
    {
        $this->isPopular = $isPopular;
    }

    public function setImdb($imdb)
    {
        $this->imdb = $imdb;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function getImdb()
    {
        return $this->imdb;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getisPopular()
    {
        return $this->isPopular;
    }

    public function getSubscribe()
    {
        return $this->subscribe;
    }
    public function getisPremium()
    {
        return $this->isPremium;
    }

    public function isCompare($item)
    {
        if ($this->name === $item->getName() && $this->categoryId === $item->getCategoryId() && $this->country === $item->getCountry() && $this->subscribe === $item->getSubscribe()) {
            return true;
        } else return false;
    }

    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return 'ID:'.$this->id.'Name:' . $this->name . ' Country: ' . $this->country . ' Imdb : ' . $this->imdb . ' isPremium: ' . $this->isPremium . ' Category ID: ' . $this->categoryId . ' Popular: ' . $this->isPopular . ' Subscribe: ' . $this->subscribe;
    }
}
