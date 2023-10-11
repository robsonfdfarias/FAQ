<?php
    $pesq = $_POST['duvida'];
    include_once("AdminCongig/class/limpa.variavel.class.php");
    $limpa = new LimpaVar();
    $pesq = $limpa->limpa($pesq);
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

        /*#duvida {
            width: calc(100% - 170px); 
            height:35px;
            border-radius: 15px;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
            border: 0px;
            margin-bottom: 5px;
            font-size: 120%;
            padding-left: 5px; 
        }

        #pesquisar {
            width: 150px; 
            height: 37px;
            border-radius: 15px;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
            border: 0px;
            font-size: 120%;
            transition: ease-in-out 0.5s;
        }
        #pesquisar:hover {
            width: 150px; 
            height: 37px;
            border-radius: 15px;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.8);
            border: 0px;
            font-size: 120%;
            transition: ease-in-out 0.5s;
            background-color: #0c582c;
            color: #fff;
        }*/

        #itemdois {
            width: calc(100% - 10px);
            padding: 5px;
            background-color: white;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
            margin-top: 30px;
        }

        .questao{
            width: calc(90%-10px) !important;
            padding: 10px;
            border-radius: 5px;
            /*box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);*/
            border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);
        }

        .tituloQuestao{
            font-size: 20px;
            font-weight: bold;
            transition: ease-in-out 0.5s;
        }
        .tituloQuestao a{
            font-size: 20px;
            color: #0c582c;
            text-decoration: none;
            transition: ease-in-out 0.5s;
        }
        .tituloQuestao a:hover{
            font-size: 20px;
            color: forestgreen;
            text-decoration: none;
            transition: ease-in-out 0.5s;
        }

        .descQuestao a{
            font-size: 17px;
            color: #0c582c;
            text-decoration: none;
            transition: ease-in-out 0.5s;
        }
        .descQuestao a:hover{
            font-size: 17px;
            color: forestgreen;
            text-decoration: none;
            transition: ease-in-out 0.5s;
        }
        #itemdois h2{
            border-bottom: 1px solid #0c582c;
            /*width: 200px;
            float: left;*/
            margin-top: 10px;
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php include_once("menu.php"); ?>
    <div id="geral">
        <div id="central">
            <?php include_once("top.php"); ?>
            <div id="itensum">
            </div>

            <div id="itemdois" style="box-shadow: none;">
                <div id="centroItemDois" style="margin-top: -20px; width: 84%;">
                    <h2>Você pesquisou por: <?php echo "<span style='color:#0c582c;'>".$pesq."</span>"; ?></h2>
                    <?php
                        include_once("class/crud.artigo.class.php");
                        $obj2 = new CRUD();
                        $obj2->findArticle($pesq);
                    ?>
                </div>
            </div>
        </div>
    </div>
        <?php
            include_once("footer.php");
        ?>
    <script type="text/javascript">
        /*var elemento = document.getElementById('top');
        var calcula = 260-elemento.clientHeight;
        calcula = calcula/2;
        console.log(calcula+" ---");
        elemento.style.paddingTop  = calcula + 'px';
        elemento.style.paddingBottom  = calcula + 'px';*/

    </script>
</body>
</html>