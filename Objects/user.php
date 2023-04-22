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
       if($this->login===$item->getLogin() && $this->password===$item->getPassword())
       {
           return true;
       }
       else false;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    public function __toString()
    {
       return 'Login:'.$this->login.' Password: '.$this->password.' isPremium: '.$this->isPremium;
    }
}
