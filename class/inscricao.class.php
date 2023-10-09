<?php

    class Inscricao{
        function __construct(){
            include_once("conn.php");
            include_once("DB.class.php");
            include_once("capacitacao.class.php");
            include_once("AdminConfig/class/limpa.variavel.class.php");
            DB::conn();
        }

        function insertInsc($nome, $secretaria, $matricula, $email, $idevento){
            $limpa = new LimpaVar();
            $nome = $limpa->limpa($nome);
            $secretaria = $limpa->limpa($secretaria);
            $matricula = $limpa->limpa($matricula);
            $email = $limpa->limpa($email);
            $idevento = $limpa->limpa($idevento);
            $objCap = new Capacitacao();
            if(self::checkedMatDuplicateEvent($matricula, $idevento)){
                echo 'Servidor já matriculado nessa Capacitação. Só é permitido uma matrícula por servidor!';
            }else{
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

        function checkedEmailDuplicateEvent($email, $idEvent){
            $objDupl = DB::conn()->prepare("SELECT * FROM inscritos WHERE id=? and email=?");
            if($objDupl->execute(array($idEvent, $email))){
                $rn = $objDupl->rowCount();
                if($rn>0){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        function checkedMatDuplicateEvent($matricula, $idEvent){
            $objDupl = DB::conn()->prepare("SELECT * FROM inscritos WHERE id=? and matricula=?");
            if($objDupl->execute(array($idEvent, $matricula))){
                $rn = $objDupl->rowCount();
                if($rn>0){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        

    }

?>