<?php

namespace db\Controllers;

use Database;
use db\Objects\User;

require_once('db/db.php');
require_once('AbstractController.php');
require_once('db/Models/User.php');

class UserController extends AbstractController
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
        $sql_select = 'SELECT * FROM user';
        $res = $this->db->select($sql_select);
        foreach ($res as $iter) {
            array_push($this->array_db, new User($iter['id'], $iter['login'], $iter['password']));
        }
    }

    public function addModel($model)
    {

        // добавление модели в базу данных
        $query = "INSERT INTO 	user (login, password,isPremium) VALUES (:login,:password, :isPremium)";
        $params = array(
            ':login' => $model->getLogin(),
            ':password' => $model->getPassword(),
            ':isPremium' => 0
        );
        $result = $this->db->execute($query, $params);

        // обновление  локального массива
        $this->fill();
        return $result;
    }

    public function deleteModel($id)
    {

        // удаление модели из базы данных
        $query = "DELETE FROM user WHERE id=:id";
        $params = array(':id' => $id);
        $result = $this->db->execute($query, $params);

        // обновление  локального массива
        $this->fill();
        return $result;
    }

    public function updateModel($id, $model)
    {
        // обновление модели в массиве
        $this->updateInArray($id, $model->getLogin(), $model->getPassword());

        // обновление модели в базе данных
        $query = "UPDATE user SET login=:login, password=:password WHERE id=:id";
        $params = array(
            ':id' => $id,
            ':login' => $model->getLogin(),
            ':password' => $model->getPassword()
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

