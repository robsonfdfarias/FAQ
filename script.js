var secretaria = document.getElementById('secretaria');
var btUnidades = document.getElementById('btUnidades');
var filtro = document.getElementById('filtro');
var valor = document.getElementById('valor');
var parametro = 'nome';




// var jwt = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTcwMjU2MTY5NywiZXhwIjoxNzAyNTY1Mjk3LCJuYmYiOjE3MDI1NjE2OTcsImp0aSI6Iml5Zm10Z2JPdzAzanB6ZGYiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.J202pMhsLKJsVTMfzCcotdOi2Fe50HsuybZev0KVZ-4";

var jwt;



function getToken(){
    var json;
    var xhr = new XMLHttpRequest();


    var data = 'email=johns.josephine@example.org&password=password';

    xhr.open("POST", "http://127.0.0.1:8000/api/login");


    xhr.setRequestHeader('Accept-Encoding', 'gzip, delate, br');
    xhr.setRequestHeader('Connection', 'keep-alive');
    xhr.setRequestHeader('Accept', 'application/json');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // xhr.setRequestHeader('Authorization', 'Bearer ' + jwt);
    //alert('Bearer ' + jwt)

    xhr.send(data);


    xhr.addEventListener('readystatechange', function(){
        if(xhr.readyState === 4 && xhr.status == 200){
            //console.log(xhr.responseText);
            json = JSON.parse(xhr.responseText);
            // alert(json.data.token)
            jwt = json.data.token;
        }
    })
}

getToken();





filtro.addEventListener('change', function(){
    // alert(this.value);
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

secretaria.addEventListener('change', function(){
    valor.value = this.value;
})

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
// retornaJson();



function pesq(){
    
    var json;
    var xhr = new XMLHttpRequest();

    if(valor.value == '' || valor.value == null || valor.value == 'undefined'){
        alert('O campo valor não pode estar em branco');
        return false;
    }

    var data = 'parametro='+parametro+'&valor='+valor.value;

    xhr.open("POST", "http://127.0.0.1:8000/api/pesq");

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

    xhr.send(data);


    xhr.addEventListener('readystatechange', function(){
        if(xhr.readyState === 4 && xhr.status == 200){
            json = JSON.parse(xhr.responseText);
            json=json['funcs'];
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
            retorno.innerHTML = htmlR;
        }
    })

    xhr.onloadend = function(pe) {
        porcentagem.value = pe.loaded
    }

}


function returnUnidades(divUnidades){
    var json;
    var xhr = new XMLHttpRequest();

    xhr.open('GET', 'http://127.0.0.1:8000/api/unidade');


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