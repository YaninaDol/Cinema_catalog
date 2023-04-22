<?php
class Person
{
    private $id;
    private $name;
    private $roleId;


    public function __construct($name,$roleId)
    {
        $this->name=$name;
        $this->roleId=$roleId;

    }

}