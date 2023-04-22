<?php
abstract class Controller
{
    private $array_db=[];

    public function __construct()
    {

    }
    abstract function addItem($item);
//    {
//        array_push($this->array_db,$item);
//    }

    abstract function removeItem($item);
//    {
//
//        $arr2 = array_values($this->array_db);
//
//        if(($key = array_search($item, $arr2, $strict=TRUE)) !== FALSE) {
//            unset($arr2[$key]);
//        }
//
//        $this->array_db=array_values($arr2);
//    }
    abstract function updateItem($item);
}
