<?php


use Controllers\AbstractController;
use Objects\Person;

require_once('db.php');
require_once('AbstractController.php');
require_once('Objects/Person.php');

class PersonController extends AbstractController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();

        $this->fill();
    }

    public function fill()
    {
        $this->array_db = array();
        $sql_select = 'SELECT * FROM person';
        $res = $this->db->select($sql_select);
        foreach ($res as $iter) {
            array_push($this->array_db, new Person($iter['id'], $iter['name'],$iter['roleId']));
        }
    }

    public function addModel($model)
    {

        // добавление модели в базу данных
        $query = "INSERT INTO 	person (name,roleId) VALUES (:name,:roleId)";
        $params = array(
            ':name' => $model->getName(),
            ':roleId' => $model->getRoleId()
        );
        $result = $this->db->execute($query, $params);

        // обновление  локального массива
        $this->fill();
        return $result;
    }

    public function deleteModel($id)
    {

        // удаление модели из базы данных
        $query = "DELETE FROM person WHERE id=:id";
        $params = array(':id' => $id);
        $result = $this->db->execute($query, $params);

        // обновление  локального массива
        $this->fill();
        return $result;
    }

    public function updateModel($id, $model)
    {

        // обновление модели в базе данных
        $query = "UPDATE person SET name=:name, roleId=:roleId WHERE id=:id";
        $params = array(
            ':id' => $id,
            ':name' => $model->getName(),
            ':roleId' => $model->getRoleId()
        );
        $result = $this->db->execute($query, $params);
        // обновление  локального массива
        $this->fill();

        return $result;
    }


    public function select()
    {
        $sql_select = 'SELECT * FROM person';
        $res = $this->db->select($sql_select);
        foreach ($res as $iter) {
            echo '<div>' . $iter['id'] . ' - ' . $iter['name'] . ' - ' . $iter['roleId'] .'</div>';
        }
    }

    public function printAll()
    {
        foreach ($this->array_db as $iter) {
            echo '<p>' . $iter . '</p>';
        }
    }
}
