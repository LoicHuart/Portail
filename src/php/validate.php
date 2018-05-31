<?php

/**
 * Created by PhpStorm.
 * User: Aiman
 * Date: 31/05/2018
 * Time: 19:40
 */
class validate
{

    private $var;

    public function __construct(){

    }

    public function CheckVar($myvar){

        $user = trim($myvar);
        $user1 = stripslashes($user);
        $user2 = htmlspecialchars($user1);

        if (preg_match("#^[a-z0-9]#i", $user2)){
            return $user2;
        }else{
            return "error";
        }



    }
}