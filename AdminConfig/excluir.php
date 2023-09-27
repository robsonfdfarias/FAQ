<?php
    include_once("checa.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="imgs/logo_sei_93x60.ico" type="image/x-icon" />
    <style>
        #glass{
            background: rgba( 255, 255, 255, 0.35 );
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            backdrop-filter: blur( 9.5px );
            -webkit-backdrop-filter: blur( 9.5px );
            border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );
            position: absolute;
            left: 0;
            top:0;
            width: 100%;
            height: 100%;
            z-index:5;
        }
        #avisogeral{
            width: 100%;
            height: 100%;
            position: absolute;
            left:0;
            top:0;
            z-index: 10;
            display: flex;
            text-align: center;
        }
        #avisoCentral{
            width: 600px;
            height: 400px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 2px 2px 2px rgba(0,0,0,0.5);
            padding: 20px;
            margin: auto;
        }
        #tt{
            color: green;
        }
        #excluir{
            padding:10px 25px;
            font-size: 1.3rem;
            color: #fff;
            background-color: red;
            margin-right: 10px;
        }
        #cancelar{
            padding:10px 25px;
            font-size: 1.3rem;
            color: #fff;
            background-color: green;
            margin-left: 10px;
        }
    </style>
</head>
<body>
        <?php include_once("menu.php"); ?>
    <div id="geral">
        <div id="central">
            <div id="top">
                <div id="form">
                    <span id="titulo">Sei! Sistema Eletrônico de Informações</span><br>
                    <span id="subtitulo">Perguntas frequentes</span><br><br>
                    <form id="pesq" method="post" action="pesq.php">
                        <input type="text" name="duvida" id="duvida" placeholder="Digite sua pesquisa">
                        <input type="submit" name="pesquisar" id="pesquisar" value="Pesquisar">    
                    </form>
                </div>
            </div>

                
            <div id="itensum" style="margin-top:-35px;">

                <div id="artigo" style="border-radius: 5px; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5);">
                    <?php
                        $id = $_GET['id'];
                        include_once("class/crud.artigo.class.php");
                        $obj = new CRUD();
                        $obj->getArtById($id);
                        $artigo = $obj->getArtByIdJson($id);
                    ?>
                </div>

            </div>
            <div id="glass"></div>
            <div id="avisogeral">
                <div id="avisoCentral">
                    <h1>Alerta!!!</h1>
                    <h3>Você tem certeza que deseja excluir o artigo com titulo:<br> <span id="tt"><?php echo $artigo->titulo; ?></span>
                        <br>E resumo:<br> <span id="tt"><?php echo $artigo->resumo; ?></span>
                    </h3>
                    <button id="excluir" onclick="excluir()">EXCLUIR</button><button id="cancelar" onclick="cancelar()">CANCELAR</button>
                    <span id="id" style="display:none;"><?php echo $id; ?></span>
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

        function excluir(){
            var id = document.getElementById("id");
            //alert(id.innerText);
            window.open("excluir.submit.php?id="+id.innerText);
        }
        function cancelar(){
            window.open("index.php");
        }

    </script>
</body>
</html>