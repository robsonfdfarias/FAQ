<?php

class LimpaVar{
    function limpa($var){
        $tags = array("<?php", "?>", "<script", "</script>", "union select", "UNION SELECT", "UNION INSERT", "union insert", "union delete", "UNION DELETE", "UNION UPDATE", "union update",
                    "INTO OUTFILE", "into outfile", "INTO LOADFILE", "into loadfile");
        $var = str_replace($tags, "", $var);
        $var = strip_tags($var);
        return $var;
    }
}
//como usar o mix-blend-mode: difference; \\ do css
//https://www.youtube.com/watch?v=KQgtEygCPDY 

//animação com scroll da página
//https://www.youtube.com/watch?v=T33NN_pPeNI

//Perspective e transform com css
//https://www.youtube.com/watch?v=2KWdT4PkXgY&t=227s
?>