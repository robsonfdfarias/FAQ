
function func(){
    var tt = document.getElementsByClassName("titleArticle")
    for(i=0; i<tt.length; i++){
        var obj = document.getElementById("titleArticle_"+i);
        console.log(obj)
        obj.addEventListener("click", function(){
            alert("nnn-"+obj.id);
        });
    }
}
//func();
function abre(ob){
    //alert(ob.id)
    var child = ob.children[0];
    //alert(child.innerHTML);
    var father = ob.parentElement;
    //alert(father.id);
    var conteudo = father.children[1]
    //alert(conteudo.id)
    var img = ob.children[2].children[0];
    //alert(img.id)
    if(child.innerHTML=="false"){
        conteudo.setAttribute("style", "display:block; transition: ease-in 1s;");
        child.innerHTML = "true";
        ob.setAttribute("style", "background-color: #c1ffe2; color: #0c582c; font-weight: 700; transition: ease-in 0.5s;")
        img.setAttribute("src", "imgs/angulo-para-cima.svg")
        img.setAttribute("alt", "Seta indicando para fechar a visualização do conteudo")
    }else{
        conteudo.setAttribute("style", "display:none; transition: ease-in 1s;");
        child.innerHTML = "false";
        ob.setAttribute("style", "background-color: #fff; color: #000; font-weight: 400; transition: ease-in 0.5s;")
        img.setAttribute("src", "imgs/angulo-para-baixo.svg")
        img.setAttribute("alt", "Seta indicando para abrir a visualização do conteudo")
    }
}