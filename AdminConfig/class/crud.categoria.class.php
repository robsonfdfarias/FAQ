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

    function getCatMenuPag(){
        $obj = DB::conn()->prepare("SELECT * FROM categoria");
        if($obj->execute()){
            $numRow = $obj->rowCount();
            if($numRow>0){
                echo '<table style="width:100%; padding: 10px;" id="tabCatMenuPage"><tr><td>Título</td><td colspan="2">Opções</td></tr>';
                while($linha = $obj->fetchObject()){
                    echo '<tr><td>'.$linha->titulo.'</td><td><a href="catEdit.php?id='.$linha->id.'" target="_blank"><img src="imgs/cat-edit.svg" height="30">EDITAR</a></td>
                    <td><a href="catDelete.php?id='.$linha->id.'" target="_blank"><img src="imgs/cat-delete.svg" height="30">EXCLUIR</a></td></tr>';
                }
                echo '</table>';
            }else{
                echo '<h2>Nenhuma categoria encontrada!';
            }
        }else{
            echo "Erro na consulta!";
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
}

?>