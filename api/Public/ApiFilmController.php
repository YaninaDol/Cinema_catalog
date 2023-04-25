<?php

use db\Objects\Film;
use db\Controllers\FilmController;
use db\Controllers\PersonController;
use db\Controllers\ListPersonsController;
require_once (__DIR__.'/../../db/Controllers/FilmController.php');
require_once (__DIR__.'/../../db/Controllers/PersonController.php');
require_once (__DIR__.'/../../db/Controllers/ListPersonsController.php');

$filmController=new  FilmController();
$personController=new  PersonController();
$personsController=new  ListPersonsController();



if($_SERVER["REQUEST_METHOD"] == 'GET'){
    if(isset($_GET['getByAuthor']))
    {
        $author = $personController->getByName($_GET['getByAuthor']);

            $select_item = $personsController->getByAuthor($author->getId());


        $films=$filmController->findFilmsById($select_item);
        foreach ($films as $iter) {
            echo '<p>' . $iter . '</p>';
        }
        $json=json_encode($films);
        echo $json;
    }
    else
        echo 'Statuscode 400';
}


