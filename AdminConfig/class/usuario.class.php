<?php

    class Usuario{
        
        function __construct(){
            include_once("conn.php");
            include_once("DB.class.php");
            include_once("limpa.variavel.class.php");
            DB::conn();
        }

        function login($nome, $senha){
            session_start();
            $limpa = new LimpaVar();
            $nome = $limpa->limpa($nome);
            $senha = $limpa->limpa($senha);
            $senha = md5($senha);
            //echo $senha;
            $obj = DB::conn()->prepare("SELECT * FROM usuarios WHERE email=? AND senha=?");
            if($obj->execute(array($nome, $senha))){
                $numRow = $obj->rowCount();
                //echo "<br>".$numRow;
                if($numRow>0){
                    while($linha = $obj->fetchObject()){
                        $_SESSION["id"] = $linha->id;
                        $_SESSION["nome"] = $linha->nome;
                        $_SESSION['nivel'] = $linha->nivel;
                        $_SESSION['email'] = $linha->email;
                        header('Location: AdminConfig/index.php');
                        echo "Logado com sucesso!";
                        echo '<br><a href="AdminConfig/index.php">Ir para a área principal.</a>';
                    }
                }else{
                    echo "Usuário ou senha não cadastrado!";
                }
            }else{
                echo "Erro na consulta!";
            }
        }
    }

?>