<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<script type="text/javascript" src="jquery/code.jquery.com_jquery-3.7.1.min.js">-->
    <link rel="stylesheet" type="text/css" href="style.css" />
    <style>
        #itensum {
            width:100%;
            /*display: inline-block;
            justify-content: space-between;*/
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;
        }

        #img{
            background-image: url('imgs/img1.png');
            background-repeat: no-repeat;
            background-size: 150%;
            background-position: center top;
            transition: background 1s;
            background-color: white;
            height: 200px;
            width: 100%; /*a:link........define o estilo do link no estado inicial;*/
            border-radius: 5px 25px 0 0;
        }
        #img:hover{
            background-size: 120%;
            transition: background 1s;
        }

        @media screen and (min-width: 769px) {
            #itensum {
                -webkit-column-count: 3; 
                -moz-column-count: 3; 
                column-count: 3;
            }
            div.objitensum {
                width: 33%;
            }
        }

        @media screen and (max-width: 768px) {
            #itensum {
                /*-webkit-column-count: 2; 
                -moz-column-count: 2; 
                column-count: 2;*/
                display: flex;
                flex-wrap: wrap;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                text-align: center;
            }
            div.objitensum {
                width: 48% !important; 
            }
        }

        @media screen and (max-width: 514px) {
            #itensum {
                /*-webkit-column-count: 1; 
                -moz-column-count: 1; 
                column-count: 1;*/
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
            }
            div.objitensum {
                width: 100% !important;
            }
            #duvida {
                min-width: 150px;
            }
        }

        div.objitensum {
            width: 33%;
            height: 400px;
            background-color: #fff;
            margin: 5px;
            padding: 0px;
            border-radius: 5px 25px;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
            color: black;
        }

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

        #texto{
            width:calc(100%-10px);
            height: 300px;
            margin-top: 5px;
            padding: 10px;
        }

        #tituloItem{
            font-size: 25px;
            font-weight: bold;
            text-align: center;
        }

        #tituloItem a:link{
            color: #0c582c;
            text-decoration: none;
            transition: ease-in-out 0.5s;
        }

        #tituloItem a:hover{
            color: red;
            font-size: 28px;
            text-decoration: none;
            transition: ease-in-out 0.5s;
        }

        #descItem{
            text-align: justify;
        }

        #descItem a:link{
            color: #0c582c;
            font-size: 18px;
            text-decoration: none;
            transition: ease-in-out 0.5s;
        }

        #descItem a:hover{
            color: #0c582c;
            font-size: 22px;
            text-decoration: none;
            transition: ease-in-out 0.5s;
        }

        #itemdois {
            width: calc(100% - 10px);
            padding: 5px;
            background-color: white;
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
        hr#recentes{
            border: 1px solid #0c582c;
            width: 200px;
            float: left;
            margin-top: -10px;
        }
    </style>
</head>
<body>
    <div id="geral">
        <div id="central">
            <div id="top">
                <div id="form">
                    <span id="titulo">Sei! Sistema Eletrônico de Informações</span><br>
                    <span id="subtitulo">Perguntas frequentes</span><br><br>
                    <form id="pesq" method="post" action="pesq.php">
                        <input type="text" name="duvida" id="duvida" placeholder="Digite sua pesquisa">
                        <input type="submit" name="pesquisar" id="pesquisar" value="Pesquisar">    
                    </form>
                </div>
            </div>
            <div id="itensum">
                <?php

                    include_once("class/crud.artigo.class.php");
                    $obj2 = new CRUD();
                    $obj2->selectPrioridades();

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
                <h3>Artigos recentes</h3><hr id="recentes"><br>
                <?php
                    $obj2->selectArtigos();
                ?>
                <div class="questao">
                    <span class="tituloQuestao">Titulo</span><br>
                    <span class="descQuestao">O bold equivale a nossa famosa tag, para simplesmente negritar um trecho. A sintaxe é: font-weight: bold; O negrito serve, basicamente, para destacar um trecho de um texto.</span>
                </div>
                <div class="questao">
                    <span class="tituloQuestao">Titulo</span><br>
                    <span class="descQuestao">O bold equivale a nossa famosa tag, para simplesmente negritar um trecho. A sintaxe é: font-weight: bold; O negrito serve, basicamente, para destacar um trecho de um texto.</span>
                </div>
                <div class="questao">
                    <span class="tituloQuestao">Titulo</span><br>
                    <span class="descQuestao">O bold equivale a nossa famosa tag, para simplesmente negritar um trecho. A sintaxe é: font-weight: bold; O negrito serve, basicamente, para destacar um trecho de um texto.</span>
                </div>
                <div class="questao">
                    <span class="tituloQuestao">Titulo</span><br>
                    <span class="descQuestao">O bold equivale a nossa famosa tag, para simplesmente negritar um trecho. A sintaxe é: font-weight: bold; O negrito serve, basicamente, para destacar um trecho de um texto.</span>
                </div>
                <div class="questao">
                    <span class="tituloQuestao">Titulo</span><br>
                    <span class="descQuestao">O bold equivale a nossa famosa tag, para simplesmente negritar um trecho. A sintaxe é: font-weight: bold; O negrito serve, basicamente, para destacar um trecho de um texto.</span>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        /*$(document).ready(function() {
            var height = $("#top").height();
            console.log(height);
            alert(height);
        });*/
        //var largDoc = window.innerWidth;
        /*var elemento2 = document.getElementById('central');
        var elemento = document.getElementById('top');
        console.log(elemento2);
        console.log(elemento2.clientWidth);
        var calc = (elemento2.clientWidth/5);
        elemento.style.height  = calc + 'px';*/
        var elemento = document.getElementById('top');
        var calcula = 260-elemento.clientHeight;
        calcula = calcula/2;
        console.log(calcula+" ---");
        elemento.style.paddingTop  = calcula + 'px';
        elemento.style.paddingBottom  = calcula + 'px';

    </script>
</body>
</html>