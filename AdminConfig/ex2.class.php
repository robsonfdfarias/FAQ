<?php
$pasta = '../imagens/';
ini_set('upload_max_filesize', '10M');
if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
  //substr($linha->resumo, 0,120)
    //$nomeAleatorio = date("Y-m-d_H-i-s_").$_FILES['file']['name'];
    include_once("class/nome.aleatorio.arquivo.php");
    $aleatorio = new NomeAleratorioArquivo();
    $nomeAleatorio = $aleatorio->nomeAleatorio($_FILES['file']['name']);
    //echo $nomeAleatorio."<br>";
  file_put_contents($pasta.'post.txt', 'name=' . $_POST['name'] . ',count=' . $_POST['i'] . PHP_EOL, FILE_APPEND);
  move_uploaded_file($_FILES['file']['tmp_name'], $pasta . $nomeAleatorio);

  $ret = array('status' => 'ok', 'img' => $pasta . $nomeAleatorio);
} else {
  $ret = array('error' => 'no_file');
}

header('Content-Type: application/json');
echo json_encode($ret);
exit;

?>