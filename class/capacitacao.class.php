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
                        //self::compara(($dia+1)."/".($meses+1)."/".$anoAtual, ($dia+1)."/".($meses+1)."/".$anoAtual)
                        /*echo '<td style="background-color:	#98FB98; color: #000;">'.
                        self::linkCalDay(($dia+1)."/".($meses+1)."/".$anoAtual).
                        '</td>';*/
                        
                    }else{
                        //echo '<td>'.($dia+1).'</td>';
                        echo self::linkCalDay(($dia+1)."/".($meses+1)."/".$anoAtual);
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
                    $dt = '';
                    while($linha = $obj->fetchObject()){
                        //echo '<a href="evento.php?id='.$linha->id.'">Evento: '.$linha->dtinicio.' à '.$linha->dtfim.'</a><br>';
                        $status = $linha->vagas-$linha->preenchido;
                        if($dt!=$linha->dtinicio){
                            if($linha->dtinicio!=$linha->dtfim){
                                if($status>0){
                                    if(self::verifyDate($linha->dtinicio)){
                                        echo '<a href="evento.php?dt='.$linha->dtinicio.'">Evento: '.$linha->dtinicio.' à '.$linha->dtfim.'</a><br>';
                                    }else{
                                        echo 'Evento: '.$linha->dtinicio.' à '.$linha->dtfim.' (Passou da data)<br>';
                                    }
                                }else{
                                    echo 'Evento: '.$linha->dtinicio.' à '.$linha->dtfim.' (Sem vagas)<br>';
                                }
                            }else{
                                if($status>0){
                                    if(self::verifyDate($linha->dtinicio)){
                                        echo '<a href="evento.php?dt='.$linha->dtinicio.'">Evento do dia '.$linha->dtinicio.'</a><br>';
                                    }else{
                                        echo 'Evento do dia '.$linha->dtinicio.' (Passou da data)<br>';
                                    }
                                    
                                }else{
                                    echo 'Evento do dia '.$linha->dtinicio.' (Sem vagas)<br>';
                                }
                                
                            }
                        }
                        $dt = $linha->dtinicio;
                    }
                }else{
                    echo "Sem evento nesse mês.";
                }
            }
        }

        function linkCalDay($data){
            $dt = explode("/", $data);
            $dias = ["0", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18",
                    "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"];
            $data = $dias[$dt[0]].'/'.$dt[1].'/'.$dt[2];
            $obj = DB::conn()->prepare("SELECT * FROM agenda WHERE dtinicio=?");
            if($obj->execute(array($data))){
                $rowNum = $obj->rowCount();
                if($rowNum>0){
                    $linha = $obj->fetchObject();
                    $vg = $linha->vagas - $linha->preenchido;
                    if($vg>0){
                        return '<td style="background-color: #ADFF2F;" title="Clique para saber mais"><a href="evento.php?dt='.$data.'">'.$dt[0].'</a></td>';
                    }else{
                        return '<td style="background-color: #ADFF2F;" title="Não há vagas disponíveis para essa capacitação">'.$dt[0].'</td>';
                    }
                }else{
                    return '<td>'.$dt[0].'</td>';
                }
            }
        }

        function compara($databanco, $dataCal){
            $dt = explode("/", $dataCal);
            if(strcmp($databanco, $dataCal)==0){
                return '<a href="evento.php?dt='.$dataCal.'">'.$dt[0].'</a>';
            }else{
                return $dt[0];
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

        
        function getEventForDate($dt){
            $objGetDate = DB::conn()->prepare("SELECT * FROM agenda WHERE dtinicio=?");
            if($objGetDate->execute(array($dt))){
                $nr = $objGetDate->rowCount();
                if($nr>0){
                    $op = array();
                    while($linha = $objGetDate->fetchObject()){
                        $vagasDisp = $linha->vagas-$linha->preenchido;
                        if($vagasDisp>0){
                            $vag = $vagasDisp;
                            $o = [$linha->titulo.' - '.$linha->horainicio, $linha->id];
                            array_push($op, $o);
                        }else{
                            $vag = '<strong>Todas as vagas para essa turma estão preenchidas.</strong>';
                        }
                        if($linha->certificado>0){
                            $cert = 'SIM';
                        }else{
                            $cert = 'NÃO';
                        }
                        echo '
                            <h2>Turma da hora: '.$linha->horainicio.'</h2>
                            <article>
                                <header id="data">Data da postagem: '.$linha->dtpost.'</header>
                                <header id="data">Total de vagas: <span id="catSpan"> '.$linha->vagas.'</span></header>
                                <header id="data">Vagas disponíveis: <span id="catSpan"> '.$vag.'</span></header>
                                <header id="data">Fornece certificado: <span id="catSpan"> '.$cert.'</span></header>
                                <p>'.str_replace("../", "", $linha->texto).'</p>
                            </article>
                        ';
                    }
                    if(!empty($op)){
                        //echo '<h2>Não está vazio</h2>';
                        //print_r($op);
                        echo '<br><div id="divFormInscGeral"><div id="divFormInsc"><h2>Formulario de inscrição para o evento</h2>
                            <form action="evento.submit.php" method="post" id="formInsc">
                                <table id="tabFormInsc">
                                    <tr>
                                        <td>Selecione a capacitação e a turma:</td>
                                            <td>
                                                <select name="idevento" id="idevento" required>';
                                                    
                                                for($i=0; $i<count($op); $i++){
                                                    echo '<option value="'.$op[$i][1].'">'.$op[$i][0].'</option>';
                                                }
                        echo '                        </selected>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td>Nome:</td>
                                        <td><input type="text" name="nome" required></td>
                                    </tr><tr>
                                        <td>Secretaria/<br>local de trabalho:</td>
                                        <td><input type="text" name="secretaria" required></td>
                                    </tr><tr>
                                        <td>Matrícula:</td>
                                        <td><input type="text" name="matricula" required></td>
                                    </tr><tr>
                                        <td>E-mail:</td>
                                        <td><input type="email" name="email" required></td>
                                    </tr><tr>
                                        <td colspan="2">
                                        <input type="submit" name="" value="Inscrever"></td>
                                    </tr>
                                </table>
                            </form></div></div>
                            ';
                    }
                }else{
                    echo '<h3>Sem eventos para essa data</h3>';
                }
            }
        }

        function verifyDate($date){
            $dt = explode("/", $date);
            $dataAtual = date("d/m/Y");
            $dtAtual = explode("/", $dataAtual);
            if($dtAtual[2]<$dt[2]){
                return true;
            }else if($dtAtual[2]==$dt[2]){
                if($dtAtual[1]<$dt[1]){
                    return true;
                }else if($dtAtual[1]==$dt[1]){
                    if($dtAtual[0]<=$dt[0]){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

    } 

?>