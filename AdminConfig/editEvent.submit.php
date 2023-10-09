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
                    $dtpost = $_POST['dataPost'];
                    $dtinicio = $_POST['dtinicio'];
                    $dtfim = $_POST['dtfim'];
                    $texto = $_POST['texto'];
                    $vagas = $_POST['vagas'];
                    $certificado = $_POST['certificado'];
                    $horainicio = $_POST['horainicio'];
                    $horafim = $_POST['horafim'];
                    $id = $_POST['id'];
                    $dt = explode("-", $dtinicio);
                    $dtinicioN = $dt[2]."/".$dt[1]."/".$dt[0];
                    $dt = explode("-", $dtfim);
                    $dtfimN = $dt[2]."/".$dt[1]."/".$dt[0];
                    include_once("class/capacitacao.class.php");
                    $inserir = new Capacitacao();
                    $inserir->updateEvent($titulo, $dtpost, $dtinicioN, $dtfimN, $texto, $vagas, $certificado, $horainicio, $horafim, $id);
                    
                ?>
            </div>
        </div>
    </div>
    <?php
        include_once("footer.php");
    ?>
</body>
</html>