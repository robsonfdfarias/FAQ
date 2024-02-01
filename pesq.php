<?php
    if(!empty($_POST['duvida'])){
        $pesq = $_POST['duvida'];
    }
    if(empty($_GET['pg'])){
        $pg=1;
    }else{
        $pg=$_GET['pg'];
    }
    
    if(!empty($_GET['pesq'])){
        $pesq=$_GET['pesq'];
    }
    include_once("AdminConfig/class/limpa.variavel.class.php");
    $limpa = new LimpaVar();
    $pesq = $limpa->limpa($pesq);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa</title>
    <!--<script type="text/javascript" src="jquery/code.jquery.com_jquery-3.7.1.min.js">-->
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!-- <link rel="stylesheet" type="text/css" href="editorRobsonFarias.css" /> -->
    <link rel="stylesheet" type="text/css" href="AdminConfig/rffeditor/editorRobsonFarias.css" />
    <link rel="shortcut icon" href="imgs/logo_sei_93x60.ico" type="image/x-icon" />
    <meta property="og:image" content="">
    <meta property="og:title" content="Pesquisa">
    <meta property="article:author" content="Robson Farias (robsonfdfarias@gmail.com)">
    <meta name="description" content="<?php if(!empty($pesq)){echo 'Você pesquisou: '.$pesq;}else{echo 'Área de pesquisa';} ?>">
    <meta name="author" content="Robson Farias - robsonfdfarias@gmail.com">
    <meta name="keywords" content="Pesquisa">
    <meta name="generator" content="Robson Farias (robsonfdfarias@gmail.com)">
    <meta name="robots" content="all">
    <meta name="revisit-after" content="1 day">
    <meta name="googlebot" content="all">
    <meta name="googlebot-news" content="all">
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
    <div id="geral">
    <?php include_once("menu.php"); ?>
            <?php include_once("top.php"); ?>
        <div id="central">
            

            <div id="itemdoisPergFreq" style="max-width: 1036px; padding: 0 32px;">
                <div id="centroItemDoisPergFreq" style="max-width: 100%; width: 100%;"> 
                    <h2>Você pesquisou por: <?php echo "<span style='color:#0c582c;'>".$pesq."</span>"; ?></h2>
                    <?php
                        $numReg=1;
                        include_once("class/crud.artigo.class.php");
                        $obj2 = new CRUD();
                        $obj2->getFindArticle($pesq, $pg, $numReg);
                    ?>
                </div>
            </div>
            <idv id="idcateg" style="display:none;"><?php echo $pesq; ?></div>

        </div>
    </div>
        <?php
            include_once("footer.php");
        ?>
        <script src="efeito.js"></script>
    <script type="text/javascript">
        /*var elemento = document.getElementById('top');
        var calcula = 260-elemento.clientHeight;
        calcula = calcula/2;
        console.log(calcula+" ---");
        elemento.style.paddingTop  = calcula + 'px';
        elemento.style.paddingBottom  = calcula + 'px';*/

        function menuSelect(valor){
            var idcateg = document.getElementById('idcateg');
            window.location.href = 'pesq.php?pesq='+idcateg.innerText+'&pg='+valor;
        }
    </script>
</body>
</html>