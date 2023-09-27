<?php
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
    <style>
        
    </style>
</head>
<body>
    <div id="geral">
            <?php include_once("menu.php"); ?>
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
                <h3>Artigos recentes</h3><hr id="recentes"><br>
                <?php
                    $idCat = $_GET['id'];
                    include_once("class/crud.artigo.class.php");
                    $obj2 = new CRUD();
                    $obj2->getArtByCat($idCat);
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
        calcula = calcula/2;
        console.log(calcula+" ---");
        elemento.style.paddingTop  = calcula + 'px';
        elemento.style.paddingBottom  = calcula + 'px';

    </script>
</body>
</html>