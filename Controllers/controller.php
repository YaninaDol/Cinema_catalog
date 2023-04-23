<?php
abstract class Controller
{
    protected $array_db;

    public function __construct()
    {
    $this->array_db=array();
    }
    abstract function addModel($model);

    abstract function deleteModel($id);

    public function removeFromArray($item)
    {

        $arr2 = array_values($this->array_db);

        if(($key = array_search($item, $arr2, $strict=TRUE)) !== FALSE) {
            unset($arr2[$key]);
        }

        $this->array_db=array_values($arr2);
    }

        public function findKey($item)
        {
            if(($key = array_search($item, $this->array_db, $strict=TRUE)) !== FALSE)

                return $key;
            else return null;
        }

        public function findItem($id)
        {


            foreach ( $this->array_db as $element ) {
                if ( $id == $element->getId() ) {
                    return $element;
                }
            }

            return false;

        }
    abstract function updateModel($model);

    public function updateInArray($item)
    {
        $this->array_db[$this->findKey($this->findItem($item->getId()))]->setLogin($item->getLogin());
        $this->array_db[$this->findKey($this->findItem($item->getId()))]->setPassword($item->getPassword());
    }
}
