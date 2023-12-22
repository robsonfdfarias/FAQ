<?php

class DB {
    private static $con;
    public function __construct(){}

    public static function conn(){
        if(is_null(self::$con)){
            try{
                self::$con = new PDO('mysql:host='.HOST.';dbname='.DB.'', USER, PASSWORD);
                self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        return self::$con;
    }
}


?>