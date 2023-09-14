<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<script type="text/javascript" src="jquery/code.jquery.com_jquery-3.7.1.min.js">-->
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="imgs/logo_sei_93x60.ico" type="image/x-icon" />
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
        <?php include_once("menu.php"); ?>
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

            <div id="itemdois">


                <div class="post-content">
                    <header class="entry-header">
                    <h1 class="entry-title">Legislação</h1>
                                        
                    </header><!-- .entry-header -->

                    <div class="entry-content clearfix">
                    
                        <h3>Estadual</h3>



                        <ul><li><a rel="noreferrer noopener" href="http://leis.alesc.sc.gov.br/html/atos_mesa/2021/230_2021.html" data-type="URL" target="_blank">Ato da Mesa n.230, de 26 de maio de 2021</a><a rel="noreferrer noopener" href="http://leis.alesc.sc.gov.br/html/atos_mesa/2021/230_2021.html" target="_blank">,</a> que Institui o Sistema Eletrônico de Informações (SEI) como sistema oficial de gestão eletrônica de documentos e processos administrativos no âmbito da Assembleia Legislativa do Estado de Santa Catarina (Alesc). </li><li><a rel="noreferrer noopener" href="http://leis.alesc.sc.gov.br/html/instrucao_normativa/2021/001_2021.html" target="_blank">Instrução Normativa n.001, de 28 de maio de 2021</a>, que estabelece os procedimentos e os parâmetros do processo de digitalização para o Sistema Eletrônico de Informações (SEI) da Assembleia Legislativa do Estado de Santa Catarina (Alesc).</li></ul>



                        <h3>Federal</h3>



                        <ul><li><a rel="noreferrer noopener" href="http://www.planalto.gov.br/ccivil_03/_ato2011-2014/2012/Lei/L12682.htm" target="_blank">Lei n. 12.682, de 9 de julho de 2012</a>, que dispõe sobre a elaboração e o arquivamento de documentos em meios eletromagnéticos.</li><li><a rel="noreferrer noopener" href="http://www.planalto.gov.br/ccivil_03/_Ato2015-2018/2015/Decreto/D8539.htm" target="_blank">Decreto Federal n. 8.539, de 8 de outubro de 2015</a>, que dispõe sobre o uso do meio eletrônico para a realização do processo administrativo no âmbito dos órgãos e das entidades da administração pública federal direta, autárquica e fundacional</li><li><a rel="noreferrer noopener" href="https://www2.camara.leg.br/legin/fed/lei/2020/lei-14063-23-setembro-2020-790659-norma-pl.html" target="_blank">Lei nº 14.063, de 23 de setembro de 2020</a>, que dispõe sobre o uso de assinaturas eletrônicas em interações com entes públicos, em atos de pessoas jurídicas e em questões de saúde e sobre as licenças de softwares desenvolvidos por entes públicos.</li><li><a rel="noreferrer noopener" href="http://www.planalto.gov.br/ccivil_03/_ato2019-2022/2020/decreto/D10543.htm" target="_blank">Decreto nº 10.543, de 13 de novembro de 2020</a>, que dispõe sobre o uso de assinaturas eletrônicas na administração pública federal. </li><li><a rel="noreferrer noopener" href="http://www.planalto.gov.br/ccivil_03/_ato2019-2022/2021/lei/L14129.htm" target="_blank">Lei nº 14.129, de 29 de março de 2021</a>, que dispõe sobre princípios, regras e instrumentos para o Governo Digital e para o aumento da eficiência pública. </li><li><a rel="noreferrer noopener" href="https://www2.camara.leg.br/legin/fed/decret/2020/decreto-10278-18-marco-2020-789857-norma-pe.html" target="_blank">Decreto nº 10.278, de 18 de março de 2020</a>, que  estabelece a técnica e os requisitos para a digitalização de documentos públicos ou privados, a fim de que os documentos digitalizados produzam os mesmos efeitos legais dos documentos originais.</li><li><a rel="noreferrer noopener" href="http://www.planalto.gov.br/ccivil_03/_ato2015-2018/2018/lei/l13709.htm" target="_blank">Lei nº 13.709, de 14 de agosto de 2018</a>, Lei Geral de Proteção de Dados Pessoais (LGPD).</li></ul>



                        <h3></h3>
                    </div><!-- .entry-content -->

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