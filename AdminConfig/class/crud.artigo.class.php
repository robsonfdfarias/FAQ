<?php

class CRUD{
    function __construct(){
        include_once("conn.php");
        include_once("DB.class.php");
        include_once("crud.categoria.class.php");
        DB::conn();
    }


    function removeArtigosDefinidos($texto){
        $art = ['a', 'e', 'i', 'o', 'u', 
        'as', 'es', 'is', 'os', 'us', 
        'A', 'E', 'I', 'O', 'U',  
        'AS', 'ES', 'IS', 'OS', 'US', 
        'á', 'é', 'í', 'ó', 'ú', 
        'Á', 'É', 'Í', 'Ó', 'Ú', 
        'Â', 'Ê', 'Î', 'Ô', 'Û', 
        'â', 'ê', 'î', 'ô', 'û', 
        'da', 'de', 'di', 'do', 'du', 
        'das', 'des', 'dis', 'dos', 'dus', 
        'DA', 'DE', 'DI', 'DO', 'DU', 
        'DAS', 'DES', 'DIS', 'DOS', 'DUS', 
        'um', 'uma', 'UM', 'UMA', 'uns', 'umas', 'UNS', 'UMAS'];
        for($i = 0; $i < count($art); $i++){
            if(in_array($texto, $art)){
                //echo "///existe///";
                return false;
            }
        }
        return true;
    }

    function selectArtigos($pag, $numReg){
        $totReg = self::getTotalArticle("SELECT * FROM artigo", '');
        //echo $totReg;
        $verifyNumReg = ($pag*$numReg)-$numReg;
        //echo '<br>'.$verifyNumReg.'<br>';
        if($totReg<=$verifyNumReg){
            echo '<h1>Não existem registros nestá página.</h1>';
            return false;
        }
        try{
            $obj = DB::conn()->prepare("SELECT * FROM artigo ORDER BY id DESC LIMIT ".$verifyNumReg.",".$numReg." ");
            if($obj->execute()){
                $numRows = $obj->rowCount();
                $categoria = new Categoria();
                if($numRows>0){
                    $pags = ceil($totReg/$numReg);
                        echo '
                            <div id="numreg" style="margin-bottom: 10px; display:none;">
                                Número de registros: '.$totReg.' | 
                                Número de páginas: '.$pags.' | 
                                Número de registro por página: '.$numReg.' | 
                                Página atual: '.$pag.' | 
                            </div>
                        ';
                    while($linha = $obj->fetchObject()){
                        /*echo '<div class="questao">
                                <span id="categoria"><i>Categoria: <a href="categoria.php?id='.$linha->categoria.'">'.$categoria->getCatById($linha->categoria).'</a></i><br></span>
                                <span class="tituloQuestao"><a href="artigo.php?id='.$linha->id.'">'.$linha->titulo.'</a></span><br>
                                <hr style="width:100%; height:50%;">
                                <span class="descQuestao">'.$linha->resumo.'<br>
                                <a href="editar.php?id='.$linha->id.'">Editar</a> |
                                <a href="excluir.php?id='.$linha->id.'" target="_blank">Excluir</a> |
                                <a href="artigo.php?id='.$linha->id.'">Ler o artigo completo</a>
                                </span>
                            </div>';*/
                            echo '
                            <div id="generalFeedNews" style="display:flex; flex-direction:row; padding-left: 10px; justify-content:center;text-align:center; vertical-align:middle;align-items: center;">
                                <div style="text-align:left;width:91%;">
                                    <span id="titleNewsFeed">'.$linha->titulo.'</span><br>
                                    <span id="summaryNewsFeed">'.substr($linha->resumo, 0, 190).'...</span><br>
                                </div>
                                <div style="display:flex;">
                                    <a href="editar.php?id='.$linha->id.'">
                                    <div id="divBtEdit"><img src="imgs/edit-lapis.svg" width="20" title="Editar notícia"></div>
                                    </a>
                                    <a href="excluir.php?id='.$linha->id.'" target="_blank">
                                    <div id="divBtDelete"><img src="imgs/delete-bin.svg" width="20" title="Deletar notícia"></div>
                                    </a>
                                </div>
                            </div>
                        ';
                    }
                    echo '<br>';
                    self::pagination($pags,$totReg,$pag,'');
                }
            }
        }catch(PDOException $e){
            echo 'Erro: '.$e->getMessage();
        }
    }

    function findArticle($pesq){
        $tags = array("<?php", "?>", "<script", "</script>", "union select", "UNION SELECT", "UNION INSERT", "union insert", "union delete", "UNION DELETE", "UNION UPDATE", "union update",
                    "INTO OUTFILE", "into outfile", "INTO LOADFILE", "into loadfile");
        $pesq = str_replace($tags, "", $pesq);
        $pesq = strip_tags($pesq);
        $original = $pesq;
        $array = explode(" ", $pesq);
        $sql = "SELECT * FROM artigo WHERE titulo LIKE ? OR resumo LIKE ? OR conteudo LIKE ?";
        for($i=0; $i<count($array); $i++){
            if(self::removeArtigosDefinidos($array[$i])){
                if($array[$i]!=''){
                    $array2[] = $array[$i];
                }
            }
            
        }
        for($i=0; $i<count($array2); $i++){
            $sql = $sql." OR tags LIKE ?";
        }
        
        $obj = DB::conn()->prepare($sql);
        $dados[] = "%".$original."%";
        $dados[] = "%".$original."%";
        $dados[] = "%".$original."%";
        for($i=0; $i<count($array2); $i++){
            $dados[] = "%".$array2[$i]."%";
        }
        if($obj->execute($dados)){
            $num = $obj->rowCount();
            if($num>0){
                $categoria = new Categoria();
                while($linha=$obj->fetchObject()){
                    echo '<div class="questao">
                            <span class="tituloQuestao"><a href="artigo.php?id='.$linha->id.'">'.$linha->titulo.'</a></span>
                            <span id="categoria"><i>Categoria: <a href="categoria.php?id='.$linha->categoria.'">'.$categoria->getCatById($linha->categoria).'</a></i><br></span>
                            <br><br><span class="descQuestao">'.$linha->resumo.'<br>
                            <a href="editar.php?id='.$linha->id.'">Editar</a> |
                            <a href="excluir.php?id='.$linha->id.'">Excluir</a> |
                            <a href="artigo.php?id='.$linha->id.'">Ler o artigo completo</a>
                            </span>
                        </div>';
                }
            }else{
                echo "<h3>Nenhum artigo encontrado!</h3>";
            }
        }
    }


    function getArtByCat($idCat, $pag, $numReg){
        $totReg = self::getTotalArticle("SELECT * FROM artigo WHERE categoria=? ", $idCat);
        $verifyNumReg = ($pag*$numReg)-$numReg;
        if($totReg<=$verifyNumReg){
            echo '<h1>Não existem registros nestá página.</h1>';
            return false;
        }
        try{
            $objCateg = DB::conn()->prepare("SELECT * FROM artigo WHERE categoria=? ORDER BY id DESC LIMIT ".$verifyNumReg.",".$numReg." ");
            if($objCateg->execute(array($idCat))){
                $nr = $objCateg->rowCount();
                if($nr>0){
                    $pags = ceil($totReg/$numReg);
                        echo '
                            <div id="numreg" style="margin-bottom: 10px; display:none;">
                                Número de registros: '.$totReg.' | 
                                Número de páginas: '.$pags.' | 
                                Número de registro por página: '.$numReg.' | 
                                Página atual: '.$pag.' |  
                            </div>
                        ';
                    while($linha = $objCateg->fetchObject()){
                        echo '<div class="questao">
                                <span class="tituloQuestao"><a href="artigo.php?id='.$linha->id.'">'.$linha->titulo.'</a></span><br><br>
                                <span class="descQuestao">'.$linha->resumo.'<br>
                                <a href="editar.php?id='.$linha->id.'">Editar</a> |
                                <a href="excluir.php?id='.$linha->id.'">Excluir</a> |
                                <a href="artigo.php?id='.$linha->id.'">Ler o artigo completo</a>
                                </span>
                            </div>';
                    }
                    echo '<br>';
                    self::pagination($pags,$totReg,$pag,'');
                }else{
                    echo "Nenhum artigo encontrado nessa categoria";
                }
            }else{
                echo "Erro na conexão com a base de dados!";
            }
        }catch(PDOException $e){
            echo 'Erro: '.$e->getMessage();
        }
    }

    function getArtById($id){
        $obj = DB::conn()->prepare("SELECT * FROM artigo WHERE id=?");
        if($obj->execute(array($id))){
            $nr=$obj->rowCount();
            if($nr>0){
                $categ = new Categoria();
                $linha = $obj->fetchObject();
                if($linha->dataAlter!=null || $linha->dataAlter!=''){
                    $dataAlter = "Ultima atualização ".$linha->dataAlter;
                }else{
                    $dataAlter = "Este artigo não sofreu nenhuma atualização até o momento.";
                }
                echo '
                    <header id="titulo">'.$linha->titulo.'</header>
                    <nav>
                        <a href="index.php">HOME</a> -> 
                        <a href="perguntasFrequentes.php">Perguntas Frequentes</a> -> 
                        <a href="categoria.php?id='.$linha->categoria.'">'.$categ->getCatById($linha->categoria).'</a>
                    </nav>
                    
                    <article>
                        <header id="data">Data da postagem: '.$linha->dataPost.'</header>
                        <p>'.$linha->conteudo.'</p>
                    </article>
                    <aside><section id="cat">Categoria: <span id="catSpan"> '.$categ->getCatById($linha->categoria).'</span></section></aside>
                    <footer>
                        <p><time pubdate datetime="2014-01-10">'.$dataAlter.'</time></p>
                    </footer>
                ';
            }
        }
    }



    function getArtByIdJson($id){
        $obj = DB::conn()->prepare("SELECT * FROM artigo WHERE id=?");
        if($obj->execute(array($id))){
            $nr=$obj->rowCount();
            if($nr>0){
                $categ = new Categoria();
                $linha = $obj->fetchObject();
                return $linha;
            }
        }
    }


    
    function insertArticle($titulo, $resumo, $conteudoArtigo, $tags, $img, $prioridade, $categoria){
        $dataPost = date('d/m/Y');
        $objInsert = DB::conn()->prepare("INSERT INTO artigo(titulo, resumo, conteudo, tags, img, prioridade, categoria, dataPost) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        try{
            $objInsert->execute(array($titulo, $resumo, $conteudoArtigo, $tags, $img, $prioridade, $categoria, $dataPost));
            echo "Artigo inserido com sucesso
            <a href='artigo.php?id=".$id."'>Visualizar o artigo</a><br>
            <a href='index.php'>Ver todos os artigos</a><br>";
        }catch (PDOException $e){
            echo "Erro na inserção do artigo.<br>";
            echo 'Erro: '.$e->getMessage();
        }
        /*
        if($objInsert->execute(array($titulo, $resumo, $conteudoArtigo, $tags, $img, $prioridade, $categoria, $dataPost))){
            echo "Passo 3 <br>";
            echo "Artigo inserido com sucesso";
        }else{
            echo "Passo 4 <br>";
            echo "Erro na inserção do artigo";
        }
        echo "Passo 5 <br>";*/
    }

    function updateArticle($titulo, $resumo, $conteudoArtigo, $tags, $img, $prioridade, $categoria, $id){
        $dataAlter = date('d/m/Y');
        $objUpdate = DB::conn()->prepare("UPDATE artigo SET titulo=?, resumo=?, conteudo=?, tags=?, img=?, prioridade=?, categoria=?, dataAlter=? WHERE id=?");
        if($objUpdate->execute(array($titulo, $resumo, $conteudoArtigo, $tags, $img, $prioridade, $categoria, $dataAlter, $id))){
            echo "Artigo alterado com sucesso!<br>
            <a href='artigo.php?id=".$id."'>Visualizar o artigo</a><br>
            <a href='index.php'>Ver todos os artigos</a><br>";
        }else{
            echo "Erro ao editar o artigo, favor tente novamente. Se persistir o problema, entre em contato com o administrador!";
        }
    }

    function deleteArticle($id){
        $objDelete = DB::conn()->prepare("DELETE FROM artigo WHERE id=?");
        if($objDelete->execute(array($id))){
            /*echo "Artigo alterado com sucesso!<br>
            <a href='index.php'>Ver todos os artigos</a><br>";*/
            echo '
            <script>
                alert("Artigo deletado com sucesso!");
                window.open("index.php");
            </script>
            ';
            header("location: index.php");
        }else{
            echo '
            <script>
                alert("Erro ao deletar o artigo!");
                window.open("index.php");
            </script>
            ';
            header("location: index.php");
        }
    }

    function getCountArtForCat($idCat){
        $objCountArt = DB::conn()->prepare("SELECT * FROM artigo WHERE categoria=?");
        if($objCountArt->execute(array($idCat))){
            return $objCountArt->rowCount();
        }else{
            return 0;
        }
    }


    /*********************************** PAGINAÇÃO INICIO ***************************************************/

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
                if($objTot->execute(array($dados))){
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

    /*********************************** PAGINAÇÃO FIM ***************************************************/


}




?>