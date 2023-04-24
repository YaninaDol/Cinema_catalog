<?php


use Controllers\AbstractController;
use Objects\ListPersons;

require_once('db.php');
require_once('AbstractController.php');
require_once('Objects/ListPersons.php');

class ListPersonsController extends AbstractController
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
        $sql_select = 'SELECT * FROM list';
        $res = $this->db->select($sql_select);
        foreach ($res as $iter) {
            array_push($this->array_db, new ListPersons($iter['id'], $iter['filmId'],$iter['personId']));
        }
    }

    public function addModel($model)
    {

        // добавление модели в базу данных
        $query = "INSERT INTO 	list (filmId,personId) VALUES (:filmId,:personId)";
        $params = array(
            ':filmId' => $model->getFilmId(),
            ':personId' => $model->getPersonId()
        );
        $result = $this->db->execute($query, $params);

        // обновление  локального массива
        $this->fill();
        return $result;
    }

    public function deleteModel($id)
    {

        // удаление модели из базы данных
        $query = "DELETE FROM list WHERE id=:id";
        $params = array(':id' => $id);
        $result = $this->db->execute($query, $params);

        // обновление  локального массива
        $this->fill();
        return $result;
    }

    public function updateModel($id, $model)
    {

        // обновление модели в базе данных
        $query = "UPDATE list SET filmId=:filmId, personId=:personId WHERE id=:id";
        $params = array(
            ':id' => $id,
            ':filmId' => $model->getFilmId(),
            ':personId' => $model->getPersonId()
        );
        $result = $this->db->execute($query, $params);
        // обновление  локального массива
        $this->fill();

        return $result;
    }


    public function select()
    {
        $sql_select = 'SELECT * FROM list';
        $res = $this->db->select($sql_select);
        foreach ($res as $iter) {
            echo '<div>' . $iter['id'] . ' - ' . $iter['filmId'] . ' - ' . $iter['personId'] .'</div>';
        }
    }

    public function printAll()
    {
        foreach ($this->array_db as $iter) {
            echo '<p>' . $iter . '</p>';
        }
    }
}
