<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        section{
            width: 100%;
            /*width: 400px;*/
            height: 31vh;

            h2{
                font-size: clamp(0.9em, 1vw, 2em);
                margin: 0.2em 0;
                font-weight: 500;
            }
        }

        .carossel-Container{
            position: relative;
            width: 100%;
            /*width: 400px;*/
            height: auto;
            //border: 1px solid red;
            overflow: hidden;
        }

        .carossel-Slide{
            position: relative;
            display: flex;
            height: auto;
            width: 100%;
            /*width: 400px;*/
            overflow: visible;
            margin: 0 auto;
            //border: 1px solid blue;
        }

        .item{
            position: relative;
            right: 0;
            flex: none;
            //border: 1px solid yellow;
            background-color: yellow;
            border-radius: 2px;
            /*margin-right: 0.2em;*/
            /*height: 21vh;*/
            /*height: 250px;
            //width: 241.6px;

            //width: 19.7385620915%;*/

            /*width: 280px;
            width: 400px;*/
            width:100% !important;

            /*width: 19.63%;*/

            transition: right 1s ease-out;

            box-sizing: content-box;
        }

        .btnCarossel{
            background: rgba(20,20,20,.5);
            width: 5%;
            height: 100%;
            position: absolute;
            top: 0;
            z-index: 1;
            display: flex;  
            align-items: center;
            justify-content: center;
        }

        .btnCarossel:hover{
            background-color: rgba(20,20,20,.65);

            #seta{
                box-shadow: 2px -2px 0 1px #fff inset;
                transition: box-shadow 100ms;
            }
        }



        .BtnBack{
            left: 0;
                background-image: url('imgs/anterior.png');
                background-repeat: no-repeat;
                /*background-size: 100%;*/
                background-size: auto 35px;
                /*background-attachment: fixed;*/
                background-position: center center;
                transition: ease-in-out 0.3s;

            #seta{

                position: absolute;
                padding: 17%;
                box-shadow: 2px -2px 0 -1px #fff inset;
                border: solid transparent;
                border-width: 0 0 2px 2px;
                margin: 0 auto;
                opacity: 0;
                transition: box-shadow 100ms;
                transform: rotate(45deg);
            }
        }
        .BtnBack:hover{
            background-size: auto 45px;
            transition: ease-in-out 0.3s;
        }

        .BtnNext{
            right: 0;
                background-image: url('imgs/proximo.png');
                background-repeat: no-repeat;
                /*background-size: 100%;*/
                background-size: auto 35px;
                /*background-attachment: fixed;*/
                background-position: center center;
                transition: ease-in-out 0.3s;
            
            #seta{
                position: absolute;
                padding: 17%;
                box-shadow: 2px -2px 0 -1px #fff inset;
                border: solid transparent;
                border-width: 0 0 2px 2px;
                margin: 0 auto;
                opacity: 0;
                transition: box-shadow 100ms;
                transform: rotate(225deg); 
            }
        }
        .BtnNext:hover{
            background-size: auto 45px;
            transition: ease-in-out 0.3s;
        }
        #quantSlides{
            width: 100%;
            position: absolute;
            left: 0;
            top: 0;
            display: flex;
            text-align: center;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        #quantSlides div{
            margin: 3px;
        }
        .cxConfig{
            border:1px solid #000;
            box-shadow: 0 0 0px 0px rgba(0,0,0,0.5);
            cursor: default;
            transition: ease-in-out 0.3s;
        }
        .cxConfig:hover{
            border:3px solid #000;
            box-shadow: 0 0 2px 2px rgba(0,0,0,0.5);
            cursor: pointer;
            transition: ease-in-out 0.3s;
        }
    </style>
</head>
<body>


<section id="secCar">
  <!--<h2>Título</h2>-->
  <div class="carossel-Container" id="container">
    <div class="btnCarossel BtnBack disable">
      <span id="seta"></span>
    </div>
    <div id="quantSlides"></div><!-- Aqui eu criei as caixas identificadoras para mostrar em qual slide está  -->
    <div class="carossel-Slide">
      <div class="item"><a href="perguntasFrequentes.php"><img src="imgs/perguntas-frequentes.png" alt="img" width="100%"></a></div>
      <div class="item"><a href="https://www.escolavirtual.gov.br/curso/74"><img src="imgs/cursoSei.png" alt="img" width="100%"></a></div>
      <div class="item"><a href="coisasParaSaberSei.php"><img src="imgs/curiosidadesSei.png" alt="img" width="100%"></a></div>
      <div class="item"><a href="anexos/POP-Procedimento-Operacional-Padrao.pdf" target="_blank"><img src="imgs/manual.png" alt="img" width="100%"></a></div>
      <!--<div class="item">3</div>
      <div class="item">4</div>
      <div class="item">5</div>
      <div class="item">6</div>
      <div class="item">7</div>
      <div class="item">8</div>
      <div class="item">9</div>
      <div class="item">10</div>
      <div class="item">11</div>
      <div class="item">12</div>
      <div class="item">13</div>
      <div class="item">14</div>
      <div class="item">15</div>
      <div class="item">16</div>
      <div class="item">17</div>
      <div class="item">18</div>
      <div class="item">19</div>
      <div class="item">20</div>
      <div class="item">21</div>
      <div class="item">22</div>
      <div class="item">23</div>
      <div class="item">24</div>
      <div class="item">25</div>-->
    </div>
    <div class="btnCarossel BtnNext">
      <span id="seta"></span>
    </div>
  </div>
</section>



<script>
        var quantSlides = document.getElementById("quantSlides");
        var carosseis = document.getElementsByClassName('carossel-Container')
        var tempo = 5000;
        var numItem = 1;
        var intervalo = setInterval(() => {
            roda()
        }, tempo);
        var carroselCont = document.getElementById("container");
        var style = window.getComputedStyle(carroselCont);
        console.log(style.width);
        updateVar();

        for(let i = 0; i < carosseis.length; i++){
            let carossel = carosseis[i]
            let btnBack = carossel.getElementsByClassName('BtnBack')[0]
            let btnNext = carossel.getElementsByClassName('BtnNext')[0]

            var itens = carossel.getElementsByClassName('item')
            var posicaoAnterior = 0
            var mover = posicaoAnterior + parseInt(style.width)

            btnNext.addEventListener('click', ()=>{
                mover = posicaoAnterior + parseInt(style.width)
                if(mover>=(itens.length*parseInt(style.width))){
                    numItem=1;
                }else{
                    numItem+=1
                }
                clearInterval(intervalo);
                intervalo = setInterval(() => {
                                roda()
                            }, tempo);
                for(let c = 0; c < itens.length; c++ ){
                    if(mover>=(itens.length*parseInt(style.width))){
                        mover = 0;
                        itens[c].style.right=  mover+'px'
                        //console.log(itens.length*parseInt(style.width))
                    }else{
                        itens[c].style.right=  mover + 'px'
                    }
                    posicaoAnterior = mover
                }
                /*if(numItem==(itens.length)){
                    numItem=0;
                }else{
                    numItem+=1;
                }*/
                    configCx(numItem);
            })

            btnBack.addEventListener('click', ()=>{
                mover = posicaoAnterior - parseInt(style.width)
                if(mover>=(itens.length*parseInt(style.width))){
                    numItem-=1
                }else{
                    numItem=1;
                }
                if(mover<1){
                    mover=1;
                }

                clearInterval(intervalo);
                intervalo = setInterval(() => {
                                roda()
                            }, tempo);
                for(let c = 0; c < itens.length; c++ ){

                    itens[c].style.right=  mover + 'px'

                    posicaoAnterior = mover
                }
                configCx(numItem);

            });
        }
        function roda(){
            updateVar();
            numItem +=1;
            var total = itens.length * parseInt(style.width)
            if(mover<(total-parseInt(style.width))){
                mover = posicaoAnterior + parseInt(style.width)
            }else{
                mover = 0;
                numItem=1;
            }

            for(let c = 0; c < itens.length; c++ ){

                itens[c].style.right=  mover + 'px'

                posicaoAnterior = mover
            }
            configCx(numItem);
        }
        function updateVar(){
            var secCar = document.getElementById("secCar");
            var container = document.getElementById("container");
            var item = document.getElementsByClassName("item")[0];
            let style = window.getComputedStyle(item);
            //console.log(style.width);
            let heig = parseInt(style.width)*0.5;
            //console.log(heig+"px;")
            secCar.setAttribute("style", "height: "+heig+"px;")
            container.setAttribute("style", "height: "+heig+"px;")
        }

        window.onload = intervalo

        window.addEventListener('resize', function(){
            clearInterval(intervalo);
            posicaoAnterior = numItem*parseInt(style.width)
            //roda();
                intervalo = setInterval(() => {
                                roda()
                            }, tempo);
        });

        var itens = document.getElementsByClassName("item");
        for(i=0; i<itens.length; i++){
            itens[i].addEventListener("mouseover", function(){
                clearInterval(intervalo);
            });
            itens[i].addEventListener("mouseout", function(){
                //roda();
                intervalo = setInterval(() => {
                                roda()
                            }, tempo);
            });
        }

        function caixas(){
            for(j=1; j<=itens.length; j++){
                var cx = document.createElement('div');
                cx.setAttribute("id", "cx_"+j)
                cx.setAttribute("class", "cxConfig")
                cx.setAttribute("onclick", "actionBt(this)");
                cx.setAttribute("style", "width: 20px; height: 10px; border: 1px solid #000; background-color: #fff;")
                //cx.setAttribute("style", "height: 10px;")
                //cx.setAttribute("style", "background-color: #000;")
                quantSlides.appendChild(cx)
            }
        }
        caixas();
        function configCx(itemAtual){
            for(p=1;p<=itens.length; p++){
                var divAtual = document.getElementById("cx_"+p);
                if(itemAtual==p){
                    divAtual.setAttribute("style", "width: 20px; height: 10px; border: 1px solid #000; background-color: #000; transition: ease-in-out 0.3s;");
                }else{
                    divAtual.setAttribute("style", "width: 20px; height: 10px; border: 1px solid #000; background-color: #fff; transition: ease-in-out 0.3s;");
                }
            }
        }
        function actionBt(obj){
            var id=obj.getAttribute("id");
            console.log(id+"<<<<<<<")
            clearInterval(intervalo);
            if(mover>=(itens.length*parseInt(style.width))){
                    numItem=1;
                }else{
                    numItem+=1
                }

            for(a=1; a<=itens.length; a++){
                if(id==('cx_'+a)){
                    numItem=a;
                    mover = (a-1)*parseInt(style.width);
                    for(let c = 0; c < itens.length; c++ ){

                    itens[c].style.right=  mover + 'px'

                    posicaoAnterior = mover
                    }
                }
            }
            configCx(numItem);
            intervalo = setInterval(() => {
                    roda()
                }, tempo);
        }
    </script>
</body>
</html>