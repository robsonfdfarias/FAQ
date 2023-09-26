(function () {
    document.getElementById('formatH').addEventListener('change', function() {
        var selectedOption = this.children[this.selectedIndex];
        console.log(selectedOption)
        var value = this.value;
        var param = selectedOption.getAttribute("data-param");
        insertH(value)
        console.log(value)
        console.log(param)

        /*document.getElementById('value').textContent = 'value = ' + value;
        document.getElementById('param').textContent = 'data-param = ' + param;*/
    });
    document.getElementById('tamFont').addEventListener('change', function() {
        var selectedOption = this.children[this.selectedIndex];
        console.log(selectedOption)
        var value = this.value;
        var param = selectedOption.getAttribute("data-param");
        tamanhoFont(value)
        console.log(value)
        console.log(param)

        /*document.getElementById('value').textContent = 'value = ' + value;
        document.getElementById('param').textContent = 'data-param = ' + param;*/
    });
})();



/*
var cores = document.getElementById('cores');
//cores.addEventListener("input", updateFirst, false);
cores.addEventListener("change", watchColorPicker, false);

function watchColorPicker(event) {
    document.querySelectorAll("p").forEach((p) => {
        console.log(event.target.value)
        console.log(cores.select())
    });
}*/


let colorPicker;
const defaultColor = "#0000ff";

window.addEventListener("load", startup, false);

function startup() {
    colorPicker = document.querySelector("#cores");
    colorPicker.value = defaultColor;
    colorPicker.addEventListener("input", cor, false);
    //colorPicker.addEventListener("change", updateAll, false);
    colorPicker.select();
}

window.addEventListener("load", startup, false);

function startup() {
    colorPicker = document.querySelector("#coresDestaque");
    colorPicker.value = defaultColor;
    colorPicker.addEventListener("input", backColorText, false);
    //colorPicker.addEventListener("change", updateAll, false);
    colorPicker.select();
}



function insertVi(){
    var url = document.getElementById('url').value;
    var vizualiza = document.getElementById('videoVisualiza');
    vizualiza.innerHTML = ifrm;
}





function link() {
    document.execCommand("createLink", true, "https://www.google.com");
}
function unlink() {
    document.execCommand("unlink", false, null);
}
function justificar() {
    document.execCommand("justifyFull");
}
function alinharEsquerda() {
    document.execCommand("justifyLeft");
}
function alinharDireita() {
    document.execCommand("justifyRight");
}
function alinharCentro() {
    document.execCommand("justifyCenter");
}

function italico() {
    document.execCommand("italic", window.getSelection(), null);
}
function negrito() {
    document.execCommand("bold");
}
function sublinhado() {
    document.execCommand("underline", window.getSelection(), null);
}
function cor() {
    var cores = document.getElementById('cores');
    document.execCommand("foreColor", window.getSelection(), cores.value);
}

function backColorText() {
    var cores = document.getElementById('coresDestaque');
    document.execCommand("backColor", window.getSelection(), cores.value);
}

function tamanhoFont(size) {
    document.execCommand("fontsize", true, size);
}

function copiar() {
    document.execCommand("copy", false, null);
}

function recortar() {
    document.execCommand("cut", false, null);
}

function colar() {
    document.execCommand("paste", false, null);
}

function ordenarLista(){
    document.execCommand("insertOrderedList", false, null);
}

function unOrdenarLista(){
    document.execCommand("insertUnorderedList", false, null);
}

function desfazer(){
    document.execCommand("undo", false, null);
}

function refazer(){
    document.execCommand("redo", false, null);
}

function removeFormatT(){
    document.execCommand("removeFormat", false, null);
}

function addStrikeThrough(){
    document.execCommand("strikeThrough", false, null);
}

function addSubScript(){
    document.execCommand("subscript", false, null);
}

function addSuperScript(){
    document.execCommand("superscript", false, null);
}

function addIdent(){
    document.execCommand("indent", false, null);
}

function addOutIdent(){
    document.execCommand("outdent", false, null);
}

function teste(){
    window.getSelection().getRangeAt(0).insertNode(id_('bold').firstChild);
}

function insertTag(valor, style) {
    selection = window.getSelection().toString();
    console.log(selection)
    wrappedselection = '<'+valor+' '+style+'>' + selection + '</'+valor+'>';
    //var img = new Image();
    document.execCommand('insertHTML', false, wrappedselection);
}

function CssFnctn() {
    document.execCommand('formatblock', false, 'h1')
    var listId = window.getSelection().anchorNode.parentNode;
    listId.classList = 'oder2';
}


function insertH(valor) {
    selection = window.getSelection().toString();
    console.log(selection)
    wrappedselection = '<'+valor+'>' + selection + '</'+valor+'>';
    //var img = new Image();
    document.execCommand('insertHTML', false, wrappedselection);
}

function insertTableOld() {
    selection = window.getSelection().toString();
    var table = '<table border="1" cellspacing="0" class="tabela"><tr><td><td><td></tr><tr><td><td><td></tr><tr><td><td><td></tr></table>';
    document.execCommand('insertHTML', false, table);
}

function insertTable() {
    window.open("windowInsertTable.php");
}

function insertTableNovo(numRow, numCol) {
    selection = window.getSelection().toString();
    var table = '<table border="1" cellspacing="0" class="tabela">';
    for(i=0; i<numRow; i++){
        table+='<tr>';
        for(j=0;j<numCol;j++){
            table+='<td></td>';
        }
        table+='</tr>';
    }
    table+='</table>';
    document.execCommand('insertHTML', false, table);
}

function insertVideoOld() {
    selection = window.getSelection().toString();
    var table = '<iframe width="560" height="315" src="https://www.youtube.com/embed/dtLXZEuZbeQ?si=HdSO5bFrWUow5eNl" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
    var video = window.prompt("Insira no campo abaixo o iframe de incorporação do vídeo do youtube", "");
    document.execCommand('insertHTML', false, video);
}

function openWindowInsertVideo(){
    window.open("windowInsertVideo.php");
}

function insertVideo(codVideo, si, width, height) {
    selection = window.getSelection().toString();
    //var table = '<iframe width="560" height="315" src="https://www.youtube.com/embed/dtLXZEuZbeQ?si=HdSO5bFrWUow5eNl" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
    var video = '<iframe width="'+width+'" height="'+height+'" src="https://www.youtube.com/embed/'+codVideo+'?si='+si+'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
    //var video = window.prompt("Insira no campo abaixo o iframe de incorporação do vídeo do youtube", "");
    document.execCommand('insertHTML', false, video);
}

function insertImg2() {
    selection = window.getSelection().toString();
    wrappedselection = '<span class="accent" style="somestyle">' + selection + '</span>';
    var img = document.createElement('img');
    img.src = "imgsGerais/projeto-codigo-01-08-2022.png";

    // Defina o atributo contenteditable da imagem como false para que o usuário não possa editar o texto dentro dela.
    img.contentEditable = false;

    // Defina alguns estilos CSS para tornar a imagem redimensionável.
    img.style.width = "200px"; // Largura inicial da imagem
    img.style.height = "auto"; // Altura automática para manter a proporção

    // Adicione a imagem ao documento.
    document.execCommand('insertHTML', false, img.outerHTML);
    img.addEventListener('click', function () {
        img.style.width = (img.offsetWidth + 10) + 'px'; // Aumentar a largura em 10 pixels quando a imagem for clicada
    });
}
function addHs(){
    document.getElementById('formatH').addEventListener('change', function() {
        var selectedOption = this.children[this.selectedIndex];
        console.log(selectedOption)
    /* var value = this.value;
        var param = selectedOption.getAttribute("data-param");

        document.getElementById('value').textContent = 'value = ' + value;
        document.getElementById('param').textContent = 'data-param = ' + param;*/
    });
}