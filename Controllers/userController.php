<?php

require_once('db.php');
include 'controller.php';
class userController extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
        parent::__construct();
    }

    public function addModel($model)
    {
        // добавление модели в локальный массив
        array_push($this->array_db,$model);
        // добавление модели в базу данных
        $query = "INSERT INTO 	user (login, password,isPremium) VALUES (:login,:password, :isPremium)";
        $params = array(
            ':login' => $model->getLogin(),
            ':password' => $model->getPassword(),
            ':isPremium' => $model->getIsPremium()
        );
        $result = $this->db->execute($query, $params);
        return $result;
    }

    public function deleteModel($id)
    {
        // удаление модели из массива
        $this->removeFromArray($this->findItem($id));
        // удаление модели из базы данных
        $query = "DELETE FROM user WHERE id=:id";
        $params = array(':id' => $id);
        $result = $this->db->execute($query, $params);
        return $result;
    }

    public function updateModel($model) {
        // обновление модели в массиве
        $this->updateInArray($model);

        // обновление модели в базе данных
        $query = "UPDATE user SET login=:login, password=:password WHERE id=:id";
        $params = array(
            ':id' => $model->getId(),
            ':login' => $model->getLogin(),
            ':password' => $model->getPassword()
        );
        $result = $this->db->execute($query, $params);
        return $result;
    }

    public function updatePremium($id,$premium)
    {
        // обновление модели в массиве
     $item=$this->findItem($id);
     $item->setPremium($premium) ;

        $this->updateInArray($item);
        // обновление модели в базе данных
        $query = "UPDATE user SET isPremium=:isPremium WHERE id=:id";
        $params = array(
            ':id' =>$id,
            ':isPremium' => $premium
        );
        $result = $this->db->execute($query, $params);
        return $result;
    }
}

