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
                    echo '<table style="width:100%; padding: 10px;" id="tabCatMenuPage"><tr><td width="50%">Título</td><td colspan="2">Opções</td><td>Inscritos</td></tr>';
                    while($linha = $obj->fetchObject()){
                        if($linha->titulo!=null && $linha->titulo!=''){
                            $quebra = '<br>';
                        }else{
                            $quebra = '';
                        }
                        echo '<tr><td><center>'.$linha->titulo.$quebra.' 
                            Evento: '.$linha->dtinicio.' à '.$linha->dtfim.'</center></td>
                            <td><a href="editEvent.php?id='.$linha->id.'" target="_blank"><img src="imgs/cat-edit.svg" height="30">EDITAR</a></td>
                            <td><a href="excluirEvent.php?id='.$linha->id.'" target="_blank"><img src="imgs/cat-delete.svg" height="30">EXCLUIR</a></td>
                            <td><a href="inscritos.php?id='.$linha->id.'" target="_blank"><img src="imgs/cat-delete.svg" height="30">INSCRITOS</a></td>
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
                            //echo 'Alteração efetuada com sucesso!';
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

        function insertEvent($titulo, $dtpost, $dtinicio, $dtfim, $texto, $vagas, $certificado, $horainicio, $horafim){
            $objInsertEvent = DB::conn()->prepare("INSERT INTO agenda (titulo, dtpost, dtinicio, dtfim, texto, vagas, certificado, horainicio, horafim) values (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            if($objInsertEvent->execute(array($titulo, $dtpost, $dtinicio, $dtfim, $texto, $vagas, $certificado, $horainicio, $horafim))){
                $rnum = $objInsertEvent->rowCount();
                if($rnum>0){
                    echo '<h3>Evento inserido com sucesso</h3>';
                }else{
                    echo '<h3>Falha ao inserir o evento. Por favor, tente novamente mais tarde.</h3>';
                }
            }else{
                echo '<h3>Erro interno. Contate o administrador.</h3>';
            }
        }

        function deleteEvent($id){
            $objDel = DB::conn()->prepare("DELETE FROM agenda WHERE id=?");
            if($objDel->execute(array($id))){
                $numRow = $objDel->rowCount();
                if($numRow>0){
                    echo '<h3>Evento excluído com sucesso!</h3>';
                }else{
                    echo '<h3>Não foi possível excluir o evento!</h3>';
                }
            }else{
                echo '<h3>Erro interno.</h3>';
            }
        }

        function getEventByIdJson($id){
            $objJson = DB::conn()->prepare("SELECT * FROM agenda WHERE id=?");
            if($objJson->execute(array($id))){
                $numRowJson = $objJson->rowCount();
                if($numRowJson>0){
                    return $objJson->fetchObject();
                }else{
                    return null;
                }
            }else{
                return null;
            }
        }



        function updateEvent($titulo, $dtpost, $dtinicio, $dtfim, $texto, $vagas, $certificado, $horainicio, $horafim, $id){
            $objUp = DB::conn()->prepare("UPDATE agenda SET titulo=?, dtpost=?, dtinicio=?, dtfim=?, texto=?, vagas=?, certificado=?, horainicio=?, horafim=? WHERE id=?");
            if($objUp->execute(array($titulo, $dtpost, $dtinicio, $dtfim, $texto, $vagas, $certificado, $horainicio, $horafim, $id))){
                $rowNum = $objUp->rowCount();
                if($rowNum>0){
                    echo '<h3>Alteração efetuada com sucesso!</h3>';
                }else{
                    echo '<h3>Não foi encontrado nenhum evento com esse identificador!</h3>';
                }
            }else{
                echo '<h3>Erro na alteração.</h3>';
            }
        }

    }

?>