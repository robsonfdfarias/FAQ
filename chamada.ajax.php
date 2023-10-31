<?php

    include_once("class/capacitacao.class.php");
    $objEventDay = new Capacitacao();
    $tipo = $_GET['tipo'];
    if($tipo=='eventDay'){
        $dia = $_GET['dia'];
        $mes = $_GET['mes'];
        $ano = $_GET['ano'];
        $objEventDay->getEventDay($dia.'/'.$mes.'/'.$ano);
    }else if($tipo=='calendar'){
        $mes = $_GET['mes'];
        $ano = $_GET['ano'];
        $objEventDay->getEventMonth($mes, $ano);
    }
    exit;

?>