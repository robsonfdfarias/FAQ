<!DOCTYPE html>
<html lang="en">

    <?php
        if(!empty($_GET['id'])){
            $idCat = $_GET['id'];
        }else{
            $idCat = 1;
        }
        //include_once("class/crud.artigo.class.php");
        //$obj2 = new CRUD();
        //$obj2->getArtByCat($idCat);
        include_once("class/crud.categoria.class.php");
        $objCat = new Categoria();
                        
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar categoria</title>
    <!--<script type="text/javascript" src="jquery/code.jquery.com_jquery-3.7.1.min.js">-->
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!-- <link rel="stylesheet" type="text/css" href="editorRobsonFarias.css" /> -->
    <link rel="stylesheet" type="text/css" href="AdminConfig/rffeditor/editorRobsonFarias.css" />
    <link rel="shortcut icon" href="imgs/logo_sei_93x60.ico" type="image/x-icon" />
    <meta property="og:image" content="">
    <meta property="og:title" content="Categoria">
    <meta property="article:author" content="Robson Farias (robsonfdfarias@gmail.com)">
    <meta name="description" content="<?php echo $objCat->getCatById($idCat); ?>">
    <meta name="author" content="Robson Farias - robsonfdfarias@gmail.com">
    <meta name="keywords" content="Categoria">
    <meta name="generator" content="Robson Farias (robsonfdfarias@gmail.com)">
    <meta name="robots" content="all">
    <meta name="revisit-after" content="1 day">
    <meta name="googlebot" content="all">
    <meta name="googlebot-news" content="all">
    <style>
    </style>
</head>
<body>
    <div id="geral">
            <?php include_once("menu.php"); ?>
            <?php include_once("top.php"); ?>
        <div id="central">
            

            <!--<div id="itemdois">
                <div id="centroItemDois" style="margin-top: 30px; width: 84%;">
                    <h3>Artigos recentes</h3><hr id="recentes"><br>
                </div>
            </div>-->

            <div id="itemdoisPergFreq" style="max-width: 1036px; padding: 0 32px;">
                <div id="centroItemDoisPergFreq" style="max-width: 100%; width: 100%;"> 
                    <?php
                    if(!empty($_GET['pesq']) and $_GET['pesq']!=''){
                        $idCat=$_GET['pesq'];
                    }
                    echo '<h2>'.$objCat->getCatById($idCat).'</h2>';
                        //$idCat = $_GET['id'];
                        if(!empty($_GET['pg']) and $_GET['pg']!='' and $_GET['pg']>0){
                            $pag=$_GET['pg'];
                        }else{
                            $pag=1;
                        }
                        $numReg=1;

                        include_once("class/crud.artigo.class.php");
                        $obj2 = new CRUD();
                        $obj2->getArticleForCategory($idCat, $pag, $numReg);
                    ?>
                </div>
            </div>
            <idv id="idcateg" style="display:none;"><?php echo $idCat; ?></div>

        </div>
    </div>
        <?php
            include_once("footer.php");
        ?>
        <script src="efeito.js"></script>
    <script type="text/javascript">
        var elemento = document.getElementById('top');
        var calcula = 260-elemento.clientHeight;
        calcula = calcula/2;
        console.log(calcula+" ---");
        elemento.style.paddingTop  = calcula + 'px';
        elemento.style.paddingBottom  = calcula + 'px';

        function menuSelect(valor){
            var idcateg = document.getElementById('idcateg');
            window.location.href = 'categoria.php?pesq='+idcateg.innerText+'&pg='+valor;
        }
    </script>
</body>
</html>