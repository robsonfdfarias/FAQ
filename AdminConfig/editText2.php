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


    #typefontface option:nth-child(2){
        font-family: 'monospace';
    }

    #typefontface option:nth-child(3){
        font-family: 'Arial';
    }

    #typefontface option:nth-child(4){
        font-family: 'Courier';
    }

    #typefontface option:nth-child(5){
        font-family: 'Verdana';
    }

    #typefontface option:nth-child(6){
        font-family: 'Tahoma';
    }

    #typefontface option:nth-child(7){
        font-family: 'Inter';
    }

    #typefontface option:nth-child(8){
        font-family: 'Bebas Neue';
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
        /*opacity: 0.0;*/
        position:relative !important;
        opacity: 1;
        width: 35px !important;
        height: 35px !important;
        margin-top: 25px;
    }
    #divCorText{
        display:none;
        flex-direction: column;
        position: absolute;
        width: 300px;
        min-height: 200px;
        top: 50px;
        background-color: white;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    #topCorText{
        display:flex;
        flex-direction: row;
        width: 100%;
        justify-content: space-between;
    }
    #fecharDivCorText{
        padding: 5px 10px;
        background-color: #0c852c;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
    }
    #fecharDivCorText:hover{
        background-color: rgb(32, 254, 47);
        color: #000;
    }


    #coresDestaque{
        background-color: green;
        cursor: pointer;
        /*opacity: 0.0;*/
        position:relative !important;
        opacity: 1;
        width: 35px !important;
        height: 35px !important;
        margin-top: 25px;
    }
    #divCorDestText{
        display:none;
        flex-direction: column;
        position: absolute;
        width: 300px;
        min-height: 200px;
        top: 50px;
        background-color: white;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    #topCorDestText{
        display:flex;
        flex-direction: row;
        width: 100%;
        justify-content: space-between;
    }
    #fecharDivCorDestText{
        padding: 5px 10px;
        background-color: #0c852c;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
    }
    #fecharDivCorDestText:hover{
        background-color: rgb(32, 254, 47);
        color: #000;
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
        height: 40px; /* 2rem; */
        transition: ease-in-out 0.2s;
        border: 0px solid #cfcfcf;
        cursor: pointer;
        margin:4px 2px;
    }
    
    #ferramentas img:hover{ 
        /* height: 2.2rem; */
        /* filter: invert(25%) sepia(11%) saturate(4040%) hue-rotate(99deg) brightness(93%) contrast(91%); */
        /* border: 1px solid #cfcfcf; */
        transition: ease-in-out 0.2s;
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
    
    #ferramentas {
        /* align-items: center; */
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        /* justify-content: center; */
        margin-bottom: 10px;
    }
    #ferramentas select{
        padding: 5px;
        border: 1px solid #dfdfdf;
        border-radius: 4px;
        font-size: 20px;
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

    .emotionsList{
        padding:20px;
        word-break: break-all;
        margin: 0 5px;
    }
    
    .emotionsList img{
            width:100px;
        }

    @media screen and (max-width: 500px){
        .emotionsList{
            width:auto;
            padding:5px;
            word-break: break-all;
            margin: 0 3px;
        }
        #emotions{
            margin: 0;
        }
        #tituloEmotions{
            font-size: 30px;
        }
        .emotionsList img{
            width:40px;
        }
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
        <button id="testeSel" onclick="fechaJanEfeitosTexto(), delElement()">Remover efeito</button>
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
    <!-- <button id="testeSel" onclick="delElement()">Sel</button> -->
    <!-- <button id="testeSel" onclick="getTags()">getTags</button> -->
    <!-- <button id="testeSel" onclick="fontFaceSel('monospace')">corrie</button> -->
    <select name="typefontface" id="typefontface">
        <option value="padrao" name="padrao" id="padrao"  disabled selected>Font</option>
        <option value="monospace" name="monospace" id="monospace">Monospace</option>
        <option value="Arial" name="Arial" id="Arial">Arial</option>
        <option value="Courier" name="Courier" id="Courier">Courier</option>
        <option value="Verdana" name="Verdana" id="Verdana">Verdana</option>
        <option value="Tahoma" name="Tahoma" id="Tahoma">Tahoma</option>
        <option value="Inter" name="Inter" id="Inter">Inter</option>
        <option value="Bebas Neue" name="Bebas Neue" id="Bebas Neue">Bebas Neue</option>
    </select>
    

    <img src="imgEditor/bold.svg" title="Colocar em Negrito" onClick="negrito(), this.setAttribute('style', 'background-color:#cdcdcd;'), selectElem()" unselectable="on" spaw_state="true" id="negrito" />
    <img src="imgEditor/italic.svg" title="Colocar em Itálico" onClick="italico(), this.setAttribute('style', 'background-color:#cdcdcd;'), selectElem()" id="italico" />
    <img src="imgEditor/underline.svg" title="Colocar em Sublinhado" onClick="sublinhado(), this.setAttribute('style', 'background-color:#cdcdcd;'), selectElem()" id="sublinhado" />
    <img src="imgEditor/strikeout.svg" title="Adicionar linha riscada" onClick="addStrikeThrough(), this.setAttribute('style', 'background-color:#cdcdcd;'), selectElem()" id="strike" />
    <img src="imgEditor/alignright.svg" title="Alinhar a direita" onClick="alinharDireita()" />
    <img src="imgEditor/alignleft.svg" title="Alinhar a esquerda" onClick="alinharEsquerda()" />
    <img src="imgEditor/alignhorizontalcenter.svg" title="Centralizar" onClick="alinharCentro()" />
    <img src="imgEditor/alignblock.svg" title="Justificar" onClick="justificar()" />
    <select name="tamFont" id="tamFont">
        <?php
            for($i=1; $i<8; $i++){
                echo '<option value="'.$i.'"  name="'.$i.'" id="'.$i.'">'.$i.'</option>';
            }
        ?>
        <option value="padrao" name="padrao" id="padrao" disabled selected>Size</option>
    </select>
    
    <img src="imgEditor/defaultbullet.svg" title="Marcador" onClick="unOrdenarLista()" />
    <img src="imgEditor/defaultnumbering.svg" title="Numeração" onClick="ordenarLista()" />
    

    <img src="imgEditor/color.svg" title="Mudar a cor do texto" onclick="window.open('windowColorText.php', 'janela', 'height=350, width=500, top=50, left=100, scrollbar=no, fullscreen=no')" />
    
    <img src="imgEditor/backcolor.svg" title="Cor de destaque do texto" onClick="window.open('windowColorBackGroundText.php', 'janela', 'height=350, width=500, top=50, left=100, scrollbar=no, fullscreen=no')" />

    <img src="imgEditor/resetattributes.svg" title="Remover formatação" onClick="removeFormatT()" />
    <img src="imgEditor/subscript.svg" title="Colocar em subescrito" onClick="addSubScript(), this.setAttribute('style', 'background-color:#cdcdcd;'), selectElem()" id="subescrito" />
    <img src="imgEditor/superscript.svg" title="Colocar em superescrito" onClick="addSuperScript(), this.setAttribute('style', 'background-color:#cdcdcd;'), selectElem()" id="superescrito" />
    <img src="imgEditor/changecasetoupper.svg" title="Deixar texto em caixa alta" onClick='insertTag("span", "style=\"text-transform:uppercase;\"")' />
    <img src="imgEditor/changecasetolower.svg" title="Deixar texto em caixa baixa" onClick='insertTag("span", "style=\"text-transform:lowercase;\"")' />
    <img src="imgEditor/capitalize.svg" title="Deixar iniciais das palavras em caixa alta" onClick='insertTag("span", "style=\"text-transform:capitalize;\"")' />
    <img src="imgEditor/capitular.svg" title="Inserir capitular" onClick='insertTag("p", "class=\"p\""), this.setAttribute("style", "background-color:#cdcdcd;"), selectElem()' id="p" />
    <img src="imgEditor/insertShadowText.svg" title="Inserir sombra no texto" onClick="insertTagsNew('rffTextShadow'), this.setAttribute('style', 'background-color:#cdcdcd;'), selectElem()" id="rffTextShadow" />
    <img src="imgEditor/insertNeonText.svg" title="Inserir um neon no texto" onClick="insertTagsNew('rffNeonText'), this.setAttribute('style', 'background-color:#cdcdcd;'), selectElem()" id="rffNeonText" />
    <img src="imgEditor/insertNeonTextEColorWhite.svg" title="Inserir um neon no texto e deixar o texto transparente" onClick="insertTagsNew('rffNeonTextEColorWhite'), this.setAttribute('style', 'background-color:#cdcdcd;'), selectElem()" id="rffNeonTextEColorWhite" />
    
    
    <img src="imgEditor/rffText3D.svg" title="rffText3D" onClick="insertTagsNew('rffText3D'), this.setAttribute('style', 'background-color:#cdcdcd;'), selectElem()" id="rffText3D" />
    <img src="imgEditor/rffTextSimples.svg" title="rffText3DSimples" onClick="insertTagsNew('rffText3DSimples'), this.setAttribute('style', 'background-color:#cdcdcd;'), selectElem()" id="rffText3DSimples" />
    <img src="imgEditor/rffTextExtreme.svg" title="rffText3DExtreme" onClick="insertTagsNew('rffText3DExtreme'), this.setAttribute('style', 'background-color:#cdcdcd;'), selectElem()" id="rffText3DExtreme" />
    <img src="imgEditor/rffTextDegrade.svg" title="rffTextDegrade" onClick="insertTagsNew('rffTextDegrade'), this.setAttribute('style', 'background-color:#cdcdcd;'), selectElem()" id="rffTextDegrade" />
    <img src="imgEditor/coroa2.svg" title="rffEfeitoBGText" onClick="abreJanEfeitosTexto()" />
    
    <select name="formatH" id="formatH">
        <option value="h1">H1</option>
        <option value="h2">H2</option>
        <option value="h3">H3</option>
        <option value="h4">H4</option>
        <option value="h5">H5</option>
        <option value="reset">Normal</option>
        <option value="padrao" disabled selected name="padrao" id="padrao">Hs</option>
    </select>
    <img src="imgEditor/hangingindent.svg" title="Identar linha" onClick="addIdent()" />
    <img src="imgEditor/hangingindentremove.svg" title="Remove a identação" onClick="addOutIdent()" />

    <img src="imgEditor/copy.svg" title="Copiar" onClick="copiar()" />
    <img src="imgEditor/paste.svg" title="Colar" onClick="colar()" />
    <img src="imgEditor/cut.svg" title="Recortar" onClick="recortar()" />

    <img src="imgEditor/redo.svg" title="Refazer" onClick="refazer()" />
    <img src="imgEditor/undo.svg" title="Desfazer" onClick="desfazer()" />
    <img src="imgEditor/insertvideo.svg" title="Inserir Vídeo" onClick="openWindowInsertVideo()" />
    <img src="imgEditor/graphic.svg" title="Inserir Imagem" onClick="openWindowInsertImage()" />
    <img src="imgEditor/editImage.svg" title="Acrescentar a função de editar as imagens" onClick="funcBtImg()" />
    <img src="imgEditor/inserttable.svg" title="Inserir tabela" onClick="insertTable()" />
    <img src="imgEditor/inserttableColumnAfter.svg" title="Inserir coluna depois da coluna selecionada" onClick="insertTdAfter()" unselectable="on" spaw_state="true"/>
    <img src="imgEditor/inserttableColumnBefore.svg" title="Inserir coluna antes da coluna selecionada" onClick="insertTdBefore()" unselectable="on" spaw_state="true"/>
    <img src="imgEditor/inserttableRowAfter.svg" title="Inserir linha depois da linha selecionada" onClick="insertTrAfter()" unselectable="on" spaw_state="true"/>
    <img src="imgEditor/inserttableRowBefore.svg" title="Inserir linha antes da linha selecionada" onClick="insertTrBefore()" unselectable="on" spaw_state="true"/>
    <img src="imgEditor/deleteTableColumn.svg" title="Excluir coluna selecionada" onClick="delTd()" unselectable="on" spaw_state="true"/>
    <img src="imgEditor/deleteTableRowAfter.svg" title="Excluir linha selecionada" onClick="delTr()" unselectable="on" spaw_state="true"/>

    <img src="imgEditor/inserthyperlinkcontrol.svg" title="Inserir hiperlink" onClick="openWindowLink(), this.setAttribute('style', 'background-color:#cdcdcd;'), selectElem()" id="insertHyperLink" />
    <img src="imgEditor/removehyperlink.svg" title="Remover hiperlink" onClick="unlink()" />

    <img src="imgEditor/emotions.svg" title="Inserir emotions" style="width:40px; height:auto;" onClick="abreJanEmotions()" />
    <img src="imgEditor/citacao.png" title="Inserir uma citação" onClick="insertTagsNew('cite'), this.setAttribute('style', 'background-color:#cdcdcd;'), selectElem()" id="cite" />
    

</div>
<div id="texto" contenteditable="true" autofocus required autocomplete="off" spellcheck="true">Digite o seu artigo aqui...</div>


        <div id="preview"></div>
        <div id="porcento"></div>
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

    var divCorText = document.getElementById('divCorText');
    function openWindowsColorText(){
        divCorText.setAttribute('style', 'display:flex;');
    }
    function closeWindowsColorText(){
        divCorText.setAttribute('style', 'display:none;');
    }

    var divCorDestText = document.getElementById('divCorDestText');
    function openWindowsColorDestText(){
        divCorDestText.setAttribute('style', 'display:flex;');
    }
    function closeWindowsColorDestText(){
        divCorDestText.setAttribute('style', 'display:none;');
    }

</script>
</body>
</html>