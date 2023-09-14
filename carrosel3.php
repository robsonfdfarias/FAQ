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
            background: rgba(20,20,20,.65);

            #seta{
                box-shadow: 2px -2px 0 1px #fff inset;
                transition: box-shadow 100ms;
            }
        }



        .BtnBack{
            left: 0;

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

        .BtnNext{
            right: 0;
            
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
    </style>
</head>
<body>


<section id="secCar">
  <!--<h2>Título</h2>-->
  <div class="carossel-Container" id="container">
    <div class="btnCarossel BtnBack disable">
      <span id="seta"></span>
    </div>
    <div class="carossel-Slide">
      <div class="item"><a href="perguntasFrequentes.php"><img src="imgs/perguntas-frequentes.png" alt="img" width="100%"></a></div>
      <div class="item"><a href="https://www.escolavirtual.gov.br/curso/74"><img src="imgs/cursoSei.png" alt="img" width="100%"></a></div>
      <div class="item"><a href="coisasParaSaberSei.php"><img src="imgs/curiosidadesSei.png" alt="img" width="100%"></a></div>
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
        var carosseis = document.getElementsByClassName('carossel-Container')
        var tempo = 5000;
        var numItem = 0;
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

                clearInterval(intervalo);
                intervalo = setInterval(() => {
                                roda()
                            }, tempo);
                for(let c = 0; c < itens.length; c++ ){

                    itens[c].style.right=  mover + 'px'

                    posicaoAnterior = mover
                }
            })

            btnBack.addEventListener('click', ()=>{
                mover = posicaoAnterior - parseInt(style.width)
                if(mover<0){
                    mover=0;
                }

                clearInterval(intervalo);
                intervalo = setInterval(() => {
                                roda()
                            }, tempo);
                for(let c = 0; c < itens.length; c++ ){

                    itens[c].style.right=  mover + 'px'

                    posicaoAnterior = mover
                }

            });
        }
        function roda(){
            updateVar();
            var total = itens.length * parseInt(style.width)
            if(mover<(total-parseInt(style.width))){
                mover = posicaoAnterior + parseInt(style.width)
            }else{
                mover = 0;
            }

            for(let c = 0; c < itens.length; c++ ){

                itens[c].style.right=  mover + 'px'

                posicaoAnterior = mover
            }
            numItem +=1;
        }
        function updateVar(){
            var secCar = document.getElementById("secCar");
            var container = document.getElementById("container");
            var item = document.getElementsByClassName("item")[0];
            let style = window.getComputedStyle(item);
            console.log(style.width);
            let heig = parseInt(style.width)*0.5;
            console.log(heig+"px;")
            secCar.setAttribute("style", "height: "+heig+"px;")
            container.setAttribute("style", "height: "+heig+"px;")
        }

        window.onload = intervalo

        window.addEventListener('resize', function(){
            clearInterval(intervalo);
            posicaoAnterior = numItem*parseInt(style.width)
            roda();
                intervalo = setInterval(() => {
                                roda()
                            }, tempo);
        });
    </script>
</body>
</html>