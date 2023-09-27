<?php
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


            <div id="itemdois" style="margin-top:-35px;">

                <div id="geralMenuCat">
                    <div id="tituloCatMenuPag">Categorias:</div>
                    <div id="addCatMenuPag">
                        <a href="catAdd.php">
                            <img src="imgs/cat-add.svg" alt="Adicionar categoria" title="Adicionar categoria" height="30"> Adicionar categoria
                        </a>
                    </div>
                    <!--<div id="opMenuCat">
                        
                        <img src="imgs/cat-add.svg" alt="Adicionar categoria" title="Adicionar categoria" width="250"><br>
                        Adicionar categoria
                    </div>

                    <div id="opMenuCat">
                        <a href="catEdit.php">
                        <img src="imgs/cat-edit.svg" alt="Editar categoria" title="Editar categoria" width="250"><br>
                        Editar categoria
                        </a>
                    </div>

                    <div id="opMenuCat">
                        <img src="imgs/cat-delete.svg" alt="Deletar categoria" title="Deletar categoria" width="250"><br>
                        Deletar categoria
                    </div>-->
                </div>

                <?php
                    include_once("class/crud.categoria.class.php");
                    $objCatMenuPag = new Categoria();
                    $objCatMenuPag->getCatMenuPag();
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
        calcula = calcula/4;
        console.log(calcula+" ---");
        elemento.style.paddingTop  = calcula + 'px';
        elemento.style.paddingBottom  = (calcula+40) + 'px';

    </script>
</body>
</html>
