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
</head>
<body>
<div id="geral">
            <?php include_once("menu.php"); ?>
        <div id="central">
            <?php include_once("top.php"); ?>

            <div id="itemdois">
                <div id="tituloLogin">
                    Inserir postagem
                </div>
                
                <div id="formLogin">
                    
                        <table>
                            <tr>
                                <td colspan="2">
                                    <?php
                                        include_once("editText2.php");
                                    ?>
                                </td>
                            </tr>
                            <form action="inserir.submit.php" method="post" id="formulario"  enctype="multipart/form-data" autocomplete="on" onsubmit="return ValidateContactForm();">
                            <tr>
                                <td><span id="nn">Título:</span></td>
                                <td><input type="text" id="tituloArt" name="tituloArt" required spellcheck="true"></td>
                            </tr>
                            <tr>
                                <td><span id="nn">Resumo:</span></td>
                                <td><input type="text" id="resumo" name="resumo" required></td>
                            </tr>
                            <tr>
                                <td><span id="nn">Tags:</span></td>
                                <td><input type="text" id="tags" name="tags" required></td>
                            </tr>
                            <tr>
                                <td><span id="nn">Imagem:</span></td>
                                <td><input type="file" name="file" id="file" accept="image/*" required></td>
                            </tr>
                            <tr>
                                <td><span id="nn">Prioridade:</span></td>
                                <td>
                                    <select name="prioridade" id="prioridade">
                                        <option value="sim">Sim</option>
                                        <option value="nao">Não</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><span id="nn">Categoria:</span></td>
                                <td>
                                    <select name="categoria" id="categoria">
                                        <?php
                                            include_once("class/crud.categoria.class.php");
                                            $menu = new Categoria();
                                            $menu->menuCategoria();
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" id="enviar"></td>
                            </tr>
                        </table>
                        <input type="hidden" name="dataPost" value="<?php echo date("d/m/Y"); ?>">
                        <textarea name="conteudoArtigo" id="conteudoArtigo" cols="30" rows="10" style="display:none;" required></textarea>
                    </form>
                        <button onclick="insertTextoEmTextarea()">Inserir textarea</button>
                </div>
            </div>
        </div>
    </div>
    <?php
        include_once("footer.php");
    ?>
    <script>
        var enviar = document.getElementById("enviar");
        enviar.addEventListener("click", function(){
            insertTextoEmTextarea();
        })
        function insertTextoEmTextarea(){
            var campoTexto = document.getElementById("texto").innerHTML;
            console.log(campoTexto)
            var conteudoArtigo = document.getElementById("conteudoArtigo");
            conteudoArtigo.innerHTML = campoTexto;
        }

        function ValidateContactForm(){
            var titulo = document.getElementById("tituloArt");
            var resumo = document.getElementById("resumo");
            var tags = document.getElementById("tags");
            var file = document.getElementById("file");
            var conteudoArtigo = document.getElementById("conteudoArtigo");
            insertTextoEmTextarea();
            if(!empty($_FILES["fileToUpload"]["name"])){
                alert("Selecione uma imagem!");
                return false;
            }else if(!empty(titulo)){
                alert("O campo titulo não pode ficar em branco!");
                return false;
            }else if(!empty(resumo)){
                alert("O campo resumo não pode ficar em branco!");
                return false;
            }else if(!empty(tags)){
                alert("O campo tags não pode ficar em branco!");
                return false;
            }else if(conteudoArtigo.value==''){
                alert("O campo conteudoArtigo não pode ficar em branco!");
                return false;
            }
        }
    </script>
</body>
</html>