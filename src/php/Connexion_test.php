<?php
/**
 * Created by PhpStorm.
 * User: Aiman
 * Date: 29/05/2018
 * Time: 12:19
 */
class Connexion_test
{
    private $name;

    protected $db;

    public function __construct($dbb)
    {
        $this->db = $dbb;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function CheckConnexion($user1, $mdp1){

        $user = trim($user1);
        $user = stripslashes($user1);
        $user = htmlspecialchars($user1);

        $mdp = trim($mdp1);
        $mdp = stripslashes($mdp1);
        $mdp = htmlspecialchars($mdp1);

        //$mdp = hash("md5", $mdp); // activer si cryptage mdp

        $sql = 'SELECT * from `identifiants` where `user` = "'.$user.'" AND `mdp` = "'.$mdp.'"';

        $sql_temp = $this->db->query($sql);

        $sql_temp2 = $sql_temp->fetch();

        if ($sql_temp2 == false)
        {
            return 'k';
        }else{
            return 'ok';
        }
    }

    public function GetConnected(){
        $_SESSION['IsConnected'] = 1;
        $_SESSION['user'] = $this->name;
    }

    Public function GetDisconnected(){
        $_SESSION['IsConnected'] = 0;
        $_SESSION['user'] = "";
        session_destroy();

    }

    public function Inscription($user1, $mdp1){

        $user = trim($user1);
        $user = stripslashes($user);
        $user = htmlspecialchars($user);

        $mdp = trim($mdp1);
        $mdp = stripslashes($mdp);
        $mdp = htmlspecialchars($mdp);

       // if (preg_match("#^[a-z0-9._-]#i", $user)){}
        //$mdp = hash("md5", $mdp); // activer si cryptage mdp

        $sql_pre = "SELECT count(user) AS E FROM identifiants where user = '".$user."'";

        $sql_pre1 = $this->db->query($sql_pre);

        $sql_pre2 = $sql_pre1->fetch();

        if($sql_pre2["E"] == 0){

            $sql = 'INSERT INTO `identifiants` (`user`, `mdp`) VALUES ("'.$user.'","'.$mdp.'")';

            $sql_temp = $this->db->query($sql);

            return "ok";
        }else{
            return "notok";
        }



    }
}