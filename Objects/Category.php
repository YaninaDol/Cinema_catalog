<?php

namespace Objects;
class Category
{
    private $id;
    private $name;


    public function __construct($id,$name)
    {
        $this->id=$id;
        $this->name = $name;

    }

    public function getName()
    {
        return $this->name;
    }

    public function isCompare($item)
    {
        if ($this->name === $item->getName()) {
            return true;
        } else return false;
    }

    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return 'ID :' . $this->id.'Name :' . $this->name;
    }
}
