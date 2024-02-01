<?php
    session_start();
    include_once("checa.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de inserção de artigo</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="imgs/logo_sei_93x60.ico" type="image/x-icon" />
    <style>
        input[type="date"], input[type="number"]{
            padding: 10px;
        }
        #itemdois{
            margin-top: 0;
        }
    </style>
</head>
<body>
<div id="geral">
            <?php include_once("menu.php"); ?>
            <?php include_once("top.php"); ?>
        <div id="central">

            <div id="itemdois">
                <!--<div id="tituloLogin">
                    Inserir Evento
                </div>-->

                <?php
                    $id = $_GET['id'];
                    include_once("class/noticia.class.php");
                    $obj = new Noticia();
                    $linha = $obj->getNewsById($id);
                ?>
                
                <div id="formLogin">
                    
                        <table>
                            <tr>
                                <td colspan="2">
                                    <?php
                                        include_once("rffeditor/editText2.php");
                                    ?>
                                </td>
                            </tr>
                            <form action="noticiaEdit.submit.php" method="post" id="formulario" autocomplete="on" onsubmit="return ValidateContactForm();">
                            <tr>
                                <td><span id="nn">Título:</span></td>
                                <td><input type="text" id="titulo" name="titulo" required style="color:#000;padding-left: 10px;" value="<?php echo $linha->titulo; ?>"></td>
                            </tr>
                            <tr>
                                <td><span id="nn">Resumo:</span></td>
                                <td><input type="text" id="resumo" name="resumo" required style="color:#000;padding-left: 10px;" value="<?php echo $linha->resumo; ?>"></td>
                            </tr>
                            <tr>
                                <td><span id="nn">Status:</span></td>
                                <td>
                                    <select name="statusNews" id="statusNews">
                                        <?php 
                                            if($linha->statusNews>0){
                                                $status = "Ativo";
                                            }else{
                                                $status = "Inativo";
                                            }
                                            echo '<option value="'.$linha->statusNews.'">'.$status.'</option>';
                                        ?>
                                        <option value="1">Ativo</option>
                                        <option value="0">Inativo</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" id="enviar">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <textarea name="texto" id="conteudo" cols="30" rows="10" style="display:none;" required><?php echo $linha->conteudo; ?></textarea></td>
                            </tr>
                            </form>
                        </table>
                        <!--<button onclick="insertTextoEmTextarea()" style="display:none;">Inserir textarea</button>-->
                </div>
            </div>
        </div>
    </div>
    <?php
        include_once("footer.php");
    ?>
    <script>
        var tt = document.getElementById("texto");
        var campoTexto = document.getElementById("conteudo");
        tt.innerHTML = campoTexto.value;
        var enviar = document.getElementById("enviar");
        enviar.addEventListener("click", function(){
            insertTextoEmTextarea();
        })
        function insertTextoEmTextarea(){
            var campoTexto = document.getElementById("texto").innerHTML;
            console.log(campoTexto)
            var conteudo = document.getElementById("conteudo");
            conteudo.innerHTML = campoTexto;
        }

        function ValidateContactForm(){
            var conteudo = document.getElementById("conteudo");
            insertTextoEmTextarea();
            if(conteudo.value==''){
                alert("O campo conteudo não pode ficar em branco!");
                return false;
            }
        }
    </script>
</body>
</html>