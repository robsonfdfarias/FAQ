<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<script type="text/javascript" src="jquery/code.jquery.com_jquery-3.7.1.min.js">-->
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="editorRobsonFarias.css" />
    <link rel="shortcut icon" href="imgs/logo_sei_93x60.ico" type="image/x-icon" />
    <style>
    </style>
</head>
<body>
    <div id="geral">
            <?php include_once("menu.php"); ?>
            <?php include_once("top.php"); ?>
        <div id="central">
            

            <!--<div id="itemdois">
                <div id="centroItemDois" style="margin-top: 30px; width: 84%;">
                    <h3>Artigos recentes</h3><hr id="recentes"><br>
                    <?php
                        $idCat = $_GET['id'];
                        //include_once("class/crud.artigo.class.php");
                        //$obj2 = new CRUD();
                        //$obj2->getArtByCat($idCat);
                        include_once("class/crud.categoria.class.php");
                        $objCat = new Categoria();
                        
                    ?>
                </div>
            </div>-->

            <div id="itemdoisPergFreq" style="max-width: 1036px; padding: 0 32px;">
                <div id="centroItemDoisPergFreq" style="max-width: 100%; width: 100%;"> 
                    <?php
                    $pesq = $_GET['pesq'];
                    if(!empty($pesq) and $pesq!=''){
                        $idCat=$pesq;
                    }
                    echo '<h2>'.$objCat->getCatById($idCat).'</h2>';
                        //$idCat = $_GET['id'];
                        $pag = $_GET['pg'];
                        if(empty($pag) and $pag=='' and $pag<1){
                            $pag=1;
                        }
                        $numReg=1;

                        include_once("class/crud.artigo.class.php");
                        $obj2 = new CRUD();
                        $obj2->getArticleForCategory($idCat, $pag, $numReg);
                    ?>
                </div>
            </div>
            <idv id="idcateg" style="display:none;"><?php echo $idCat; ?></div>

        </div>
    </div>
        <?php
            include_once("footer.php");
        ?>
        <script src="efeito.js"></script>
    <script type="text/javascript">
        var elemento = document.getElementById('top');
        var calcula = 260-elemento.clientHeight;
        calcula = calcula/2;
        console.log(calcula+" ---");
        elemento.style.paddingTop  = calcula + 'px';
        elemento.style.paddingBottom  = calcula + 'px';

        function menuSelect(valor){
            var idcateg = document.getElementById('idcateg');
            window.location.href = 'categoria.php?pesq='+idcateg.innerText+'&pg='+valor;
        }
    </script>
</body>
</html>