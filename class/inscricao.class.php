<?php

    class Inscricao{
        function __construct(){
            include_once("conn.php");
            include_once("DB.class.php");
            include_once("capacitacao.class.php");
            DB::conn();
        }

        function insertInsc($nome, $secretaria, $matricula, $email, $idevento){
            $objCap = new Capacitacao();
            if($objCap->updateVagaEvent($idevento)){
                $obj = DB::conn()->prepare("INSERT INTO inscritos(nome, secretaria, matricula, email, idevento) values (?, ?, ?, ?, ?)");
                if($obj->execute(array($nome, $secretaria, $matricula, $email, $idevento))){
                    $rowNum = $obj->rowCount();
                    if($rowNum>0){
                        echo '<h4>Inscrição efetuada com sucesso!</h4>';
                    }
                }
            }else{
                echo '<h4>Não foi possível efetuar a inscrição!</h4>';
            }
        }

    }

?>