<?php

    class CheckedPag{
        function retorna($pag){
            $paginaCorrente = basename($_SERVER['SCRIPT_NAME']);
            $char = explode(".", $paginaCorrente);
            if($pag == $char[0]){
                //echo 'style="background-color:forestgreen; font-weight: bold;"'; 
                echo 'style="border-top: 9px solid #b1cd49;"';
            }
        }

        function returnDataTop(){
            $paginaCorrente = basename($_SERVER['SCRIPT_NAME']);
            $char = explode(".", $paginaCorrente);
            $pag=$char[0];
            if($pag == 'perguntasFrequentes'){
                $titulo = 'Perguntas Frequentes';
                $subtitulo = 'Veja respostas para perguntas frequentes sobre o Sei - Sistema Eletrônico de Informações';
            }else if($pag == 'sei'){
                $titulo = 'Sobre o SEI';
                $subtitulo = 'Conheça um pouco mais sobre o SEI!';
            }else if($pag == 'legislacao'){
                $titulo = 'Legislação';
                $subtitulo = 'Saiba quais leis regulamentam o uso do SEI.';
            }else if($pag == 'mapa'){
                $titulo = 'Estrutura Administrativa';
                $subtitulo = 'Conheça um pouco mais sobre a Estrutura Administrativa do SEI.';
            }else if($pag == 'capacitacao'){
                $titulo = 'Capacitação';
                $subtitulo = '';
            }else if($pag == 'categoria'){
                $titulo = 'Categoria';
                $subtitulo = 'Pesquisa por categoria';
            }else if($pag == 'pesq'){
                $titulo = 'Pesquisa';
                $subtitulo = 'Você está na área de pesquisa.';
            }else if($pag == 'coisasParaSaberSei'){
                $titulo = 'Curiosidades';
                $subtitulo = 'Conheça algumas curiosidades sobre o SEI.';
            }else if($pag == 'noticia'){
                $titulo = 'Notícias';
                $subtitulo = '';
            }else if($pag == 'evento'){
                $titulo = 'Área de inscrição para evento';
                $subtitulo = 'Aqui você poderá fazer sua inscrição se houver vagas disponíveis.';
            }
            echo '
            <span style="font-size: 40px; font-weight: 700; line-height: 65px;">
                '.$titulo.'
            </span><br>
            <span>
                '.$subtitulo.'
            </span>
            ';
        }
    }

?>