<!DOCTYPE html>
<html>
<head>
<title>GEOIP DB - jQuery example</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<div>Country: <span id="country"></span>
<div>State: <span id="state"></span>
<div>City: <span id="city"></span>
<div>Latitude: <span id="latitude"></span>
<div>Longitude: <span id="longitude"></span>
<div>IP: <span id="ip"></span>
<div id="dados"></div>
<script>
    $.ajax({
        url: "https://geoip-db.com/jsonp",
        jsonpCallback: "callback",
        dataType: "jsonp",
        success: function( location ) {
            $('#country').html(location.country_name);
            $('#state').html(location.state);
            $('#city').html(location.city);
            $('#latitude').html(location.latitude);
            $('#longitude').html(location.longitude);
            $('#ip').html(location.IPv4);  
        },
        
        "Los Angeles": "http://exemplo.com/LA", 
        "New York": "http://exemplo.com/NY", 
        "Other City": "http://exemplo.com/othercity"
        
    });     

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

    

</script>


</body>
</html>