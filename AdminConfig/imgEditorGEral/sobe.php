<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<input type="file" accept="image/jpg,image/png" id="uploadFile" />
<div id="mostra">imagem</div>
<div id="progresso"></div>
    <!--<script src="upload.js"></script>-->
    <script>


        document.querySelector('#uploadFile').addEventListener('change', function() {
            sobe();
        });

        function enviarArquivo(){
            var data = new FormData();
            var request = new XMLHttpRequest();
            
            //Adicionar arquivo
            data.append('file', document.querySelector('#uploadFile'));
            
                    var camada = document.getElementById("mostra");
            // AJAX request finished
            request.addEventListener('load', function(e) {
                // Resposta
                if(request.response.status == "success"){
                    camada.innerHTML = '<img src="'+request.response.path+'">-------';
                    //barra.querySelector(".text").innerHTML = "<a href=\"" + request.response.path + "\" target=\"_blank\">" + request.response.name + "</a> <i class=\"fas fa-check\"></i>";
                    //barra.classList.add("complete");
                }else{
                    camada.innerHTML = request.response.name;
                    //barra.querySelector(".text").innerHTML = "Erro ao enviar: " + request.response.name;
                    //barra.classList.add("error");
                }
            });
            
            // Calcular e mostrar o progresso
            request.upload.addEventListener('progress', function(e) {
                var percent_complete = (e.loaded / e.total)*100;
                document.getElementById("progresso").innerHTML = percent_complete+"%";
                //barra.querySelector(".fill").style.minWidth = percent_complete + "%"; 
            });
            
            //Resposta em JSON
            request.responseType = 'json';
            
            // Caminho
            //request.open('post', 'upload.php'); 
            request.open('post', 'up.php'); 
            request.send(data);
        }

        function sobe(){
            var dados = new FormData(this);
            var url = "up.php";
            $.ajax({
                url: url,
                type: 'POST',
                data:  dados,
                mimeType:"multipart/form-data",
                contentType: false,
                cache: false,
                processData:false,
                success: function(data, textStatus, jqXHR)
                    {
                        alert("FOI")
                        // Em caso de sucesso faz isto...
                    },
                error: function(jqXHR, textStatus, errorThrown) 
                    {
                        alert("Não foi")
                        // Em caso de erro
                    }          
                });
        }


    </script>
</body>
</html>