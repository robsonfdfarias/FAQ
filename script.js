var secretaria = document.getElementById('secretaria');
var btUnidades = document.getElementById('btUnidades');
var filtro = document.getElementById('filtro');
var valor = document.getElementById('valor');
var parametro = 'nome';
var url = window.location.href;
var pag =1;
var numReg = 5;


//******************** INICIA O ARMAZENAMENTO E VALIDAÇÃO DO TOKEN **********************/

function getToken(){
    var json;
    var xhr = new XMLHttpRequest();

    var data = 'email=robsonfdfarias@gmail.com&password=manaus123';

    xhr.open("POST", "http://127.0.0.1:8000/api/auth/login");

    xhr.setRequestHeader('Accept-Encoding', 'gzip, delate, br');
    xhr.setRequestHeader('Connection', 'keep-alive');
    xhr.setRequestHeader('Accept', 'application/json');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.send(data);

    xhr.addEventListener('readystatechange', function(){
        if(xhr.readyState === 4 && xhr.status == 200){
            // console.log(xhr.responseText+'***********');
            json = JSON.parse(xhr.responseText);
            // alert(json.data.token)
            jwt = json.access_token;
            // console.log(jwt+'_________');
            setT0k3n(json.access_token);
            // return json.access_token;
        }
    })
}


// sessionStorage.clear();

function setT0k3n(token){
    let dateValid = new Date();
    // console.log(dateValid.getTime());
    let time = dateValid.getTime();
    sessionStorage.setItem('dataV', time);
    sessionStorage.setItem('t0k3n', token);
}

function getT0k3n(){
    return sessionStorage.getItem('t0k3n');
}

function checkedT0k3n(){
    let t0k3n = getT0k3n();
    if(t0k3n != null && t0k3n != '' && t0k3n != 'undefined'){
        let dateValid = new Date();
        let checkedTime = dateValid.getTime()-sessionStorage.getItem('dataV');
        console.log(dateValid.getTime())
        console.log(sessionStorage.getItem('dataV'))
        console.log(checkedTime)
        if(parseInt(checkedTime)>=3000000){
            getToken();
        }
    }else{
        getToken();
    }
}



checkedT0k3n();
//******************** FINALIZA O ARMAZENAMENTO E VALIDAÇÃO DO TOKEN **********************/



//******************** INICIA AS AÇÕES DO SELECT FILTRO **********************/

filtro.addEventListener('change', function(){
    //alert(this.value);
    parametro = this.value;
    if(this.value=='secretaria'){
        secretaria.setAttribute('style', 'display:inline-block;');
        valor.disabled = true;
        valor.value = '';
    }else{
        secretaria.setAttribute('style', 'display:none');
        valor.disabled = false;
    }
    if(this.value=='descriUnidade' || this.value=='siglaUnidade'){
        btUnidades.setAttribute('style', 'display:inline-block;');
    }else{
        btUnidades.setAttribute('style', 'display:none');
    }
});


//******************** FINALIZA AS AÇÕES DO SELECT FILTRO **********************/


//******************** INICIA AS AÇÕES DO SELECT SECRETARIA **********************/
secretaria.addEventListener('change', function(){
    valor.value = this.value;
})

//******************** FINALIZA AS AÇÕES DO SELECT SECRETARIA **********************/



function getUnidades(){
    // alert("unidades")
    var divUnidades = document.getElementById('divUnidades');
    divUnidades.setAttribute('style', 'display:flex;');
    returnUnidades(divUnidades);
}

function selectUnidClose(op){
    var conteudo = op.innerHTML;
    let valor = document.getElementById('valor');
    valor.value = conteudo;
    let divUnidades = document.getElementById('divUnidades');
    divUnidades.setAttribute('style', 'display:none;');
}

function closeDivUni(){
    let divUnidades = document.getElementById('divUnidades');
    divUnidades.setAttribute('style', 'display:none;');
}

function enviar(){
    alert("enviar")
}





var porcentagem = document.getElementById("porcentagem");
var retorno = document.getElementById("retorno");


function retornaJson(){
    
    var json;
    var xhr = new XMLHttpRequest();

    let jwt = getT0k3n();


    xhr.open("GET", "http://127.0.0.1:8000/api/allFunc");

    xhr.onprogress = function(pe) {
    if(pe.lengthComputable) {
            porcentagem.max = pe.total
            porcentagem.value = pe.loaded
        }
    }
    

    xhr.setRequestHeader('Accept-Encoding', 'gzip, delate, br');
    xhr.setRequestHeader('Connection', 'keep-alive');
    xhr.setRequestHeader('Accept', 'application/json');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('Authorization', 'Bearer ' + jwt);

    xhr.send();


    xhr.addEventListener('readystatechange', function(){
        if(xhr.readyState === 4 && xhr.status == 200){
            //console.log(xhr.responseText);
            json = JSON.parse(xhr.responseText);
            json=json['funcs'];
            // alert(json.length);
            var htmlR = '<table class="funcTable"><tr>'+
            '<td>Matrícula</td><td>Nome</td>'+
            // '<td>entidade</td>'+
            '<td>Setor</td>'+
            '<td>Secretaria</td><td>Fone</td><td>Email</td><td>Sigla da unidade</td><td>Descrição da unidade</td>'+
            '</tr>';
            for(let i=0; i<json.length; i++){
                //console.log(json[i]);
                htmlR+='<tr>';
                htmlR+='<td>'+json[i].matricula+'</td>';
                htmlR+='<td>'+json[i].nome+'</td>';
                // htmlR+='<td>'+json[i].entidade+'</td>';
                htmlR+='<td>'+json[i].setor+'</td>';
                htmlR+='<td>'+json[i].secretaria+'</td>';
                htmlR+='<td>'+json[i].fone+'</td>';
                htmlR+='<td>'+json[i].email+'</td>';
                htmlR+='<td>'+json[i].siglaUnidade+'</td>';
                htmlR+='<td>'+json[i].descriUnidade+'</td>';
                htmlR+='</tr>';
                // document.getElementById('unico').innerHTML += '<br>'+objG[i].matricula;
            }
            htmlR+='</table>';
            retorno.innerHTML = htmlR;
            // alert(htmlR)
        }
    })

    xhr.onloadend = function(pe) {
        porcentagem.value = pe.loaded
        // alert(pe.loaded)
    }

}
retornaJson();




//******************** INICIA A REQUISIÇÃO DA PASQUISA **********************/
var testPaginator = '';
function pesq(){
    var json;
    var xhr = new XMLHttpRequest();

    let jwt = getT0k3n();

    //url = window.location.href;

    if(valor.value == '' || valor.value == null || valor.value == 'undefined'){
        alert('O campo valor não pode estar em branco');
        return false;
    }

    var data = 'pag='+pag+'&numReg='+numReg+'&parametro='+parametro+'&valor='+valor.value;

    xhr.open("POST", "http://127.0.0.1:8000/api/pesq");

    xhr.onprogress = function(pe) {
    if(pe.lengthComputable) {
            porcentagem.max = pe.total
            porcentagem.value = pe.loaded
        }
    }

    // xhr.setRequestHeader('Accept-Encoding', 'gzip, delate, br');
    // xhr.setRequestHeader('Connection', 'keep-alive');
    xhr.setRequestHeader('Accept', 'application/json');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('Authorization', 'Bearer ' + jwt);

    xhr.send(data);

    xhr.addEventListener('readystatechange', function(){
        if(xhr.readyState === 4 && xhr.status == 200){
            json1 = JSON.parse(xhr.responseText);
            json=json1['funcs'];
            var htmlR = '<table class="funcTable"><tr>'+
            '<td>Matrícula</td><td>Nome</td>'+
            // '<td>entidade</td>'+
            '<td>Setor</td>'+
            '<td>Secretaria</td><td>Fone</td><td>Email</td><td>Sigla da unidade</td><td>Descrição da unidade</td>'+
            '</tr>';
            for(let i=0; i<json.length; i++){
                htmlR+='<tr>';
                htmlR+='<td>'+json[i].matricula+'</td>';
                htmlR+='<td>'+json[i].nome+'</td>';
                // htmlR+='<td>'+json[i].entidade+'</td>';
                htmlR+='<td>'+json[i].setor+'</td>';
                htmlR+='<td>'+json[i].secretaria+'</td>';
                htmlR+='<td>'+json[i].fone+'</td>';
                htmlR+='<td>'+json[i].email+'</td>';
                htmlR+='<td>'+json[i].siglaUnidade+'</td>';
                htmlR+='<td>'+json[i].descriUnidade+'</td>';
                htmlR+='</tr>';
            }
            htmlR+='</table>';
            retorno.innerHTML = htmlR;//***************************************** */
            if(testPaginator != valor.value){
                paginate(json1['total'], parametro, valor.value);
                testPaginator=valor.value;
            }
        }
    })

    xhr.onloadend = function(pe) {
        porcentagem.value = pe.loaded
    }

}

//******************** FINALIZA A REQUISIÇÃO DA PASQUISA **********************/



//******************** INICIA A CAPITURA DAS VARIÁVEIS DA URL **********************/

function getParametrosUrl(url){
    var dd = url.split('?');
    var uu = dd[1].split('&')
    for(var i=0; i<uu.length; i++){
        testa = uu[i].split('=');
        if(testa[0]=='pag'){
            pag=testa[1];
        }else if(testa[0]=='numReg'){
            numReg = testa[1];
        }else if(testa[0]=='parametro'){
            parametro = testa[1];
        }else if(testa[0]=='valor'){
            valor = testa[1];
        }
    }
}
getParametrosUrl(url);

//******************** FINALIZA A CAPITURA DAS VARIÁVEIS DA URL **********************/



//******************** INICIA A REQUISIÇÃO DAS UNIDADES **********************/

function returnUnidades(divUnidades){
    var json;
    var xhr = new XMLHttpRequest();

    xhr.open('GET', 'http://127.0.0.1:8000/api/unidade');

    let jwt = getT0k3n();


    xhr.setRequestHeader('Accept-Encoding', 'gzip, delate, br');
    xhr.setRequestHeader('Connection', 'keep-alive');
    xhr.setRequestHeader('Accept', 'application/json');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('Authorization', 'Bearer ' + jwt);

    xhr.send();

    xhr.addEventListener('readystatechange', function(){
        if(xhr.readyState === 4 && xhr.status == 200){
            json = JSON.parse(xhr.responseText);
            json=json['unidades'];
            var htmlR = '<div id="titulo"><span class="titleTabUni">Unidades cadastradas</span><div id="fechar" onclick="closeDivUni()">X</div></div>';
            htmlR += '<table class="tabUnidades">';
            htmlR += '<tr>';
            htmlR += '<td><strong>SIGLA DA UNIDADE</strong></td>';
            htmlR += '<td><strong>DESCRIÇÃO DA UNIDADE</strong></td>';
            htmlR += '</tr>';
            for(let i=0; i<json.length; i++){
                htmlR += '<tr>';
                htmlR += '<td onclick="selectUnidClose(this)">'+json[i].siglaUnidade+'</td>';
                htmlR += '<td>'+json[i].descriUnidade+'</td>';
                htmlR += '</tr>';
            }
            htmlR+='</table>';
            divUnidades.innerHTML = htmlR;
        }
    });
}

//******************** FINALIZA A REQUISIÇÃO DAS UNIDADES **********************/

function zera(){
    pag=1;
    totalPage=1;
    totalReg=1;
}

//******************** INICIA PAGINAÇÃO **********************/

function createBtDiv(i, div, divPag, param, val){
    div = document.createElement('DIV');
    div.setAttribute('class', 'pg');
    div.setAttribute('id', 'pagina'+i);
    div.setAttribute('onclick', 'chama('+i+', \''+param+'\', \''+val+'\')');
    div.innerHTML=i;
    divPag.appendChild(div);
}

var totalPage = 0;
var totalReg = 0;
function paginate(total, param, val){
    let numPag = Math.ceil(total/numReg);
    totalPage = numPag;
    totalReg = total;
    let divPag = document.getElementById('paginator');
    divPag.innerHTML=''
    /***************** Limita a quantidade de botões da página que aparecerão ********************/
    let margin = 2;
    let inicial = 1;
    let final = margin+margin+1;
    let lim = (parseInt(pag)+margin)
    // console.log(numPag);
    if(pag<=3){
        inicial=1;
        if(numPag<final){
            final=numPag;
        }
    }else{
        inicial=pag-margin;
        if(numPag>lim){
            final=lim;
        }else{
            final=totalPage;
        }
    }
    if((pag > (numPag-margin)) & (numPag > (margin+margin))){
        inicial = numPag-(margin+margin);
    }
    
    /********** Inseri o botão de voltar uma página *************/
    let div = document.createElement('DIV');
    div.setAttribute('class', 'pg');
    div.setAttribute('id', 'btPrev');
    div.setAttribute('onclick', 'movePage(\'prev\', \''+param+'\', \''+val+'\')');
    // div.innerHTML='<div id="btPrev" onclick="movePage(\'prev\')"><</div>';
    div.innerHTML='<';
    divPag.appendChild(div);
    /********** Inseri os botãos das páginas *************/
        // console.log(final)
    for(let i=inicial;i<=final; i++){
        createBtDiv(i, div, divPag, param, val);
    }
    if(pag==1){
        document.getElementById('pagina'+inicial).setAttribute('style', 'background-color: #cdcdcd; color: #000;');
        document.getElementById('btPrev').setAttribute('style', 'background-color: #cdcdcd;');
    }
    /********** Inseri o botão de Avançar uma página *************/
    div = document.createElement('DIV');
    div.setAttribute('class', 'pg');
    div.setAttribute('id', 'btNext');
    div.setAttribute('onclick', 'movePage(\'next\', \''+param+'\', \''+val+'\')');
    div.innerHTML='>';
    divPag.appendChild(div);
    if(pag==totalPage){
        document.getElementById('btNext').setAttribute('style', 'background-color: #cdcdcd;');
    }
}

var background = 'green';
var color = 'white';
function chama(pg, param, val){
    pag = pg;
    p = 'pagina'+pg;
    parametro = param;
    valor.value = val;
    paginate(totalReg, param, val);
    if(pg==totalPage){
        document.getElementById('btNext').setAttribute('style', 'background-color: #cdcdcd;');
    }else{
        document.getElementById('btNext').setAttribute('style', 'background-color: '+background+';');
    }
    if(pg==1){
        document.getElementById('btPrev').setAttribute('style', 'background-color: #cdcdcd;');
    }else{
        document.getElementById('btPrev').setAttribute('style', 'background-color: '+background+';');
    }
    document.getElementById(p).setAttribute('style', 'background-color: #cdcdcd; color: #000;');
    pesq();
}

function movePage(m, param, val){
    if(m=='next' && pag < totalPage){
        pag = pag+1;
    }else if(m=='prev' && pag>1){
        pag = pag-1;
    }
    paginate(totalReg, param, val);
    document.getElementById('pagina'+pag).setAttribute('style', 'background-color: #cdcdcd; color: #000;');
    if(pag<=1){
        document.getElementById('btPrev').setAttribute('style', 'background-color: #cdcdcd;');
    }else{
        document.getElementById('btPrev').setAttribute('style', 'background-color: '+background+';');
    }
    if(pag>=totalPage){
        document.getElementById('btNext').setAttribute('style', 'background-color: #cdcdcd;');
    }else{
        document.getElementById('btNext').setAttribute('style', 'background-color: '+background+';');
    }
    pesq();
}

//******************** FINALIZA PAGINAÇÃO **********************/

