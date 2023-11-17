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
        #itemdois{
            width: 420px;
            margin: auto;
        }
        footer{
            position: fixed;
            bottom: 0;
            left: 0;
        }
    </style>
</head>
<body>
        <?php include_once("menu.php"); ?>
    <div id="geral">
        <?php include_once("top.php"); ?>
        <div id="central">
            


            <div id="itensum">

                <div id="artigo" style="border-radius: 5px; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5);">
                <div id="geralMenuCat">
                    <div id="tituloCatMenuPag">Eventos:</div>
                    <div id="addCatMenuPag">
                        <a href="insertEvent.php">
                            <img src="imgs/cat-add.svg" alt="Adicionar categoria" title="Adicionar categoria" height="30"> Adicionar evento
                        </a>
                    </div>
                </div>
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
                        include_once("class/capacitacao.class.php");
                        $obj = new Capacitacao();
                        $obj->agenda($pg, $numReg);
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
        function newArticle(){
            window.open("inserir.php");
        }
        function menuSelect(valor){
            window.location.href = '?pg='+valor;
        }
    </script>
</body>
</html>