<?php

namespace db\Controllers;

use Database;
use db\Objects\Category;

require_once('db/db.php');
require_once('AbstractController.php');
require_once('db/Models/Category.php');

class CategoryController extends AbstractController
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
        $sql_select = 'SELECT * FROM category';
        $res = $this->db->select($sql_select);
        foreach ($res as $iter) {
            array_push($this->array_db, new Category($iter['id'], $iter['name']));
        }
    }

    public function addModel($model)
    {

        // добавление модели в базу данных
        $query = "INSERT INTO 	category (name) VALUES (:name)";
        $params = array(
            ':name' => $model->getName()
        );
        $result = $this->db->execute($query, $params);

        // обновление  локального массива
        $this->fill();
        return $result;
    }

    public function deleteModel($id)
    {

        // удаление модели из базы данных
        $query = "DELETE FROM category WHERE id=:id";
        $params = array(':id' => $id);
        $result = $this->db->execute($query, $params);

        // обновление  локального массива
        $this->fill();
        return $result;
    }

    public function updateModel($id, $model)
    {

        // обновление модели в базе данных
        $query = "UPDATE category SET name=:name WHERE id=:id";
        $params = array(
            ':id' => $id,
            ':name' => $model->getName()
        );
        $result = $this->db->execute($query, $params);
        // обновление  локального массива
        $this->fill();

        return $result;
    }


    public function select()
    {
        $sql_select = 'SELECT * FROM category';
        $res = $this->db->select($sql_select);
        foreach ($res as $iter) {
            echo '<div>' . $iter['id'] . ' - ' . $iter['name'] . '</div>';
        }
    }

    public function printAll()
    {
        foreach ($this->array_db as $iter) {
            echo '<p>' . $iter . '</p>';
        }
    }
}
