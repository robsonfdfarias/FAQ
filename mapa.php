<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estrutura Administrativa</title>
    <!--<script type="text/javascript" src="jquery/code.jquery.com_jquery-3.7.1.min.js">-->
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="imgs/logo_sei_93x60.ico" type="image/x-icon" />
    <meta property="og:image" content="">
    <meta property="og:title" content="Estrutura Administrativa">
    <meta property="article:author" content="Robson Farias (robsonfdfarias@gmail.com)">
    <meta name="description" content="O Sistema SEI subdivide a estrutura municipal em Unidades, as Unidades SEI são espaços no sistema que representam...">
    <meta name="author" content="Robson Farias - robsonfdfarias@gmail.com">
    <meta name="keywords" content="Estrutura Administrativa">
    <meta name="generator" content="Robson Farias (robsonfdfarias@gmail.com)">
    <meta name="robots" content="all">
    <meta name="revisit-after" content="1 day">
    <meta name="googlebot" content="all">
    <meta name="googlebot-news" content="all">
    <style>
       /* #itensum {
            width:100%;
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
            width: 100%;
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
        }*/
    </style>
</head>
<body>
    <div id="geral">
        <?php include_once("menu.php"); ?>
            <?php include_once("top.php"); ?>
        <div id="central">

            <div id="itemdois">
                <div class="post-content">
                    <header class="entry-header">
                    <h1 class="entry-title">Introdução:</h1>
                                        
                    </header><!-- .entry-header -->
                    <div id="conteudoMapa">
                        O Sistema SEI subdivide a estrutura municipal em Unidades, as Unidades SEI são espaços no sistema que representam os departamentos e equipes da Prefeitura Municipal de Jaraguá do Sul.
                    </div>

                    <header class="entry-header">
                    <h1 class="entry-title">Siglas das Unidades:</h1>
                    </header><!-- .entry-header -->
                    <div id="conteudoMapa">
                    As siglas das unidades foram definidas de forma que seja possível identificar qual a Secretaria, Diretoria, Gerencia ou Chefia localizada na estrutura Hierárquica. Sendo ela definida com o seguinte padrão:
                    <br><br>
                    SXXXXX - DXXX - GXXX - CXXX - ASSXXX<br>
                    [Secretaria] - [Diretoria] - [Gerência] - [Chefia] - [Assessoria]
                    <br><br>
                    Exemplo:<br>
                    SEMAD.DGEP.GADP.CFOP<br>
                    Secretaria da Administração → Diretoria de Gestão de Pessoas → Gerência de Administração de Pessoal → Chefia de Folha de Pagamento
                    </div>

                    <header class="entry-header">
                    <h1 class="entry-title">Numeração das Unidades</h1>
                    </header><!-- .entry-header -->
                    <div id="conteudoMapa">
                    A numeração das unidades SEI tem uma composição de 14 números em 7 níveis, sendo os dois primeiros números correspondentes a secretaria e o restante os níveis dentro da secretaria:
                    <br><br>
                    <font color="#06B6D4">99</font>-<font color="#F59E0B">99</font>-<font color="#10B981">99</font>-<font color="#8B5CF6">99</font>-<font color="#1A202C">99</font><br>
                    <font color="#06B6D4">[00-99] - Secretarias</font><br>
                    <font color="#F59E0B">[00-99] - Diretorias</font><br>
                    <font color="#10B981">[00-99] - Gerências</font><br>
                    <font color="#8B5CF6">[00-99] - Chefias</font><br>
                    <font color="#1A202C">[00-99] - Demais Sub-unidades</font><br>
                    <br><br>
                    Exemplo:<br>
                    <font color="#06B6D4">01</font><font color="#F59E0B">01</font><font color="#10B981">00</font><font color="#8B5CF6">00</font><font color="#1A202C">00</font> - Chefia de Gabinete (GABPREF/GABVICE)
                    </div>

                    <header class="entry-header">
                    <h1 class="entry-title">Estrutura completa</h1> 
                    </header><!-- .entry-header -->
                    <div id="conteudoMapa">
                    Você pode conferir a Estrutura Organizacional completa do SEI para a Prefeitura de Jaraguá do Sul cliando 
                        <a href="https://chill-partner-c3f.notion.site/Estrutura-Administrativa-dfab2dd0ec3c4aa4bec8b8bebd063aa3" target="_blank">aqui</a>
                    </div><br><br>

                </div>
            </div>
        </div>
    </div>
        <?php
            include_once("footer.php");
        ?>
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
        elemento.style.paddingTop  = (calcula-50) + 'px';
        elemento.style.paddingBottom  = calcula + 'px';

    </script>
</body>
</html>