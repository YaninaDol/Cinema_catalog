<?php

namespace db\Objects;
class Person
{
    private $id;
    private $name;
    private $roleId;


    public function __construct($id,$name, $roleId)
    {
        $this->id=$id;
        $this->name = $name;
        $this->roleId = $roleId;

    }

    public function getName()
    {
        return $this->name;
    }

    public function getRoleId()
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
        return 'ID :' . $this->id .'Name :' . $this->name . ' Role Id: ' . $this->roleId;
    }

}