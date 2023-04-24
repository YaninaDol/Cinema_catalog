<?php

namespace db\Controllers;

use Database;
use db\Objects\Film;

require_once('db/db.php');
require_once('AbstractController.php');
require_once('db/Models/Film.php');

class FilmController extends AbstractController
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
        $sql_select = 'SELECT * FROM film';
        $res = $this->db->select($sql_select);
        foreach ($res as $iter) {
            array_push($this->array_db, new Film($iter['id'], $iter['name'], $iter['category'], $iter['imdb'], $iter['country'], $iter['isPopular'], $iter['isPremium'], $iter['subscribe']));
        }
    }

    public function addModel($model)
    {

        // добавление модели в базу данных
        $query = "INSERT INTO film ( name,category,imdb,country,isPopular,isPremium,subscribe) VALUES (:name, :category, :imdb, :country, :isPopular, :isPremium, :subscribe)";
        $params = array(
            ':name' => $model->getName(),
            ':category' => $model->getCategoryId(),
            ':imdb' => $model->getImdb(),
            ':country' => $model->getCountry(),
            ':isPopular' => $model->getisPopular(),
            ':isPremium' => $model->getisPremium(),
            ':subscribe' => $model->getSubscribe()

        );
        $result = $this->db->execute($query, $params);

        // обновление  локального массива
        $this->fill();
        return $result;
    }

    public function deleteModel($id)
    {

        // удаление модели из базы данных
        $query = "DELETE FROM film WHERE id=:id";
        $params = array(':id' => $id);
        $result = $this->db->execute($query, $params);

        // обновление  локального массива
        $this->fill();
        return $result;
    }

    public function updateModel($id, $model)
    {

        // обновление модели в базе данных
        $query = "UPDATE film SET name=:name, category=:category, imdb=:imdb,country=:country,isPopular=:isPopular,isPremium=:isPremium,subscribe=:subscribe WHERE id=:id";
        $params = array(
            ':id' => $id,
            ':name' => $model->getName(),
            ':category' => $model->getCategoryId(),
            ':imdb' => $model->getImdb(),
            ':country' => $model->getCountry(),
            ':isPopular' => $model->getisPopular(),
            ':isPremium' => $model->getisPremium(),
            ':subscribe' => $model->getSubscribe()
        );
        $result = $this->db->execute($query, $params);
        // обновление  локального массива
        $this->fill();
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
        $sql_select = 'SELECT * FROM film';
        $res = $this->db->select($sql_select);
        foreach ($res as $iter) {
            echo '<div>' . $iter['id'] . ' - ' . $iter['name'] . ' - ' . $iter['category'] . ' - ' . $iter['imdb'] . ' - ' . $iter['country'] . ' - ' . $iter['isPopular'] . ' - ' . $iter['isPremium'] . ' - ' . $iter['subscribe'] . '</div>';
        }
    }

    public function printAll()
    {
        foreach ($this->array_db as $iter) {
            echo '<p>' . $iter . '</p>';
        }
    }
}

