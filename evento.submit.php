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
                    <?php
                        $nome = $_POST['nome'];
                        $secretaria = $_POST['secretaria'];
                        $matricula = $_POST['matricula'];
                        $email = $_POST['email'];
                        $idevento = $_POST['idevento'];
                        include_once("class/inscricao.class.php");
                        $obj = new Inscricao();
                        $obj->insertInsc($nome, $secretaria, $matricula, $email, $idevento);
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