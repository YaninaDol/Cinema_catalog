<?php
require_once 'Controllers/userController.php';
require_once 'Objects/user.php';

$test=new userController();
$test->updateModel(4,'test8','test8');
$test->select();


$test->printAll();
