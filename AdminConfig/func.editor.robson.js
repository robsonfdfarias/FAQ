(function () {
    document.getElementById('formatH').addEventListener('change', function() {
        // var selectedOption = this.children[this.selectedIndex];
        //console.log(selectedOption)
        var value = this.value;
        // var param = selectedOption.getAttribute("data-param");
        this.children['padrao'].selected = true;
        if(value=='reset'){
            delElement()
            return;
        }
        insertH(value)
        //console.log(value)
        //console.log(param)

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
    document.getElementById('typefontface').addEventListener('change', function() {
        var selectedOption = this.children[this.selectedIndex];
        console.log(selectedOption)
        var value = this.value;
        var param = selectedOption.getAttribute("data-param");
        fontFaceSel(value)
        console.log(value)
        console.log(param)
        // this.children['padrao'].selected = true;

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




/*********************************** EXCLUIR TAG (EFEITO) INICIO **************************************/

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

function delElement(){
    // console.log('////////////////////////////////////////////////////////////')
    // var range = window.getSelection().getRangeAt(0).toString();
    var range = window.getSelection().getRangeAt(0);
    var selecao = window.getSelection().getRangeAt(0).startContainer;
    // console.log(selecao)
    var tag = selecao.parentNode;
    // if(getTags()=='div'){
    //     return;
    // }
    // console.log(tag);
    // console.log(tag.nodeName);
    let pai = tag.parentNode;
    if(pai.nodeName=='DIV'){
        console.log(pai.nodeName)
        console.log(pai.getAttribute('id'))
        if(pai.getAttribute('id')=='texto' && pai.getAttribute('id')!=null){
            return;
        }
    }
    let p = pai.outerHTML;
    // pai.removeChild(tag)
    var t = tag.outerHTML;
    // console.log(t)

    let abre = '';
    let fecha = '';
    if(getTagName(tag.nodeName)=='p'){
        abre = '<'+getTagName(tag.nodeName)+' class="p">';
        fecha = '</'+getTagName(tag.nodeName)+'>';
        console.log('era para ter pego o class '+tag.nodeName)
    }else{
        abre = '<'+getTagName(tag.nodeName)+'>';
        fecha = '</'+getTagName(tag.nodeName)+'>';
    }
    // console.log('--->>'+getTagName(tag.nodeName))
    // t = t.replace(abre, '');
    // t = t.replace(fecha, '');
    p = p.replace(abre, '');
    p = p.replace(fecha, '');

    abre = '<'+getTagName(pai.nodeName)+'>';
    fecha = '</'+getTagName(pai.nodeName)+'>';
    // t = t.replace(abre, '');
    // t = t.replace(fecha, '');
    p = p.replace(abre, '');
    p = p.replace(fecha, '');
    pai.innerHTML = p
    // document.execCommand('insertHTML', true, pai)
    range.insertNode(pai);
}

function getTagName(tag){
    if(tag == 'DIV'){
        return 'div';
    }else if(tag=='B'){
        return 'b';
    }else if(tag=='RFFEFEITOBGTEXT1'){
        return 'rffefeitobgtext1';
    }else if(tag=='RFFEFEITOBGTEXT2'){
        return 'rffefeitobgtext2';
    }else if(tag=='RFFEFEITOBGTEXT3'){
        return 'rffefeitobgtext3';
    }else if(tag=='RFFEFEITOBGTEXT4'){
        return 'rffefeitobgtext4';
    }else if(tag=='RFFEFEITOBGTEXT5'){
        return 'rffefeitobgtext5';
    }else if(tag=='RFFEFEITOBGTEXT6'){
        return 'rffefeitobgtext6';
    }else if(tag=='RFFEFEITOBGTEXT7'){
        return 'rffefeitobgtext7';
    }else if(tag=='RFFEFEITOBGTEXT8'){
        return 'rffefeitobgtext8';
    }else if(tag=='RFFEFEITOBGTEXT9'){
        return 'rffefeitobgtext9';
    }else if(tag=='RFFEFEITOBGTEXT10'){
        return 'rffefeitobgtext10';
    }else if(tag=='RFFEFEITOBGTEXT11'){
        return 'rffefeitobgtext11';
    }else if(tag=='RFFEFEITOBGTEXT12'){
        return 'rffefeitobgtext12';
    }else if(tag=='RFFEFEITOBGTEXT13'){
        return 'rffefeitobgtext13';
    }else if(tag=='RFFEFEITOBGTEXT14'){
        return 'rffefeitobgtext14';
    }else if(tag=='RFFEFEITOBGTEXT15'){
        return 'rffefeitobgtext15';
    }else if(tag=='RFFEFEITOBGTEXT16'){
        return 'rffefeitobgtext16';
    }else if(tag=='RFFEFEITOBGTEXT17'){
        return 'rffefeitobgtext17';
    }else if(tag=='RFFEFEITOBGTEXT18'){
        return 'rffefeitobgtext18';
    }else if(tag=='RFFEFEITOBGTEXT19'){
        return 'rffefeitobgtext19';
    }else if(tag=='RFFEFEITOBGTEXT20'){
        return 'rffefeitobgtext20';
    }else if(tag=='RFFEFEITOBGTEXT21'){
        return 'rffefeitobgtext21';
    }else if(tag=='RFFEFEITOBGTEXT'){
        return 'rffefeitobgtext';
    }else if(tag=='RFFTEXTSHADOW'){
        return 'rfftextshadow';
    }else if(tag=='RFFNEONTEXT'){
        return 'rffneontext';
    }else if(tag=='RFFNEONTEXTECOLORWHITE'){
        return 'rffneontextecolorwhite';
    }else if(tag=='RFFTEXT3D'){
        return 'rfftext3d';
    }else if(tag=='RFFTEXT3DSIMPLES'){
        return 'rfftext3dsimples';
    }else if(tag=='RFFTEXT3DEXTREME'){
        return 'rfftext3dextreme';
    }else if(tag=='RFFTEXTDEGRADE'){
        return 'rfftextdegrade';
    }else if(tag=='CITE'){
        return 'cite';
    }else if(tag=='A'){
        return 'a';
    }else if(tag=='P'){
        return 'p';
    }else if(tag=='H1'){
        return 'h1';
    }else if(tag=='H2'){
        return 'h2';
    }else if(tag=='H3'){
        return 'h3';
    }else if(tag=='H4'){
        return 'h4';
    }else if(tag=='H5'){
        return 'h5';
    }
}

function getTags(){
    var selecao = window.getSelection().getRangeAt(0).startContainer;
    // console.log(selecao)
    var tag = selecao.parentNode;
    // console.log('111111111111111111111111-------------'+tag.nodeName)
    console.log(getTagName(tag.nodeName))
    return getTagName(tag.nodeName)
}

/*********************************** EXCLUIR TAG (EFEITO) INICIO **************************************/



/*********************************** MARCAR OS BOTÕES QUE FORAM ATIVADOS INICIO **************************************/
    var tags = [];
function selectElem(){
    // console.log('........................................................')
    // console.log(tags)
        let selFont = document.getElementById('typefontface');
        selFont.children['padrao'].selected = true;

        selFont = document.getElementById('tamFont');
        selFont.children['padrao'].selected = true;
    for(let j=1;j<(tags.length-1);j++){
    // console.log(tags[j].nodeName)
        if(tags[j].nodeName!='FONT'){
            document.getElementById(returnBtName(tags[j].nodeName)).setAttribute('style', 'background-color:none;')
        }
    }

    tags = [];
    // console.log('******************************************************************')
    var selecao = window.getSelection().getRangeAt(0).startContainer;
    // console.log(selecao.parentNode.parentNode)
    tags.push(selecao)
    // console.log('apos o primeiro push')
    for(let i=0; i<10; i++){
            // console.log(tags[i].parentNode.nodeName)
        if(tags[i].parentNode.nodeName=='DIV'){
            tags.push(tags[i].parentNode)
            // console.log('está na div')
            break;
            // console.log('aqui não é para aparecer')
        }else{
            tags.push(tags[i].parentNode)
        }
        elementInsert(tags[i].parentNode.nodeName, tags[i].parentNode)
    }
    // let testafont = selecao.parentNode;
    // console.log('++++++++++++++++++'+testafont.nodeName)
    // if(testafont.nodeName=='FONT'){
    // }
    // console.log(tags)
    // var tag = selecao.parentNode;
    // console.log(getTagName(tag.nodeName))
    // console.log(tag.nodeName)
    // elementInsert(tag.nodeName);
}
function returnBtName(ele, node){
    // console.log('-----............-----'+ele)
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
    }else if(ele=='RFFEFEITOBGTEXT'){
        obj='rffEfeitoBGText';
    }else if(ele=='RFFTEXTSHADOW'){
        obj='rffTextShadow';
    }else if(ele=='RFFNEONTEXT'){
        obj='rffNeonText';
    }else if(ele=='RFFNEONTEXTECOLORWHITE'){
        obj='rffNeonTextEColorWhite';
    }else if(ele=='RFFTEXT3D'){
        obj='rffText3D';
    }else if(ele=='RFFTEXT3DSIMPLES'){
        obj='rffText3DSimples';
    }else if(ele=='RFFTEXT3DEXTREME'){
        obj='rffText3DExtreme';
    }else if(ele=='RFFTEXTDEGRADE'){
        obj='rffTextDegrade';
    }else if(ele=='CITE'){
        obj='cite';
    }else if(ele=='A'){
        obj='insertHyperLink';
    }else if(ele=='P'){
        obj='p';
    }else if(ele=='FONT'){
        obj='font';
    }
    return obj;
}

function elementInsert(ele, nodeEl){
    var obj;
    // console.log(ele)
    obj = returnBtName(ele);
    negritaBt(obj, nodeEl)

}
function negritaBt(obj, nodeEl){
    // console.log(obj)
    if(obj=='font'){
        if(nodeEl.getAttribute('face')!=null){
            console.log('O tipo da fonte é: '+nodeEl.getAttribute('face'))
            let selFont = document.getElementById('typefontface');
            selFont.children[nodeEl.getAttribute('face')].selected = true;
        }
        if(nodeEl.getAttribute('size')!=null){
            console.log('O tipo da fonte é: '+nodeEl.getAttribute('size'))
            let selFont = document.getElementById('tamFont');
            let n =  nodeEl.getAttribute('size');
            n=n-1;
            selFont.children[n].selected = true;
        }
    }else{
        var o = document.getElementById(obj);
        // alert(o.src)
        o.setAttribute('style', 'background-color: #cdcdcd;')
    }
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
    selectElem();
})



/*********************************** MARCAR OS BOTÕES QUE FORAM ATIVADOS FIM **************************************/







function insertVi(){
    var url = document.getElementById('url').value;
    var vizualiza = document.getElementById('videoVisualiza');
    vizualiza.innerHTML = ifrm;
}



function openWindowLink(){
    var selecao = window.getSelection().getRangeAt(0).startContainer;
    // console.log(selecao)
    var tag = selecao.parentNode;
    // console.log('555555555555555555555555-------------'+tag.nodeName)
    if(tag.nodeName=='A'){
        // console.log(tag.getAttribute('href'))
        // console.log(tag.getAttribute('target'))
        localStorage.setItem('link', tag.getAttribute('href'))
        localStorage.setItem('target', tag.getAttribute('target'))
        window.open('windowEditLink.php', 'janela', 'height=350, width=500, top=50, left=100, scrollbar=no, fullscreen=no');
    }else{
        window.open("windowInsertLink.php", 'janela', 'height=350, width=500, top=50, left=100, scrollbar=no, fullscreen=no');
    }
}

function link(link, target) {
    //document.execCommand("createLink", true, "https://www.google.com");
    //document.execCommand("createLink", true, link);
    console.log(target)
    selection = window.getSelection().toString();
    var link = '<a href="'+link+'"'+target+'>'+selection+'</a>';
    document.execCommand("insertHTML", true, link);
}
function unlink() {
    selectElem();
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

function corText(cor) {
    document.execCommand("foreColor", window.getSelection(), '#'+cor);
}

function backColorTextNew(color) {
    document.execCommand("backColor", window.getSelection(), '#'+color);
}

function tamanhoFont(size) {
    document.execCommand("fontsize", true, size);
}

function fontFaceSel(font) {
    document.execCommand("fontname", true, font);
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
    // console.log(selection)
    wrappedselection = '<rffTextShadow>' + selection + '</rffTextShadow>';
    //var img = new Image();
    document.execCommand('insertHTML', false, wrappedselection);
}

function insertTagsNew(valor) {
    if(valor.toLowerCase() == getTags()){
        // alert(valor)
        document.getElementById(valor).setAttribute('style', 'background-color:none;');
        // selectElem();
        delElement();
        exit;
    }
    selection = window.getSelection().toString();
    // console.log(selection)
    wrappedselection = '<'+valor+'>' + selection + '</'+valor+'>';
    //var img = new Image();
    document.execCommand('insertHTML', false, wrappedselection);
}

function insertTag(valor, style) {
    if(valor.toLowerCase() == getTags()){
        // alert(valor)
        document.getElementById(valor).setAttribute('style', 'background-color:none;');
        // selectElem();
        delElement();
        exit;
    }
    selection = window.getSelection().toString();
    // console.log(selection)
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





//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/********************************* Cria e edita tabela INICIO ***************************************************/


function insertTableOld() {
    selection = window.getSelection().toString();
    var table = '<table border="1" cellspacing="0" class="tabela"><tr><td><td><td></tr><tr><td><td><td></tr><tr><td><td><td></tr></table>';
    document.execCommand('insertHTML', false, table);
}

function insertTable() {
    window.open("windowInsertTable.php", 'janela', 'height=350, width=500, top=50, left=100, scrollbar=no, fullscreen=no');
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

function insertTrAfter() {
    var selecao = window.getSelection().getRangeAt(0).startContainer;
    selecao = selecao.parentNode
    console.log(selecao.nodeName+"------------")
    if(selecao.nodeName=='TD'){
        var tbody = selecao.parentNode.parentNode;
        let tr = selecao.parentNode;
        let obj = document.createElement('tr');
        var tds = '';
        for(let i=0;i<tr.children.length;i++){
            tds+='<td></td>'
        }
        obj.innerHTML = tds
        tbody.insertBefore(obj, tr.nextElementSibling);
        console.log('Deu certo')
    }
}

function insertTrBefore() {
    var selecao = window.getSelection().getRangeAt(0).startContainer;
    selecao = selecao.parentNode
    console.log(selecao.nodeName+"------------")
    if(selecao.nodeName=='TD'){
        var tbody = selecao.parentNode.parentNode;
        let tr = selecao.parentNode;
        let obj = document.createElement('tr');
        var tds = '';
        for(let i=0;i<tr.children.length;i++){
            tds+='<td></td>'
        }
        obj.innerHTML = tds
        tbody.insertBefore(obj, tr);
        console.log('Deu certo')
    
    }
}

function insertTdBefore() {
    var selecao = window.getSelection().getRangeAt(0).startContainer;
    selecao = selecao.parentNode
    if(selecao.nodeName=='TD'){
        var tbody = selecao.parentNode.parentNode;
        let tr = selecao.parentNode;
        console.log(',,,,,,,,,,,,,'+tbody.children[0].children.length)
        let conta = 0;
        let n = selecao.previousElementSibling
        for(let j=0; j<tbody.children[0].children.length; j++){
            if(n!=null){
                conta++;
                console.log(conta)
            }else{
                break;
            }
            n = n.previousElementSibling
        }
        console.log('o numero da celula é: '+conta)
        let obj = [];
        for(let i=0;i<tbody.children.length;i++){
            obj.push(document.createElement('td'))
        }
        for(let i=0;i<tbody.children.length;i++){
            console.log(tbody.children[i].children[conta])
            tbody.children[i].insertBefore(obj[i], tbody.children[i].children[conta])
        }
        console.log('Deu certo')
    }
}

function insertTdAfter() {
    var selecao = window.getSelection().getRangeAt(0).startContainer;
    selecao = selecao.parentNode
    if(selecao.nodeName=='TD'){
        var tbody = selecao.parentNode.parentNode;
        let tr = selecao.parentNode;
        console.log(',,,,,,,,,,,,,'+tbody.children[0].children.length)
        let conta = 1;
        let n = selecao.previousElementSibling
        for(let j=0; j<tbody.children[0].children.length; j++){
            if(n!=null){
                conta++;
                console.log(conta)
            }else{
                break;
            }
            n = n.previousElementSibling
        }
        console.log('o numero da celula é: '+conta)
        let obj = [];
        for(let i=0;i<tbody.children.length;i++){
            obj.push(document.createElement('td'))
        }
        for(let i=0;i<tbody.children.length;i++){
            console.log(tbody.children[i].children[conta])
            tbody.children[i].insertBefore(obj[i], tbody.children[i].children[conta])
        }
        console.log('Deu certo')
    }
}



//////////////////////////
/******* Excluir ********/
//////////////////////////


function delTr() {
    var selecao = window.getSelection().getRangeAt(0).startContainer;
    selecao = selecao.parentNode
    // console.log(selecao.nodeName+"------------")
    if(selecao.nodeName=='TD'){
        var tbody = selecao.parentNode.parentNode;
        let tr = selecao.parentNode;
        tbody.removeChild(tr)
    }
}

function delTd() {
    var selecao = window.getSelection().getRangeAt(0).startContainer;
    selecao = selecao.parentNode
    if(selecao.nodeName=='TD'){
        var tbody = selecao.parentNode.parentNode;
        let tr = selecao.parentNode;
        // console.log(',,,,,,,,,,,,,'+tbody.children[0].children.length)
        let conta = 0;
        let n = selecao.previousElementSibling
        for(let j=0; j<tbody.children[0].children.length; j++){
            if(n!=null){
                conta++;
                console.log(conta)
            }else{
                break;
            }
            n = n.previousElementSibling
        }
        // console.log('o numero da celula é: '+conta)
        for(let i=0;i<tbody.children.length;i++){
            // console.log(tbody.children[i].children[conta])
            tbody.children[i].removeChild(tbody.children[i].children[conta])
        }
        // console.log('Deu certo')
    }
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/************************************ Cria e edita tabela FIM ***************************************************/



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