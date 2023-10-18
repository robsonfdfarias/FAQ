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
    <div id="geral">
        <?php include_once("menu.php"); ?>
            <?php include_once("top.php"); ?>
        <div id="central">

            <div id="itemdois">


                <div class="post-content">
                    <header>
                    <h1 class="entry-title">15 coisas que você precisa saber sobre o SEI!</h1>
                                        
                    </header><!-- .entry-header -->

                    <div class="center">
                    
                        <p>O Sistema Eletrônico de Informações está implantado na Alesc! Sim, para a maioria isso já é notícia velha, mas, mesmo que você já tenha feito toda a <a href="http://portalsei.alesc.sc.gov.br/material-para-capacitacao/">capacitação</a> e treinado bastante, nesse processo de mudança, é normal que muitas dúvidas apareçam. Para tentar ajudar você, reunimos aqui as <strong>“top 15”</strong> informações que<strong> você precisa saber sobre o SEI</strong>.</p>



                        <span id="more-332"></span>



                        <p>Confira abaixo a nossa lista. E, se ainda assim, restar alguma dúvida, procure um colega multiplicador. Caso ele (ou ela) não consiga resolver, contate a equipe responsável pela implantação do SEI pelo e-mail <strong>sei@alesc.sc.gov.b</strong><em>r</em> ou pelo WhatsApp oficial da Alesc, no <strong>48-3221-2800</strong>.</p>



                        <h5>1. E essa tal de “assinatura eletrônica”, como funciona? </h5>



                        <p><strong>Esse é um dos principais ganhos da implantação do SEI</strong>. Na prática, a assinatura eletrônica no SEI consiste em utilizar o seu usuário (login) e a sua senha para assinar digitalmente o documento. A assinatura eletrônica garante ao destinatário que o documento não foi alterado ao ser enviado (integridade) e ainda comprova a autoria do emitente (autenticidade), sem a necessidade de impressão em papel. Os documentos assinados no SEI exibem as assinaturas eletrônicas ao final da página.</p>



                        <h5>2. Mas só a digitação do meu login e senha caracterizam uma assinatura eletrônica e tem validade legal?</h5>



                        <p><strong>Sim!</strong> A <a rel="noreferrer noopener" href="http://www.planalto.gov.br/ccivil_03/_ato2019-2022/2020/lei/L14063.htm" target="_blank">Lei federal nº 14.063,</a> de 23 de setembro de 2020, e art. 3º da <a rel="noreferrer noopener" href="http://www.planalto.gov.br/ccivil_03/_ato2011-2014/2012/lei/l12682.htm" target="_blank">Lei nº 12.682</a>, de 2012, garantem a validade. Teremos Atos próprios da Alesc validando essas assinaturas também.</p>



                        <h5>3. E todo mundo na Alesc tem assinatura eletrônica?</h5>



                        <p><strong>Sim!</strong> Todos os servidores e servidoras que possuem acesso ao sistema tem assinatura eletrônica, independente do vínculo funcional (estagiários, terceirizados, comissionados e efetivos). Mas, claro, os limites para a validade da assinatura no documento de um determinado usuário ou outro continuará respeitando as mesmas regras da assinatura em documentos físicos.</p>



                        <h5>4. A partir do dia 02/06 será tudo digital/eletrônico?</h5>



                        <p><strong>Sim!</strong> Pode-se dizer que a maioria dos documentos tramitarão exclusivamente de forma digital por meio do SEI. Contudo, há exceções, como, por exemplo, notas fiscais que não forem originalmente emitidas digitalmente. Em breve serão listados e divulgados quais serão essas exceções, mas a regra é o digital. </p>



                        <h5>5. E os outros sistemas da Alesc? Quais o SEI substitui?</h5>



                        <p><strong>O SGD.</strong> O único sistema que será descontinuado por enquanto será o SGD, que, a partir do dia 02/06, estará disponível somente para consulta de processos que tramitaram nele ou para tramitação de processos que foram iniciados até 01/06 no SGD e ainda não foram finalizados. Processos novos serão iniciados exclusivamente pelo SEI.</p>



                        <h5>6. Alguma coisa do SGD vai para o SEI?</h5>



                        <p><strong>Não.</strong> <strong>O que acontece no SGD, fica no SGD!</strong> Começou lá, termina lá. Não haverá nenhuma migração do SGD para o SEI. A partir do dia 02/06, aí sim, todos os processos novos iniciam pelo SEI.</p>



                        <h5>7. Como eu vou fazer os processos que antes eram físicos, serem eletrônicos a partir de agora?</h5>



                        <p><strong>Adaptação</strong>, é a palavra da vez. Até agora, não foi identificado nenhum processo que não possa ser adaptado para a realidade digital. Todos os documentos necessários às rotinas administrativas da Alesc podem ser produzidos e assinados no SEI, ou, quando gerados externamente, incluídos e autenticados, se necessário. <br>Mas a verdade é que para essa pergunta não há uma resposta única. Você precisará verificar no seu setor quais adaptações podem ser necessárias e entender o fluxo dos processos iniciados ou recebidos pela área em que atua. E, claro, precisando conversar sobre possíveis soluções, você pode entrar em contato com a contate a equipe responsável pela implantação do SEI pelo e-mail <strong>sei@alesc.sc.gov.b</strong><em>r</em> ou pelo WhatsApp oficial da Alesc, no <strong>48-3221-2800</strong>.</p>



                        <h5>8. O SEI possui automação de fluxo de trabalho?</h5>



                        <p><strong>Não.</strong> Você precisa saber para onde deverá enviar o processo, ou seja, conhecer o fluxo dos processos que são iniciados ou recebidos pelo seu setor. Entretanto, essa é uma característica bem positiva do sistema, pois permite que o SEI se adapte facilmente a diferentes contextos e instituições.</p>



                        <p>O SEI proporciona a realização de um eficiente fluxo de trabalho de forma inovadora, já que não é mais necessário que o processo tenha um fluxo linear. Isso quer dizer que um mesmo processo pode ser acessado por diferentes unidades simultaneamente, o que gera maior produtividade e redução de prazos. (Fonte: SEI/UFMG)</p>



                        <h5><span class="has-inline-color has-black-color">9. Nunca vi fluxogramas na Alesc. Onde posso encontrar os mapas dos processos?</span></h5>



                        <p>Na<strong> Assessoria de Planejamento Institucional- API. </strong>Desde 2009 a API da Diretoria-Geral vem mapeando os processos da Alesc. O material está em constante atualização. O que já foi atualizado está disponível para consulta no setor, entre em contato através do e-mail: planejamento@alesc.sc.gov.br e faça a solicitação de seu interesse, o setor terá o prazer de compartilhar o que há disponível.</p>



                        <h5>10. E se eu precisar digitalizar algum documento para incluir no SEI, como faz?</h5>



                        <p><strong>Existem regras de digitalização de documentos.</strong> Você precisa segui-las. Para saber quais são essas regras, recomendamos a leitura do Ato que regulamenta o tema. Para isso, clique <a rel="noreferrer noopener" href="http://leis.alesc.sc.gov.br/html/instrucao_normativa/2021/001_2021.html" target="_blank">aqui</a><a rel="noreferrer noopener" href="http://link do ato" target="_blank">!</a></p>



                        <h5>11. De quais computadores/dispositivos eu posso acessar o sistema?</h5>



                        <p><strong>Qualquer um!</strong> A partir da versão 4.0 do sistema, o SEI está acessível também para dispositivos móveis. Então, você pode usar computadores, smartphones e tablets para logar no sistema. Ah, não é necessário estar na Alesc para realizar o acesso. Basta entrar no site, digitar seu login e senha e pronto!</p>



                        <h5>12. Como eu encontro um processo?</h5>



                        <p><strong>Você tem duas opções:</strong> 1) utilizar a ferramenta de pesquisa, digitando palavras-chave do processo que quer encontrar; ou 2) digitar o número do processo que você precisa encontrar. Temos um vídeo bem legal explicando como fazer, <a rel="noreferrer noopener" href="https://www.youtube.com/watch?v=8HBAvMvYSdE&amp;list=PL_nWGluQgoDeIeySGxg3maZJtj7K9_qhT&amp;index=9" target="_blank">clique aqui</a> e confira!</p>



                        <h5>13. Com quem eu falo para ser inserido(a) em diferentes setores no SEI?</h5>



                        <p><strong>Basta que o gestor do setor para o qual você quer que o seu acesso seja liberado solicite, </strong>a partir do seu endereço eletrônico institucional, por e-mail<strong> </strong>para: sei@alesc.sc.gov.br e o pessoal resolverá isso rapidinho para você!</p>



                        <h5>14. Os meus processos com informações pessoais poderão ser acessados por outros usuários?</h5>



                        <p><strong>Não.</strong> Processos com informações pessoais são classificados como restritos. Isso quer dizer que o seu conteúdo só poderá ser acessado pelo setores nos quais ele tramitar. Mas isso quer dizer que, nos casos em que o processo for criado por você, os usuários do seu setor também poderão visualizá-lo. Entretanto, isso não deverá acontecer; e, caso aconteça, há penalização prevista para esse tipo de conduta. Apenas a parte interessada e os setores com atividades inerentes ao processo são autorizados a visualizar seu conteúdo. Caso ocorra alguma violação nesse sentido, o setor gestor do SEI tem acesso ao registro de todos os usuários que visualizaram e/ou editaram qualquer informação do processo. Dessa forma, é possível fazer uma auditoria e responsabilizar os envolvidos.</p>



                        <p><span class="has-inline-color has-black-color">15. <strong>Qual a diferença entre Concluir e Arquivar um processo no SEI?</strong></span></p>



                        <p><span class="has-inline-color has-black-color">Um processo “concluído” não está “arquivado”, mas somente encerrado porque cessou o trâmite. Como não está arquivado, qualquer seção ou divisão na qual ele tramitou pode reabrir um processo concluído sem precisar acionar o Arquivo, apenas clicando no botão “Reabrir Processo”. O “perfil de arquivamento” existe no SEI e trata do arquivamento das vias físicas dos documentos digitalizados, portanto não envolve os processos nato-digitais. Estas questões serão atendidas pelo módulo de arquivamento assim que homologado.</span> (Fonte: SEI/UFMG)</p>
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
        elemento.style.paddingTop  = (calcula-50) + 'px';
        elemento.style.paddingBottom  = calcula + 'px';

    </script>
</body>
</html>