<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="menu.css">
    <style type="text/css">
        #menu li {
            /* position:relative; */
            color: #fff;
        }
        #menu li ul{
            position:absolute;
            top:60px;
            display:none;
            text-decoration: none;
            text-indent: 0;
        }
        #menu li:hover ul{display:block;}
        #menu li ul a {
            padding: 0px;
        }
        #menu li ul a li{
            border:1px solid #c0c0c0;
            display:block;
            width:200px;
            background-color: #fff;
            border:1px solid #cfcfcf;
            text-align: left;
            padding: 10px;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            color: #000;
            height: 1.5em;
        }

        #menu li ul a li:hover {
            color: #fff;
        }
        #menu li ul a li:hover{
            background-color: #0c582c;
        }

        @media (max-width:1119px){
            #menu li ul{
                position: relative;
            }
        }


        @media (min-width:1120px){
            #menu li ul{
                position:absolute;
            }
        }

        /* #menu li ul{
            display: none;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding:0;
            margin: 0;
        }
        #menu li ul li{
            text-decoration: none;
            list-style: none;
            /*background-image: linear-gradient(180deg, #052412, #083a1d,#083a1d);
            background-size: 100% 200%;
            background-position: 50% 100%;
            animation: gradientR 0.5s ease;
            -webkit-animation: gradientR 0.5s ease;
            animation-fill-mode:forwards;
            display:flex;
            flex-direction: column;
            height: 3.6rem;
            transition: ease 0.3s;
            text-align: center;
            justify-content: center;
            align-items: center;
            vertical-align: middle;
            padding-top: 10px;
            border: 1px solid rgba (0,0,0,0.5);
        }
        #menu li ul li a{
            height: 25px;
            padding: 0px 5px;
            text-decoration: none;
            color: #fff;
        }
        #menu li ul li span{
            width: 100%;
            height: 14px !important;
            display:flex;
            flex-direction: column;
            text-align: center;
            transition: ease 0.3s;
            justify-content: end;
            vertical-align: bottom;
            align-items: end;
        }
        #menu li ul li span #barra2{
            width: 100%;
            height: 0px;
            text-align: center;
            border-top: 0px solid green;
            transition: ease 0.3s;
            background-color: #fff;
        }

        #menu li ul li:hover span #barra2{
            align-items: end;
            height: 0px;
            border-top: 9px solid #b1cd49;
            text-shadow: chartreuse;
            transition: ease 0.3s;
        } */
    </style>
</head>
<body>
    <div id="barraMenu">
        <div id="centroMenu">
            <div id="mP">
                <div id="toggleMenu">MENU</div>
                <nav id="nav">
                <?php 
                    include_once("class/checked.pag.class.php");
                    $checa = new CheckedPag();
                ?>
                    <div id="logoPref">
                        <a href="index.php">
                            <img src="imgs/logo-pref-jar.svg" height="55" style="margin-right: 10px;" id="logo">
                        </a>
                    </div>
                    <ul id="menu">
                        <!--<li><a href="index.php">Home</a></li><span id="barra">|</span>
                        <li><a href="sei.php">O que é o sei</a></li><span id="barra">|</span>
                        <li><a href="mapa.php">Mapa</a></li><span id="barra">|</span>
                        <li><a href="legislacao.php">Legislação</a></li><span id="barra">|</span>
                        <li><a href="coisasParaSaberSei.php">Curiosidades sobre o SEI</a></li><span id="barra">|</span>
                        <li><a href="declaracaoUtilidadePublica.php">Declaração de Utilidade Pública</a></li><span id="barra">|</span>
                        <li><a href="perguntasFrequentes.php">Perguntas frequentes</a></li>-->

                        
                            <li><a href="perguntasFrequentes.php">Perguntas</a><span><div id="barra" <?php $checa->retorna('perguntasFrequentes') ?>></div></span></li>
                            <li>Sobre o SEI<span><div id="barra" <?php $checa->retorna('sei') ?>></div></span>
                                <ul>
                                    <a href="sei.php"><li <?php $checa->retorna2('sei') ?>>O que é o SEI</li></a>
                                    <a href="legislacao.php"><li <?php $checa->retorna2('legislacao') ?>>Legislação</li></a>
                                    <a href="mapa.php"><li <?php $checa->retorna2('mapa') ?>>Estrutura Administrativa</li></a>
                                </ul>
                            </li>
                            <!-- <li><a href="legislacao.php">Legislação</a><span><div id="barra" <?php //$checa->retorna('legislacao') ?>></div></span></li>
                            <li><a href="mapa.php">Estrutura Administrativa</a><span><div id="barra" <?php //$checa->retorna('mapa') ?>></div></span></li> -->
                            <li><a href="capacitacao.php">Capacitação</a><span><div id="barra" <?php $checa->retorna('capacitacao') ?>></div></span></li>
                            <li><a href="pesquisar.php">Contatos</a><span><div id="barra" <?php $checa->retorna('pesquisar') ?>></div></span></li>
                            <!-- <li><a href="pesquisar.php">Contatos</a><span><div id="barra" <?php $checa->retorna('pesquisar') ?>></div></span></li> -->
                            <span>
                                <form id="pesq" method="post" action="pesq.php" role="search">
                                    <input class="search" type="search" aria-label="Search" id="duvida" name="duvida" placeholder="Digite sua pesquisa">
                                </form>
                            </span>
                            <!--<li><a href="index.php">Home</a><span><div id="barra" <?php //$checa->retorna('index') ?>></div></span></li>
                            <li><a href="coisasParaSaberSei.php">Curiosidades sobre o SEI</a><span><div id="barra" <?php //$checa->retorna('coisasParaSaberSei') ?>></div></span></li>
                            <li><a href="declaracaoUtilidadePublica.php">Declaração de Utilidade Pública</a><span><div id="barra" <?php //$checa->retorna('declaracaoUtilidadePublica') ?>></div></span></li>-->
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <script>
        var num=1;
        var bt = document.getElementById("toggleMenu");

        bt.addEventListener('click', function(){
            //var nav = document.getElementById("nav");
            var mp = document.getElementById("mP");
            var barraMenu = document.getElementById("barraMenu");
            if(num>0){
                num=0;
                mp.setAttribute('style', "height: 600px; Transition: ease-in-out 0.5s;");
                barraMenu.setAttribute('style', "height: 600px; Transition: ease-in-out 0.5s;");
                bt.innerText = "Fechar o menu";
                //nav.setAttribute('style', "display: flex; ");
            }else{
                num=1;
                mp.setAttribute('style', "height: 60px; Transition: ease-in-out 0.5s;");
                barraMenu.setAttribute('style', "height: 60px; Transition: ease-in-out 0.5s; overflow: hidden;");
                bt.innerText = "Menu";
                //nav.setAttribute('style', "display: none;")
            }
        });
    </script>
</body>
</html>