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
            <div id="top">
                <div id="form">
                    <span id="titulo">Sei! Sistema Eletrônico de Informações</span><br>
                    <span id="subtitulo">Área de login</span><br><br>
                </div>
            </div>

            <div id="itemdois">
                <div id="tituloLogin">
                    Inserir Categoria
                </div>
                
                <div id="formLogin">
                    
                        <table>
                            <form action="catAdd.submit.php" method="post" id="formulario" autocomplete="on" onsubmit="return ValidateContactForm();">
                            <tr>
                                <td><span id="nn">Título:</span></td>
                                <td><input type="text" id="tituloCat" name="tituloCat" required></td>
                            </tr>
                            <tr>
                                <td><span id="nn">Status:</span></td>
                                <td>
                                    <select name="status" id="status">
                                        <option value="1">Ativo</option>
                                        <option value="0">Inativo</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" id="enviar"></td>
                            </tr>
                            </form>
                        </table>
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
            //insertTextoEmTextarea();
        })

        function ValidateContactForm(){
            var titulo = document.getElementById("tituloCat");
            if(!empty(titulo)){
                alert("O campo titulo não pode ficar em branco!");
                return false;
            }
        }
    </script>
</body>
</html>