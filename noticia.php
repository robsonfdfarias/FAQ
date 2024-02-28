<!DOCTYPE html>
<?php
    $id = $_GET['id'];
    include_once("class/noticia.class.php");
    $obj = new Noticia();
    $obj->getNewsByCat($id);
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícias</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!-- <link rel="stylesheet" type="text/css" href="editorRobsonFarias.css" /> -->
    <link rel="stylesheet" type="text/css" href="AdminConfig/rffeditor/editorRobsonFarias.css" />
    <link rel="shortcut icon" href="imgs/logo_sei_93x60.ico" type="image/x-icon" />
    <meta property="og:title" content="<?php echo $obj->titulo(); ?>">
    <meta property="og:description" content="<?php echo $obj->resumo(); ?>">
    <meta property="og:image" content="">
    <meta property="article:author" content="Robson Farias (robsonfdfarias@gmail.com)">
    <meta name="description" content="<?php echo $obj->resumo(); ?>">
    <meta name="author" content="Robson Farias - robsonfdfarias@gmail.com">
    <meta name="keywords" content="Área principal do FAQ">
    <meta name="generator" content="Robson Farias (robsonfdfarias@gmail.com)">
    <meta name="robots" content="all">
    <meta name="revisit-after" content="1 day">
    <meta name="googlebot" content="all">
    <meta name="googlebot-news" content="all">
</head>
<body>
        <?php include_once("menu.php"); ?>
        <?php include_once("top.php"); ?>
    <div id="geral">
        <div id="central">
            


            <div id="itensum">

                <div id="artigo" style="border: none;">
                    <?php
                        echo $obj->artigo();
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

        var tabs = document.getElementsByClassName('tabela');
        console.log(tabs)
        for(let i=0; i<tabs.length; i++){
            let tbody = tabs[i].children[0];
            console.log(tbody.children.length)
            for(let j=0; j<tbody.children.length; j++){
                console.log(tbody)
                let tr = tbody.children[j];
                for(let r=0; r<tr.children.length; r++){
                    console.log(tr)
                    let td = tr.children[r];
                    td.setAttribute('contenteditable', 'false');
                    td.setAttribute('spellcheck', 'false');
                }
            }
        }
        // tabs.foreach(function (nome, i){
        //     nome.setAttribute('contenteditable', 'false');
        //     nome.setAttribute('spellcheck', 'false');
        // });
    </script>
</body>
</html>