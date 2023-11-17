<?php

//$pasta = filter_input(INPUT_GET, $_GET['pasta'], FILTER_SANITIZE_SPECIAL_CHARS);
$pasta = $_GET['pasta'];

$pp1 = explode('/', $pasta);
//print_r($pp);
$pp = array_filter($pp1, function($value){
    return ($value !==null && $value !== false && $value !== '' && $value !== ' ');
});
//print_r($pp);
$acumula = '..';
for($i=1; $i<count($pp); $i++){
    $acumula.='/'.$pp[$i];
    //echo '<span style="padding: 0 10px;"><a onclick="clickFile(\'pasta\', \''.$acumula.'\')">'.$pp[$i].'</a></span>';
    echo '<a onclick="clickFile(\'pasta\', \''.$acumula.'\')">'.$pp[$i].'</a>';
    if(count($pp)>2 && $i<(count($pp)-1)){
        echo ' <img src="../imgs/seta-para-a-direita.svg" height="20"> ';
    }
}

//echo '<h1>'.$pasta.'</h1><br>';

$dir = dir($pasta);

echo '<div style="max-width:100%;align-items: center; display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; padding: 0px; padding: 20px;">';

while($arquivo=$dir->read()){
    //echo $arquivo."<br>";
    $cc = $pasta."/".$arquivo;
    if(is_dir($cc)){
        if($arquivo!="." && $arquivo!=".." && $arquivo!='' && $arquivo!=null && $arquivo!='undefined'){
            echo '<div class="pasta" style="width:200px; padding:0; word-break: break-all; margin: 0 15px;">';
            echo '<a onclick="clickFile(\'pasta\', \''.$pasta.'/'.$arquivo.'\')"><img src="../imgs/pasta.png" width="200"></a>';
            echo '<br>'.$arquivo;
            echo '</div>';
        }else{
            //echo $arquivo.'<br>';
        }
    }else{
        if(!strpos($arquivo, '.txt') && !strpos($arquivo, '.php')){
            echo '<div style="width:200px; padding:0; word-break: break-all; margin: 0 5px;">';
            echo '<a onclick="clickFile(\'imagem\', \''.$pasta.'/'.$arquivo.'\')"><img src="'.$pasta.'/'.$arquivo.'" width="200"></a>';
            echo '<br>'.$arquivo;
            echo '</div>';
        }
    }
}

echo '</div>';

?>