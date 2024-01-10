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
            </div>

            <div id="itemdois">
                <?php
                    $id = $_GET['id'];
                    //echo $id;
                    include_once("class/crud.artigo.class.php");
                    $inserir = new CRUD();
                    $inserir->deleteArticle($id);
                ?>
            </div>
        </div>
    </div>
    <?php
        include_once("footer.php");
    ?>
</body>
</html>