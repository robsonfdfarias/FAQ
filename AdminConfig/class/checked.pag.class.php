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
                $titulo = 'Pesquisa';
                $subtitulo = 'Pesquisa por categoria';
            }else if($pag == 'pesq'){
                $titulo = 'Pesquisa';
                $subtitulo = 'Você está na área de pesquisa.';
            }else if($pag == 'coisasParaSaberSei'){
                $titulo = 'Curiosidades';
                $subtitulo = 'Conheça algumas curiosidades sobre o SEI.';
            }else if($pag == 'noticias'){
                $titulo = 'Notícias';
                $subtitulo = 'Incluir notícias SEI';
            }else if($pag == 'evento'){
                $titulo = 'Área de inscrição para evento';
                $subtitulo = 'Aqui você poderá fazer sua inscrição se houver vagas disponíveis.';
            }else if($pag == 'index'){
                $titulo = 'Bem vindo!';
                $subtitulo = 'Painel';
            }else if($pag == 'eventos'){
                $titulo = 'Administrar Eventos';
                $subtitulo = 'Painel de eventos';
            }else if($pag == 'inserir'){
                $titulo = 'Inserir pergunta';
                $subtitulo = 'Formulário de pergunta';
            }else if($pag == 'insertEvent'){
                $titulo = 'Inserir Evento';
                $subtitulo = 'Formulário de evento';
            }else if($pag == 'noticiaInsert'){
                $titulo = 'Inserir notícia';
                $subtitulo = 'Formulário de notícia';
            }else if($pag == 'categoriaIndex'){
                $titulo = 'Categorias';
                $subtitulo = 'Painel de categorias';
            }else if($pag == 'catAdd'){
                $titulo = 'Inserir categoria';
                $subtitulo = 'Formulário de categoria';
            }else if($pag == 'noticiaEdit'){
                $titulo = 'Editar notícia';
                $subtitulo = 'Formulário de edição de notícia';
            }else if($pag == 'editar'){
                $titulo = 'Editar artigo';
                $subtitulo = 'Formulário de edição de artigo';
            }else if($pag == 'editEvent'){
                $titulo = 'Editar evento';
                $subtitulo = 'Formulário de edição de evento';
            }else if($pag == 'catEdit'){
                $titulo = 'Editar categoria';
                $subtitulo = 'Formulário de edição de categoria';
            }else if($pag == 'catDelete'){
                $titulo = 'Deletar categoria';
                $subtitulo = 'Recurso de exclusão de categoria';
            }else if($pag == 'inscritos'){
                $titulo = 'Inscrição em envento';
                $subtitulo = 'Lista de inscritos';
            }else if($pag == 'artigo'){
                $titulo = 'Artigo';
                $subtitulo = '';
            }else if($pag == 'perguntas'){
                $titulo = 'Perguntas';
                $subtitulo = 'Painel de perguntas';
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