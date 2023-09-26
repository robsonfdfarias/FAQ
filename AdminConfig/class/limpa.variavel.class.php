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

?>