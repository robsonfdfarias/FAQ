<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        section{
            /*width: 100%;*/
            width: 400px;
            height: 31vh;

            h2{
                font-size: clamp(0.9em, 1vw, 2em);
                margin: 0.2em 0;
                font-weight: 500;
            }
        }

        .carossel-Container{
            position: relative;
            /*width: 100%;*/
            width: 400px;
            height: auto;
            //border: 1px solid red;
            overflow: hidden;
        }

        .carossel-Slide{
            position: relative;
            display: flex;
            height: auto;
            /*width: 90%;*/
            width: 400px;
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
            height: 21vh;
            //width: 241.6px;

            //width: 19.7385620915%;

            /*width: 280px;*/
            width: 400px;

            //width: 19.63%;

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


<section>
  <h2>Título</h2>
  <div class="carossel-Container">
    <div class="btnCarossel BtnBack disable">
      <span id="seta"></span>
    </div>
    <div class="carossel-Slide">
      <div class="item"><img src="imgs/img1.png" alt="img"></div>
      <div class="item"><img src="imgs/img2.jpg" alt="img"></div>
      <div class="item">3</div>
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
      <div class="item">25</div>
    </div>
    <div class="btnCarossel BtnNext">
      <span id="seta"></span>
    </div>
  </div>
</section>



<script>
        let carosseis = document.getElementsByClassName('carossel-Container')

        for(let i = 0; i < carosseis.length; i++){
            let carossel = carosseis[i]
            let btnBack = carossel.getElementsByClassName('BtnBack')[0]
            let btnNext = carossel.getElementsByClassName('BtnNext')[0]

            let itens = carossel.getElementsByClassName('item')
            let posicaoAnterior = 0
            let mover = posicaoAnterior + 400

            btnNext.addEventListener('click', ()=>{
                mover = posicaoAnterior + 400

                for(let c = 0; c < itens.length; c++ ){

                    itens[c].style.right=  mover + 'px'

                    posicaoAnterior = mover
                }
            })

            btnBack.addEventListener('click', ()=>{
                mover = posicaoAnterior - 400

                for(let c = 0; c < itens.length; c++ ){

                    itens[c].style.right=  mover + 'px'

                    posicaoAnterior = mover
                }

            });
        }
    </script>
</body>
</html>