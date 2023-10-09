<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<script type="text/javascript" src="jquery/code.jquery.com_jquery-3.7.1.min.js">-->
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="imgs/logo_sei_93x60.ico" type="image/x-icon" />
    <style>
        #calendario{
            border: 1px solid #000;
            border-collapse: collapse;
            background: #FFFFF0;
        }
       #calendario tr td{
        padding: 7px;
        text-align: center;
        justify-content: center;
        border-collapse: collapse;
        border: 1px solid #000;
        transition: ease-in-out 0.5s;
       }
       #calendario tr td:hover{
        background-color: green;
        color: #fff;
        transition: ease-in-out 0.5s;
       }
       #calendario #cabecalho{
        background-color: #cfcfcf;
       }
       #meses{
        border: 1px solid #dfdfdf;
        box-shadow: 2px 2px 2px rgba(0,0,0,0.3);
        background-color: #fff;
        width: 320px;
        padding: 10px;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        margin: 10px;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        min-height: 400px;
       }
       #conteudoMapa{
        align-items: center;
        width: 100%;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
       }
    </style>
</head>
<body>
        <?php include_once("menu.php"); ?>
    <div id="geral">
        <div id="central">
            <?php include_once("top.php"); ?>

            <div id="itemdois">
                <div class="post-content" style="width: 100%;">
                    <header class="entry-header">
                    <h2 class="entry-title">Capacitações disponíveis para o ano de <?php echo date('Y'); ?></h2>
                                        
                    </header>
                    <div id="conteudoMapa">
                        <?php
                            include_once("class/capacitacao.class.php");
                            $agenda = new Capacitacao();
                            $agenda->nextEvent();
                        ?>
                    </div>

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
        elemento.style.paddingTop  = (calcula-50) + 'px';
        elemento.style.paddingBottom  = calcula + 'px';

    </script>
</body>
</html>