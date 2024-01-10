<?php

class Categoria{
    function __construct(){
        include_once("conn.php");
        include_once("DB.class.php");
        DB::conn();
    }

    function getCatById($id){
        $obj = DB::conn()->prepare("SELECT * FROM categoria WHERE id=?");
        if($obj->execute(array($id))){
            $numRow = $obj->rowCount();
            if($numRow>0){
                while($linha = $obj->fetchObject()){
                    return $linha->titulo;
                }
            }else{
                return "Nenhuma categoria com esse ID";
            }
        }else{
            return "Problema na conexão com a base de dados.";
        }
    }

    function menuCategoria(){
        $obj = DB::conn()->prepare("SELECT * FROM categoria");
        if($obj->execute()){
            $numRow = $obj->rowCount();
            if($numRow>0){
                while($linha = $obj->fetchObject()){
                    echo '<option value="'.$linha->id.'">'.$linha->titulo.'</option>';
                }
            }else{
                echo '<option value="0">Nenhuma categoria encontrada</option>';
            }
        }else{
            echo '<option value="0">Erro na consulta!</option>';
        }
    }

    function getCatFooter(){
        include_once("crud.artigo.class.php");
        $art = new CRUD();
        $obj = DB::conn()->prepare("SELECT * FROM categoria");
        if($obj->execute()){
            $numRow = $obj->rowCount();
            if($numRow>0){
                while($linha = $obj->fetchObject()){
                    echo ' | <a href="categoria.php?id='.$linha->id.'">'.$linha->titulo.'</a>('.$art->getCountArtForCat($linha->id).')';
                }
                echo ' | ';
            }
        }
    }

    function getCatMenuPag($pag, $numReg){
        $totReg = self::getTotalArticle("SELECT * FROM categoria", '');
        //echo $totReg;
        $verifyNumReg = ($pag*$numReg)-$numReg;
        //echo '<br>'.$verifyNumReg.'<br>';
        if($totReg<=$verifyNumReg){
            echo '<h1>Não existem registros nestá página.</h1>';
            return false;
        }
        try{
            $obj = DB::conn()->prepare("SELECT * FROM categoria ORDER BY id DESC LIMIT ".$verifyNumReg.",".$numReg." ");
            if($obj->execute()){
                $numRow = $obj->rowCount();
                if($numRow>0){
                    $pags = ceil($totReg/$numReg);
                        echo '
                            <div id="numreg" style="margin-bottom: 10px; display:none;">
                                Número de registros: '.$totReg.' | 
                                Número de páginas: '.$pags.' | 
                                Número de registro por página: '.$numReg.' | 
                                Página atual: '.$pag.' | 
                            </div>
                        ';
                    //echo '<table style="width:100%; padding: 10px;" id="tabCatMenuPage"><tr><td>Título</td><td colspan="2">Opções</td></tr>';
                    while($linha = $obj->fetchObject()){
                        //echo '<tr><td>'.$linha->titulo.'</td><td><a href="catEdit.php?id='.$linha->id.'" target="_blank"><img src="imgs/cat-edit.svg" height="30">EDITAR</a></td>
                        //<td><a href="catDelete.php?id='.$linha->id.'" target="_blank"><img src="imgs/cat-delete.svg" height="30">EXCLUIR</a></td></tr>';
                        echo '
                            <div id="generalFeedNews" style="display:flex; flex-direction:row; padding-left: 10px; justify-content:center;text-align:center; vertical-align:middle;align-items: center;">
                                <div style="text-align:left;width:91%;">
                                    <span id="titleNewsFeed">'.$linha->titulo.'</span><br>
                                </div>
                                <div style="display:flex;">
                                    <a href="catEdit.php?id='.$linha->id.'">
                                    <div id="divBtEdit"><img src="imgs/edit-lapis.svg" width="20" title="Editar notícia"></div>
                                    </a>
                                    <a href="catDelete.php?id='.$linha->id.'" target="_blank">
                                    <div id="divBtDelete"><img src="imgs/delete-bin.svg" width="20" title="Deletar notícia"></div>
                                    </a>
                                </div>
                            </div>
                        ';
                    }
                    //echo '</table>';
                    echo '<br>';
                    self::pagination($pags,$totReg,$pag,'');
                }else{
                    echo '<h2>Nenhuma categoria encontrada!';
                }
            }else{
                echo "Erro na consulta!";
            }
        }catch(PDOException $e){
            echo 'Erro: '.$e->getMessage();
        }
    }

    function addCategoria($titulo, $status){
        $objAddCat = DB::conn()->prepare("INSERT INTO categoria (titulo, statusCat) values (?, ?)");
        try{
            $objAddCat->execute(array($titulo, $status));
            echo "Categoria inserida com sucesso!<br>
            <a href='categoriaIndex.php'>Ver todas as categorias</a><br>";
        }catch(PDOException $e){
            echo "Erro na inserção: ".$e->getMessage();
        }
    }

    function getCatObjById($id){
        $obj = DB::conn()->prepare("SELECT * FROM categoria WHERE id=?");
        if($obj->execute(array($id))){
            $numRow = $obj->rowCount();
            if($numRow>0){
                return $obj->fetchObject();
            }
        }
    }

    function updateCat($titulo, $status, $id){
        //echo $titulo." - ".$status." - ".$id."<br>";
        $objUp = DB::conn()->prepare("UPDATE categoria SET titulo=?, statusCat=? WHERE id=?");
        if($objUp->execute(array($titulo, $status, $id))){
            if($objUp->rowCount()>0){
                echo 'Categoria alterada com sucesso!';
            }else{
                echo 'Erro ao alterar a categoria!';
            }
        }else{
            echo 'Erro na execução do comando!';
        }
    }

    function deleteCat($id, $titulo){
        $objDel = DB::conn()->prepare("DELETE FROM categoria WHERE id=?");
        /*if($objDel->execute(array($id))){
            echo 'Categoria <strong>'.$titulo.'</strong> excluída com sucesso!';
        }else{
            echo 'Erro ao excluir a categoria <strong>'.$titulo.'</strong>.';
        }*/
        try{
            $objDel->execute(array($id));
            echo 'Categoria <strong>'.$titulo.'</strong> excluída com sucesso!';
        }catch(PDOException $e){
            echo 'Erro ao excluir a categoria <strong>'.$titulo.'</strong>. Erro: '.$e->getMessage;
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

    /*********************************** PAGINAÇÃO FIM ***************************************************/

}

?>