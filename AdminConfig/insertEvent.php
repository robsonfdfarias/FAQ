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
        #formLogin{
            padding: 0;
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
                
                <div id="formLogin">
                    
                        <table>
                            <tr>
                                <td colspan="2">
                                    <?php
                                        include_once("editText2.php");
                                    ?>
                                </td>
                            </tr>
                            <form action="insertEvent.submit.php" method="post" id="formulario" autocomplete="on" onsubmit="return ValidateContactForm();">
                            <tr>
                                <td><span id="nn">Título:</span></td>
                                <td><input type="text" id="titulo" name="titulo" required style="color:#000;padding-left: 10px;"></td>
                            </tr>
                            <tr>
                                <td><span id="nn">Local:</span></td>
                                <td><input type="text" id="local" name="local" required style="color:#000;padding-left: 10px;"></td>
                            </tr>
                            <tr>
                                <td><span id="nn">Data de inicio:</span></td>
                                <td><input type="date" id="dtinicio" name="dtinicio" required  onkeypress="return false"></td>
                            </tr>
                            <tr>
                                <td><span id="nn">Data de fim:</span></td>
                                <td><input type="date" id="dtfim" name="dtfim" required  onkeypress="return false" disabled></td>
                            </tr>
                            <tr>
                                <td><span id="nn">Hora de inicio:</span></td>
                                <td><input type="time" id="horainicio" name="horainicio" required></td>
                            </tr>
                            <tr>
                                <td><span id="nn">Hora de fim:</span></td>
                                <td><input type="time" id="horafim" name="horafim" required></td>
                            </tr>
                            <tr>
                                <td><span id="nn">Número de vagas:</span></td>
                                <td>
                                    <input type="number" id="vagas" name="vagas" required>
                                </td>
                            </tr>
                            <tr>
                                <td><span id="nn">Terá certificado?</span></td>
                                <td>
                                    <select name="certificado" id="certificado">
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" id="enviar"></td>
                                <input type="hidden" name="dataPost" value="<?php echo date("d/m/Y"); ?>">
                                <textarea name="texto" id="conteudoArtigo" cols="30" rows="10" style="display:none;" required></textarea>
                            </tr>
                            </form>
                        </table>
                        <button onclick="insertTextoEmTextarea()" style="display:none;">Inserir textarea</button>
                </div>
            </div>
        </div>
    </div>
    <?php
        include_once("footer.php");
    ?>
    <script>
        var today = new Date();
today.setDate(today.getDate()); //Voalá
today = today.toISOString().split('T')[0];

var dtinicio = document.getElementById("dtinicio");
var dtfim = document.getElementById("dtfim");

dtinicio.setAttribute('min', today);
dtfim.setAttribute('min', today);
dtinicio.addEventListener("change", function(){
    dtfim.disabled = false;
    dtfim.setAttribute('min', this.value);
    if(dtfim.value<this.value){
        dtfim.value = this.value;
    }
})


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
            var conteudoArtigo = document.getElementById("conteudoArtigo");
            insertTextoEmTextarea();
            if(conteudoArtigo.value==''){
                alert("O campo conteudoArtigo não pode ficar em branco!");
                return false;
            }
        }
    </script>
</body>
</html>