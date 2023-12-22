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
    <!--<script type="text/javascript" src="jquery/code.jquery.com_jquery-3.7.1.min.js">-->
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="imgs/logo_sei_93x60.ico" type="image/x-icon" />
    <style>
        footer{
            position: fixed;
            bottom: 0;
            left: 0;
        }
    </style>
</head>
<body>
    <div id="geral">
            <?php include_once("menu.php"); ?>
            <?php include_once("top.php"); ?>
        <div id="central">
            

            <div id="itemdois">
                <?php
                        if(!empty($_GET['pg'])){
                            $pg = $_GET['pg'];
                        }else{
                            $pg = 1;
                        }
                        $numReg = 2;
                        include_once("class/limpa.variavel.class.php");
                        $limpa = new LimpaVar();
                        $pg=$limpa->limpa($pg);
                    $idCat = $_GET['id'];
                    include_once("class/crud.categoria.class.php");
                    $objCat = new Categoria();
                    $cat = $objCat->getCatById($idCat);
                ?>
                <h3><?php echo $cat; ?></h3><hr id="recentes"><br>
                <?php
                    include_once("class/crud.artigo.class.php");
                    $obj2 = new CRUD();
                    $obj2->getArtByCat($idCat, $pg, $numReg);
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