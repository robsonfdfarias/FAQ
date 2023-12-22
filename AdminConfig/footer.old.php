<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            padding: 0px;
            margin: 0px;
        }
        #footer{
            width: 100%;
            padding: 40px 0;
            background-color: #0c582c;
            display: flex;
            text-align: center;
            justify-content: center;
            align-self: flex-end;
        }
        #footer #footerInterno{
            width: 1100px;
        }
        #camada1{
            font-size: 1.2rem;
            padding: 10px;
            margin-bottom: 10px;
        }
        #camada1 a{
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: ease 0.4s;
        }
        #camada1 a:visited{
            color: #fff;
            text-decoration: none;
            transition: ease 0.4s;
            font-size: 1.2rem;
        }
        #camada1 a:hover{
            color: #04c052;
            text-decoration: none;
            transition: ease 0.4s;
            font-size: 1.2rem;
        }
        #footerCategoriaTitulo{
            font-size: 1.5rem;
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <footer id="footer">
        <div id="footerInterno">
                <div id="camada1">
                    <span id="footerCategoriaTitulo">Categorias: </span><br><br>
                    <?php
                        include_once("class/crud.categoria.class.php");
                        $objCatFoot = new Categoria();
                        $objCatFoot->getCatFooter();
                    ?>
                </div>
                <div id="camada2">Copyright © 2023 de Robson Farias (robsonfdfarias@gmail.com)</div>
            </div>
    </footer>
</body>
</html>