<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
<style>
    body{
        background-image: url("imgs/fundo.jpg");
        background-size: 100vw 100vh;
        background-repeat: no-repeat;
        background-position: center top;
    }
    .tabela tr td{
        padding: 10px;
    }
    .table{
        margin:0px;
    }

    #texto{
        min-height: 300px;
        width: 90%;
        box-shadow: 0 0 2px rgba(0,0,0,0.5);
        border:0px solid #000;
        padding: 15px;
    }

    #cores{
        background-color: green;
        cursor: pointer;
        opacity: 0.0;
        position:absolute;
        width: 33px;
    }

    #geralInseriImagem{
        width:100%;
        height: 100%;
        /*display:flex;*/
        display:flex;
        text-align: center;
        position: absolute;
        top:0;
        left:0;
        background: rgba(0,0,0,0.0);
    }

    #glassImageBackground{
        background: rgba( 255, 255, 255, 0.35 );
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 9.5px );
        -webkit-backdrop-filter: blur( 9.5px );
        border-radius: 10px;
        border: 1px solid rgba( 255, 255, 255, 0.18 );
        position: absolute;
        left: 0;
        top:0;
        width: 100%;
        height: 100%;
        z-index:5;
    }

    #inseriImagemCentro{
        width: 600px;
        height: 400px;
        background-color: #fff;
        border: 1px solid #000;
        margin: auto;
        box-shadow: 2px 2px 2px rgba(0,0,0,0.5);
        border-radius: 10px;
        padding: 40px;
        z-index: 10;
    }

    #inseriImagemCentro input, button{
        padding: 10px;
        font-size: 1.1rem;
    }


    

    #geralEditImagem{
        width:100%;
        height: 100%;
        /*display:flex;*/
        display:flex;
        text-align: center;
        position: absolute;
        top:0;
        left:0;
        background: rgba(0,0,0,0.0);
    }

    #inseriEditCentro{
        width: 600px;
        height: 400px;
        background-color: #fff;
        border: 1px solid #000;
        margin: auto;
        box-shadow: 2px 2px 2px rgba(0,0,0,0.5);
        border-radius: 10px;
        padding: 40px;
        z-index: 10;
    }

    #editImagemCentro input, button{
        padding: 10px;
        font-size: 1.1rem;
    }


    input[type="file"]{
        padding: 20px;
        border: 1px solid #cfcfcf;
        font-size: 1.1rem;
    }
    #preview{
        display:none;
    }
    #porcento{
        width:100%;
        height: 260px;
    }
    input[type="text"]{
        width:150px;
    }
    
</style>
</head>
<body>
<div id="geralInseriImagem">
    <div id="glassImageBackground"></div>
    <div id="inseriImagemCentro">
        <form action="ex2.class.php" method="post" id="upload">
            <input type="file" name="file" id="file" accept="image/*" />
            <!--<input type="text" name="name" value="Robson" /><br>-->
            <input type="submit" value="Carregar e visualizar" id="cv" />
        </form>
        <div id="preview"></div>
        <div id="porcento"></div>
        <span id="info">
            Se deixar em branco a altura e a largura, eles ficarão com o padrão. Se colocar o valor em apenas um dos campos, o outro será redimencionado para não deformar a imagem.
        </span>
        <input type="text" placeholder="Digite a Largura ex(400)" id="largura">
        <input type="text" placeholder="Digite a altura ex(300)" id="altura">
        <button onclick="insert()">Inserir Imagem</button><button onclick="cancel()">Cancelar</button>
    </div>
</div>

<script src="upload.js"></script>
<script>
    function insert(){
        var img = document.getElementById("previewImage");
        
        if(img != null){
            var url = img.getAttribute("src");
            console.log(url)
            var width = document.getElementById("largura").value;
            if(width<=0 || width==null || width==''){
                width='auto';
            }
            var height=document.getElementById("altura").value;
            if(height<=0 || height==null || height==''){
                height='auto';
            }
            top.opener.document.getElementById("porcento").innerHTML = '<img src="'+url+'" id="previewImage" width="'+width+'" height="'+height+'">';
            top.opener.insertImg();
            window.close();
        }else{
            console.log("selecione uma imagem e Clique no botão Carregar e visualizar antes de inserir")
        }
        //top.opener.document.getElementById("porcento").innerHTML = "UHUUUUUUUUUUUUUUUUUUU"
        //top.opener.insertImg();
    }

    function cancel(){
        window.close();
    }
    //var dados = JSON.stringify($('input').val());
    //sessionStorage.setItem('chave', dados );
</script>
</body>
</html>