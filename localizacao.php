<!DOCTYPE html> 
<html> 
<head> 
<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/> 
<title>Reverse Geocoding</title> 

<!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> -->
<script type="text/javascript"> 
/*  var geocoder;

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
} 
//Get the latitude and the longitude;
function successFunction(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    codeLatLng(lat, lng)
}

function errorFunction(){
    alert("Geocoder failed");
}

function initialize() {
    geocoder = new google.maps.Geocoder();
}

function codeLatLng(lat, lng) {
  var latlng = new google.maps.LatLng(lat, lng);
  geocoder.geocode({'latLng': latlng}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      console.log(results)
      if (results[1]) {
        //formatted address
        alert(results[0].formatted_address)
        //find country name
        for (var i=0; i<results[0].address_components.length; i++) {
            for (var b=0; b<results[0].address_components[i].types.length;b++) {

              //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                    //this is the object you are looking for
                    city= results[0].address_components[i];
                    break;
                }
            }
        }
        //city data
        alert(city.short_name + " " + city.long_name)


        } else {
          alert("No results found");
        }
      } else {
        alert("Geocoder failed due to: " + status);
      }
    });
  }*/

/*
  //Check if browser supports W3C Geolocation API
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
} 
//Get latitude and longitude;
function successFunction(position) {
    var lat = position.coords.latitude;
    var long = position.coords.longitude;
    console.log('Latitude: '+lat);
    console.log('Longetude: '+long);
}
function errorFunction(){
    alert("Geocoder failed");
}*/



navigator.geolocation.getCurrentPosition(function(posicao) {
    var url = "http://nominatim.openstreetmap.org/reverse?lat="+posicao.coords.latitude+"&lon="+posicao.coords.longitude+"&format=json&json_callback=preencherDados";

    var script = document.createElement('script');
    script.src = url;
    document.body.appendChild(script);

    var lat = posicao.coords.latitude;
    var lon = posicao.coords.longitude;

    if(perimetro(lat, lon)){
      alert("você está dentro do perímetro!")
    }else{
      alert("você não está dentro do perímetro, por isso não poderá acessar o conteúdo!")
    }

var url = 'http://maps.google.com/maps/api/staticmap?center='+
 lat+','+lon+'&amp;sensor=false&amp;size=300x300&amp;maptype=roadmap&amp;key='+
 'ABQIAAAAijZqBZcz-rowoXZC1tt9iRT2yXp_ZAY8_ufC3CFXhHIE1NvwkxQQBCa'+
 'F1R_k1GBJV5uDLhAKaTePyQ&amp;markers=color:blue|label:I|'+lat+
 ','+lon+'6&amp;visible='+lat+','+lon+'|'+(+lat+1)+','+(+lon+1);
 var map = document.getElementById('janela');
 map.innerHTML = '<img src="'+url+'">';
});

function perimetro(lat1, long1){
    var lat = -26.2565
    var long = -49.2565
    var grau = 1/111.11 // cada grau equivale a 111,11 km
    var raio = 50*grau.toFixed(8) // raio de 50 km
    var diametro = raio*2
    var perimetro = diametro*3.14159
    var y1 = lat - raio
    var y2 = lat + raio
    var x1 = long - raio
    var x2 = long + raio

    var div = document.getElementById('dados')
    div.innerHTML+='Raio: '+raio.toFixed(8)+'<br>'
    div.innerHTML+='Lat menor: '+y1+'<br>'
    div.innerHTML+='Lat atual: '+lat+'<br>'
    div.innerHTML+='Lat maior: '+y2+'<br>'
    div.innerHTML+='Long menor: '+x1+'<br>'
    div.innerHTML+='Long atual: '+long+'<br>'
    div.innerHTML+='Long maior: '+x2+'<br>'

    if((lat1>y1 && lat1<y2) && (long1>x1 && long1<x2)){
      return true;
    }
}


</script> 
</head> 
<body> 
<div id="janela" style="width:100%;height:100%;"></div>

<div id="map" style="width: 100%; height: 400px"></div>

<?php
  //pergar o ip do usuário
  echo $_SERVER["REMOTE_ADDR"].'.....<br>';
  echo $_SERVER["REMOTE_USER"].'.....<br>';
  $_SERVER["REMOTE_ADDR"] = $_SERVER["HTTP_CF_CONNECTING_IP"];
  echo $_SERVER["REMOTE_ADDR"].'*****<br>';



  $http_client_ip       = $_SERVER['HTTP_CLIENT_IP'];
$http_x_forwarded_for = $_SERVER['HTTP_X_FORWARDED_FOR'];
$remote_addr          = $_SERVER['REMOTE_ADDR'];

/* VERIFICO SE O IP REALMENTE EXISTE NA INTERNET */
if(!empty($http_client_ip)){
    $ip = $http_client_ip;
    /* VERIFICO SE O ACESSO PARTIU DE UM SERVIDOR PROXY */
} elseif(!empty($http_x_forwarded_for)){
    $ip = $http_x_forwarded_for;
} else {
    /* CASO EU NÃO ENCONTRE NAS DUAS OUTRAS MANEIRAS, RECUPERO DA FORMA TRADICIONAL */
    $ip = $remote_addr;
}
echo $ip.'///////';

echo "<pre>";
            print_r($_SERVER);
            echo "</pre>";

//$path = $_SERVER['DOCUMENT_ROOT'].'/site/imagens';
$path = 'imagens';
$dir = dir($path);
while($arquivo=$dir->read()){
  $ext = explode('.', $arquivo);
  $extencao = $ext[(count($ext)-1)];
  if($extencao=='svg' || $extencao=='png' || $extencao=='jpeg' || $extencao=='jpg' || $extencao=='bmp' || $extencao=='gif'){
    //echo '<h3>'.$arquivo.'</h3>';
    echo '<img src="'.$path.'/'.$arquivo.'" width="200">';
  }
}



?>

<script>
  // Step 1: Get user coordinates
function getCoordintes() {
    var options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
    };
  
    function success(pos) {
        var crd = pos.coords;
        var lat = crd.latitude.toString();
        var lng = crd.longitude.toString();
        var coordinates = [lat, lng];
        console.log(`Latitude: ${lat}, Longitude: ${lng}`);
        if(perimetro(pos.coords.latitude, pos.coords.longitude)){
          alert("você está dentro do perímetro!")
        }else{
          alert("você não está dentro do perímetro, por isso não poderá acessar o conteúdo!")
        }
        //getCity(coordinates);
        //return;
  
    }
  
    function error(err) {
        console.warn(`ERROR(${err.code}): ${err.message}`);
    }
  
    //navigator.geolocation.getCurrentPosition(success, error, options);
    navigator.geolocation.getCurrentPosition(success, error);
}
  
// Step 2: Get city name
function getCity(coordinates) {
    var xhr = new XMLHttpRequest();
    var lat = coordinates[0];
    var lng = coordinates[1];
  
    // Paste your LocationIQ token below.
    xhr.open('GET', "https://us1.locationiq.com/v1/reverse.php?key=YOUR_PRIVATE_TOKEN&lat=" +
    lat + "&lon=" + lng + "&format=json", true);
    xhr.send();
    xhr.onreadystatechange = processRequest;
    xhr.addEventListener("readystatechange", processRequest, false);
  
    function processRequest(e) {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            var city = response.address.city;
            console.log(city);
            return;
        }
    }
}
  
getCoordintes();
</script>

<script src="https://cdn.jsdelivr.net/npm/ol@v8.1.0/dist/ol.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v8.1.0/ol.css">
</body> 
</html> 
