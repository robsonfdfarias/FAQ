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
        <?php include_once("menu.php"); ?>
    <div id="geral">
        <div id="central">
            
        <?php include_once("top.php"); ?>


            <div id="itensum">

                <div id="artigo" style="border-radius: 5px; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5);">
                <div id="geralMenuCat">
                    <div id="tituloCatMenuPag">Eventos:</div>
                    <div id="addCatMenuPag">
                        <a href="catAdd.php">
                            <img src="imgs/cat-add.svg" alt="Adicionar categoria" title="Adicionar categoria" height="30"> Adicionar evento
                        </a>
                    </div>
                    <!--<div id="opMenuCat">
                        
                        <img src="imgs/cat-add.svg" alt="Adicionar categoria" title="Adicionar categoria" width="250"><br>
                        Adicionar categoria
                    </div>

                    <div id="opMenuCat">
                        <a href="catEdit.php">
                        <img src="imgs/cat-edit.svg" alt="Editar categoria" title="Editar categoria" width="250"><br>
                        Editar categoria
                        </a>
                    </div>

                    <div id="opMenuCat">
                        <img src="imgs/cat-delete.svg" alt="Deletar categoria" title="Deletar categoria" width="250"><br>
                        Deletar categoria
                    </div>-->
                </div>
                    <?php
                        $id = $_GET['id'];
                        include_once("class/capacitacao.class.php");
                        $obj = new Capacitacao();
                        $obj->agenda();
                    ?>
                </div>

            </div>

        </div>
    </div>

    <?php
            include_once("footer.php");
        ?>
    <script type="text/javascript">
        var elemento = document.getElementById('top');
        var calcula = 260-elemento.clientHeight;
        calcula = calcula/2;
        console.log(calcula+" ---");
        elemento.style.paddingTop  = calcula + 'px';
        elemento.style.paddingBottom  = calcula + 'px';
    </script>
</body>
</html>