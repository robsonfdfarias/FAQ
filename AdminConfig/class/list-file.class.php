<?php

class ListFile {
    function listFiles($dir){
        $pasta = $dir;

        $dir = dir($pasta);

        
        while($arquivo=$dir->read()){
            //echo $arquivo."<br>";
            $cc = $pasta."/".$arquivo;
            if(is_dir($cc)){
                if($arquivo!="." && $arquivo!=".." && $arquivo!='' && $arquivo!=null && $arquivo!='undefined'){
                    $pastas[]=$pasta.'/'.$arquivo;
                }else{
                    //echo $arquivo.'<br>';
                //echo $arquivo."<br>";
                }
            }
        }

        echo '<div style="max-width:100%;align-items: center; display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; padding: 0px; padding: 20px;">';

        for($i=0; $i<count($pastas); $i++){
            $d = dir($pastas[$i]);
            $nomePasta = str_replace("../icones/", "", $pastas[$i]);
            echo '<div style="width:100%;"><h1>'.$nomePasta.'</h1>'.$this->creditos($nomePasta).'</div>';
            while($arq=$d->read()){
                //echo $arq."<br>";
                $cc = $pasta."/".$arq;
                //echo $cc;
                if(is_dir($cc)){
                }else{
                    if(!strpos($arq, '.txt') && !strpos($arq, '.php')){
                        echo '<div class="emotionsList" style="">';
                        echo '<img src="'.$pastas[$i].'/'.$arq.'" onclick="insertEmotions(this), fechaJanEmotions()">';
                        //echo '<br>'.$arq;
                        echo '</div>';
                    }
                }
            }
        }

        echo '</div>';

    }

    function creditos($pasta){
        //Verifica os creditos dos emotions
        if($pasta == 'Olhos e boca personagem de desenho'){
            return 'Créditos pelos ícones: <a href="https://br.freepik.com/vetores-gratis/conjunto-de-ilustracoes-de-expressoes-de-rosto-em-quadrinhos-olhos-e-boca-de-personagem-de-desenho-animado-fofinho-engracado-ou-zangado-emoticon-com-desenhos-de-sorriso-feliz-isolados-no-branco_20827600.htm#query=emoticons&position=16&from_view=keyword&track=sph&uuid=9708c3e5-c28a-4e43-ae24-6d2bf2d52bb5">Imagem de pch.vector</a> no Freepik';
        }
    }
}


?>