<?php
    session_start();
    include_once("checa.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<script type="text/javascript" src="jquery/code.jquery.com_jquery-3.7.1.min.js">-->
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="imgs/logo_sei_93x60.ico" type="image/x-icon" />
    <style>
        #calendario{
            border: 1px solid #000;
            border-collapse: collapse;
            background: #FFFFF0;
        }
       #calendario tr td{
        padding: 7px;
        text-align: center;
        justify-content: center;
        border-collapse: collapse;
        border: 1px solid #000;
        transition: ease-in-out 0.5s;
       }
       #calendario tr td:hover{
        background-color: green;
        color: #fff;
        transition: ease-in-out 0.5s;
       }
       #calendario #cabecalho{
        background-color: #cfcfcf;
       }
       #meses{
        border: 1px solid #dfdfdf;
        box-shadow: 2px 2px 2px rgba(0,0,0,0.3);
        background-color: #fff;
        width: 320px;
        padding: 10px;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        margin: 10px;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        min-height: 400px;
       }
       #conteudoMapa{
        align-items: center;
        width: 100%;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
       } 
    </style>
</head>
<body>
    <div id="geral">
        <?php include_once("menu.php"); ?>
            <?php include_once("top.php"); ?>
        <div id="central" style="margin-top: 30px;">

            <div id="itemdois">
                <div class="post-content" style="width: 100%; padding:0px;">
                    <div id="conteudoMapa">
                        <?php
                            include_once("class/capacitacao.class.php");
                            $agenda = new Capacitacao();
                            if(empty($_GET['dt'])){
                                $data = date('Y-m-d');
                                $year = date('Y');
                                $month= date('m');
                            }else{
                                $data = $_GET['dt'];
                                $dt = explode('-', $data);
                                $year = $dt[0];
                                $month= $dt[1];
                            }
                            echo '
                                <div id="conteudoCal">
                            ';
                            $agenda->getEventMonth($month, $year, 1, 5, $data);
                            echo '
                                </div>
                                <div id="eventDayDiv">
                            ';
                            $agenda->getEventDay($data);
                            echo '<div id="btNewEvent" style="width:100%; text-align:center; padding-top: 20px;"><button id="insertArticle" onclick="newEvent()">+ Novo Evento</button></div></div>';
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
        <?php
            include_once("footer.php");
        ?>
    <script type="text/javascript">

        // function findEventDay(dia){
        //     var eventDayDiv = document.getElementById('eventDayDiv');
        //     let dt = dia.split('-');
        //     var xhr = new XMLHttpRequest();
        //     xhr.open('GET', 'chamada.ajax.php?dia='+dt[2]+'&mes='+dt[1]+'&ano='+dt[0]+'&tipo=eventDay');
        //     xhr.send();
        //     xhr.onload = function (){
        //         if(xhr.status!=200){
        //             alert('Erro '+xhr.status+': '+xhr.statusText);
        //         }else{
        //             eventDayDiv.innerHTML = xhr.response;
        //         }
        //     }
        //     xhr.onprogress = function (event){
        //         if(event.lengthComputable){
        //             console.log('Carregado '+event.loaded+' de '+event.total+' bytes');
        //         }else{
        //             console.log('Carregado '+event.loaded+' bytes');
        //         }
        //     }
        //     xhr.onerror = function (){
        //         alert('Falha na requisição!');
        //     }
        // }
 
        function getMonthYear(ano, mes, bt, tipo){
            var conteudoCal = document.getElementById('conteudoCal');
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'chamada.ajax.php?tipo=calendar&mes='+mes+'&ano='+ano+'&bt='+bt+'&am='+tipo);
            xhr.send();
            xhr.onload = function (){
                if(xhr.status!=200){
                    alert('Erro '+xhr.status+': '+xhr.statusText);
                }else{
                    conteudoCal.innerHTML = xhr.response;
                }
            }
            xhr.onprogress = function (event){
                if(event.lengthComputable){
                    console.log('Carregado '+event.loaded+' de '+event.total+' bytes');
                }else{
                    console.log('Carregado '+event.loaded+' bytes');
                }
            }
            xhr.onerror = function (){
                alert('Falha na requisição!');
            }
        }

        function findEventDay(data){
            document.location.href= 'eventos.php?dt='+data;
        }


        function getToday(data){
            //alert(data);
            // var dd = data.split('/');
            var dd = data.split('-');
            findEventDay(data);
            getMonthYear(dd[0], dd[1], 3, 5);
        }

        function newEvent(){
            window.open("insertEvent.php");
        }

    </script>
</body>
</html>