<?php
$pasta = '../imagens/';
$ano = date('Y');
$mes = date('m');
$dia = date('d');
$pasta .= $ano.'/'.$mes.'/'.$dia.'/';
echo $pasta;
mkdir($pasta, 0777, true);
?>