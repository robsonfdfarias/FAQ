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
    </style>
</head>
<body>
<div id="geral">
            <?php include_once("menu.php"); ?>
        <div id="central">
            <?php include_once("top.php"); ?>

            <div id="itemdois">
                <div id="tituloLogin">
                    Inserir Evento
                </div>

                <?php
                    $id = $_GET['id'];
                    include_once("class/capacitacao.class.php");
                    $obj = new Capacitacao();
                    $linha = $obj->getEventByIdJson($id);
                    $dt = explode("/", $linha->dtinicio);
                    $dti = $dt[2]."-".$dt[1]."-".$dt[0];
                    $dt = explode("/", $linha->dtfim);
                    $dtf = $dt[2]."-".$dt[1]."-".$dt[0];
                ?>
                
                <div id="formLogin">
                    
                        <table>
                            <tr>
                                <td colspan="2">
                                    <?php
                                        include_once("editText2.php");
                                    ?>
                                </td>
                            </tr>
                            <form action="editEvent.submit.php" method="post" id="formulario" autocomplete="on" onsubmit="return ValidateContactForm();">
                            <tr>
                                <td><span id="nn">Título:</span></td>
                                <td><input type="text" id="titulo" name="titulo" required style="color:#000;padding-left: 10px;" value="<?php echo $linha->titulo; ?>"></td>
                            </tr>
                            <tr>
                                <td><span id="nn">Data de inicio:</span></td>
                                <td><input type="date" id="dtinicio" name="dtinicio" required value="<?php echo $dti; ?>"></td>
                            </tr>
                            <tr>
                                <td><span id="nn">Data de fim:</span></td>
                                <td><input type="date" id="dtfim" name="dtfim" required value="<?php echo $dtf; ?>"></td>
                            </tr>
                            <tr>
                                <td><span id="nn">Número de vagas:</span></td>
                                <td>
                                    <input type="number" id="vagas" name="vagas" required value="<?php echo $linha->vagas; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td><span id="nn">Terá certificado?</span></td>
                                <td>
                                    <select name="certificado" id="certificado">
                                        <?php 
                                            if($linha->certificado>0){
                                                $status = "Sim";
                                            }else{
                                                $status = "Não";
                                            }
                                            echo '<option value="'.$linha->certificado.'">'.$status.'</option>';
                                        ?>
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" id="enviar">
                                <input type="hidden" name="dataPost" value="<?php echo $linha->dtpost; ?>">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <textarea name="texto" id="conteudoArtigo" cols="30" rows="10" style="display:none;" required><?php echo $linha->texto; ?></textarea></td>
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
        var tt = document.getElementById("texto");
        var campoTexto = document.getElementById("conteudoArtigo");
        tt.innerHTML = campoTexto.value;
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