<?php

class CRUD{
    function __construct(){
        include_once("conn.php");
        include_once("DB.class.php");
        include_once("crud.categoria.class.php");
        DB::conn();
    }

    public $imgArt='Sem imagem';
    public $artigo = '';
    public $titleArt = '';
    public $resumoArt = '';


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


    function selectPrioridades(){
        $obj = DB::conn()->prepare("SELECT * FROM artigo where prioridade='sim' ORDER BY id DESC LIMIT 3");
        if($obj->execute()){
            $numRows = $obj->rowCount();
            $categoria = new Categoria();
            if($numRows>0){
                while($linha = $obj->fetchObject()){
                    echo '<div class="objitensum">
                            <div id="img" style="background-image:url(\'imagens/'.$linha->img.'\');"></div>
                            <div id="texto">
                                <span id="tituloItem"><a href="artigo.php?id='.$linha->id.'">'.$linha->titulo.'</a></span><hr>
                                <span id="categ"><i>Categoria: <a href="categoria.php?id='.$linha->categoria.'">'.$categoria->getCatById($linha->categoria).'</a></i><br></span>
                                <span id="descItem">'.substr($linha->resumo, 0,120).'... <br><a href="artigo.php?id='.$linha->id.'">LER MAIS</a></span>
                            </div>
                        </div>';
                }
            }
        }
    }

    function selectArtigos(){
        $obj = DB::conn()->prepare("SELECT * FROM artigo ORDER BY id DESC LIMIT 0,8");
        if($obj->execute()){
            $numRows = $obj->rowCount();
            $categoria = new Categoria();
            if($numRows>0){
                while($linha = $obj->fetchObject()){
                    echo '<div class="questao">
                            <span id="categoria"><i>Categoria: <a href="categoria.php?id='.$linha->categoria.'">'.$categoria->getCatById($linha->categoria).'</a></i><br></span>
                            <span class="tituloQuestao"><a href="artigo.php?id='.$linha->id.'">'.$linha->titulo.'</a></span><br>
                            <hr style="width:100%; height:50%;">
                            <span class="descQuestao">'.$linha->resumo.'<br><a href="artigo.php?id='.$linha->id.'">Ler o artigo completo</a></span>
                        </div>';
                }
            }
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
        //echo $sql;
        
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
                            <br><span class="descQuestao">'.$linha->resumo.'<br><a href="artigo.php?id='.$linha->id.'">Ler o artigo completo</a></span>
                        </div>';
                }
            }else{
                echo "<h3>Nenhum artigo encontrado!</h3>";
            }
        }
    }


    function getArtByCat($idCat){
        $objCateg = DB::conn()->prepare("SELECT * FROM artigo WHERE categoria=?");
        if($objCateg->execute(array($idCat))){
            $nr = $objCateg->rowCount();
            if($nr>0){
                while($linha = $objCateg->fetchObject()){
                    echo '<div class="questao">
                            <span class="tituloQuestao"><a href="artigo.php?id='.$linha->categoria.'">'.$linha->titulo.'</a></span><br>
                            <span class="descQuestao">'.$linha->resumo.'<br><a href="artigo.php?id='.$linha->categoria.'">Ler o artigo completo</a></span>
                        </div>';
                }
            }else{
                echo "Nenhum artigo encontrado nessa categoria";
            }
        }else{
            echo "Erro na conexão com a base de dados!";
        }
    }

    function getArtById($id){
        $obj = DB::conn()->prepare("SELECT * FROM artigo WHERE id=?");
        if($obj->execute(array($id))){
            $nr=$obj->rowCount();
            if($nr>0){
                $categ = new Categoria();
                $linha = $obj->fetchObject();
                $this->imgArt = 'imagens/'.$linha->img;
                $this->titleArt = $linha->titulo;
                $this->resumoArt = $linha->resumo;
                if($linha->dataAlter!=null || $linha->dataAlter!=''){
                    $dataAlter = "Ultima atualização ".$linha->dataAlter;
                }else{
                    $dataAlter = "Este artigo não sofreu nenhuma atualização até o momento.";
                }
                $this->artigo = '
                    <header id="titulo">'.$linha->titulo.'</header>
                    <nav>
                        <a href="index.php">HOME</a> -> 
                        <a href="perguntasFrequentes.php">Perguntas Frequentes</a> -> 
                        <a href="categoria.php?id='.$linha->categoria.'">'.$categ->getCatById($linha->categoria).'</a>
                    </nav>
                    
                    <article>
                        <header id="data">Data da postagem: '.$linha->dataPost.'</header>
                        <p>'.str_replace("../imagens", "imagens", $linha->conteudo).'</p>
                    </article>
                    <aside><section id="cat">Categoria: <span id="catSpan"> '.$categ->getCatById($linha->categoria).'</span></section></aside>
                    <footer>
                        <p><time pubdate datetime="2014-01-10">'.$dataAlter.'</time></p>
                    </footer>
                ';
            }
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

    /*function getArtById($id){
        $obj = DB::conn()->prepare("SELECT * FROM artigo WHERE id=?");
        if($obj->execute(array($id))){
            $nr=$obj->rowCount();
            if($nr>0){
                $categ = new Categoria();
                $linha = $obj->fetchObject();
                $imgArt = $linha->img;
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
                        <p>'.str_replace("../imagens", "imagens", $linha->conteudo).'</p>
                    </article>
                    <aside><section id="cat">Categoria: <span id="catSpan"> '.$categ->getCatById($linha->categoria).'</span></section></aside>
                    <footer>
                        <p><time pubdate datetime="2014-01-10">'.$dataAlter.'</time></p>
                    </footer>
                ';
            }
        }
    }*/


    function getCountArtForCat($idCat){
        $objCountArt = DB::conn()->prepare("SELECT * FROM artigo WHERE categoria=?");
        if($objCountArt->execute(array($idCat))){
            return $objCountArt->rowCount();
        }else{
            return 0;
        }
    }





    function getAllArticlePergGreq($pag, $numReg){
        $totReg = self::getTotalArticle();
        //echo $totReg;
        $verifyNumReg = ($pag*$numReg)-$numReg;
        //echo '<br>'.$verifyNumReg.'<br>';
        if($totReg<=$verifyNumReg){
            echo '<h1>Não existem registros nestá página.</h1>';
            return false;
        }
        
        try{
            $sql = "SELECT * FROM artigo ORDER BY id DESC LIMIT ".$verifyNumReg.",".$numReg." ";
            $obj = DB::conn()->prepare($sql);
            //$verifyNumReg = parseInt($verifyNumReg);
            //$numReg = parseInt($numReg);
            if($obj->execute()){
                $numRows = $obj->rowCount();
                if($numRows>0){
                    $pags = ceil($totReg/$numReg);
                    echo '
                        <div id="numreg" style="margin-bottom: 10px;">
                            Número de registros: '.$totReg.' | 
                            Número de páginas: '.$pags.' | 
                            Número de registro por página: '.$numReg.' | 
                            Página atual: '.$pag.' | 
                        </div>
                    ';
                    $categ = new Categoria();
                    $n=0;
                    while($linha = $obj->fetchObject()){
                        echo '
                                <div id="summaryArticle" class="summaryArticle">
                                    <div id="titleArticle_'.$n.'" class="titleArticle" onclick="abre(this)"><span id="status" style="display:none;">false</span><span id="ttArtigo">'.$linha->titulo.'</span>
                                    <span id="setOpenClose"><img id="imagem" src="imgs/angulo-para-baixo.svg" alt="Seta indicando para abrir" width="20"></span></div>
                                    <div id="contentArticle_'.$n.'" class="contentArticle" style="">
                                        <article>
                                            <header id="data">Data da postagem: '.$linha->dataPost.'</header>
                                            <p>'.str_replace("../imagens", "imagens", $linha->conteudo).'</p>
                                        </article>
                                        <aside><section id="cat">Categoria: <span id="catSpan"> '.$categ->getCatById($linha->categoria).'</span></section></aside>
                                        <footer>
                                            <p><time pubdate datetime="2014-01-10">'.$dataAlter.'</time></p>
                                        </footer>
                                    </div>
                                </div>
                            ';
                            $n++;
                    }
                    echo '
                        <div id="paginacao" style="display: flex; justify-content: center; text-align: center; vertical-align: middle;">
                        <div style="padding: 5px 0; margin-right: 7px;">Total '.$totReg.' itens</div>
                        <div style="border-radius: 4px; display: flex; justify-content: center; text-align: center; vertical-align: middle; border:1px solid #dfdfdf; width:60%;">
                    ';
                    //BT Voltar
                    if($pag>1){
                        $pgPre = $pag-1;
                        echo '<div id="pg" style="padding: 5px 10px; border-right:1px solid #dfdfdf; margin-right: 0px;"><a href="?pg='.$pgPre.'"><</a></div>';
                    }else{
                        echo '<div id="pg" style="padding: 5px 10px; border:0px solid #dfdfdf; margin-right: 0px; color: #c8c8c8; background-color: #f2f2f2;"><</div>';
                    }
                    //Páginas
                    echo '<div id="barraPg" style="display: flex; justify-content: center; text-align: center; vertical-align: middle; overflow-x: auto;">';
                    for($i=1; $i<=$pags; $i++){
                        if($i!=$pag){
                            echo '<div id="pg" style="padding: 5px 10px; border-right:1px solid #dfdfdf; margin-right: 0px;"><a href="?pg='.$i.'">'.$i.'</a></div>';
                            echo '<div id="pg" style="padding: 5px 10px; border-right:1px solid #dfdfdf; margin-right: 0px;"><a href="?pg='.$i.'">'.$i.'</a></div>';
                            echo '<div id="pg" style="padding: 5px 10px; border-right:1px solid #dfdfdf; margin-right: 0px;"><a href="?pg='.$i.'">'.$i.'</a></div>';
                            echo '<div id="pg" style="padding: 5px 10px; border-right:1px solid #dfdfdf; margin-right: 0px;"><a href="?pg='.$i.'">'.$i.'</a></div>';
                            echo '<div id="pg" style="padding: 5px 10px; border-right:1px solid #dfdfdf; margin-right: 0px;"><a href="?pg='.$i.'">'.$i.'</a></div>';
                            echo '<div id="pg" style="padding: 5px 10px; border-right:1px solid #dfdfdf; margin-right: 0px;"><a href="?pg='.$i.'">'.$i.'</a></div>';
                        }else{
                            echo '<div id="pg" style="padding: 5px 10px; border-right:1px solid #dfdfdf; margin-right: 0px; background-color: #0c582c; color: #fff;">'.$i.'</div>';
                        }
                    }
                    echo '</div>';
                    //BT Avançar
                    if($pag<$pags){
                        $pgPre = $pag+1;
                        echo '<div id="pg" style="padding: 5px 10px; border:0px solid #dfdfdf; margin-right: 0px;"><a href="?pg='.$pgPre.'">></a></div>';
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
                    echo '<div id="pg" style="display:none;">'.$pag.'</div>';
                }
            }else{
                echo 'Erro ao fazer a consulta';
            }
        }catch(PDOException $e){
            echo 'ERRO: '.$e->getMessage();
        }
    }

    function getTotalArticle(){
        $objTot = DB::conn()->prepare("SELECT * FROM artigo");
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




    function getAllArticlePergGreq2(){
        $objAll = DB::conn()->prepare("SELECT * FROM artigo");
        try{
            if($objAll->execute()){
                $numRows = $objAll->rowCount();
                if($numRows>0){
                    $categ = new Categoria();
                    $n=0;
                    while($linha = $objAll->fetchObject()){
                        echo '
                            <div id="summaryArticle" class="summaryArticle">
                                <div id="titleArticle_'.$n.'" class="titleArticle" onclick="abre(this)"><span id="status" style="display:none;">false</span><span id="ttArtigo">'.$linha->titulo.'</span>
                                <span id="setOpenClose"><img id="imagem" src="imgs/angulo-para-baixo.svg" alt="Seta indicando para abrir" width="20"></span></div>
                                <div id="contentArticle_'.$n.'" class="contentArticle" style="">
                                    <article>
                                        <header id="data">Data da postagem: '.$linha->dataPost.'</header>
                                        <p>'.str_replace("../imagens", "imagens", $linha->conteudo).'</p>
                                    </article>
                                    <aside><section id="cat">Categoria: <span id="catSpan"> '.$categ->getCatById($linha->categoria).'</span></section></aside>
                                    <footer>
                                        <p><time pubdate datetime="2014-01-10">'.$dataAlter.'</time></p>
                                    </footer>
                                </div>
                            </div>
                        ';
                        $n++;
                    }
                }
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function getArticleForCategory($id){
        $objAll = DB::conn()->prepare("SELECT * FROM artigo WHERE categoria=?");
        try{
            if($objAll->execute(array($id))){
                $numRows = $objAll->rowCount();
                if($numRows>0){
                    $categ = new Categoria();
                    $n=0;
                    while($linha = $objAll->fetchObject()){
                        echo '
                            <div id="summaryArticle" class="summaryArticle">
                                <div id="titleArticle_'.$n.'" class="titleArticle" onclick="abre(this)"><span id="status" style="display:none;">false</span><span id="ttArtigo">'.$linha->titulo.'</span>
                                <span id="setOpenClose"><img id="imagem" src="imgs/angulo-para-baixo.svg" alt="Seta indicando para abrir" width="20"></span></div>
                                <div id="contentArticle_'.$n.'" class="contentArticle" style="">
                                    <article>
                                        <header id="data">Data da postagem: '.$linha->dataPost.'</header>
                                        <p>'.str_replace("../imagens", "imagens", $linha->conteudo).'</p>
                                    </article>
                                    <aside><section id="cat">Categoria: <span id="catSpan"> '.$categ->getCatById($linha->categoria).'</span></section></aside>
                                    <footer>
                                        <p><time pubdate datetime="2014-01-10">'.$dataAlter.'</time></p>
                                    </footer>
                                </div>
                            </div>
                        ';
                        $n++;
                    }
                }
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function getFindArticle($pesq){
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
        //echo $sql;
        
        $obj = DB::conn()->prepare($sql);
        $dados[] = "%".$original."%";
        $dados[] = "%".$original."%";
        $dados[] = "%".$original."%";
        for($i=0; $i<count($array2); $i++){
            $dados[] = "%".$array2[$i]."%";
        }
        try{
            if($obj->execute($dados)){
                $numRows = $obj->rowCount();
                if($numRows>0){
                    $categ = new Categoria();
                    $n=0;
                    while($linha = $obj->fetchObject()){
                        echo '
                            <div id="summaryArticle" class="summaryArticle">
                                <div id="titleArticle_'.$n.'" class="titleArticle" onclick="abre(this)"><span id="status" style="display:none;">false</span><span id="ttArtigo">'.$linha->titulo.'</span>
                                <span id="setOpenClose"><img id="imagem" src="imgs/angulo-para-baixo.svg" alt="Seta indicando para abrir" width="20"></span></div>
                                <div id="contentArticle_'.$n.'" class="contentArticle" style="">
                                    <article>
                                        <header id="data">Data da postagem: '.$linha->dataPost.'</header>
                                        <p>'.str_replace("../imagens", "imagens", $linha->conteudo).'</p>
                                    </article>
                                    <aside><section id="cat">Categoria: <span id="catSpan"> '.$categ->getCatById($linha->categoria).'</span></section></aside>
                                    <footer>
                                        <p><time pubdate datetime="2014-01-10">'.$dataAlter.'</time></p>
                                    </footer>
                                </div>
                            </div>
                        ';
                        $n++;
                    }
                }
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    

}




?>