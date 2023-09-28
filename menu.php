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
            <ul id="menu">
                <li><a href="index.php">Home</a></li><span id="barra">|</span>
                <li><a href="sei.php">O que é o sei</a></li><span id="barra">|</span>
                <li><a href="mapa.php">Mapa</a></li><span id="barra">|</span>
                <li><a href="legislacao.php">Legislação</a></li><span id="barra">|</span>
                <li><a href="coisasParaSaberSei.php">Curiosidades sobre o SEI</a></li><span id="barra">|</span>
                <li><a href="declaracaoUtilidadePublica.php">Declaração de Utilidade Pública</a></li><span id="barra">|</span>
                <li><a href="perguntasFrequentes.php">Perguntas frequentes</a></li>
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
                mp.setAttribute('style', "height: 300px; Transition: ease-in-out 0.5s;");
                bt.innerText = "Fechar o menu";
                //nav.setAttribute('style', "display: flex; ");
            }else{
                num=1;
                mp.setAttribute('style', "height: 40px; Transition: ease-in-out 0.5s;");
                bt.innerText = "Menu";
                //nav.setAttribute('style', "display: none;")
            }
        });
    </script>
</body>
</html>