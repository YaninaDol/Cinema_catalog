<?php

namespace Controllers;

use Database;

require_once('db.php');
include 'AbstractController.php';

class CategoryController extends AbstractController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
        parent::__construct();
        $this->fill();
    }

    public function fill()
    {
        $sql_select = 'SELECT * FROM category';
        $res = $this->db->select($sql_select);
        foreach ($res as $iter) {
            array_push($this->array_db, new user($iter['id'], $iter['name']));
        }
    }

    public function addModel($model)
    {
        // добавление модели в локальный массив
        array_push($this->array_db, $model);
        // добавление модели в базу данных
        $query = "INSERT INTO 	category (name) VALUES (:name)";
        $params = array(
            ':name' => $model->getName()
        );
        $result = $this->db->execute($query, $params);
        return $result;
    }

    public function deleteModel($id)
    {
        // удаление модели из массива
        $this->removeFromArray($this->findItem($id));
        // удаление модели из базы данных
        $query = "DELETE FROM category WHERE id=:id";
        $params = array(':id' => $id);
        $result = $this->db->execute($query, $params);
        return $result;
    }

    public function updateModel($id, $name)
    {
        // обновление модели в массиве
        $this->updateInArray($id, $name);

        // обновление модели в базе данных
        $query = "UPDATE user SET login=:login, password=:password WHERE id=:id";
        $params = array(
            ':id' => $id,
            ':login' => $login,
            ':password' => $password
        );
        $result = $this->db->execute($query, $params);
        return $result;
    }

    public function updatePremium($id, $premium)
    {
        // обновление модели в массиве
        $item = $this->findItem($id);
        $item->setPremium($premium);

        $this->updateInArray($item);
        // обновление модели в базе данных
        $query = "UPDATE user SET isPremium=:isPremium WHERE id=:id";
        $params = array(
            ':id' => $id,
            ':isPremium' => $premium
        );
        $result = $this->db->execute($query, $params);
        return $result;
    }

    public function select()
    {
        $sql_select = 'SELECT * FROM user';
        $res = $this->db->select($sql_select);
        foreach ($res as $iter) {
            echo '<div>' . $iter['id'] . ' - ' . $iter['login'] . ' - ' . $iter['password'] . ' - ' . $iter['isPremium'] . '</div>';
        }
    }

    public function printAll()
    {
        foreach ($this->array_db as $iter) {
            echo '<p>' . $iter . '</p>';
        }
    }
}
