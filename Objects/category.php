<?php
class Category
{
    private $id;
    private $name;


    public function __construct($name)
    {
        $this->name=$name;

    }
    public function __getName()
    {
       return $this->name;
    }

    public function isCompare($item)
    {
        if($this->name===$item->getName() )
        {
            return true;
        }
        else return  false;
    }

    public function __toString()
    {
        return 'Name :'.$this->name;
    }
}
