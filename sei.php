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
       /* #itensum {
            width:100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;
        }

        #img{
            background-image: url('imgs/img1.png');
            background-repeat: no-repeat;
            background-size: 150%;
            background-position: center top;
            transition: background 1s;
            background-color: white;
            height: 200px;
            width: 100%;
            border-radius: 5px 25px 0 0;
        }
        #img:hover{
            background-size: 120%;
            transition: background 1s;
        }

        @media screen and (min-width: 769px) {
            #itensum {
                -webkit-column-count: 3; 
                -moz-column-count: 3; 
                column-count: 3;
            }
            div.objitensum {
                width: 33%;
            }
        }

        @media screen and (max-width: 768px) {
            #itensum {
                display: flex;
                flex-wrap: wrap;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                text-align: center;
            }
            div.objitensum {
                width: 48% !important; 
            }
        }

        @media screen and (max-width: 514px) {
            #itensum {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                text-align: center;
            }
            div.objitensum {
                width: 100% !important;
            }
            #duvida {
                min-width: 150px;
            }
        }

        div.objitensum {
            width: 33%;
            height: 400px;
            background-color: #fff;
            margin: 5px;
            padding: 0px;
            border-radius: 5px 25px;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
            color: black;
        }

        #duvida {
            width: calc(100% - 170px); 
            height:35px;
            border-radius: 15px;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
            border: 0px;
            margin-bottom: 5px;
            font-size: 120%;
            padding-left: 5px;
        }

        #pesquisar {
            width: 150px; 
            height: 37px;
            border-radius: 15px;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
            border: 0px;
            font-size: 120%;
            transition: ease-in-out 0.5s;
        }
        #pesquisar:hover {
            width: 150px; 
            height: 37px;
            border-radius: 15px;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.8);
            border: 0px;
            font-size: 120%;
            transition: ease-in-out 0.5s;
            background-color: #0c582c;
            color: #fff;
        }

        #texto{
            width:calc(100%-10px);
            height: 300px;
            margin-top: 5px;
            padding: 10px;
        }

        #tituloItem{
            font-size: 25px;
            font-weight: bold;
            text-align: center;
        }

        #tituloItem a:link{
            color: #0c582c;
            text-decoration: none;
            transition: ease-in-out 0.5s;
        }

        #tituloItem a:hover{
            color: red;
            font-size: 28px;
            text-decoration: none;
            transition: ease-in-out 0.5s;
        }

        #descItem{
            text-align: justify;
        }

        #descItem a:link{
            color: #0c582c;
            font-size: 18px;
            text-decoration: none;
            transition: ease-in-out 0.5s;
        }

        #descItem a:hover{
            color: #0c582c;
            font-size: 22px;
            text-decoration: none;
            transition: ease-in-out 0.5s;
        }

        #itemdois {
            width: calc(100% - 10px);
            padding: 5px;
            background-color: white;
        }

        .questao{
            width: calc(90%-10px) !important;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
            border: 0.5px solid rgba(0, 0, 0, 0.2);
        }

        .tituloQuestao{
            font-size: 20px;
            font-weight: bold;
            transition: ease-in-out 0.5s;
        }
        .tituloQuestao a{
            font-size: 20px;
            color: #0c582c;
            text-decoration: none;
            transition: ease-in-out 0.5s;
        }
        .tituloQuestao a:hover{
            font-size: 23px;
            color: red;
            text-decoration: none;
            transition: ease-in-out 0.5s;
        }

        .descQuestao a{
            font-size: 17px;
            color: #0c582c;
            text-decoration: none;
            transition: ease-in-out 0.5s;
        }
        .descQuestao a:hover{
            font-size: 20px;
            color: red;
            text-decoration: none;
            transition: ease-in-out 0.5s;
        }
        hr#recentes{
            border: 1px solid #0c582c;
            width: 200px;
            float: left;
            margin-top: -10px;
        }*/
    </style>
</head>
<body>
        <?php include_once("menu.php"); ?>
    <div id="geral">
        <div id="central">
            <div id="top">
                <div id="form">
                    <span id="titulo">Sei! Sistema Eletrônico de Informações</span><br>
                    <span id="subtitulo">Perguntas frequentes</span><br><br>
                    <form id="pesq" method="post" action="pesq.php">
                        <input type="text" name="duvida" id="duvida" placeholder="Digite sua pesquisa">
                        <input type="submit" name="pesquisar" id="pesquisar" value="Pesquisar">    
                    </form>
                </div>
            </div>

            <div id="itemdois">
            <div class="post-content">
                <header class="entry-header">
                  <h1 class="entry-title">O que é o SEI?</h1>
                                      
                </header><!-- .entry-header -->

                <div class="entry-content clearfix">
                  
                    <p>O Sistema Eletrônico de Informações (SEI), desenvolvido pelo Tribunal Regional Federal da 4ª Região (TRF4), é uma plataforma que engloba um conjunto de módulos e funcionalidades que&nbsp;<strong>promovem a eficiência administrativa</strong>. A solução é&nbsp;<strong>cedida gratuitamente para instituições públicas</strong>&nbsp;e permite transferir a gestão de documentos e de processos eletrônicos administrativos para um mesmo ambiente virtual.</p>



                    <p>Trata-se de um&nbsp;<strong>sistema de gestão de processos e documentos eletrônicos</strong>, com práticas inovadoras de trabalho, tendo como principais características a libertação do paradigma do papel como suporte&nbsp;analógico para documentos institucionais e o compartilhamento do conhecimento com atualização e comunicação de novos eventos em tempo real.</p>



                    <p>O SEI foi escolhido como a solução de processo eletrônico no âmbito do Processo Eletrônico Nacional (PEN), sendo uma<strong>&nbsp;iniciativa conjunta de órgãos e entidades de diversas esferas da administração pública</strong>, com o intuito de construir uma infraestrutura pública de processos e documentos administrativos eletrônicos.</p>



                    <p>Devido às características inovadoras e do sucesso da prática de&nbsp;<strong>cessão da ferramenta, sem ônus para outras instituições</strong>, o SEI transcendeu a classificação de sistema eletrônico do TRF4, para galgar a&nbsp;<strong>posição de projeto estratégico para toda a administração pública</strong>, amparando-se em premissas altamente relevantes e atuais, tais como: a inovação, a economia do dinheiro público, a transparência administrativa, o compartilhamento do conhecimento produzido e a sustentabilidade.&nbsp;</p>



                    <p>Com a cessão gratuita, a economia do dinheiro público é incomensurável, uma vez que as instituições que o adotam deixam de gastar com a compra de soluções de mercado que, não raro, não solucionam as demandas para as quais são adquiridas. É a inovação advinda da implantação de uma cultura de socialização do conhecimento desenvolvido pela administração pública com os outros entes que a compõem. Se tal prática for mantida, será inegável que a gestão do orçamento público, a cada dia mais contingenciada, será sensivelmente mais racional. Não há mais espaço para aquisições milionárias quando há soluções gratuitas disponíveis.</p>



                    <p>A Alesc é uma das primeiras assembleias do Brasil a aderir ao sistema, a exemplo de Minas Gerais, Paraná e Alagoas. A implantação no Legislativo catarinense conta com o apoio do TRF-4 e do Tribunal de Justiça de Santa Catarina (TJSC).</p>



                    <p></p>



                    <h3><strong>Vantagens do SEI</strong></h3>



                    <ul><li>Portabilidade: 100% Web e pode ser acessado por meio dos principais navegadores do mercado – Internet Explorer, Firefox e Google Chrome;</li><li>Acesso Remoto: pode ser acessado remotamente por diversos tipos de equipamentos, como microcomputadores, notebooks, tablets e smartphones de vários sistemas operacionais (Windows, Linux, IOS da Apple e Android do Google). Isso possibilita que os usuários trabalhem à distância;</li><li>Acesso de usuários externos: gerencia o acesso de usuários externos, permitindo que tomem conhecimento dos documentos e, por exemplo, assinem remotamente contratos e outros tipos de processos;</li><li>Controle de nível de acesso: gerencia a criação e o trâmite de processos e documentos com informações sensíveis, conferindo o acesso somente às unidades envolvidas ou a usuários específicos;</li><li>Tramitação em múltiplas unidades: incorpora novo conceito de processo eletrônico, que rompe com a tradicional tramitação linear, inerente à limitação física do papel. Com isso, várias unidades podem ser demandadas, tomar providências e manifestar-se simultaneamente;</li><li>Funcionalidades específicas: controle de prazos, ouvidoria, estatísticas da unidade, tempo do processo, base de conhecimento, pesquisa em todo teor, acompanhamento especial, inspeção administrativa, modelos de documentos, textos padrão, sobrestamento de processos, assinatura em bloco, organização de processos em bloco, acesso externo, entre outros;</li><li>Sistema intuitivo: estruturado com boa navegabilidade e usabilidade.</li></ul>



                    <h3><strong>Benefícios do SEI</strong></h3>



                    <ul><li>Redução de custos financeiros e ambientais associados à impressão (impressoras, toner, papel, contratos de impressão);</li><li>Redução de custos operacionais relacionados à entrega e ao armazenamento de documentos e processos;</li><li>Redução do tempo gasto na abertura, manipulação, localização e tramitação de documentos e processos;</li><li>Eliminação de perdas, extravios e destruições indevidos de documentos e processos;</li><li>Compartilhamento simultâneo de documentos e processos, para fins de contribuição, acompanhamento da tramitação ou simples consulta;</li><li>Auxílio aos servidores em sua rotina, com a disponibilização de modelos e orientações sobre como proceder em situações específicas;</li><li>Incremento na publicidade dos processos, tornando mais fácil seu acompanhamento por servidores e por administrados, e o seu controle interno e pela sociedade;</li><li>Ampliação da gestão do conhecimento e da possibilidade de melhoria de processos, em razão da criação de uma plataforma única que permitirá a análise de fluxos de processos, sua comparação entre órgãos distintos e a melhoria baseada em experiências de sucesso;</li><li>Aumento da possibilidade de definição, coleta e utilização direta e cruzada de dados e indicadores, em razão da criação de um conjunto de bases de dados de mesma natureza.</li></ul>



                    <div class="wp-block-group"><div class="wp-block-group__inner-container">
                    <div class="wp-block-columns">
                    <div class="wp-block-column" style="flex-basis:100%">
                    <div class="wp-block-group"><div class="wp-block-group__inner-container">
                    <p class="has-text-align-right"><sub>Fonte: http://bit.ly/2PN9oKT</sub></p>
                </div></div>
                </div>
                </div>
                </div></div>
                </div><!-- .entry-content -->

                  </div>
            </div>
        </div>
    </div>
        <?php
            include_once("footer.php");
        ?>
    <script type="text/javascript">
        /*$(document).ready(function() {
            var height = $("#top").height();
            console.log(height);
            alert(height);
        });*/
        //var largDoc = window.innerWidth;
        /*var elemento2 = document.getElementById('central');
        var elemento = document.getElementById('top');
        console.log(elemento2);
        console.log(elemento2.clientWidth);
        var calc = (elemento2.clientWidth/5);
        elemento.style.height  = calc + 'px';*/
        var elemento = document.getElementById('top');
        var calcula = 260-elemento.clientHeight;
        calcula = calcula/2;
        console.log(calcula+" ---");
        elemento.style.paddingTop  = calcula + 'px';
        elemento.style.paddingBottom  = calcula + 'px';

    </script>
</body>
</html>