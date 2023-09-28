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
    }


    function getCountArtForCat($idCat){
        $objCountArt = DB::conn()->prepare("SELECT * FROM artigo WHERE categoria=?");
        if($objCountArt->execute(array($idCat))){
            return $objCountArt->rowCount();
        }else{
            return 0;
        }
    }
    

}




?>