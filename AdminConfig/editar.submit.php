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
                    $titulo = $_POST['tituloArt'];
                    $resumo = $_POST['resumo'];
                    $conteudoArtigo = $_POST['conteudoArtigo'];
                    $tags = $_POST['tags'];
                    $img = $_FILES['file'];
                    $prioridade = $_POST['prioridade'];
                    $categoria = $_POST['categoria'];
                    $imgOld = $_POST['imgOld'];
                    $id = $_POST['id'];

                    $pasta = '../imagens/';
                    $ano = date('Y');
                    $mes = date('m');
                    $dia = date('d');
                    $pasta .= $ano.'/'.$mes.'/'.$dia.'/';
                    mkdir($pasta, 0777, true);

                    $estadoImg = false;

                    ini_set('upload_max_filesize', '10M');
                    if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
                        $nomeAleatorio = date("Y-m-d_H-i-s_").$_FILES['file']['name'];
                        if(move_uploaded_file($_FILES['file']['tmp_name'], $pasta . $nomeAleatorio)){
                            $estadoImg=true;
                        }else{
                            $estadoImg=false;
                        }
                    } else {
                        $nomeAleatorio=$imgOld;
                        $estadoImg=true;
                    }

                    if($estadoImg){
                        include_once("class/crud.artigo.class.php");
                        $inserir = new CRUD();
                        $inserir->updateArticle($titulo, $resumo, $conteudoArtigo, $tags, $nomeAleatorio, $prioridade, $categoria, $id);
                    }
                    
                ?>
            </div>
        </div>
    </div>
    <?php
        include_once("footer.php");
    ?>
</body>
</html>