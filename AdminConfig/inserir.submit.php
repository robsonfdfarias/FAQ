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
                    //echo $img['name']."<br>";
                    ini_set('upload_max_filesize', '10M');
                    if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
                        //$nomeAleatorio = date("Y-m-d_H-i-s_").$_FILES['file']['name'];
                        /*$ext = $_FILES['file']['name'];
                        $ext = explode(".", $ext);
                        $calc = count($ext)-1;
                        $extencao = $ext[$calc];
                        $nomeAleatorio = date("Y-m-d_H-i-s_").substr($_FILES['file']['name'], 0, 30).".".$extencao;*/
                        include_once("class/nome.aleatorio.arquivo.php");
                        $aleatorio = new NomeAleratorioArquivo();
                        $nomeAleatorio = $aleatorio->nomeAleatorio($_FILES['file']['name']);
                        if(move_uploaded_file($_FILES['file']['tmp_name'], "../imagens/" . $nomeAleatorio)){
                            include_once("class/crud.artigo.class.php");
                            $inserir = new CRUD();
                            $inserir->insertArticle($titulo, $resumo, $conteudoArtigo, $tags, $nomeAleatorio, $prioridade, $categoria);
                        }else{
                            echo "Erro ao enviar o arquivo";
                        }
                    } else {
                        echo "Erro ao subir o arquivo para o servidor, por favor tente novamente. Se persistir o erro, contate o administrador.";
                    }
                    
                ?>
            </div>
        </div>
    </div>
</body>
</html>