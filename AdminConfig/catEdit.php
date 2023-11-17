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
        #itemdois{
            width: 420px;
            margin: auto;
        }
        footer{
            position: fixed;
            bottom: 0;
            left: 0;
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
                    Inserir Categoria
                </div>-->
                
                <div id="formLogin">
                    <?php
                    $id = $_GET['id'];
                        include_once("class/crud.categoria.class.php");
                        $obj = new Categoria();
                        $categoria = $obj->getCatObjById($id);
                        if($categoria->statusCat==0){
                            $status = 'Inativo';
                        }else{
                            $status = 'Ativo';
                        }
                    ?>
                        <table>
                            <form action="catEdit.submit.php" method="post" id="formulario" autocomplete="on" onsubmit="return ValidateContactForm();">
                            <tr>
                                <td><span id="nn">Título:</span></td>
                                <td><input type="text" id="tituloCat" name="tituloCat" value="<?php echo $categoria->titulo; ?>" required></td>
                            </tr>
                            <tr>
                                <td><span id="nn">Status:</span></td>
                                <td>
                                    <select name="status" id="status">
                                    <?php echo '<option value="'.$categoria->statusCat.'">'.$status.'</option>'; ?>
                                        <option value="1">Ativo</option>
                                        <option value="0">Inativo</option>
                                    </select>
                                    <input type="hidden" id="id" name="id" value="<?php echo $categoria->id; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" id="enviar" value="Editar Categoria"></td>
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