<?php
    session_start();
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
    <div id="geral">
            <?php include_once("menu.php"); ?>
        <div id="central">
            <div id="top">
                <div id="form">
                    <span id="titulo">Sei! Sistema Eletrônico de Informações</span><br>
                    <span id="subtitulo">Área de login</span><br><br>
                </div>
            </div>

            <div id="itemdois">
                <?php
                    $titulo = $_POST['titulo'];
                    $id = $_POST['id'];
                    //echo $titulo." -  - ".$id."<br>";
                    include_once("class/crud.categoria.class.php");
                    $obj = new Categoria();
                    $obj->deleteCat($id, $titulo);
                ?>
            </div>
        </div>
    </div>
    <?php
        include_once("footer.php");
    ?>
</body>
</html>