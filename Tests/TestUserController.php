<?php
class TestUserController
{
    public function testLogin($login)
    {

        if(strlen($login)>3 && strlen($login)<33 )
        {
            return true;
        }

        return false;
    }
    public function testPassword($pass)
    {

        if(strlen($pass)>3 && strlen($pass)<33 )
        {
            return true;
        }

        return false;
    }

}