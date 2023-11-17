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
            for($meses=0; $meses<=12; $meses++){
                $first_of_month = gmmktime(0,0,0,($meses+1),1,$anoAtual);
                $diaSemana = gmstrftime('%w', $first_of_month);
                //echo '<h1>'.$diaSemana.'</h1>';
                echo '<div id="meses"><h3>'.$mesesExt[$meses].'</h3>';
                $dias = cal_days_in_month(CAL_GREGORIAN, ($meses+1), $anoAtual);
                echo '<table><tr><td>Dom</td><td>Seg</td><td>Ter</td><td>Qua</td><td>Qui</td><td>Sex</td><td>Sáb</td></tr>';
                echo '<tr>';
                for($dia=0; $dia<$dias; $dia++){
                    /*for($pula=0; $pula<$diaSemana; $pula++){
                        echo '<td></td>';
                    }*/
                    while($testa){
                        if($pula < $diaSemana){
                            echo '<td></td>';
                            $pula++;
                        }else{
                            $testa=false;
                        }
                    }
                    if($semana>7){
                        echo "<tr></tr>";
                        $semana=1;
                    }
                    echo '<td>'.($dia+1).'</td>';
                    $semana++;
                }
                $pula=0;
                $testa=true;
                echo '</table>';
                echo '</div>';
            }
        }
    }

?>