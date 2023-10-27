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
    
</style>
<script language="JavaScript">
    
</script>

</head>

<body>

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
    <select name="formatH" id="formatH">
        <option value="h1">H1</option>
        <option value="h2">H2</option>
        <option value="h3">H3</option>
        <option value="h4">H4</option>
        <option value="h5">H5</option>
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

</body>
</html>
        <div id="preview"></div>
        <div id="porcento"></div>