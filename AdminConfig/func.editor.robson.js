(function () {
    document.getElementById('formatH').addEventListener('change', function() {
        // var selectedOption = this.children[this.selectedIndex];
        //console.log(selectedOption)
        var value = this.value;
        // var param = selectedOption.getAttribute("data-param");
        insertH(value)
        //console.log(value)
        //console.log(param)
        this.children['padrao'].selected = true;

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
        this.children['padrao'].selected = true;

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

window.addEventListener("load", startup1, false);

function startup1() {
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

// function selectElem(){
//     var range = window.getSelection().getRangeAt(0).toString();
//     var selecao = window.getSelection().getRangeAt(0).startContainer;
//     console.log(selecao)
//     var tag = selecao.parentNode;
//     console.log(tag);
//     // tag = tag+'';
//     console.log(tag.nodeName);
//     var t = tag.outerHTML;
//     // t = t.match(/<(.*?)>.*?<\/(.*?)>/g); 
//     console.log(t)
//     // console.log('---> '+t.substring(t.indexOf('<'), t.indexOf('>')+1));
//     // console.log('---> '+t.substring(t.indexOf('</'), t.indexOf('>')+1));
//     alert(getTagName(tag.nodeName))
//     let abre = '<'+getTagName(tag.nodeName)+'>';
//     let fecha = '</'+getTagName(tag.nodeName)+'>';
//     t = t.replace(abre, '');
//     t = t.replace(fecha, '');
//     console.log(t)
//     // range.insertNode(t);
//     document.execCommand('insertHTML', true, range)
//     console.log('+++++++++++++'+range)
// }

function getTagName(tag){
    if(tag == 'DIV'){
        return 'div';
    }else if(tag=='B'){
        return 'b';
    }else if(tag=='RFFEFEITOBGTEXT3'){
        return 'rffefeitobgtext3';
    }
}

/*********************************** MARCAR OS BOTÕES QUE FORAM ATIVADOS INICIO **************************************/
    var tags = [];
function selectElem(){
    console.log('........................................................')
    console.log(tags)
    for(let j=1;j<(tags.length-1);j++){

    console.log(tags[j].nodeName)
        
        document.getElementById(returnBtName(tags[j].nodeName)).setAttribute('style', 'background-color:none;')
    }
    tags = [];
    // window.open('https://www.google.com', 'janela', 'height=300, width=430, top=50, left=100, scrollbar=no, fullscreen=no')
    // window.open("https://www.google.com", "info", "height=300, width=430, toolbar=0, location=0, directories=0, status=0, menubar=0, scrollbars=0, resizable=0");
    console.log('******************************************************************')
    var selecao = window.getSelection().getRangeAt(0).startContainer;
    console.log(selecao.parentNode.parentNode)
    tags.push(selecao)
    console.log('apos o primeiro push')
    for(let i=0; i<10; i++){
            console.log(tags[i].parentNode.nodeName)
        if(tags[i].parentNode.nodeName=='DIV'){
            tags.push(tags[i].parentNode)
            // console.log('está na div')
            break;
            // console.log('aqui não é para aparecer')
        }else{
            tags.push(tags[i].parentNode)
        }
        elementInsert(tags[i].parentNode.nodeName)
        // f(tags[i].parentNode.nodeName!='DIV'){
        //     //
        // }
    }
    console.log(tags)
    var tag = selecao.parentNode;
    // console.log(getTagName(tag.nodeName))
    // console.log(tag.nodeName)
    elementInsert(tag.nodeName);
}
function returnBtName(ele){
    if(ele=='B'){
        obj='negrito';
    }else if(ele=='I'){
        obj='italico';
    }else if(ele=='STRIKE'){
        obj='strike';
    }else if(ele=='U'){
        obj='sublinhado';
    }else if(ele=='SUB'){
        obj='subescrito';
    }else if(ele=='SUP'){
        obj='superescrito';
    }
    return obj;
}
var objEffectSelect = '';
function elementInsert(ele){
    // console.log(objEffectSelect)
    // if(obj!=objEffectSelect && objEffectSelect!==''){
    //     let m = document.getElementById(objEffectSelect);
    //     m.setAttribute('style', 'background-color: none;');
    // }
    var obj;
    console.log(ele)
    if(ele=='B'){
        obj='negrito';
        negritaBt(obj)
        objEffectSelect = obj;
    }else if(ele=='I'){
        obj='italico';
        negritaBt(obj)
        objEffectSelect = obj;
    }else if(ele=='STRIKE'){
        obj='strike';
        negritaBt(obj)
        objEffectSelect = obj;
    }else if(ele=='U'){
        obj='sublinhado';
        negritaBt(obj)
        objEffectSelect = obj;
    }
}
function negritaBt(obj){
    console.log(obj)
    var o = document.getElementById(obj);
    // alert(o.src)
    o.setAttribute('style', 'background-color: #cdcdcd;')
}

var quadro = document.getElementById('texto')
quadro.addEventListener('keydown', function(e){
    // switch (e.keyCode) {
    //     case 37:
    //         str = 'Left Key pressed!';
    //         break;
    //     case 38:
    //         str = 'Up Key pressed!';
    //         break;
    //     case 39:
    //         str = 'Right Key pressed!';
    //         break;
    //     case 40:
    //         str = 'Down Key pressed!';
    //         break;
    // }
    // alert(str)
    selectElem();
})
quadro.addEventListener('mouseup', function(){
    // alert('Soltou o click')
    selectElem();
})



/*********************************** MARCAR OS BOTÕES QUE FORAM ATIVADOS FIM **************************************/







function insertVi(){
    var url = document.getElementById('url').value;
    var vizualiza = document.getElementById('videoVisualiza');
    vizualiza.innerHTML = ifrm;
}



function openWindowLink(){
    window.open("windowInsertLink.php");
}

function link(link, target) {
    //document.execCommand("createLink", true, "https://www.google.com");
    //document.execCommand("createLink", true, link);
    selection = window.getSelection().toString();
    var link = '<a href="'+link+'"'+target+'>'+selection+'</a>';
    document.execCommand("insertHTML", true, link);
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
    document.execCommand('styleWithCSS', false, true);
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

function tagRffTextShadow() {
    selection = window.getSelection().toString();
    console.log(selection)
    wrappedselection = '<rffTextShadow>' + selection + '</rffTextShadow>';
    //var img = new Image();
    document.execCommand('insertHTML', false, wrappedselection);
}

function insertTagsNew(valor) {
    selection = window.getSelection().toString();
    console.log(selection)
    wrappedselection = '<'+valor+'>' + selection + '</'+valor+'>';
    //var img = new Image();
    document.execCommand('insertHTML', false, wrappedselection);
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



function insertEmotions(img){
    if(img != null){
        var url = img.getAttribute("src");
        var width = 50;
        var height = 'auto';
        document.getElementById("porcento").innerHTML = '<img src="'+url+'" id="previewImage" width="'+width+'" height="'+height+'">';
        insertImg();
    }else{
        console.log("selecione uma imagem e Clique no botão Carregar e visualizar antes de inserir")
    }
}