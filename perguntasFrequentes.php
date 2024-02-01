<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perguntas frequentes</title>
    <!--<script type="text/javascript" src="jquery/code.jquery.com_jquery-3.7.1.min.js">-->
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!-- <link rel="stylesheet" type="text/css" href="editorRobsonFarias.css" /> -->
    <link rel="stylesheet" type="text/css" href="AdminConfig/rffeditor/editorRobsonFarias.css" />
    <link rel="shortcut icon" href="imgs/logo_sei_93x60.ico" type="image/x-icon" />
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
    <meta property="og:title" content="Perguntas Frequentes">
    <meta property="og:image" content="">
    <meta property="article:author" content="Robson Farias (robsonfdfarias@gmail.com)">
    <meta name="description" content="Aqui você encontrará a resposta as perguntas mais comuns e outras mais específicas.">
    <meta name="author" content="Robson Farias - robsonfdfarias@gmail.com">
    <meta name="keywords" content="Perguntas Frequentes">
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
                <?php

                    include_once("class/crud.artigo.class.php");
                    $obj2 = new CRUD();
                    //$obj2->selectPrioridades();

                ?>

            <div id="itemdoisPergFreq">
                <div id="categoriaPergFreq" style="display: block; width: 222px;">
                    <span id="tituloAcessoRapido"><strong>Categorias</strong></span><br>
                    <?php
                        include_once("class/crud.categoria.class.php");
                        $objCat = new Categoria();
                        $objCat->getCatBlock();
                    ?>
                </div>
                <div id="centroItemDoisPergFreq" style=""> 
                    <?php
                        //$obj2->selectArtigos();
                        //$pg = $_GET['pg'];
                        //if(empty($pg) && $pg==0){
                        //    $pg=1;
                        //}

                        
                        $pg = 1;
                        if(empty($_GET['pg'])){
                            $pg=1;
                        }else{
                            $pg=$_GET['pg'];
                        }
                        $k=1;
                        $obj2->getAllArticlePergGreq($pg, $k);
                    ?>
                </div>
                
            </div>
        </div>
    </div>
        <?php
            include_once("footer.php");
        ?>
        <script src="efeito.js"></script>
    <script>
        /*function func(){
            var tt = document.getElementsByClassName("titleArticle")
            for(i=0; i<tt.length; i++){
                var obj = document.getElementById("titleArticle_"+i);
                console.log(obj)
                obj.addEventListener("click", function(){
                    alert("nnn-"+obj.id);
                });
            }
        }
        //func();
        function abre(ob){
            //alert(ob.id)
            var child = ob.children[0];
            //alert(child.innerHTML);
            var father = ob.parentElement;
            //alert(father.id);
            var conteudo = father.children[1]
            //alert(conteudo.id)
            var img = ob.children[2].children[0];
            //alert(img.id)
            if(child.innerHTML=="false"){
                conteudo.setAttribute("style", "display:block; transition: ease-in 1s;");
                child.innerHTML = "true";
                ob.setAttribute("style", "background-color: #c1ffe2; color: #0c582c; font-weight: 700; transition: ease-in 0.5s;")
                img.setAttribute("src", "imgs/angulo-para-cima.svg")
                img.setAttribute("alt", "Seta indicando para fechar a visualização do conteudo")
            }else{
                conteudo.setAttribute("style", "display:none; transition: ease-in 1s;");
                child.innerHTML = "false";
                ob.setAttribute("style", "background-color: #fff; color: #000; font-weight: 400; transition: ease-in 0.5s;")
                img.setAttribute("src", "imgs/angulo-para-baixo.svg")
                img.setAttribute("alt", "Seta indicando para abrir a visualização do conteudo")
            }
        }*/
        function menuSelect(valor){
            window.location.href = 'perguntasFrequentes.php?pg='+valor;
        }
    </script>
</body>
</html>