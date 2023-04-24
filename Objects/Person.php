<?php

namespace Objects;
class Person
{
    private $id;
    private $name;
    private $roleId;


    public function __construct($name, $roleId)
    {
        $this->name = $name;
        $this->roleId = $roleId;

    }

    public function __getName()
    {
        return $this->name;
    }

    public function __getRoleId()
    {
        return $this->roleId;
    }

    public function isCompare($item)
    {
        if ($this->name === $item->getName() && $this->roleId === $item->getRoleId()) {
            return true;
        } else return false;
    }

    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return 'Name :' . $this->name . ' Role Id: ' . $this->roleId;
    }

}