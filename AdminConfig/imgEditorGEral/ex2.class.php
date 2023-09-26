<?php
ini_set('upload_max_filesize', '10M');
if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
    $nomeAleatorio = date("Y-m-d_H-i-s_").$_FILES['file']['name'];
  file_put_contents('imagens/post.txt', 'name=' . $_POST['name'] . ',count=' . $_POST['i'] . PHP_EOL, FILE_APPEND);
  move_uploaded_file($_FILES['file']['tmp_name'], "imagens/" . $nomeAleatorio);

  $ret = array('status' => 'ok', 'img' => "imagens/" . $nomeAleatorio);
} else {
  $ret = array('error' => 'no_file');
}

header('Content-Type: application/json');
echo json_encode($ret);
exit;

?>