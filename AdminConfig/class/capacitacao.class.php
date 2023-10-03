<?php

    class Capacitacao{
        function __construct(){
            include_once("conn.php");
            include_once("DB.class.php");
            DB::conn();
        }

        function agenda(){
            $obj = DB::conn()->prepare("SELECT * FROM agenda");
            /*try{
                $obj->execute(array($dt));
            }catch(PDOException $e){
                echo $e->getMessage();
            }*/
            if($obj->execute()){
                $rowNum = $obj->rowCount();
                if($rowNum>0){
                    echo '<table style="width:100%; padding: 10px;" id="tabCatMenuPage"><tr><td>Título</td><td colspan="2">Opções</td><td>Inscritos</td></tr>';
                    while($linha = $obj->fetchObject()){
                        echo '<tr><td>Evento: '.$linha->dtinicio.' à '.$linha->dtfim.'</td><td><a href="catEdit.php?id='.$linha->id.'" target="_blank"><img src="imgs/cat-edit.svg" height="30">EDITAR</a></td>
                            <td><a href="catDelete.php?id='.$linha->id.'" target="_blank"><img src="imgs/cat-delete.svg" height="30">EXCLUIR</a></td>
                            <td><a href="catDelete.php?id='.$linha->id.'" target="_blank"><img src="imgs/cat-delete.svg" height="30">INSCRITOS</a></td>
                            </tr>';
                    }
                    echo '</table>';
                }else{
                    echo "Sem evento nesse mês.";
                }
            }
        }


        function getEventById($id){
            $obj = DB::conn()->prepare("SELECT * FROM agenda WHERE id=?");
            if($obj->execute(array($id))){
                $rowNum = $obj->rowCount();
                if($rowNum>0){
                    $linha = $obj->fetchObject();
                    $vagasDisp = $linha->vagas-$linha->preenchido;
                    if($linha->certificado>0){
                        $cert = 'SIM';
                    }else{
                        $cert = 'NÃO';
                    }
                    echo '
                    <header id="titulo">Evento do período de '.$linha->dtinicio.' à '.$linha->dtfim.'</header>
                    <article>
                        <header id="data">Data da postagem: '.$linha->dtpost.'</header>
                        <header id="data">Total de vagas: <span id="catSpan"> '.$linha->vagas.'</span></header>
                        <header id="data">Vagas disponíveis: <span id="catSpan"> '.$vagasDisp.'</span></header>
                        <header id="data">Fornece certificado: <span id="catSpan"> '.$cert.'</span></header>
                        <p>'.$linha->texto.'</p>
                    </article>
                    <footer>
                        <p>
                ';

                if($vagasDisp>0){
                    echo '<br><div id="divFormInscGeral"><div id="divFormInsc"><h2>Formulario de inscrição para o evento</h2>
                    <form action="evento.submit.php" method="post" id="formInsc">
                        <table id="tabFormInsc"><tr>
                                <td>Nome:</td>
                                <td><input type="text" name="nome"></td>
                            </tr><tr>
                                <td>Secretaria/<br>local de trabalho:</td>
                                <td><input type="text" name="secretaria"></td>
                            </tr><tr>
                                <td>Matrícula:</td>
                                <td><input type="text" name="matricula"></td>
                            </tr><tr>
                                <td>E-mail:</td>
                                <td><input type="email" name="email"></td>
                            </tr><tr>
                                <td colspan="2">
                                <input type="hidden" name="idevento" value="'.$id.'">
                                <input type="submit" name="" value="Inscrever"></td>
                            </tr>
                        </table>
                    </form></div></div>
                    ';
                }else{
                    echo '<h3>Todas as vagas deste evento foram preenchidas</h3>';
                }

                echo '</p></footer>';
                }
            }
        }

        function getEventByIdObj($id){
            $objEvent = DB::conn()->prepare("SELECT * FROM agenda WHERE id=?");
            if($objEvent->execute(array($id))){
                $rowNum = $objEvent->rowCount();
                if($rowNum>0){
                    return $objEvent->fetchObject();
                }
            }
        }

        function updateVagaEvent($id){
            $obj = self::getEventByIdObj($id);
            //echo '->>>> '.$obj->texto.'<br>';
            if(get_object_vars($obj)){
                if(($obj->vagas-$obj->preenchido)>0){
                    $preenchido = $obj->preenchido+1;
                    $objUp = DB::conn()->prepare("UPDATE agenda SET preenchido=? WHERE id=?");
                    if($objUp->execute(array($preenchido, $id))){
                        $rowNum = $objUp->rowCount();
                        if($rowNum>0){
                            //echo 'Inscrição efetuada com sucesso!';
                            return true;
                        }
                    }else{
                        echo 'Erro no cadastro.';
                        return false;
                    }
                }else{
                    echo 'Infelizmente não temos mais vagas para esse evento. Mas não fique triste, em breve teremos mais eventos com vagas disponíveis.';
                    return false;
                }
            }else{
                echo 'Evento não encontrado!';
                return false;
            }
        }

    }

?>