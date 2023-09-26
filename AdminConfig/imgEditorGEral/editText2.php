<html>

<head>

<title>Editor de Texto JavaScript ::: Linha de Código</title>
<style>
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
        display:none;
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
        display:none;
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
<script language="JavaScript">
    
</script>

</head>

<body>

<div id="ferramentas">
    <img src="imgEditor/bold.svg" title="Colocar em Negrito" onClick="negrito()" />
    <img src="imgEditor/italic.svg" title="Colocar em Itálico" onClick="italico()" />
    <img src="imgEditor/underline.svg" title="Colocar em Sublinhado" onClick="sublinhado()" />
    <img src="imgEditor/alignright.svg" title="Alinhar a direita" onClick="alinharDireita()" />
    <img src="imgEditor/alignleft.svg" title="Alinhar a esquerda" onClick="alinharEsquerda()" />
    <img src="imgEditor/alignhorizontalcenter.svg" title="Centralizar" onClick="alinharCentro()" />
    <img src="imgEditor/alignblock.svg" title="Justificar" onClick="justificar()" />
    <select name="tamFont" id="tamFont">
        <?php
            for($i=1; $i<8; $i++){
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
        ?>
        <option value="" disabled selected>Size</option>
    </select>
    <img src="imgEditor/copy.svg" title="Copiar" onClick="copiar()" />
    <img src="imgEditor/paste.svg" title="Colar" onClick="colar()" />
    <img src="imgEditor/cut.svg" title="Recortar" onClick="recortar()" />
    <img src="imgEditor/defaultbullet.svg" title="Marcador" onClick="unOrdenarLista()" />
    <img src="imgEditor/defaultnumbering.svg" title="Numeração" onClick="ordenarLista()" />
    <img src="imgEditor/redo.svg" title="Refazer" onClick="refazer()" />
    <img src="imgEditor/undo.svg" title="Desfazer" onClick="desfazer()" />
    <img src="imgEditor/insertvideo.svg" title="Inserir Vídeo" onClick="insertVideo()" />
    <img src="imgEditor/graphic.svg" title="Inserir Imagem" onClick="togglePaneImage()" />
    <img src="imgEditor/editImage.svg" title="Acrescentar a função de editar as imagens" onClick="funcBtImg()" />
    <img src="imgEditor/inserttable.svg" title="Inserir tabela" onClick="insertTable()" />
    <input type="color" id="cores" />
    <img src="imgEditor/color.svg" title="Mudar a cor do texto" onClick="cor()" />
    <img src="imgEditor/inserthyperlinkcontrol.svg" title="Inserir hiperlink" onClick="link()" />
    <img src="imgEditor/inserthyperlinkcontrol.svg" title="Remover hiperlink" onClick="unlink()" />
    <select name="formatH" id="formatH">
        <option value="h1">H1</option>
        <option value="h2">H2</option>
        <option value="h3">H3</option>
        <option value="h4">H4</option>
        <option value="h5">H5</option>
    </select>
    <img src="imgEditor/undo.svg" title="Desfazer" onClick="editImg()" />
    <img src="imgEditor/undo.svg" title="Desfazer" onClick="editImg()" />
    <img src="imgEditor/undo.svg" title="Desfazer" onClick="editImg()" />
    <img src="imgEditor/undo.svg" title="Desfazer" onClick="editImg()" />
    <img src="imgEditor/undo.svg" title="Desfazer" onClick="editImg()" />
    <img src="imgEditor/undo.svg" title="Desfazer" onClick="editImg()" />
    <img src="imgEditor/undo.svg" title="Desfazer" onClick="editImg()" />
</div>
<div id="texto" contenteditable="true" autofocus required autocomplete="off" >RObson Ferreira de Farias</div>


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
        <input type="text" placeholder="Digite a Largura" id="largura">
        <input type="text" placeholder="Digite a altura" id="altura">
        <button onclick="insertImg()">Inserir Imagem</button><button onclick="togglePaneImage()">Cancelar</button>
    </div>
</div>



<div id="geralEditImagem">
    <div id="glassImageBackground"></div>
    <div id="editImagemCentro">
        <div id="imgEditPrev"></div>
        <input type="text" placeholder="Digite a Largura" id="largura">
        <input type="text" placeholder="Digite a altura" id="altura">
        <button onclick="editImg()">Inserir Imagem</button><button onclick="togglePaneImage()">Cancelar</button>
    </div>
</div>


<script src="upload.js"></script>
<script src="func.editor.robson.js"></script>
<script type="text/javascript">
    /*(function () {
        document.getElementById('formatH').addEventListener('change', function() {
            var selectedOption = this.children[this.selectedIndex];
            console.log(selectedOption)
            var value = this.value;
            var param = selectedOption.getAttribute("data-param");
            insertH(value)
            console.log(value)
            console.log(param)

            //document.getElementById('value').textContent = 'value = ' + value;
            //document.getElementById('param').textContent = 'data-param = ' + param;
        });
        document.getElementById('tamFont').addEventListener('change', function() {
            var selectedOption = this.children[this.selectedIndex];
            console.log(selectedOption)
            var value = this.value;
            var param = selectedOption.getAttribute("data-param");
            tamanhoFont(value)
            console.log(value)
            console.log(param)

            //document.getElementById('value').textContent = 'value = ' + value;
            //document.getElementById('param').textContent = 'data-param = ' + param;
        });
    })();


    

var cores = document.getElementById('cores');
//cores.addEventListener("input", updateFirst, false);
cores.addEventListener("change", watchColorPicker, false);

function watchColorPicker(event) {
  document.querySelectorAll("p").forEach((p) => {
    console.log(event.target.value)
    console.log(cores.select())
    
  });
}


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

function insertVi(){
    var url = document.getElementById('url').value;
    var vizualiza = document.getElementById('videoVisualiza');
    vizualiza.innerHTML = ifrm;
}*/

    </script>



</body>
</html>
        <div id="preview"></div>
        <div id="porcento"></div>