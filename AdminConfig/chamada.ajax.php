<?php

    include_once("class/capacitacao.class.php");
    $objEventDay = new Capacitacao();
    $tipo = $_GET['tipo'];
    if($tipo=='eventDay'){
        $dia = $_GET['dia'];
        $mes = $_GET['mes'];
        $ano = $_GET['ano'];
        // $objEventDay->getEventDay($dia.'/'.$mes.'/'.$ano);
        $objEventDay->getEventDay($ano.'-'.$mes.'-'.$dia);
    }else if($tipo=='calendar'){
        
        $mes = $_GET['mes'];
        $ano = $_GET['ano'];
        $bt=$_GET['bt'];
        $tipo=$_GET['am'];
        // echo $bt;
        $objEventDay->getEventMonth($mes, $ano, $bt, $tipo);
    }
    exit;

?>