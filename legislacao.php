<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<script type="text/javascript" src="jquery/code.jquery.com_jquery-3.7.1.min.js">-->
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="imgs/logo_sei_93x60.ico" type="image/x-icon" />
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
        elemento.style.paddingTop  = calcula + 'px';
        elemento.style.paddingBottom  = calcula + 'px';

    </script>
</body>
</html>