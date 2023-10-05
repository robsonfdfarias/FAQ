<?php

    class Inscritos{

        function __construct(){
            include_once("conn.php");
            include_once("DB.class.php");
            include_once("capacitacao.class.php");
            include_once("limpa.variavel.class.php");
            DB::conn();
        }

        function getInscForEvent($idEvent){
            $limpa = new LimpaVar();
            $id = $limpa->limpa($idEvent);
            $objEvent = DB::conn()->prepare("SELECT * FROM agenda WHERE id=?");
            if($objEvent->execute(array($id))){
                $rowNumEv = $objEvent->rowCount();
                if($rowNumEv>0){
                    $event = $objEvent->fetchObject();
                    $obj = DB::conn()->prepare("SELECT * FROM inscritos WHERE idevento=?");
                    if($obj->execute(array($id))){
                        $rowNum = $obj->rowCount();
                        if($rowNum>0){
                            echo '
                            <header id="titulo">Evento do período de '.$event->dtinicio.' à '.$event->dtfim.'</header>
                            <article>
                                <header id="data">Data do evento: '.$event->dtpost.'</header>
                                <h3>Inscritos:</h3>';
                                echo '<table id="tabInscForEvent"><tr><td>Nome</td><td>Secretaria/<br>Local de trabalho</td><td>Matrícula</td><td>E-mail</td></tr>';
                            while($linha = $obj->fetchObject()){
                                echo '<tr>
                                    <td>'.$linha->nome.'</td>
                                    <td>'.$linha->secretaria.'</td>
                                    <td>'.$linha->matricula.'</td>
                                    <td>'.$linha->email.'</td>
                                </tr>';
                            }
                            echo '</table></article>';
                        }else{
                            echo 'Não há inscrições para esse evento!';
                        }
                    }else{
                        echo 'Erro na consulta dos inscritos!';
                    }
                }else{
                    echo 'Evento não encontrado!';
                }
            }else{
                echo 'Ocorreu um erro na pesquisa...';
            }
            
        }

    }


?>