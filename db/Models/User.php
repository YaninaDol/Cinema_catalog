<?php

namespace db\Objects;
class User
{
    private $id;
    private $login;
    private $password;
    private $isPremium;

    public function __construct($id, $login, $password)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->isPremium = 0;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setPremium($isPremium)
    {
        $this->isPremium = $isPremium;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getPremium()
    {
        return $this->isPremium;
    }

    public function isCompare($item)
    {
        if ($this->login === $item->getLogin() && $this->password === $item->getPassword()) {
            return true;
        } else return false;
    }

    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return 'Id:'.$this->id .'Login:' . $this->login . ' Password: ' . $this->password . ' isPremium: ' . $this->isPremium;
    }
}
