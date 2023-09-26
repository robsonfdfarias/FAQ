var $formUpload = document.getElementById('upload');
var $preview = document.getElementById('preview');
var porcentagem = document.getElementById("porcento");
var i = 0;

var posicao;
var range;
var index;
var editor;

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
        porcentagem.innerHTML = '<img id="previewImage" src="'+json.img+'" width="300">';
      } else {
        $preview.innerHTML = 'Arquivo não enviado';
      }
    } else {
      $preview.innerHTML = xhr.statusText;
    }
  });

  xhr.upload.addEventListener("progress", function(e) {
        var perc = (e.loaded/e.total)*100;
        porcentagem.innerHTML = perc;
    if (e.lengthComputable) {
      var percentage = Math.round((e.loaded * 100) / e.total);
      $preview.innerHTML = String(percentage) + '%';
    }
  }, false);

  xhr.upload.addEventListener("load", function(e){
    $preview.innerHTML = String(100) + '%';
  }, false);

}, false);



function insertImg() {
  var img = document.getElementById("previewImage");
  var srcImg = img.getAttribute("src");
  selection = window.getSelection().toString();
  var width=document.getElementById("largura").value;
  if(width<=0 || width==null || width==''){
      width='auto';
  }
  var height=document.getElementById("altura").value;
  if(height<=0 || height==null || height==''){
      height='auto';
  }

  var imagem = '<img src="'+srcImg+'" width="'+width+'" height="'+height+'" onclick="editImg(this)" class="imagem">';
  document.execCommand('insertHTML', false, imagem);
}

window.addEventListener("click", function(){
  setTimeout(function () {
    setCursor(editor, posicao);
  }, 200);
  insertImg();
})

function editImg(img) {
  var larg = window.prompt("Insira a largura", "");
  if(larg!='' && larg!=null){
      img.setAttribute("width", larg);
  }
  /*
  var configStyle = img.getAttribute("style");
  console.log(configStyle)
      var opcoes = "";
  if(configStyle==null || configStyle==''){
      //configStyle+="border: 3px solid red;";
      configStyle="border: 3px solid red;";
  }else{
      //opcoes="border: 3px solid red;";
  }*/

  //testa(configStyle, "border: 3px solid red", "border");
  //testa(configStyle, larg, "width");
  //configStyle = opcoes;
  //img.setAttribute("style", configStyle);

  /*if(larg!=null && larg!=''){
      configStyle+="width: "+larg+"px;";
      img.setAttribute("style", configStyle)
  }*/
}

function testa(configStyle2, valor, arg){
  var op = configStyle2.split(";");
      var opcoes = "";
      console.log(op)
      for(i=0; i<(op.length-1); i++){
          console.log(op[i])
          var opInterno = op[i].split(":")
          if(arg!=null){
              if(opInterno[0]==arg){
                      op[i]=valor;
                  }else{
                      if(i==(op.length-2)){
                          opcoes+=valor;
                      }
                  }
          }
          /*if(opInterno=="border"){
              op[i]="border: 3px solid red";
          }
          
          if(larg!=null && larg!=''){
              if(opInterno=="width"){
                  op[i]="width: "+larg+"px";
              }
          }*/
          opcoes+=op[i]+";";
      }
      console.log(opcoes);
      return opcoes;
}


var statePaneImage = false;
function togglePaneImage(){
  /*const selection = window.getSelection();
  const range = selection.getRangeAt(0);
  const startOffset = range.startOffset;
  const endOffset = range.endOffset;
  //var posicao = selection.focusOffset
  var posicao = selection.focusNode;
  console.log(posicao)*/
  const selection = window.getSelection();
  posicao = selection.focusNode;
  if(statePaneImage==false){
      document.getElementById("geralInseriImagem").setAttribute("style", "display:flex; transition:ease-in-out 0.5s;");
      statePaneImage=true;
  }else{
      document.getElementById("geralInseriImagem").setAttribute("style", "display:none; transition:ease-in-out 0.5s;");
      statePaneImage=false;
      document.getElementById("porcento").innerHTML=''
      posicao=''
      funcBtImg();
  }
}


function setCursor(node, cursorElement) {
  var range = document.createRange();
  range.setStart(cursorElement, 0);
  range.collapse(true);
  if (window.getSelection) {
      var sel = window.getSelection();
      sel.removeAllRanges();
      sel.addRange(range);
      node.focus();
  } else if (document.selection && range.select) {
      range.select();
  }
}

editor = document.querySelector("#texto");

function funcBtImg(){
  var imG = document.getElementsByClassName("imagem");
  for(i=0;i<imG.length;i++){
      imG[i].setAttribute("onclick", "editImg(this)")
  }
}

function onDragStart(event, elem) {
  elem.setAttribute("onclick", "editImg(this)")
  funcBtImg()
  event
    .dataTransfer
    .setData('text/plain', event.target.id);

  event
    .currentTarget
    .style
    .backgroundColor = 'yellow';


}
