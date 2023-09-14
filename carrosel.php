<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript">
function slide1(){
document.getElementById('id').src="imgs/img1.png";
setTimeout("slide2()", 1000)
}

function slide2(){
document.getElementById('id').src="imgs/img2.jpg";
setTimeout("slide3()", 1000)
}

function slide3(){
document.getElementById('id').src="imgs/youtube.svg";
setTimeout("slide1()", 1000)
}
</script>
</head>
<body onLoad="slide1()">
<img id="id" width="500">
</body>
</html>