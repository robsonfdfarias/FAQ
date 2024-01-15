<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="imgs/logo_sei_93x60.ico" type="image/x-icon" />
    <style>
        footer{
            position: fixed;
            bottom: 0;
            left: 0;
        }
    </style>
</head>
<body>
    <?php
        //filtro de acesso por IP
        //isolado para caso desejem remover essa camada de segurança, é só comentar essa parte do código
        /*$ipaddress = '';
        if ($_SERVER['HTTP_CLIENT_IP'])
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if($_SERVER['HTTP_X_FORWARDED_FOR'])
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if($_SERVER['HTTP_X_FORWARDED'])
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if($_SERVER['HTTP_FORWARDED_FOR'])
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if($_SERVER['HTTP_FORWARDED'])
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if($_SERVER['REMOTE_ADDR'])
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        $ip = $ipaddress;
        if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $id=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $id=$_SERVER['REMOTE_ADDR'];
        }*/
        //echo '<br><br><br><h1>'.$ip.'</h1>';
        //$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        //var_dump($details);
        //echo '<br>'+$details->ip;
        //echo '<br>'.$ip.'--<br>';
    ?>
            <?php include_once("menu.php"); ?>
<div id="geral" style="min-height:75vh; display:flex; flex-direction: row; align-items:center; justify-content: center;">
        <div id="central" style="width: 500px;">
            
        <?php //include_once("top.php"); ?>

            <div id="itemdois">
                
                <div id="formLogin">
                <div id="titleLogin" style="text-align: center;">
                    <h1 style="font-size:32px; font-weigth: 600; line-height: 25px;">Login Painel</h1>
                    <span style="font-size:16px; font-weigth: 400; line-height: 24px;">Acesso ao Painel do Site</span><br><br>
                </div>
                    <form action="login.submit.php" method="post" id="formulario" style="width:100%; line-height:35px;">
                    <span id="nn">E-mail</span><br>
                    <input type="text" id="email" name="email" placeholder="Digite seu email"><br>
                    <span id="nn">Senha</span><br>
                    <div id="divPass" style="position:relative;">
                        <input type="password" id="senha" name="senha" placeholder="Digite sua senha">
                        <img src="AdminConfig/imgs/senha-mostrar.svg" id="olho" height="30" title="Mostrar senha" style="position:absolute;right:0;top:7px; cursor:pointer;" onclick="seePass(this)">
                    </div><br>
                    <input type="submit" id="enviar" value="Entrar"><br>
                        <!--<table style="width: 100%;">
                            <tr>
                                <td><span id="nn">E-mail:</span></td>
                                <td><input type="text" id="email" name="email" placeholder="Digite seu email"></td>
                            </tr>
                            <tr>
                                <td><span id="nn">Senha:</span></td>
                                <td><input type="password" id="senha" name="senha" placeholder="Digite sua senha"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" id="enviar" value="Entrar"></td>
                            </tr>
                        </table>-->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        include_once("footer.php");
    ?>
    <script>
        function seePass(olho){
            var senha = document.getElementById('senha');
            if(senha.getAttribute("type")!="password"){
                senha.setAttribute("type", "password");
                olho.setAttribute("src", "AdminConfig/imgs/senha-mostrar.svg");
            }else{
                senha.setAttribute("type", "text");
                olho.setAttribute("src", "AdminConfig/imgs/senha-ocultar.svg");
            }
        }
    </script>
</body>
</html>

<div id="pai">
    Este é o elemento PAI
    <div id="filho">Este é o elemento FILHO</div>
</div>

<script>
    filho = document.getElementById('filho');
    pai = filho.parentNode;
    contaFilhos = pai.childElementCount;
    console.log(pai);
    console.log(filho);
    console.log('Número de filhos do elemento PAI: '+contaFilhos);
</script>