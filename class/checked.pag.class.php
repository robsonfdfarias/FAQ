<?php

    class CheckedPag{
        function retorna($pag){
            $paginaCorrente = basename($_SERVER['SCRIPT_NAME']);
            $char = explode(".", $paginaCorrente);
            if($pag == $char[0]){
                echo 'style="background-color:forestgreen; font-weight: bold;"';
            }
        }
    }

?>