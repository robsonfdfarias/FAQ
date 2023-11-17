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
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="imgs/logo_sei_93x60.ico" type="image/x-icon" />
    <style>
        footer{
            position: fixed;
            bottom: 0;
            left: 0;
        }
    </style>
</head>
<body>
        <?php include_once("menu.php"); ?>
            <?php include_once("top.php"); ?>
    <div id="geral">
        <div id="central">

<br>
            <div id="itemdois" style="margin-top:-35px;">

                <div id="tituloCatMenuPag">Postagens recentes</div>
                <div id="addCatMenuPag">
                    <button id="insertArticle" onclick="newArticle()">+ Nova categoria</button>
                </div><br><br>

                <?php
                    if(!empty($_GET['pg'])){
                        $pg = $_GET['pg'];
                    }else{
                        $pg = 1;
                    }
                    $numReg = 4;
                    include_once("class/limpa.variavel.class.php");
                    $limpa = new LimpaVar();
                    $pg=$limpa->limpa($pg);
                    include_once("class/crud.categoria.class.php");
                    $objCatMenuPag = new Categoria();
                    $objCatMenuPag->getCatMenuPag($pg, $numReg); 
                ?>
            </div>

        </div>
    </div>
    <?php
        include_once("footer.php");
    ?>
    
<script src="efeito.js"></script>
    <script>
        function newArticle(){
            window.open("catAdd.php");
        }
        function menuSelect(valor){
            window.location.href = '?pg='+valor;
        }
    </script>
</body>
</html>
