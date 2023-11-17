<?php

include_once("classe-teste.php");
$obj = new Teste();
$obj->lista();
echo "<br>";
include_once("crud.artigo.class.php");
$obj2 = new CRUD();
$obj2->selectPrioridades();
echo "<br>----------------";
//$obj2->findArticle("<script RObson <?php Ferreira union select de Farias INTO LOADFILE DIFERENTE");
//$obj2->findArticle("O bold equivale a nossa famosa tag");
$obj2->findArticle("Diferente");
echo "RRRRRR";

include_once("crud.categoria.class.php");
$objCat = new Categoria();
echo "Teste.....";
echo $objCat->getCatById(3);
echo "kkkkkk";
?>