<?php
include_once("checa.php");
    $pesq = $_POST['duvida'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<script type="text/javascript" src="jquery/code.jquery.com_jquery-3.7.1.min.js">-->
    <link rel="stylesheet" type="text/css" href="style.css" />
    <style>

        #duvida {
            width: calc(100% - 170px); 
            height:35px;
            border-radius: 15px;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
            border: 0px;
            margin-bottom: 5px;
            font-size: 120%;
            padding-left: 5px;
        }

        #pesquisar {
            width: 150px; 
            height: 37px;
            border-radius: 15px;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
            border: 0px;
            font-size: 120%;
            transition: ease-in-out 0.5s;
        }
        #pesquisar:hover {
            width: 150px; 
            height: 37px;
            border-radius: 15px;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.8);
            border: 0px;
            font-size: 120%;
            transition: ease-in-out 0.5s;
            background-color: #0c582c;
            color: #fff;
        }

        #itemdois {
            width: calc(100% - 10px);
            padding: 5px;
            background-color: white;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
        }

        .questao{
            width: calc(90%-10px) !important;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
            border: 0.5px solid rgba(0, 0, 0, 0.2);
        }

        .tituloQuestao{
            font-size: 20px;
            font-weight: bold;
            transition: ease-in-out 0.5s;
        }
        .tituloQuestao a{
            font-size: 20px;
            color: #0c582c;
            text-decoration: none;
            transition: ease-in-out 0.5s;
        }
        .tituloQuestao a:hover{
            font-size: 23px;
            color: red;
            text-decoration: none;
            transition: ease-in-out 0.5s;
        }

        .descQuestao a{
            font-size: 17px;
            color: #0c582c;
            text-decoration: none;
            transition: ease-in-out 0.5s;
        }
        .descQuestao a:hover{
            font-size: 20px;
            color: red;
            text-decoration: none;
            transition: ease-in-out 0.5s;
        }
        #itemdois h2{
            border-bottom: 1px solid #0c582c;
            /*width: 200px;
            float: left;*/
            margin-top: 10px;
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php include_once("menu.php"); ?>
    <div id="geral">
        <div id="central">
            <div id="top">
                <div id="form">
                    <span id="titulo">Sei! Sistema Eletrônico de Informações</span><br>
                    <span id="subtitulo">Perguntas frequentes</span><br><br>
                    <form id="pesq" action="pesq.php" method="post">
                        <input type="text" id="duvida" name="duvida">
                        <input type="submit" id="pesquisar" value="Pesquisar">    
                    </form>
                </div>
            </div>
            <div id="itensum">
                <?php

                    include_once("class/crud.artigo.class.php");
                   $obj2 = new CRUD();
/*                     $obj2->selectPrioridades();*/

                ?>
<!--
                <div class="objitensum">
                    <div id="img"></div>
                    <div id="texto">
                        <span id="tituloItem">Titulo</span><hr>
                        <span id="descItem">O bold equivale a nossa famosa tag, para simplesmente negritar um trecho. A sintaxe é: font-weight: bold; O negrito serve, basicamente, para destacar um trecho de um texto.</span>
                    </div>
                </div>
    -->
            </div>

            <div id="itemdois">
                <h2>Você pesquisou por: <?php echo "<span style='color:#0c582c;'>".$pesq."</span>"; ?></h2>
                <?php
                    $obj2->findArticle($pesq);
                ?>
                
            </div>
        </div>
    </div>
    <?php
        include_once("footer.php");
    ?>
    <script type="text/javascript">
        var elemento = document.getElementById('top');
        var calcula = 260-elemento.clientHeight;
        calcula = calcula/3;
        console.log(calcula+" ---");
        elemento.style.paddingTop  = (calcula -30) + 'px';
        elemento.style.paddingBottom  = calcula + 'px';

    </script>
</body>
</html>