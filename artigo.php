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


            <div id="itensum" style="margin-top:-35px;">

                <div id="artigo" style="border-radius: 5px; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5);">
                    <?php
                        $id = $_GET['id'];
                        include_once("class/crud.artigo.class.php");
                        $obj = new CRUD();
                        $obj->getArtById($id);
                    ?>
                </div>

            </div>

        </div>
    </div>
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