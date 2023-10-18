<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<script type="text/javascript" src="jquery/code.jquery.com_jquery-3.7.1.min.js">-->
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="imgs/logo_sei_93x60.ico" type="image/x-icon" />
    <meta property="og:image" content="imagens/faq_pic.jpg"> 
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="400">
    <meta property="og:image:height" content="200">
    <meta property="og:autor" content="Robson Farias (robsonfdfarias@gmail.com)">
    <meta property="og:title" content="Área principal do FAQ">
    <meta property="og:description" content="Seja bem vindo ao FAQ referente ao SEI da prefeitura de Jaraguá do Sul / SC">
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
</head>
<body>
    <div id="geral">
        <?php include_once("menu.php"); ?>
            <div id="topo" style="">
                    <table id="tabTop">
                        <tr>
                            <td><img src="imgs/logo_sei_93x60.png" alt="Logo SEI" style="margin-right: 20px;"></td>
                            <td style="text-align: left;"><span style="font-size: 40px; font-weight: 700;">Sistema Eletrônico de Informações</span></td>
                        </tr>
                    </table>
            </div>
        <div id="central">
            

            <!--<div id="itensum">
            </div>-->

            <div id="itemdoisHome">

            <!--<table id="redes">
                    <tr>
                        <td Valign="top">
                            <div id="redeSocial">
                                <table>
                                    <tr><td colspan="2"><span id="tituloRedSocial">Redes Sociais</span></td></tr>
                                    <tr>
                                        <td><img src="imgs/youtube.svg" alt="Acesse nosso canal do Youtube" height="30"></td>
                                        <td><span id="texto"><a href="https://www.youtube.com/@InformaticacomRobsonFarias">Acesse nosso canal do Youtube</a></span></td>
                                    </tr>
                                    <tr>
                                        <td><img src="imgs/instagram.svg" alt="Acesse nosso canal do Instagram" height="30"></td>
                                        <td><span id="texto"><a href="#">Acesse nosso canal do Instagram</a></span></td>
                                    </tr>
                                    <tr>
                                        <td><img src="imgs/facebook.svg" alt="Acesse nosso canal do Facebook" height="30"></td>
                                        <td><span id="texto"><a href="#">Acesse nosso canal do Facebook</a></span></td>
                                    </tr>

                                    
                                    <tr>
                                        <td><img src="imgs/twitter.svg" alt="Acesse Twitter da prefeitura de Jaraguá do Sul" height="30"></td>
                                        <td><span id="texto"><a href="#">Acesse Twitter da prefeitura</a></span></td>
                                    </tr>
                                    <tr>
                                        <td><img src="imgs/globo.svg" alt="Acesse site da prefeitura de Jaraguá do Sul" height="30"></td>
                                        <td><span id="texto"><a href="https://www.jaraguadosul.sc.gov.br/">Site da prefeitura</a></span></td>
                                    </tr>
                                    <tr>
                                        <td><img src="imgs/grampo.svg" alt="Acesse o manual do SEI" height="30"></td>
                                        <td><span id="texto"><a href="anexos/POP-Procedimento-Operacional-Padrao.pdf">Acesse o manual do SEI</a></span></td>
                                    </tr>
                                    <tr>
                                        <td><img src="imgs/email.svg" alt="E-mail de contato" height="30"></td>
                                        <td><span id="texto">robsonfdfarias@gmail.com</span></td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>-->
                <div id="acessoRapido" style="display: block; width: 222px;">
                    <span id="tituloAcessoRapido"><strong>Acesso rápido</strong></span><br>
                    <a href="http://" target="_blank" rel="noopener noreferrer">Servidor Público <img src="imgs/seta-para-a-direita.svg" alt="seta" width="15"></a><br>
                    <a href="http://" target="_blank" rel="noopener noreferrer">Usuário Externo <img src="imgs/seta-para-a-direita.svg" alt="seta" width="15"></a><br>
                    <a href="http://" target="_blank" rel="noopener noreferrer">Consulta de Processos <img src="imgs/seta-para-a-direita.svg" alt="seta" width="15"></a><br>
                </div>

                
                <div id="centroItemDoisHome" style="">
                <div id="carrosel"><?php include_once("carrosel3.php"); ?></div>
                    <h1 style="margin-bottom: 0px;">Últimas notícias</h1>
                    <?php
                        /*include_once("class/crud.artigo.class.php");
                        $obj2 = new CRUD();
                        $obj2->selectArtigos();*/
                        include_once("class/noticia.class.php");
                        $obj2 = new Noticia();
                        $obj2->getNewsSample();
                    ?>
                </div>
                
            </div>
        </div>
        <?php
            include_once("footer.php");
        ?>
    </div>
</body>
</html>