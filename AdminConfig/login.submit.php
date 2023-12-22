<?php

//echo $_POST['email']."<br>".$_POST['senha']."<br>";
    //echo md5("manaus123");
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
//echo $email."<br>".$senha."<br>";
    include_once("class/usuario.class.php");
    $user = new Usuario();
    //$user->login("robsonfdfarias@gmail.com", "manaus123");
    $user->login($email, $senha);

?>