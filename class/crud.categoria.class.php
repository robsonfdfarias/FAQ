<?php

class Categoria{
    function __construct(){
        include_once("conn.php");
        include_once("DB.class.php");
        DB::conn();
    }

    function getCatById($id){
        $obj = DB::conn()->prepare("SELECT * FROM categoria WHERE id=?");
        if($obj->execute(array($id))){
            $numRow = $obj->rowCount();
            if($numRow>0){
                while($linha = $obj->fetchObject()){
                    return $linha->titulo;
                }
            }else{
                return "Nenhuma categoria com esse ID";
            }
        }else{
            return "Problema na conexão com a base de dados.";
        }
    }
}

?>