<?php

class Noticia{
    function __construct(){
        include_once("conn.php");
        include_once("DB.class.php");
        include_once("user.class.php");
        DB::conn();
    }

    public $imgArt='Sem imagem';
    public $artigo = '';
    public $titleArt = '';
    public $resumoArt = '';


    function getNewsSample(){
        $obj = DB::conn()->prepare("SELECT * FROM noticias ORDER BY id DESC LIMIT 3");
        try{
            if($obj->execute()){
                $numRow = $obj->rowCount();
                if($numRow>0){
                    $userObj = new User();
                    while($linha = $obj->fetchObject()){
                        echo '
                            <div id="generalFeedNews">
                                <span id="titleNewsFeed">'.$linha->titulo.'</span>
                                <span id="dateNewsFeed">Publicado por: '.$userObj->getUserNameById($linha->autor).' - '.$linha->datacad.'</span><br><br>
                                <span id="summaryNewsFeed">'.$linha->resumo.'</span><br>
                                <span id="readMore"><a href="noticia.php?id='.$linha->id.'">Leia mais <img src="imgs/seta-para-a-direita.svg" alt="seta" width="15"></a></span><br>
                            </div>
                        ';
                    }
                }
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function getNewsByCat($idNews){
        try{
            $obj = DB::conn()->prepare("SELECT * FROM noticias WHERE id=?");
            if($obj->execute(array($idNews))){
                $nr = $obj->rowCount();
                if($nr>0){
                    $userObj = new User();
                    $linha = $obj->fetchObject();
                    //$this->imgArt = 'imagens/'.$linha->img;
                    $this->titleArt = $linha->titulo;
                    $this->resumoArt = $linha->resumo;
                    $this->artigo = '
                        <header id="titulo">'.$linha->titulo.'</header>
                        <nav>
                            Publicado por: '.$userObj->getUserNameById($linha->autor).'<br>
                        </nav>
                        
                        <article>
                            <header id="data">Data da publicação: '.$linha->datacad.'</header>
                            <p>'.str_replace("../imagens", "imagens", $linha->conteudo).'</p>
                        </article>
                    ';
                }else{
                    echo "Nenhum artigo encontrado nessa categoria";
                }
            }else{
                echo "Erro na conexão com a base de dados!";
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }


    function imgArt(){
        return $this->imgArt;
    }

    function artigo(){
        return $this->artigo;
    }

    function titulo(){
        return $this->titleArt;
    }

    function resumo(){
        return $this->resumoArt;
    }

}


?>