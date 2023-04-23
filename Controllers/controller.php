<?php
abstract class Controller
{
    protected $array_db;

    public function __construct()
    {
    $this->array_db=array();

    }
    abstract function fill();
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

        public function findKey($item,$strict=TRUE)
        {
            if(($key = array_search($item, $this->array_db, $strict)) !== FALSE)

            {return $key;}
            else return null;
        }

        public function findItem($id)
        {


            foreach ( $this->array_db as $element )
            {

                if ( $id == $element->getId() ) {

                    return $element;

                }
            }

            echo null;

        }
    abstract function updateModel($id,$login,$password);

    public function updateInArray($id,$login,$password)
    {
        $KEY=$this->findKey($this->findItem($id));
       $this->array_db[$KEY]->setLogin($login);
     $this->array_db[$KEY]->setPassword($password);
    }
}
