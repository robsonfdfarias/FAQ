<!DOCTYPE html>
<html lang="en">
    <?php
        if(!empty($_GET['dt'])){
            $dt = $_GET['dt'];
        }else{
            $dt = '2024-01-08';
        }
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="editorRobsonFarias.css" />
    <link rel="shortcut icon" href="imgs/logo_sei_93x60.ico" type="image/x-icon" />
    <meta property="og:image" content="">
    <meta property="og:title" content="Evento">
    <meta property="article:author" content="Robson Farias (robsonfdfarias@gmail.com)">
    <meta name="description" content="<?php echo 'Evento da data: '.$dt; ?>">
    <meta name="author" content="Robson Farias - robsonfdfarias@gmail.com">
    <meta name="keywords" content="Evento">
    <meta name="generator" content="Robson Farias (robsonfdfarias@gmail.com)">
    <meta name="robots" content="all">
    <meta name="revisit-after" content="1 day">
    <meta name="googlebot" content="all">
    <meta name="googlebot-news" content="all">
</head>
<body>
        <?php include_once("menu.php"); ?>
    <div id="geral">
        <div id="central">
            
        <?php include_once("top.php"); ?>


            <div id="itensum">

                <div id="artigo" style="border-radius: 5px; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5);">
                
                    <?php
                        $dt2 = explode('-', $dt);
                        echo '<header id="titulo">Eventos do dia '.$dt2[2].'/'.$dt2[1].'/'.$dt2[0].'</header>';
                        include_once("class/capacitacao.class.php");
                        $obj = new Capacitacao();
                        //$obj->getEventById($dt);
                        $obj->getEventForDate($dt);
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