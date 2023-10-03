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
</head>
<body>
    <div id="geral">
            <?php include_once("menu.php"); ?>
        <div id="central">
            <!--<div id="top">
                <div id="form">
                    <span id="titulo">Sei! Sistema Eletrônico de Informações</span><br>
                    <span id="subtitulo">Perguntas frequentes</span><br><br>
                    <form id="pesq" method="post" action="pesq.php">
                        <input type="text" name="duvida" id="duvida" placeholder="Digite sua pesquisa">
                        <input type="submit" name="pesquisar" id="pesquisar" value="Pesquisar">    
                    </form>
                </div>
            </div>-->
            <?php include_once("top.php"); ?>

            <div id="itensum">
                <div id="carrosel"><?php include_once("carrosel3.php"); ?></div>
                <table id="redes">
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
                                        <td><span id="texto"><a href="#">Site da prefeitura</a></span></td>
                                    </tr>
                                    <tr>
                                        <td><img src="imgs/grampo.svg" alt="Acesse o manual do SEI" height="30"></td>
                                        <td><span id="texto"><a href="anexos/POP-Procedimento-Operacional-Padrao.pdf">Acesse o manual do SEI</a></span></td>
                                    </tr>
                                    <!--<tr>
                                        <td><img src="imgs/email.svg" alt="E-mail de contato" height="30"></td>
                                        <td><span id="texto">robsonfdfarias@gmail.com</span></td>
                                    </tr>-->
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div id="itemdois">
                <h3 style="padding-left: 10px;">Postagens recentes</h3><hr id="recentes"><br>
                <?php
                    include_once("class/crud.artigo.class.php");
                    $obj2 = new CRUD();
                    $obj2->selectArtigos();
                ?>
                
            </div>
        </div>
        <?php
            include_once("footer.php");
        ?>
    </div>
</body>
</html>