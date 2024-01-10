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
                
                
            </div>
        </div>
    </div>
    <?php
        include_once("footer.php");
    ?>

    <script>
        function newArticle(){
            window.open("inserir.php");
        }
        function menuSelect(valor){
            window.location.href = '?pg='+valor;
        }
    </script>
</body>
</html>