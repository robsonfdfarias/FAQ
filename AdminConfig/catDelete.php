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
                    Excluir Categoria
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
                            <form action="catDelete.submit.php" method="post" id="formulario" autocomplete="on" onsubmit="return ValidateContactForm();">
                            <tr>
                                <td colspan="2">
                                    <span id="infoDeleteCat">
                                        Você tem certeza que deseja excluir a categoria <?php echo '<strong>'.$categoria->titulo.'</strong>'; ?>?<br>
                                        Uma vez excluído, isso afetará todos os artigos que estão nessa categoria. Se for necessário mesmo. 
                                        Primeiro certifique-se de ter mudado a categoria de todos os artigos que a usam a categoria que será excluída. 
                                        Ou você poderá, ao invéz de excluir a categoria, apenas renomear para um nome melhor, que todos os artigos que 
                                        possuem essa categoria serão atualizados automáticamente.
                                    </span>
                                    <input type="hidden" id="id" name="id" value="<?php echo $categoria->id; ?>">
                                    <input type="hidden" id="titulo" name="titulo" value="<?php echo $categoria->titulo; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td width="50%"><button id="cancelar">Cancelar</button></td>
                                <td><input type="submit" id="excluir" value="Excluir Categoria"></td>
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
        var excluir = document.getElementById("excluir");
        excluir.addEventListener("click", function(){
            //insertTextoEmTextarea();
        })

        function ValidateContactForm(){
            var titulo = document.getElementById("tituloCat");
            if(!empty(titulo)){
                alert("O campo titulo não pode ficar em branco!");
                return false;
            }
        }
        document.getElementById("cancelar").addEventListener("click", function(){
            window.close();
        });
    </script>
</body>
</html>