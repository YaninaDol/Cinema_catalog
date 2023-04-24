<?php



require_once 'Controllers/FilmController.php';

//test UserController
//$test=new UserController();
//$test->printAll();
//$test->addModel(new \Objects\User('0','test','test'));
//$test->printAll();
//$test->deleteModel(9);
//$test->printAll();
//$test->updateModel(4,new \Objects\User('0','test','test'));
//$test->select();
//$test->printAll();

//test CategoryController
//$test=new CategoryController();
//$test->printAll();
//$test->addModel(new \Objects\Category('0','first'));
//$test->printAll();
//$test->deleteModel(4);
//$test->printAll();
//$test->updateModel(1,new \Objects\Category('0','test'));
//$test->select();
//$test->printAll();

//test RoleController
//$test=new RoleController();
//$test->printAll();
//$test->addModel(new \Objects\Role('0','first'));
//$test->printAll();
//$test->deleteModel(4);
//$test->printAll();
//$test->updateModel(1,new \Objects\Category('0','test'));
//$test->select();
//$test->printAll();
//test PersonController
//$test=new PersonController();
//$test->printAll();
//$test->addModel(new \Objects\Person('0','first','1'));
//$test->printAll();
//$test->deleteModel(4);
//$test->printAll();
//$test->updateModel(1,new \Objects\Category('0','test'));
//$test->select();
//$test->printAll();

//test ListPersonsController
//$test=new ListPersonsController();
//$test->printAll();
//$test->addModel(new \Objects\ListPersons('0',1,1));
//$test->printAll();
//$test->deleteModel(4);
//$test->printAll();
//$test->updateModel(1,new \Objects\Category('0','test'));
//$test->select();
//$test->printAll();

//test FilmController
$test=new FilmController();
//$test->printAll();
//$test->addModel(new \Objects\Film('0',' Test',1,7.0,'Germany',1,1,'about love'));
//$test->printAll();
//$test->deleteModel(4);
//$test->printAll();
$test->updateModel(1,new \Objects\Film('0','Test2',1,7.0,'Germany',1,1,'about love'));
$test->select();
$test->printAll();
