<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="imgs/logo_sei_93x60.ico" type="image/x-icon" />
</head>
<body>
<div id="geral">
            <?php include_once("menu.php"); ?>
        <div id="central">
            <div id="top">
                <div id="form">
                    <span id="titulo">Sei! Sistema Eletrônico de Informações</span><br>
                    <span id="subtitulo">Área de login</span><br><br>
                    <!--<form id="pesq" method="post" action="pesq.php">
                        <input type="text" name="duvida" id="duvida" placeholder="Digite sua pesquisa">
                        <input type="submit" name="pesquisar" id="pesquisar" value="Pesquisar">    
                    </form>-->
                </div>
            </div>

            <div id="itemdois">
                <div id="tituloLogin">
                    Login
                </div>
                
                <div id="formLogin">
                    <form action="login.submit.php" method="post" id="formulario">
                        <table>
                            <tr>
                                <td><span id="nn">E-mail:</span></td>
                                <td><input type="text" id="email" name="email"></td>
                            </tr>
                            <tr>
                                <td><span id="nn">Senha:</span></td>
                                <td><input type="password" id="senha" name="senha"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" id="enviar"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>