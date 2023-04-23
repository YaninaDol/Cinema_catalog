<?php

use Controllers\UserController;

require_once 'Controllers/UserController.php';
require_once 'Objects/User.php';

$test=new UserController();
$test->updateModel(4,'test8','test8');
$test->select();


$test->printAll();
