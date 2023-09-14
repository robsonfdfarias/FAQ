<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .menu{
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;

            border:0px solid #c0c0c0;
            float:left;
            width: 100%;
            position: relative;
            top:-20px;
            left: 0;
            background-color: #07331a;
        /* background-color: rgba(19, 73, 12, 0.9);*/
            box-shadow: 8px;
            font-size: 19px;
            min-height: 50px;
            float:left;
        }
        .menu nav{
            text-align: center;
            margin: 0;
            width: 100%;
            height: 100%;
        }

        .menuI li{
            position:relative;
            float:left;
            /*border-right:1px solid #c0c0c0;*/
        }

        .menuI li a{
            color:#fff; 
            text-decoration:none; 
            padding:15px 10px;
            display: block;
            transition: ease-in-out 0.3s;
        }

        .menuI li a:hover{
            color:#000;
            background-color: #fff;
            -moz-box-shadow:0 3px 10px 0 #fff;
            /*padding-bottom: 5px;*/
            border-bottom: 4px solid #09be73;
            transition: ease-in-out 0.3s;
        }

        .menuI li{
            position:absolute;
            top:25px;
            left:0;
            background-color:#fff;
        }

        .menuToggle{
            display: none;
            padding: 10px;
            text-align: right;
        }

        @media (max-width: 800px){
            .menuToggle{
                display: block;
            }
            #barra{
                display: none;
            }
            .menu{
                /*display:table-row;
                padding: 10px 20px;*/
                float: none;
                display:grid;
                float: none;
            }

            .menu nav{
                position: absolute;
                width: 100%;
                top: 50px;
                left: 0;
                background-color: #445964;
                float: none;
                padding: 0;
            }

            .menuI{
                display: block;
                width: 100% !important;
                margin: 0;
            }

            .menuI li{
                width: 100% !important;
            }

            .menuI li a{
                width: 100% !important;
            }
        }
    </style>
</head>
<body>
    <div id="menu">
        <div class="menuToggle"><span id="menuLink">Menu</span></div>
        <nav>
            <ul class="menuI" id="menuI">
                <li><a href="#">Home</a></li><span id="barra">|</span>
                <li><a href="#">O que é o sei</a></li><span id="barra">|</span>
                <li><a href="#">Mapa</a></li><span id="barra">|</span>
                <li><a href="#">Legislação</a></li><span id="barra">|</span>
                <li><a href="#">Capacitação</a></li><span id="barra">|</span>
                <li><a href="#">Perguntas frequentes</a></li>
            </ul>
        </nav>
    </div>
    <script>
        var num=1;
        function bt(){
            var bt = document.getElementById("menuLink");
            bt.addEventListener('click', function(){
                var menu = document.getElementById("menuI");
                //console.log(menu);
                if(num>0){
                    num=0;
                    menu.setAttribute('style', 'display: none;');
                }else{
                    num=1;
                    menu.setAttribute('style', 'display: block;');
                }
            });
        }
        window.onload = bt;
    </script>
    
</body>
</html>
