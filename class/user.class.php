<?php

class User{
    function __construct(){
        include_once('conn.php');
        include_once('DB.class.php');
        DB::conn();
    }

    function getUserNameById($id){
        $obj = DB::conn()->prepare("SELECT * FROM usuarios WHERE id=?");
        if($obj->execute(array($id))){
            $user = $obj->fetchObject();
            return $user->nome;
        }
    }
}

?>