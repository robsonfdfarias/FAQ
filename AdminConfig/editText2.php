<html>

<head>

<title>Editor de Texto JavaScript ::: Linha de Código (Robson Farias)</title>
    <link rel="stylesheet" type="text/css" href="../editorRobsonFarias.css" />
<style>
    .tabela tr td{
        padding: 10px;
    }
    .table{
        margin:0px;
    }

    #texto{
        min-height: 300px;
        width: calc(100%-20px);
        box-shadow: 0 0 2px rgba(0,0,0,0.5);
        border:0px solid #000;
        padding: 15px;
        border-radius: 10px;
    }

    #cores{
        background-color: green;
        cursor: pointer;
        opacity: 0.0;
        position:absolute;
        width: 35px !important;
        height: 35px !important;
    }

    #coresDestaque{
        background-color: green;
        cursor: pointer;
        opacity: 0.0;
        position:absolute;
        width: 35px !important;
        height: 35px !important;
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
        display: none;
    }
    input[type="text"]{
        width:150px;
    }

    #ferramentas img{
        height: 2rem;
        transition: ease-in-out 0.5s;
        border: 0px solid #cfcfcf;
    }
    
    #ferramentas img:hover{
        height: 2.2rem;
        filter: invert(25%) sepia(11%) saturate(4040%) hue-rotate(99deg) brightness(93%) contrast(91%);
        border: 1px solid #cfcfcf;
        transition: ease-in-out 0.5s;
    }
    .p::first-letter {
        font-size: 2.5rem;
        font-weight: bold;
        color: #0c582c;
        float: left;
        margin: -5px 5px;
    }

    #efeitosTexto {
        width: 100%;
        position: absolute;
        margin: auto;
        background-color: white;
        padding: 20px;
        height: 70%;
        /* overflow-y: auto; */
        display: none;
        flex-direction: column;
        border: 1px solid #dfdfdf;
        box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
        border-radius: 8px;
    }
    #topEfeitoTexto{
        display: flex;
        flex-direction: row;
        width: 100%;
        justify-content: space-between;
        border-bottom: 1px solid #dfdfdf;
    }
    #listaEfeitoTexto{
        overflow-y: auto;
        display: flex;
        flex-direction: column;
    }
    #listaEfeitoTexto button{
        background-color: white;
        border: none;
    }
    #tituloEfeitoTexto{
        font-size: 40px;
        font-weight: 900;
    }
    #fecharEfeitosTexto{
        padding: 10px 15px;
        font-size: 20px;
        font-weight: 900;
        background-color: #0c852c;
        margin-bottom: 10px;
        border-radius: 4px;
        color: white;
        cursor: pointer;
    }
    #fecharEfeitosTexto:hover{
        background-color: rgb(21, 206, 77);
    }



    

    #emotions {
        width: 100%;
        position: absolute;
        margin: auto;
        background-color: white;
        padding: 20px;
        height: 70%;
        /* overflow-y: auto; */
        display: none;
        flex-direction: column;
        border: 1px solid #dfdfdf;
        box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
        border-radius: 8px;
    }
    #topEmotions{
        display: flex;
        flex-direction: row;
        width: 100%;
        justify-content: space-between;
        border-bottom: 1px solid #dfdfdf;
    }
    #listaEmotions{
        overflow-y: auto;
        display: flex;
        flex-direction: column;
    }
    #listaEmotions button{
        background-color: white;
        border: none;
    }
    #tituloEmotions{
        font-size: 40px;
        font-weight: 900;
    }
    #fecharEmotions{
        padding: 10px 15px;
        font-size: 20px;
        font-weight: 900;
        background-color: #0c852c;
        margin-bottom: 10px;
        border-radius: 4px;
        color: white;
        cursor: pointer;
    }
    #fecharEmotions:hover{
        background-color: rgb(21, 206, 77);
    }
    
</style>
<script language="JavaScript">
    
</script>

</head>

<body>
<div id="efeitosTexto">
    <div id="topEfeitoTexto">
        <div id="tituloEfeitoTexto">Efeitos de texto</div>
        <div id="fecharEfeitosTexto" onclick="fechaJanEfeitosTexto()">X</div>
    </div>
    <div id="listaEfeitoTexto">
        <button onClick="insertTagsNew('rffEfeitoBGText'), fechaJanEfeitosTexto()"><rffEfeitoBGText>rff Efeito BG Text 1</rffEfeitoBGText></button><br>
        <button onClick="insertTagsNew('rffEfeitoBGText2'), fechaJanEfeitosTexto()"><rffEfeitoBGText2>rff Efeito BG Text 2</rffEfeitoBGText2></button><br>
        <button onClick="insertTagsNew('rffEfeitoBGText3'), fechaJanEfeitosTexto()"><rffEfeitoBGText3>rff Efeito BG Text 3</rffEfeitoBGText3></button><br>
        <button onClick="insertTagsNew('rffEfeitoBGText4'), fechaJanEfeitosTexto()"><rffEfeitoBGText4>rff Efeito BG Text 4</rffEfeitoBGText4></button><br>
        <button onClick="insertTagsNew('rffEfeitoBGText5'), fechaJanEfeitosTexto()"><rffEfeitoBGText5>rff Efeito BG Text 5</rffEfeitoBGText5></button><br>
        <button onClick="insertTagsNew('rffEfeitoBGText6'), fechaJanEfeitosTexto()"><rffEfeitoBGText6>rff Efeito BG Text 6</rffEfeitoBGText6></button><br>
        <button onClick="insertTagsNew('rffEfeitoBGText7'), fechaJanEfeitosTexto()"><rffEfeitoBGText7>rff Efeito BG Text 7</rffEfeitoBGText7></button><br>
        <button onClick="insertTagsNew('rffEfeitoBGText8'), fechaJanEfeitosTexto()"><rffEfeitoBGText8>rff Efeito BG Text 8</rffEfeitoBGText8></button><br>
        <button onClick="insertTagsNew('rffEfeitoBGText9'), fechaJanEfeitosTexto()"><rffEfeitoBGText9>rff Efeito BG Text 9</rffEfeitoBGText9></button><br>
        <button onClick="insertTagsNew('rffEfeitoBGText10'), fechaJanEfeitosTexto()"><rffEfeitoBGText10>rff Efeito BG Text 10</rffEfeitoBGText10></button><br>
        <button onClick="insertTagsNew('rffEfeitoBGText11'), fechaJanEfeitosTexto()"><rffEfeitoBGText11>rff Efeito BG Text 11</rffEfeitoBGText11></button><br>
        <button onClick="insertTagsNew('rffEfeitoBGText12'), fechaJanEfeitosTexto()"><rffEfeitoBGText12>rff Efeito BG Text 12</rffEfeitoBGText12></button><br>
        <button onClick="insertTagsNew('rffEfeitoBGText13'), fechaJanEfeitosTexto()"><rffEfeitoBGText13>rff Efeito BG Text 13</rffEfeitoBGText13></button><br>
        <button onClick="insertTagsNew('rffEfeitoBGText14'), fechaJanEfeitosTexto()"><rffEfeitoBGText14>rff Efeito BG Text 14</rffEfeitoBGText14></button><br>
        <button onClick="insertTagsNew('rffEfeitoBGText15'), fechaJanEfeitosTexto()"><rffEfeitoBGText15>rff Efeito BG Text 15</rffEfeitoBGText15></button><br>
        <button onClick="insertTagsNew('rffEfeitoBGText16'), fechaJanEfeitosTexto()"><rffEfeitoBGText16>rff Efeito BG Text 16</rffEfeitoBGText16></button><br>
        <button onClick="insertTagsNew('rffEfeitoBGText17'), fechaJanEfeitosTexto()"><rffEfeitoBGText17>rff Efeito BG Text 17</rffEfeitoBGText17></button>
        <button onClick="insertTagsNew('rffEfeitoBGText18'), fechaJanEfeitosTexto()"><rffEfeitoBGText18>rff Efeito BG Text 18</rffEfeitoBGText18></button>
        <button onClick="insertTagsNew('rffEfeitoBGText19'), fechaJanEfeitosTexto()"><rffEfeitoBGText19>rff Efeito BG Text 19</rffEfeitoBGText19></button>
    </div>
</div>



<div id="emotions">
    <div id="topEmotions">
        <div id="tituloEmotions">Efeitos de texto</div>
        <div id="fecharEmotions" onclick="fechaJanEmotions()">X</div>
    </div>
    <div id="listaEmotions">
        <?php
            include_once("class/list-file.class.php");
            $emotions = new ListFile();
            $emotions->listFiles('../icones');
        ?>
    </div>
</div>



<div id="ferramentas">
    <img src="imgEditor/bold.svg" title="Colocar em Negrito" onClick="negrito()" />
    <img src="imgEditor/italic.svg" title="Colocar em Itálico" onClick="italico()" />
    <img src="imgEditor/underline.svg" title="Colocar em Sublinhado" onClick="sublinhado()" />
    <img src="imgEditor/strikeout.svg" title="Adicionar linha riscada" onClick="addStrikeThrough()" />
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
    <img src="imgEditor/insertvideo.svg" title="Inserir Vídeo" onClick="openWindowInsertVideo()" />
    <img src="imgEditor/graphic.svg" title="Inserir Imagem" onClick="openWindowInsertImage()" />
    <img src="imgEditor/editImage.svg" title="Acrescentar a função de editar as imagens" onClick="funcBtImg()" />
    <img src="imgEditor/inserttable.svg" title="Inserir tabela" onClick="insertTable()" />
    <input type="color" id="cores" />
    <img src="imgEditor/color.svg" title="Mudar a cor do texto" onClick="cor()" />
    <input type="color" id="coresDestaque" />
    <img src="imgEditor/backcolor.svg" title="Cor de destaque do texto" onClick="backColorText()" />
    <img src="imgEditor/resetattributes.svg" title="Remover formatação" onClick="removeFormatT()" />
    <img src="imgEditor/subscript.svg" title="Colocar em subescrito" onClick="addSubScript()" />
    <img src="imgEditor/superscript.svg" title="Colocar em superescrito" onClick="addSuperScript()" />
    <img src="imgEditor/changecasetoupper.svg" title="Deixar texto em caixa alta" onClick='insertTag("span", "style=\"text-transform:uppercase;\"")' />
    <img src="imgEditor/changecasetolower.svg" title="Deixar texto em caixa baixa" onClick='insertTag("span", "style=\"text-transform:lowercase;\"")' />
    <img src="imgEditor/capitalize.svg" title="Deixar iniciais das palavras em caixa alta" onClick='insertTag("span", "style=\"text-transform:capitalize;\"")' />
    <img src="imgEditor/capitular.svg" title="Inserir capitular" onClick='insertTag("p", "class=\"p\"")' />
    <img src="imgEditor/insertShadowText.svg" title="Inserir sombra no texto" onClick="insertTagsNew('rffTextShadow')" />
    <img src="imgEditor/insertNeonText.svg" title="Inserir um neon no texto" onClick='insertTag("span", "style=\"text-shadow:0px 0px 4px blue;\"")' />
    <img src="imgEditor/insertNeonTextEColorWhite.svg" title="Inserir um neon no texto e deixar o texto transparente" onClick='insertTag("span", "style=\"text-shadow:0px 0px 4px blue; color:#fff;\"")' />
    
    <img src="imgEditor/inserthyperlinkcontrol.svg" title="Inserir hiperlink" onClick="openWindowLink()" />
    <img src="imgEditor/removehyperlink.svg" title="Remover hiperlink" onClick="unlink()" />
    <img src="imgEditor/rffText3D.svg" title="rffText3D" onClick="insertTagsNew('rffText3D')" />
    <img src="imgEditor/rffTextSimples.svg" title="rffText3DSimples" onClick="insertTagsNew('rffText3DSimples')" />
    <img src="imgEditor/rffTextExtreme.svg" title="rffText3DExtreme" onClick="insertTagsNew('rffText3DExtreme')" />
    <img src="imgEditor/rffTextDegrade.svg" title="rffTextDegrade" onClick="insertTagsNew('rffTextDegrade')" />
    <img src="imgEditor/coroa2.svg" title="rffEfeitoBGText" onClick="abreJanEfeitosTexto()" />
    <img src="imgEditor/emotions.svg" title="Inserir emotions" style="width:40px; height:auto;" onClick="abreJanEmotions()" />
    
    <select name="formatH" id="formatH">
        <option value="h1">H1</option>
        <option value="h2">H2</option>
        <option value="h3">H3</option>
        <option value="h4">H4</option>
        <option value="h5">H5</option>
        <option value="" disabled selected>Hs</option>
    </select>
    <img src="imgEditor/hangingindent.svg" title="Identar linha" onClick="addIdent()" />
    <img src="imgEditor/hangingindentremove.svg" title="Remove a identação" onClick="addOutIdent()" />
</div>
<div id="texto" contenteditable="true" autofocus required autocomplete="off" spellcheck="true">Digite o seu artigo aqui...</div>



<div id="geralInseriImagem">
    <div id="inseriImagemCentro">
        <form action="ex2.class.php" method="post" id="upload">
            <input type="file" name="file" id="file" accept="image/*" />
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


<script src="upload.js"></script>
<script src="func.editor.robson.js"></script>
<script>
    var janEfeitoTexto = document.getElementById("efeitosTexto");
    function fechaJanEfeitosTexto(){
        janEfeitoTexto.setAttribute("style", "display:none;");
    }
    function abreJanEfeitosTexto(){
        janEfeitoTexto.setAttribute("style", "display:flex;");
    }

    
    var emotions = document.getElementById("emotions");
    function fechaJanEmotions(){
        emotions.setAttribute("style", "display:none;");
    }
    function abreJanEmotions(){
        emotions.setAttribute("style", "display:flex;");
    }
</script>
</body>
</html>
        <div id="preview"></div>
        <div id="porcento"></div>