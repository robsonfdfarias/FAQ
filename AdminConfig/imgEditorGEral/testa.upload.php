<!--<!DOCTYPE html>
<html>
<head>
	<title>Upload de Fotos</title>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
</head>
<body>
	<form name="form1" id="form1" enctype="multipart/form-data">
		<input type="text" name="nome">
		<input type="file" name="foto">
        <input type="file" accept="image/jpg,image/png,image/bmp" id="upload-file" multiple/>
		<button type="button" id="btnSend" onclick="send()">Enviar</button>
	</form>
	<script>
		function send()
		{			
			var formData = new FormData(document.getElementById("form1"));			
			$.ajax({
	            type: 'POST',
	            url: 'submit.php',
	            data: formData,
	            contentType: false,
	            cache: false,
	            processData:false,
	            beforeSend: function(){
	            	    $('#btnSend').attr("disabled","disabled");
	                	$('#form1').css("opacity",".5");
	            },
	            success: function(msg){	 
	            console.log(msg);               
	                if(msg == 1)
	                {
	                    $('#form1')[0].reset();
	                    alert('Dados enviados com êxito');
	                }
	                else
	                {
	                    alert('Problemas no envios');
	                }
	                $('#form1').css("opacity","");
	                $("#btnSend").removeAttr("disabled");
	            }
	        });
		}
	</script>
</body>
</html>-->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Vamos Uploadingar</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="stylesheet"  href="style.css"/>
	</head>
	<body>
		
		<div class="area-upload">
			<label for="upload-file" class="label-upload">
				<i class="fas fa-cloud-upload-alt"></i>
				<div class="texto">Clique ou arraste o arquivo</div>
			</label>
			<input type="file" accept="image/jpg,image/png" id="upload-file" multiple/>
			
			<div class="lista-uploads">
			</div>
		</div>
		
		<script src="script.js"></script>
	</body>
</html>