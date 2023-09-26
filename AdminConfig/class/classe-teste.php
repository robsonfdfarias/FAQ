<?php

class Teste{
    function __construct(){
        include_once("conn.php");
        include_once("DB.class.php");
        DB::conn();
    }

    function lista(){
        $obj = DB::conn()->prepare("SELECT * FROM artigo");
        $resultado = $obj->execute();
        if($resultado){
            while($linha=$obj->fetchObject()){
                echo $linha->titulo."<br>".$linha->resumo."<br>".$linha->conteudo."<br>".$linha->tags."<br>".$linha->img."<br>".$linha->prioridade."<br>";
            }
        }else{
            echo "Erro ao executar";
        }
    }
}

?>