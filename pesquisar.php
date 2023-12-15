<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<script type="text/javascript" src="jquery/code.jquery.com_jquery-3.7.1.min.js">-->
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="imgs/logo_sei_93x60.ico" type="image/x-icon" />
    <style>
        #itemdois{
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
    <div id="geral">
        <?php include_once("menu.php"); ?>
            <?php include_once("top.php"); ?>
        <div id="central" style="margin-top: 30px;">

            <div id="itemdois">
                <div class="post-content" style="width: 100%; padding:0px;">
                    <div id="menuPesq">
                        <select name="filtro" id="filtro">
                            <option value="matricula">Matrícula</option>
                            <option value="nome" selected>Nome</option>
                            <option value="descriUnidade">Descrição da Unidade</option>
                            <option value="siglaUnidade">Sigla da Unidade</option>
                            <option value="secretaria">Secretaria</option>
                            <option value="email">E-mail</option>
                        </select>
                        <select name="secretaria" id="secretaria">
                            <option value="Gabpref" selected>Gabinete do Prefeito - (Gabpref)</option>
                            <option value="chefGab">Chefia de Gabinete</option>
                            <option value="Gabvice">Gabinete do Vice-Prefeito - (Gabvice)</option>
                            <option value="PGM">Procuradoria-Geral do Município - (PGM)</option>
                            <option value="Semtip">Secretaria Municipal da Transparência e Integridade Pública - (Semtip)</option>
                            <option value="Semfaz">Secretaria Municipal da Fazenda - (Semfaz)</option>
                            <option value="Semad">Secretaria Municipal da Administração - (Semad)</option>
                            <option value="Semcel">Secretaria Municipal de Cultura, Esporte e Lazer - (Semcel)</option>
                            <option value="Semdra">Secretaria Municipal do Desenvolvimento Rural e Abastecimento - (Semdra)</option>
                            <option value="Semed">Secretaria Municipal de Educação - (Semed)</option>
                            <option value="Semsa">Secretaria Municipal de Saúde - (Semsa)</option>
                            <option value="Semop">Secretaria Municipal de Obras e Serviços Públicos - (Semop)</option>
                            <option value="Semplu">Secretaria Municipal de Planejamento e Urbanismo - (Semplu)</option>
                            <option value="Sedein">Secretaria Municipal de Desenvolvimento Econômico e Inovação - (Sedein)</option>
                            <option value="Semash">Secretaria Municipal de Assistência Social e Habitação - (Semash)</option>
                            <option value="CMEI Jader Marcolla">CMEI Jader Marcolla</option>
                            <option value="padrao" disabled selected name="padrao" id="padrao">Selecione uma secretaria</option>
                        </select>
                        <div id="btUnidades" onclick="getUnidades()">Ver Unidades</div>
                        <input type="text" id="valor" placeholder="Pesquisar" required>
                        <button onclick="pesq()">Pesquisar</button>
                    </div>
                    <div id="porcentagem"></div>
                    <div id="retorno"></div>

                    <div id="divUnidades"></div>

                </div>
            </div>
        </div>
    </div>

        <?php
            include_once("footer.php");
        ?>

<script src="script.js"></script>
        <script>
            
        </script>
</body>
</html>