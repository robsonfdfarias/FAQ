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

    function getAllNews($pag, $numReg){
        $totReg = self::getTotalArticle("SELECT * FROM noticias", '');
        //echo $totReg;
        $verifyNumReg = ($pag*$numReg)-$numReg;
        //echo '<br>'.$verifyNumReg.'<br>';
        if($totReg<=$verifyNumReg){
            echo '<h1>Não existem registros nestá página.</h1>';
            return false;
        }
        
        try{
            $sql="SELECT * FROM noticias ORDER BY id DESC LIMIT ".$verifyNumReg.",".$numReg." ";
            $objAll = DB::conn()->prepare($sql);
            if($objAll->execute()){
                $rows = $objAll->rowCount();
                if($rows>0){
                    $pags = ceil($totReg/$numReg);
                    echo '
                        <div id="numreg" style="margin-bottom: 10px; display:none;">
                            Número de registros: '.$totReg.' | 
                            Número de páginas: '.$pags.' | 
                            Número de registro por página: '.$numReg.' | 
                            Página atual: '.$pag.' | 
                        </div>
                    ';
                    while($linha = $objAll->fetchObject()){
                        echo '
                            <div id="generalFeedNews" style="display:flex; flex-direction:row; padding-left: 10px; justify-content:center;text-align:center; vertical-align:middle;align-items: center;">
                                <div style="text-align:left;width:91%;">
                                    <span id="titleNewsFeed">'.$linha->titulo.'</span><br>
                                    <span id="summaryNewsFeed">'.substr($linha->resumo, 0, 190).'...</span><br>
                                </div>
                                <div style="display:flex;">
                                    <a href="noticiaEdit.php?id='.$linha->id.'">
                                    <div id="divBtEdit" style="background-color:green; padding:10px; margin-right: 5px; border-radius:5px;"><img src="imgs/edit-lapis.svg" width="20" title="Editar notícia"></div>
                                    </a>
                                    <a href="noticiaDelete.php?id='.$linha->id.'">
                                    <div id="divBtDelete" style="background-color:red; padding:10px; margin-left: 5px; border-radius:5px;"><img src="imgs/delete-bin.svg" width="20" title="Deletar notícia"></div>
                                    </a>
                                </div>
                            </div>
                        ';
                        /*
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
                        ';*/
                    }
                    self::pagination($pags,$totReg,$pag,'');
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

    /////////////////////////PAGINAÇÃO////////////////////////////////////

    function pagination($pags,$totReg,$pag, $pesq){
        echo '
                <div id="paginacao" style="display: flex; justify-content: center; text-align: center; vertical-align: middle;">
                <div style="padding: 5px 0; margin-right: 7px;">Total '.$totReg.' itens</div>
                <div style="border-radius: 4px; display: flex; justify-content: center; text-align: center; vertical-align: middle; border:1px solid #dfdfdf; max-width:60%;">
            ';
            //BT Voltar
            if($pag>1){
                $pgPre = $pag-1;
                if($pesq!=''){
                    echo '<div id="pg" style="padding: 5px 10px; border-right:1px solid #dfdfdf; margin-right: 0px;"><a href="?pesq='.$pesq.'&pg='.$pgPre.'"><</a></div>';
                }else{
                    echo '<div id="pg" style="padding: 5px 10px; border-right:1px solid #dfdfdf; margin-right: 0px;"><a href="?pg='.$pgPre.'"><</a></div>';
                }
            }else{
                echo '<div id="pg" style="padding: 5px 10px; border:0px solid #dfdfdf; margin-right: 0px; color: #c8c8c8; background-color: #f2f2f2;"><</div>';
            }
            //Páginas
            echo '<div id="barraPg" style="display: flex; justify-content: center; text-align: center; vertical-align: middle; overflow-x: auto;">';
            $smaller = 1;
            $bigger = 5;
            $margin = 2;
            //$pags = 7;
            for($i=1; $i<=$pags; $i++){
                if($pags>($margin+$margin+1)){
                    
                    if($pag>$margin and $pag<=($pags-$margin)){
                        if(($i>=($pag-$margin)) and ($i <= ($pag+$margin)) ){
                            self::comparePag($i, $pag, $pesq);
                        }
                    }else if($pag<=$margin){
                        //self::comparePag($i, $pag);
                        if($i<6){
                            self::comparePag($i, $pag, $pesq);
                        }
                    }else if($pag>=($pags-$margin)){
                        if($i>($pags-5)){
                            self::comparePag($i, $pag, $pesq);
                        }
                        //self::comparePag($i, $pag);
                    }
                    //echo '<div id="pg" style="padding: 5px 10px; border-right:1px solid #dfdfdf; margin-right: 0px;"><a href="?pg='.$i.'">'.$i.'</a></div>';
                    
                }else{
                    self::comparePag($i, $pag, $pesq);
                }
            }
            echo '</div>';
            //BT Avançar
            if($pag<$pags){
                $pgPre = $pag+1;
                if($pesq!=''){
                    echo '<div id="pg" style="padding: 5px 10px; border-right:1px solid #dfdfdf; margin-right: 0px;"><a href="?pesq='.$pesq.'&pg='.$pgPre.'">></a></div>';
                }else{
                    echo '<div id="pg" style="padding: 5px 10px; border-right:1px solid #dfdfdf; margin-right: 0px;"><a href="?pg='.$pgPre.'">></a></div>';
                }
            }else{
                echo '<div id="pg" style="padding: 5px 10px; border:0px solid #dfdfdf; margin-right: 0px; color: #c8c8c8; background-color: #f2f2f2;">></div>';
            }
            echo '</div>';
            //Menu DropDown
            echo '
                <select id="pgsMenu" style="border: 1px solid #dfdfdf; background-color: #fff; font-size:1rem; margin-left: 7px; border-radius: 4px;" onchange="menuSelect(this.value)">
                    <option value="0" selected="selected" disabled="disabled">'.$pags.'/page</option>
                ';
                for($j=1;$j<=$pags;$j++){
                    echo '
                        <option value="'.$j.'">'.$j.'</option>
                    ';
                }
            echo '</select>';
            //
            echo '</div>';
            //echo '<div id="pg" style="display:none;">'.$pag.'</div>';
        
    }


    function getTotalArticle($sql, $dados){
        //$objTot = DB::conn()->prepare("SELECT * FROM artigo");
        $objTot = DB::conn()->prepare($sql);
        if(!empty($dados) && $dados!='' &&  $dados!=null){
            try{
                if($objTot->execute($dados)){
                    return $objTot->rowCount();
                }else{
                    return 0;
                }
            }catch(PDOException $e){
                echo 'ERRO: '.$e->getMessage();
            }
        }else{
            try{
                if($objTot->execute()){
                    return $objTot->rowCount();
                }else{
                    return 0;
                }
            }catch(PDOException $e){
                echo 'ERRO: '.$e->getMessage();
            }
        }
    }


    function comparePag($pag1, $pag2, $pes){
        if($pag1!=$pag2){
            //echo $pes.'-----';
            if($pes!=''){
                echo '<div id="pg" style="border-right:1px solid #dfdfdf; margin-right: 0px; vertical-align:middle;"><a href="?pesq='.$pes.'&pg='.$pag1.'"><div style="padding: 5px 10px; ">'.$pag1.'</div></a></div>';
            }else{
                echo '<div id="pg" style="border-right:1px solid #dfdfdf; margin-right: 0px; vertical-align:middle;"><a href="?pg='.$pag1.'"><div style="padding: 5px 10px; ">'.$pag1.'</div></a></div>';
            }
        }else{
            echo '<div id="pg" style="padding: 5px 10px; border-right:1px solid #dfdfdf; margin-right: 0px; background-color: #0c582c; color: #fff;">'.$pag1.'</div>';
        }
    }

    /////////////////////////////FIM DA PAGINAÇÃO/////////////////////////////////

}

?>