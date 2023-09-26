<?php 

/*  
*$dir é o caminho da pasta onde você deseja que os arquivos sejam salvos. 
*Neste exemplo, supondo que esta pagina esteja em public_html/upload/ 
*os arquivos serão salvos em public_html/upload/imagens/ 
*Obs.: Esta pasta de destino dos arquivos deve estar com as permissões de escrita habilitadas. 
*/ 
/*
$dir = "imagens/"; 
// recebendo o arquivo multipart 
$file = $_FILES["arquivo"]; 
// Move o arquivo da pasta temporaria de upload para a pasta de destino 
if (move_uploaded_file($file["tmp_name"], "$dir/".$file["name"])) { 
    echo "Arquivo enviado com sucesso!"; 
} 
else { 
    echo "Erro, o arquivo n&atilde;o pode ser enviado."; 
}         */  
?>

<?php
// Flag que indica se há erro ou não
$erro = null;
// Quando enviado o formulário
if (isset($_FILES['arquivo']))
{
    // Extensões permitidas
    $extensoes = array(".doc", ".txt", ".pdf", ".docx", ".jpg", ".png", ".bmp", ".jpeg");
    // Caminho onde ficarão os arquivos
    $caminho = "imagens/";
    // Recuperando informações do arquivo
    $nome = $_FILES['arquivo']['name'];
    $temp = $_FILES['arquivo']['tmp_name'];
    // Verifica se a extensão é permitida
    if (!in_array(strtolower(strrchr($nome, ".")), $extensoes)) {
        $erro = 'Extensão inválida';
    }
    // Se não houver erro
    if (!isset($erro)) {
        // Gerando um nome aleatório para o arquivo
        //$nomeAleatorio = md5(uniqid(time())) . strrchr($nome, ".");
        $nomeAleatorio = date("Y-m-d_H-i-s_").$nome;
        // Movendo arquivo para servidor
        if (!move_uploaded_file($temp, $caminho . $nomeAleatorio))
            $erro = 'Não foi possível anexar o arquivo';
    }
}
?>