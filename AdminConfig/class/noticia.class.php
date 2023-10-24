<?php

class Noticia{
    function __construct(){
        include_once("conn.php");
        include_once("DB.class.php");
        DB::conn();
    }

    private $titulo ='';
    private $resumo ='';
    private $news ='';

    function getAllNews(){
        $objAll = DB::conn()->prepare("SELECT * FROM noticias ORDER BY id DESC LIMIT 0,3");
        try{
            if($objAll->execute()){
                $rows = $objAll->rowCount();
                if($rows>0){
                    while($linha = $objAll->fetchObject()){
                        echo '
                            <div id="generalFeedNews">
                                <span id="titleNewsFeed">'.$linha->titulo.'</span>
                                <span id="dateNewsFeed">Publicado por: '.$linha->autor.' - '.$linha->datacad.'</span><br><br>
                                <span id="summaryNewsFeed">'.$linha->resumo.'</span><br>
                                <span id="readMore">
                                <a href="noticiaEdit.php?id='.$linha->id.'">Editar</a> | 
                                <a href="noticiaDelete.php?id='.$linha->id.'">Excluir</a> | 
                                <a href="noticiaRead.php?id='.$linha->id.'">Ler notícia</a> </span><br>
                            </div>
                        ';
                    }
                }else{
                    echo 'Nenhum registro encontrado.';
                }
            }else{
                echo 'Erro na consulta.';
            }
        }catch(PDOException $e){
            echo 'Erro: '.$e->getMessage();
        }
    }

    function getNewsById($id){
        $obj = DB::conn()->prepare("SELECT * FROM noticias WHERE id=?");
        try{
            if($obj->execute(array($id))){
                $rows = $obj->rowCount();
                if($rows>0){
                    $linha = $obj->fetchObject();
                    return $linha;
                }else{
                    echo 'Nenhum registro encontrado.';
                }
            }else{
                echo 'Erro na consulta.';
            }
        }catch(PDOException $e){
            echo 'ERRO: '.$e->getMessage();
        }
    }

    function getTitulo(){
        return $this->titulo;
    }

    function getResumo(){
        return $this->resumo;
    }

    function getNews(){
        return $this->news;
    }

    function getNewsByIdJson($id){
        $obj = DB::conn()->prepare("SELECT * FROM noticias WHERE id=?");
        try{
            if($obj->execute(array($id))){
                $rows = $obj->rowCount();
                if($rows>0){
                    $linha = $obj->fetchObject();
                    $this->titulo = $linha->titulo;
                    $this->resumo = $linha->resumo;
                    $this->news = '
                        <header id="titulo">'.$linha->titulo.'</header>
                        <nav>
                            Publicado por: '.$linha->autor.'<br>
                        </nav> 
                        
                        <article>
                            <header id="data">Data da publicação: '.$linha->datacad.'</header>
                            <p>'.str_replace("../imagens", "imagens", $linha->conteudo).'</p>
                        </article>
                        <footer>
                            <p>
                                <a href="noticiaEdit.php?id='.$linha->id.'" alt="Editar a notícia" target="_blank">Editar</a> | 
                                <a href="noticiaDelete.php?id='.$linha->id.'" alt="Excluir a notícia" target="_blank">Excluir</a> 
                            </p>
                        </footer>
                    ';
                }else{
                    echo 'Nenhum registro encontrado.';
                }
            }else{
                echo 'Erro na consulta.';
            }
        }catch(PDOException $e){
            echo 'ERRO: '.$e->getMessage();
        }
    }

    function insertNews($titulo, $resumo, $autor, $datacad, $conteudo, $statusNews){
        $objInsert = DB::conn()->prepare("INSERT INTO noticias (titulo, resumo, autor, datacad, conteudo, statusNews) VALUES (?, ?, ?, ?, ?, ?)");
        try{
            if($objInsert->execute(array($titulo, $resumo, $autor, $datacad, $conteudo, $statusNews))){
                echo '<h2>Notícia inserida com sucesso!</h2>';
            }else{
                echo '<h2>Erro ao inserir a notícia. Por favor, tente novamente.</h2>';
            }
        }catch(PDOException $e){
            echo 'Erro: '.$e->getMessage();
        }
    }

    function updateNews($titulo, $resumo, $conteudo, $statusNews, $id){
        $objUp = DB::conn()->prepare("UPDATE noticias SET titulo=?, resumo=?, conteudo=?, statusNews=? WHERE id=?");
        try{
            if($objUp->execute(array($titulo, $resumo, $conteudo, $statusNews, $id))){
                echo '<h2>Notícia atualizada com sucesso!</h2>';
            }else{
                echo '<h2>Erro ao atualizar a notícia. Por favor, tente novamente.</h2>';
            }
        }catch(PDOException $e){
            echo 'Erro: '.$e->getMessage();
        }
    }

    function deleteNews($id){
        $objDel = DB::conn()->prepare("DELETE FROM noticias WHERE id=?");
        try{
            if($objDel->execute(array($id))){
                $rows = $objDel->rowCount();
                //echo '<h1>****'.$rows.'****</h1>';
                if($rows>0){
                    echo '<h2>Notícia deletada com sucesso.</h2>';
                }else{
                    echo '<h2>Não foi encontrado nenhuma notícia com esse ID.</h2>';
                }
            }else{
                echo '<h2>Erro ao deletar notícia.</h2>';
            }
        }catch(PDOException $e){
            echo 'ERRO: '.$e->getMessage();
        }
    }


}

?>