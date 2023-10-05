<?php

    class Capacitacao{
        function __construct(){
            include_once("conn.php");
            include_once("DB.class.php");
            DB::conn();
        }
        function nextEvent(){
            $mesesExt = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
            $data = date('Y-m-d');
            $diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado');
            //echo strftime('%e'); // dia atual em número
            //echo '<br>'.date('w', strtotime($data)); // dia atual em número
            $diasemana_numero = date('w', strtotime($data));
            //echo $diasemana[$diasemana_numero];
            $diaAtual = strftime('%e');
            $mesAtual = date('m');
            $anoAtual = date("Y");
            $semana=1;
            $testa=true;
            $pula=0;
            for($meses=0; $meses<12; $meses++){
                $first_of_month = gmmktime(0,0,0,($meses+1),1,$anoAtual);
                $diaSemana = gmstrftime('%w', $first_of_month);
                //echo '<h1>'.$diaSemana.'</h1>';
                echo '<div id="meses"><h3>'.$mesesExt[$meses].'</h3>';
                $dias = cal_days_in_month(CAL_GREGORIAN, ($meses+1), $anoAtual);
                echo '<table id="calendario"><tr id="cabecalho"><td>Dom</td><td>Seg</td><td>Ter</td><td>Qua</td><td>Qui</td><td>Sex</td><td>Sáb</td></tr>';
                echo '<tr>';
                for($dia=0; $dia<$dias; $dia++){
                    /*for($pula=0; $pula<$diaSemana; $pula++){
                        echo '<td></td>';
                    }*/
                    while($testa){
                        if($pula < $diaSemana){
                            echo '<td style="border:0px solid #000;"></td>';
                            $pula++;
                        }else{
                            $testa=false;
                        }
                    }
                    if($semana>7){
                        echo "<tr></tr>";
                        $semana=1;
                    }
                    if($semana==1 || $semana==7){
                        echo '<td style="background-color:	#98FB98; color: #000;">'.($dia+1).'</td>';
                    }else{
                        echo '<td>'.($dia+1).'</td>';
                    }
                    $semana++;
                }
                $pula=0;
                $testa=true;
                echo '</table>';
                    echo '<div style="padding:5px;">';
                    echo self::agenda(($meses+1), $anoAtual);
                    echo '</div>';
                echo '</div>';
            }
        }

        function agenda($mes, $ano){
            $dt = "%/".$mes."/".$ano;
            $obj = DB::conn()->prepare("SELECT * FROM agenda WHERE dtinicio LIKE ?");
            /*try{
                $obj->execute(array($dt));
            }catch(PDOException $e){
                echo $e->getMessage();
            }*/
            if($obj->execute(array($dt))){
                $rowNum = $obj->rowCount();
                if($rowNum>0){
                    while($linha = $obj->fetchObject()){
                        echo '<a href="evento.php?id='.$linha->id.'">Evento: '.$linha->dtinicio.' à '.$linha->dtfim.'</a><br>';
                    }
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
                        <p>'.str_replace("../", "", $linha->texto).'</p>
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