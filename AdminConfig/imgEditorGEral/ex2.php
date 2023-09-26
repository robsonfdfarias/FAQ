<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../gh-fork-ribbon.css" />
  <title>Upload ajax</title>
</head>
<body>

<form action="ex2.class.php" method="post" id="upload">
  <input type="file" name="file" id="file" accept="image/*" />
  <input type="text" name="name" value="Robson" />
  <input type="submit" value="Send!" />
</form>

<div id="preview"></div>
<div id="porcento"></div>
<script src="upload.js"></script>
<script>/*
var $formUpload = document.getElementById('upload');
var $preview = document.getElementById('preview');
var pocentagem = document.getElementById("porcento");
var i = 0;

$formUpload.addEventListener('submit', function(event){
  event.preventDefault();

  var xhr = new XMLHttpRequest();

  xhr.upload.addEventListener('progress', function(e) {
        var perc = (e.loaded/e.total)*100;
        porcentagem.innerHTML = perc;
	});

  xhr.open("POST", $formUpload.getAttribute('action'));

  var formData = new FormData($formUpload);
  formData.append("i", i++);
  xhr.send(formData);

  xhr.addEventListener('readystatechange', function() {
    if (xhr.readyState === 4 && xhr.status == 200) {
      var json = JSON.parse(xhr.responseText);

      if (!json.error && json.status === 'ok') {
        $preview.innerHTML += '<br />Enviado!!';
        porcento.innerHTML = '<img src="'+json.img+'">';
      } else {
        $preview.innerHTML = 'Arquivo não enviado';
      }
    } else {
      $preview.innerHTML = xhr.statusText;
    }
  });

  //xhr.upload.addEventListener("progress", function(e) {
  //      var perc = (e.loaded/e.total)*100;
  //      porcentagem.innerHTML = perc;
  //  if (e.lengthComputable) {
  //    var percentage = Math.round((e.loaded * 100) / e.total);
  //    $preview.innerHTML = String(percentage) + '%';
  //  }
  //}, false);

  xhr.upload.addEventListener("load", function(e){
    $preview.innerHTML = String(100) + '%';
  }, false);

}, false);
*/
</script>

</body>
</html>