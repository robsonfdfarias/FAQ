<?php

class CRUD{
    function __construct(){
        include_once("conn.php");
        include_once("DB.class.php");
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
        $obj = DB::conn()->prepare("SELECT * FROM artigo where prioridade='sim' LIMIT 3");
        if($obj->execute()){
            $numRows = $obj->rowCount();
            if($numRows>0){
                while($linha = $obj->fetchObject()){
                    echo '<div class="objitensum">
                            <div id="img" style="background-image:url(\'imgs/'.$linha->img.'\');"></div>
                            <div id="texto">
                                <span id="tituloItem"><a href="#">'.$linha->titulo.'</a></span><hr>
                                <span id="descItem">'.substr($linha->resumo, 0,120).'... <br><a href="">LER MAIS</a></span>
                            </div>
                        </div>';
                }
            }
        }
    }

    function selectArtigos(){
        $obj = DB::conn()->prepare("SELECT * FROM artigo LIMIT 8");
        if($obj->execute()){
            $numRows = $obj->rowCount();
            if($numRows>0){
                while($linha = $obj->fetchObject()){
                    echo '<div class="questao">
                            <span class="tituloQuestao"><a href="#">'.$linha->titulo.'</a></span><br>
                            <span class="descQuestao">'.$linha->resumo.'<br><a href="#">Ler o artigo completo</a></span>
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
                while($linha=$obj->fetchObject()){
                    echo '<div class="questao">
                            <span class="tituloQuestao"><a href="#">'.$linha->titulo.'</a></span><br>
                            <span class="descQuestao">'.$linha->resumo.'<br><a href="#">Ler o artigo completo</a></span>
                        </div>';
                }
            }else{
                echo "<h3>Nenhum artigo encontrado!</h3>";
            }
        }
    }


}




?>