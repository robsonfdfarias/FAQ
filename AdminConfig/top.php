<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Robson Ferreira de Farias">
    <meta name="generator" content="RobsonFarias">
    <title>Menu</title>

</head>
<body>
            <?php 
              include_once("class/checked.pag.class.php");
              $checa = new CheckedPag();
            ?>
            <div id="geralTopo">
              <div id="topo">
                <div id="centroTop">
                  <?php $checa->returnDataTop() ?>
                  
                </div>
              </div>
            </div>
</body>
</html>