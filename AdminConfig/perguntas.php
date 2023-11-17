<?php
    session_start();
    include_once("checa.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<script type="text/javascript" src="jquery/code.jquery.com_jquery-3.7.1.min.js">-->
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="imgs/logo_sei_93x60.ico" type="image/x-icon" />
    <script type="text/javascript">
        /*function resizeRobson(){
            //alert("sdafdfad");
            var elemento = document.getElementById('top');
            console.log(elemento+"-----");
            var calcula = 260-parseInt(elemento.clientHeight);
            calcula = calcula/2;
            console.log(calcula+" ---");
            elemento.style.paddingTop  = calcula + 'px';
            elemento.style.paddingBottom  = calcula + 'px';
        }
        window.addEventListener('resize', function(){
            resizeRobson();
        });
        window.onload = resizeRobson();*/
    </script>
    <style>
        footer{
            position: fixed;
            bottom: 0;
            left: 0;
        }
    </style>
</head>
<body>
    <div id="geral">
            <?php include_once("menu.php"); ?>
            <?php include_once("top.php"); ?>
        <div id="central">
            

            <div id="itemdois" style="margin-top:0;"> 
                <div id="tituloCatMenuPag">Postagens recentes</div>
                <div id="addCatMenuPag">
                    <button id="insertArticle" onclick="newArticle()">+ Nova Pergunta</button>
                    <!--<a href="noticiaInsert.php">
                        <img src="imgs/cat-add.svg" alt="Adicionar categoria" title="Adicionar categoria" height="30"> Adicionar notícia
                    </a>-->
                </div><br><br>
                <?php
                    if(!empty($_GET['pg'])){
                        $pg = $_GET['pg'];
                    }else{
                        $pg = 1;
                    }
                    $numReg = 2;
                    include_once("class/limpa.variavel.class.php");
                    $limpa = new LimpaVar();
                    $pg=$limpa->limpa($pg);
                    include_once("class/crud.artigo.class.php");
                    $obj2 = new CRUD();
                    $obj2->selectArtigos($pg, $numReg);
                ?>
                <!--<form action="#">
                <input type="text" id="resumo" name="resumo" required pattern="[\s]{1}[A-Za-z0-9]{4,}" maxLength="250">
                <input type="text" id="resumo" name="resumo" required pattern="^[0-9]{3}.{1}[0-9]{3}.{1}[0-9]{3}-{1}[0-9]{2}$" maxLength="250">
                <input type="text" id="resumo" name="resumo" required pattern="^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$" maxLength="250">
                <input type="text" id="resumo" name="resumo" required pattern="^[0-9]{2}[\/][0-9]{2}[\/][0-9]{4}$" maxLength="250">
                <input type="text" id="resumo" name="resumo" required pattern="^#[0-9a-f]{3}$|^#[0-9a-f]{6}$" maxLength="250">
                </form>-->
            </div>
        </div>
    </div>
    <?php
        include_once("footer.php");
    ?>

<script src="efeito.js"></script>
    <script>
        function newArticle(){
            window.open("inserir.php");
        }
        function menuSelect(valor){
            window.location.href = '?pg='+valor;
        }
    </script>
</body>
</html>