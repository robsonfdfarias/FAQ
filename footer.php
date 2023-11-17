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
            padding-top: 40px;
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
            padding: 0px 32px;
            margin-bottom: 10px;
        }
        #camada1Footer a{
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: ease 0.4s;
        }
        #camada1Footer a:hover{
            color: #04c052;
            transition: ease 0.4s;
        }
        #footerCategoriaTitulo{
            font-size: 1.5rem;
            color: #fff;
            font-weight: bold;
        }
        #camada2{
            color: #fff;
            font-size: 12px;
            padding: 32px 0px;
        }
    </style>
</head>
<body>
    <footer id="footer">
        <div id="footerInterno">
                    <!--<span id="footerCategoriaTitulo">Categorias: </span><br><br>-->
                <div id="camada1Footer">
                    <?php
                        //include_once("class/crud.categoria.class.php");
                        //$obj = new Categoria();
                        //$obj->getCatFooter();
                    ?>
                    <span id="login"><a href="AdminConfig/index.php" target="_blank" rel="noopener noreferrer">Logar</a></span>
                    <span id="redesFooter">
                        <a href="#">
                            <!--<img src="imgs/facebook.svg" style="--invert: 24%; --sepia: 38%; --saturate:1515%; --hueRotate: 192deg; --brightness: 110%; --contrast: 81%;" alt="Acesse nosso canal do Facebook" title="Acesse nosso canal do Facebook" height="20">-->
                            <img src="imgs/facebook.svg" style="--invert: 65%; --sepia: 20%; --saturate:5764%; --hueRotate: 188deg; --brightness: 97%; --contrast: 103%;" alt="Acesse nosso canal do Facebook" title="Acesse nosso canal do Facebook" height="20">
                        </a>
                        <a href="#">
                            <img src="imgs/instagram.svg" style="--invert: 60%; --sepia: 20%; --saturate:2147%; --hueRotate: 321deg; --brightness: 95%; --contrast: 85%;" alt="Acesse nosso canal do Instagram" title="Acesse nosso canal do Instagram" height="20">
                        </a>
                        <a href="https://www.youtube.com/@InformaticacomRobsonFarias">
                            <img src="imgs/youtube.svg" style="--invert: 27%; --sepia: 51%; --saturate:2878%; --hueRotate: 346deg; --brightness: 104%; --contrast: 97%;" alt="Acesse nosso canal do Youtube" title="Acesse nosso canal do Youtube" height="20">
                        </a>
                        <a href="https://www.jaraguadosul.sc.gov.br/">
                            <img src="imgs/globo.svg" style="--invert: 100%; --sepia: 96%; --saturate:12%; --hueRotate: 239deg; --brightness: 103%; --contrast: 100%;" alt="Acesse o site da prefeitura" title="Acesse o site da prefeitura" height="20">
                        </a>
                        <!--<a href="#">
                            <img src="imgs/twitter.svg" style="--invert: 72%; --sepia: 69%; --saturate:5316%; --hueRotate: 161deg; --brightness: 96%; --contrast: 102%;" alt="Acesse Twitter da prefeitura de Jaraguá do Sul" title="Acesse Twitter da prefeitura de Jaraguá do Sul" height="20">
                        </a>
                        <a href="anexos/POP-Procedimento-Operacional-Padrao.pdf">
                            <img src="imgs/grampo.svg" style="--invert: 27%; --sepia: 51%; --saturate:2878%; --hueRotate: 346deg; --brightness: 104%; --contrast: 97%;" alt="Acesse site da prefeitura de Jaraguá do Sul" title="Acesse site da prefeitura de Jaraguá do Sul" height="20">
                        </a>-->
                    </span><br>
                    <hr style="border: 1px solid #b1cd49;">
                </div>
                <div id="camada2"><em>Prefeitura de Jaraguá do Sul - SC - CNPJ: 83.102.459/0001-23 - Rua Walter Marquardt, 1111 - Barra do Rio Molha - 89259-565 - Caixa Postal 421 - Fone: (047) 2106-8000</em></div>
            </div>
    </footer>
</body>
</html>