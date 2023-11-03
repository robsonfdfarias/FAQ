<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="menu.css">
    <style type="text/css">
         
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
                            <img src="../imgs/logo-pref-jar.svg" height="35" style="margin-right: 10px;" id="logo">
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
                            
                            <li><a href="index.php">Home</a><span><div id="barra" <?php $checa->retorna('index') ?>></div></span></li>
                            <li><a href="inserir.php">Inserir artigo</a><span><div id="barra" <?php $checa->retorna('inserir') ?>></div></span></li>
                            <li><a href="eventos.php">Eventos</a><span><div id="barra" <?php $checa->retorna('eventos') ?>></div></span></li>
                            <li><a href="noticias.php">Notícias</a><span><div id="barra" <?php $checa->retorna('noticias') ?>></div></span></li>
                            <li><a href="categoriaIndex.php">Categoria</a><span><div id="barra" <?php $checa->retorna('categoriaIndex') ?>></div></span></li>
                            
                    </ul>
                            <span id="objRight">
                                <?php
                                    if(empty($_SESSION['nome'])){
                                        echo '
                                            <form id="pesq" method="post" action="pesq.php" role="search" style="padding-top:5px;">
                                                <input class="search" type="search" aria-label="Search" id="duvida" name="duvida" placeholder="Digite sua pesquisa">
                                            </form>
                                        ';
                                    }else{
                                        echo '
                                            <ul id="menu">
                                                <li><a href="desloga.php">Sair</a><span><div id="barra"></div></span></li>
                                            </ul>
                                        ';
                                    }
                                ?>
                            </span>
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
            if(num>0){
                num=0;
                mp.setAttribute('style', "height: 600px; Transition: ease-in-out 0.5s;");
                bt.innerText = "Fechar o menu";
                //nav.setAttribute('style', "display: flex; ");
            }else{
                num=1;
                mp.setAttribute('style', "height: 60px; Transition: ease-in-out 0.5s;");
                bt.innerText = "Menu";
                //nav.setAttribute('style', "display: none;")
            }
        });
    </script>
</body>
</html>