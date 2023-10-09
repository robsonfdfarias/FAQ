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
    <div id="mP">
        <div id="toggleMenu">MENU</div>
        <nav id="nav">
        <?php 
            include_once("../class/checked.pag.class.php");
            $checa = new CheckedPag();
        ?>
            <ul id="menu">
                <!--<li><a href="index.php">Home</a></li><span id="barra">|</span>
                <li><a href="sei.php">O que é o sei</a></li><span id="barra">|</span>
                <li><a href="mapa.php">Mapa</a></li><span id="barra">|</span>
                <li><a href="legislacao.php">Legislação</a></li><span id="barra">|</span>
                <li><a href="coisasParaSaberSei.php">Curiosidades sobre o SEI</a></li><span id="barra">|</span>
                <li><a href="declaracaoUtilidadePublica.php">Declaração de Utilidade Pública</a></li><span id="barra">|</span>
                <li><a href="perguntasFrequentes.php">Perguntas frequentes</a></li>-->

                <a href="index.php">
                    <img src="imgs/logo_sei_93x60.png" height="30" style="margin-right: 10px;" id="logo">
                  </a>
                    <li <?php $checa->retorna('index') ?>><a href="index.php">Home</a></li>
                    <li <?php $checa->retorna('inserir') ?>><a href="inserir.php">Inserir artigo</a></li>
                    <li <?php $checa->retorna('eventos') ?>><a href="eventos.php">Eventos</a></li>
                    <li <?php $checa->retorna('categoriaIndex') ?>><a href="categoriaIndex.php">Categoria</a></li>
                    <li <?php $checa->retorna('desloga') ?>><a href="desloga.php">Sair</a></li>
                    <span id="boasVindas">Logado como: <span id="nome"><?php echo $_SESSION['nome']; ?></span></span>
            </ul>
        </nav>
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