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
        }
        #footer #footerInterno{
            width: 1100px;
        }
        #camada1Footer{
            font-size: 1.2rem;
            padding: 10px;
            margin-bottom: 10px;
        }
        #camada1Footer a{
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: ease 0.4s;
        }
        #camada1Footer a:hover{
            color: blue;
            transition: ease 0.4s;
            font-size: 1.3rem;
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
                    <span id="footerCategoriaTitulo">Categorias: </span><br><br>
                <div id="camada1Footer">
                    <?php
                        include_once("class/crud.categoria.class.php");
                        $obj = new Categoria();
                        $obj->getCatFooter();
                    ?>
                </div>
                <div id="camada2">Copyright © 2023 de Robson Farias (robsonfdfarias@gmail.com)</div>
            </div>
    </footer>
</body>
</html>