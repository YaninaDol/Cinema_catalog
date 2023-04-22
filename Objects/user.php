<?php
class User
{
    private $id;
    private $login;
    private $password;
    private $isPremium;

    public function __construct($login,$password)
    {
        $this->login=$login;
        $this->password=$password;
        $this->isPremium=0;
    }

    public function setPremium($isPremium)
    {
        $this->isPremium=$isPremium;
    }

}
