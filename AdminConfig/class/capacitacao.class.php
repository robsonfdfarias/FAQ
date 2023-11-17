<?php

    class Capacitacao{
        function __construct(){
            include_once("conn.php");
            include_once("DB.class.php");
            DB::conn();
        }

        function agenda($pag, $numReg){
            $totReg = self::getTotalArticle("SELECT * FROM agenda", '');
            //echo $totReg;
            $verifyNumReg = ($pag*$numReg)-$numReg;
            //echo '<br>'.$verifyNumReg.'<br>';
            if($totReg<=$verifyNumReg){
                echo '<h1>Não existem registros nestá página.</h1>';
                return false;
            }
            try{
                $obj = DB::conn()->prepare("SELECT * FROM agenda ORDER BY id DESC LIMIT ".$verifyNumReg.",".$numReg." ");
                if($obj->execute()){
                    $rowNum = $obj->rowCount();
                    if($rowNum>0){
                        $pags = ceil($totReg/$numReg);
                        echo '
                            <div id="numreg" style="margin-bottom: 10px; display:none;">
                                Número de registros: '.$totReg.' | 
                                Número de páginas: '.$pags.' | 
                                Número de registro por página: '.$numReg.' | 
                                Página atual: '.$pag.' | 
                            </div>
                        ';
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
                        echo '<br>';
                        self::pagination($pags,$totReg,$pag,'');
                    }else{
                        echo "Sem evento nesse mês.";
                    }
                }
            }catch(PDOException $e){
                echo 'Erro: '.$e->getMessage();
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

        function insertEvent($titulo, $dtpost, $dtinicio, $dtfim, $texto, $vagas, $certificado, $horainicio, $horafim, $local){
            $objInsertEvent = DB::conn()->prepare("INSERT INTO agenda (titulo, dtpost, dtinicio, dtfim, texto, vagas, certificado, horainicio, horafim, localEvent) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            if($objInsertEvent->execute(array($titulo, $dtpost, $dtinicio, $dtfim, $texto, $vagas, $certificado, $horainicio, $horafim, $local))){
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

        /*********************************** PAGINAÇÃO INICIO ***************************************************/

    function pagination($pags,$totReg,$pag, $pesq){
        echo '
                <div id="paginacao" style="display: flex; justify-content: center; text-align: center; vertical-align: middle;">
                <div style="padding: 5px 0; margin-right: 7px;">Total '.$totReg.' itens</div>
                <div style="border-radius: 4px; display: flex; justify-content: center; text-align: center; vertical-align: middle; border:1px solid #dfdfdf; max-width:60%;">
            ';
            //BT Voltar
            if($pag>1){
                $pgPre = $pag-1;
                if($pesq!=''){
                    echo '<div id="pg" style="padding: 5px 10px; border-right:1px solid #dfdfdf; margin-right: 0px;"><a href="?pesq='.$pesq.'&pg='.$pgPre.'"><</a></div>';
                }else{
                    echo '<div id="pg" style="padding: 5px 10px; border-right:1px solid #dfdfdf; margin-right: 0px;"><a href="?pg='.$pgPre.'"><</a></div>';
                }
            }else{
                echo '<div id="pg" style="padding: 5px 10px; border:0px solid #dfdfdf; margin-right: 0px; color: #c8c8c8; background-color: #f2f2f2;"><</div>';
            }
            //Páginas
            echo '<div id="barraPg" style="display: flex; justify-content: center; text-align: center; vertical-align: middle; overflow-x: auto;">';
            $smaller = 1;
            $bigger = 5;
            $margin = 2;
            //$pags = 7;
            for($i=1; $i<=$pags; $i++){
                if($pags>($margin+$margin+1)){
                    
                    if($pag>$margin and $pag<=($pags-$margin)){
                        if(($i>=($pag-$margin)) and ($i <= ($pag+$margin)) ){
                            self::comparePag($i, $pag, $pesq);
                        }
                    }else if($pag<=$margin){
                        //self::comparePag($i, $pag);
                        if($i<6){
                            self::comparePag($i, $pag, $pesq);
                        }
                    }else if($pag>=($pags-$margin)){
                        if($i>($pags-5)){
                            self::comparePag($i, $pag, $pesq);
                        }
                        //self::comparePag($i, $pag);
                    }
                    //echo '<div id="pg" style="padding: 5px 10px; border-right:1px solid #dfdfdf; margin-right: 0px;"><a href="?pg='.$i.'">'.$i.'</a></div>';
                    
                }else{
                    self::comparePag($i, $pag, $pesq);
                }
            }
            echo '</div>';
            //BT Avançar
            if($pag<$pags){
                $pgPre = $pag+1;
                if($pesq!=''){
                    echo '<div id="pg" style="padding: 5px 10px; border-right:1px solid #dfdfdf; margin-right: 0px;"><a href="?pesq='.$pesq.'&pg='.$pgPre.'">></a></div>';
                }else{
                    echo '<div id="pg" style="padding: 5px 10px; border-right:1px solid #dfdfdf; margin-right: 0px;"><a href="?pg='.$pgPre.'">></a></div>';
                }
            }else{
                echo '<div id="pg" style="padding: 5px 10px; border:0px solid #dfdfdf; margin-right: 0px; color: #c8c8c8; background-color: #f2f2f2;">></div>';
            }
            echo '</div>';
            //Menu DropDown
            echo '
                <select id="pgsMenu" style="border: 1px solid #dfdfdf; background-color: #fff; font-size:1rem; margin-left: 7px; border-radius: 4px;" onchange="menuSelect(this.value)">
                    <option value="0" selected="selected" disabled="disabled">'.$pags.'/page</option>
                ';
                for($j=1;$j<=$pags;$j++){
                    echo '
                        <option value="'.$j.'">'.$j.'</option>
                    ';
                }
            echo '</select>';
            //
            echo '</div>';
            //echo '<div id="pg" style="display:none;">'.$pag.'</div>';
        
    }


    function getTotalArticle($sql, $dados){
        //$objTot = DB::conn()->prepare("SELECT * FROM artigo");
        $objTot = DB::conn()->prepare($sql);
        if(!empty($dados) && $dados!='' &&  $dados!=null){
            try{
                if($objTot->execute($dados)){
                    return $objTot->rowCount();
                }else{
                    return 0;
                }
            }catch(PDOException $e){
                echo 'ERRO: '.$e->getMessage();
            }
        }else{
            try{
                if($objTot->execute()){
                    return $objTot->rowCount();
                }else{
                    return 0;
                }
            }catch(PDOException $e){
                echo 'ERRO: '.$e->getMessage();
            }
        }
    }


    function comparePag($pag1, $pag2, $pes){
        if($pag1!=$pag2){
            //echo $pes.'-----';
            if($pes!=''){
                echo '<div id="pg" style="border-right:1px solid #dfdfdf; margin-right: 0px; vertical-align:middle;"><a href="?pesq='.$pes.'&pg='.$pag1.'"><div style="padding: 5px 10px; ">'.$pag1.'</div></a></div>';
            }else{
                echo '<div id="pg" style="border-right:1px solid #dfdfdf; margin-right: 0px; vertical-align:middle;"><a href="?pg='.$pag1.'"><div style="padding: 5px 10px; ">'.$pag1.'</div></a></div>';
            }
        }else{
            echo '<div id="pg" style="padding: 5px 10px; border-right:1px solid #dfdfdf; margin-right: 0px; background-color: #0c582c; color: #fff;">'.$pag1.'</div>';
        }
    }

    /*********************************** PAGINAÇÃO FIM ***************************************************/



    /*********************************** Calendário Eventos *************************************************/



    function getEventMonth($mes, $ano, $bt){
        $yearPrev = $ano-1;
        $yearNext = $ano+1;
        $monthPrev = $mes-1;
        $monthNext = $mes+1;
        /*if($mes<1){
            $monthPrev=11;
            $monthNext=1;
            $mes=12;
            $ano=$ano-1;
        }
        if($mes>12){
            $monthPrev=12;
            $monthNext=2;
            $mes=1;
            $ano=$ano+1;
        }*/
            if($monthPrev<1){
                $monthPrev=12;
            }
            if($monthNext>12){
                $monthNext=1;
            }
        if($bt==0){
            if($monthPrev==11){
                $ano-=1;
                $yearPrev-=1;
                $yearNext=$yearPrev+1;
            }
        }else if($bt==1){
            if($monthNext==2){
                $ano+=1;
                $yearNext=$ano+1;
                $yearPrev=$yearNext-1;
            }
        }
        
        $mesesExt = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
        $data = date('Y-m-d');
        $diaAtual = strftime('%e');
        $mesAtual = date('m');
        $anoAtual = date('Y');
        $semana=1;
        $testa=true;
        $pula=0;
        $first_of_month = gmmktime(0,0,0,$mes,1,$ano);
        $diaSemana = gmstrftime('%w', $first_of_month);
        //echo $diaSemana;
        echo '<div id="monthBody" style="">
                <div id="showMonth" style="">
                    <div id="btnsPrev">
                        <a id="" onclick="getMonthYear('.$yearPrev.', '.$mes.', 3)"><<</a>
                        <a id="btMonthPrev" onclick="getMonthYear('.$ano.', '.$monthPrev.', 0)"><</a>
                    </div>
                    <div id="monthYear">
                        '.$mesesExt[($mes-1)].' '.$ano.'
                    </div>
                    <div id="btnsNext">
                        <a id="btMonthNext" onclick="getMonthYear('.$ano.', '.$monthNext.', 1)">></a>
                        <a  onclick="getMonthYear('.$yearNext.', '.$mes.', 3)">>></a>
                    </div>
                </div>
            ';
        $dias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
        echo '
                <table id="calendar" width="100%">
                    <tr id="cabecalho"><td>Dom</td><td>Seg</td><td>Ter</td><td>Qua</td><td>Qui</td><td>Sex</td><td>Sab</td></tr>
                    <tr>
            ';
        for($dia = 1; $dia<=$dias; $dia++){
            while($testa){
                if($pula<$diaSemana){
                    echo '<td style="background-color: #fff;"></td>';
                    $pula++;
                    $semana++;
                }else{
                    $testa=false;
                }
            }
            if($semana>7){
                echo '</tr><tr>';
                $semana=1;
            }
            if($semana==1 || $semana==7){
                if($dia==$diaAtual && $mes==$mesAtual && $ano == $anoAtual){
                    echo '<td style="background-color:#fff;">'.$dia.'</td>';
                }else{
                    echo '<td style="">'.$dia.'</td>';
                }
            }else{
                echo self::linkCalDay($dia."/".$mes."/".$ano);
            }
            $semana++;
        }

        echo '</table>';
        //echo '<div style="padding:5px;">';
        //echo self::agenda($mes, $ano);
        //echo '</div>';
        $dd = date('d/m/Y');
        echo '<div id="divToday" onclick="getToday(\''.$dd.'\')">Hoje</div>';
        echo '</div>';
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
                    if(self::verifyDate($data)){
                        //return '<td class="clique" style="background-color: #ADFF2F; padding:0px;" title="Clique para saber mais" onclick="findEventDay(\''.$data.'\')"><a href="evento.php?dt='.$data.'"><div style="padding: 7px 0px;">'.$dt[0].'</div></a></td>';
                        return '<td class="clique" style="border:3px solid #ADFF2F; '.self::ifDay($data).'" title="Clique para saber mais" onclick="findEventDay(\''.$data.'\')">'.$dt[0].'</td>';
                    }else{
                        return '<td style="border:3px solid #ADFF2F; color:#000; '.self::ifDay($data).'" title="Esgotado o prazo de inscrição" onclick="findEventDay(\''.$data.'\')">'.$dt[0].'</td>';
                    }
                }else{
                    return '<td style="border:3px solid #ADFF2F; '.self::ifDay($data).'" title="Não há vagas disponíveis para essa capacitação" onclick="findEventDay(\''.$data.'\')">'.$dt[0].'</td>';
                }
            }else{
                return '<td style=" '.self::ifDay($data).'" onclick="findEventDay(\''.$data.'\')" title="Sem eventos para esse dia">'.$dt[0].'</td>';
            }
        }
    }

    function ifDay($data){
        $dataAtual = date("d/m/Y");
        if($data==$dataAtual){
            return 'background-color: #0C582C; color: #fff;';
        }else{
            return '';
        }
    }



    function getEventDay($data){
        $mesesExt = ['', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
        $dt = explode("/", $data);
        $obj = DB::conn()->prepare("SELECT * FROM agenda WHERE dtinicio=?");
        try{
            if($obj->execute(array($data))){
                $rows = $obj->rowCount();
                    echo '
                        <div id="generalDivEventDay" style="">
                            <div id="eventDayTitle">Eventos para '.$dt[0].' de '.$mesesExt[$dt[1]].' de '.$dt[2].'</div>
                    ';
                if($rows>0){
                    while($linha=$obj->fetchObject()){
                        if(self::testDayWithEvent($data)){
                            $local = substr($linha->localEvent, 0, 50).'... <div style="float:right;"><a href="editEvent.php?id='.$linha->id.'">
                            <img src="imgs/editar.svg" width="20" style="filter:invert(24%) sepia(100%) saturate(354%) hue-rotate(92deg) brightness(91%) contrast(100%);"></a> -></div>';
                        }else{
                            $local = $linha->localEvent;
                        }
                        echo '
                            <div id="divEventDayList" style="">
                                <div id="titleEventDayCurrent" style="font-weight: bold;">'.$linha->titulo.'</div>
                                <div id="descriptionEventDayCurrent">Local: '.$local.'</div>
                                <div id="timeEventDayCurrent">Horário: '.$linha->horainicio.' as '.$linha->horafim.'</div>
                            </div>
                        ';
                        /*echo '<tr><td><center>'.$linha->titulo.$quebra.' 
                                Evento: '.$linha->dtinicio.' à '.$linha->dtfim.'</center></td>
                                <td><a href="editEvent.php?id='.$linha->id.'" target="_blank"><img src="imgs/cat-edit.svg" height="30">EDITAR</a></td>
                                <td><a href="excluirEvent.php?id='.$linha->id.'" target="_blank"><img src="imgs/cat-delete.svg" height="30">EXCLUIR</a></td>
                                <td><a href="inscritos.php?id='.$linha->id.'" target="_blank"><img src="imgs/cat-delete.svg" height="30">INSCRITOS</a></td>
                                </tr>';*/
                    }
                }else{
                    echo '<strong>Nenhum evento para esse dia.</strong><br>';
                }
                    if(self::verifyDate($data)){
                        echo '<br><center><button id="insertArticle" onclick="newArticle()">+ Novo Evento</button></center>';
                    }
                    echo '</div>';
            }else{
                echo '<h3>Não foi possível fazer a pesquisa.</h3>';
            }
        }catch(PDOException $e){
            echo 'Erro: '.$e->getMessage();
        }
    }


    function testDayWithEvent($data){
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
                    if(self::verifyDate($data)){
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