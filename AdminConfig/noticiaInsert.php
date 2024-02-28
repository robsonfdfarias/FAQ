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
        .teste {
            background-color: red;
            width: 100px;
            height: 50px;
            /* margin-top: 140px; altura que está do topo */
            top: 90px; /* altura que vai parar antes do topo */
            margin-left:-100px;
            position: sticky;
            display:none;
        }
    </style>
</head>
<body>
<div id="geral">
            <?php include_once("menu.php"); ?>
            <?php include_once("top.php"); ?>
        <div id="central">

            <div id="itemdois" style="position:relative;">
                <!--<div id="tituloLogin">
                    Inserir notícia
                </div>-->
                <div id="formInsert">
                    
                        <table>
                            <tr>
                                <td colspan="2">
                                    <?php
                                        include_once("rffeditor/editText2.php");
                                    ?>
                                </td>
                            </tr>
                            <form action="noticiaInsert.submit.php" method="post" id="formulario"  enctype="multipart/form-data" autocomplete="on" onsubmit="return ValidateContactForm();">
                            <tr>
                
    <div id="teste" class="teste">ROBSON</div>
                                <!--<td><span id="nn">Título:</span></td>-->
                                <td colspan="2"><input type="text" id="titulo" name="titulo" placeholder="Insira o título do artigo" required spellcheck="true"></td>
                            </tr>
                            <tr>
                                <!--<td><span id="nn">Resumo:</span></td>-->
                                <td colspan="2"><input type="text" id="resumo" name="resumo" placeholder="Insira um resumo do artigo" required pattern="[A-Za-z0-9.-\/|* ']{4,}" maxLength="250"></td>
                            </tr>
                            <tr>
                                <!--<td><span id="nn">Status:</span></td>-->
                                <td colspan="2">
                                    Status:<br>
                                    <select name="statusNews" id="statusNews">
                                        <option value="1">Ativo</option>
                                        <option value="0">Inativo</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" id="enviar"></td>
                            </tr>
                        </table>
                        <textarea name="conteudo" id="conteudo" cols="30" rows="10" style="display:none;" required></textarea>
                    </form>
                        <!--<button onclick="insertTextoEmTextarea()">Inserir textarea</button>-->
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
            var conteudo = document.getElementById("conteudo");
            conteudo.innerHTML = campoTexto;
        }

        function ValidateContactForm(){
            var titulo = document.getElementById("titulo");
            var resumo = document.getElementById("resumo");
            var conteudo = document.getElementById("conteudo");
            insertTextoEmTextarea();
            if(!empty(titulo)){
                alert("O campo titulo não pode ficar em branco!");
                return false;
            }else if(!empty(resumo)){
                alert("O campo resumo não pode ficar em branco!");
                return false;
            }else if(conteudo.value==''){
                alert("O campo conteudo não pode ficar em branco!");
                return false;
            }
        }
    </script>
</body>
</html>