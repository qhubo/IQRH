
<?php
$empresa = $_GET["empresa"];
$servidor = 'localhost'; // : 'localhost'
$baseDatos = 'pcr';
$usuario = 'pcr';
$clave = 'pcr$123';
if ($_SERVER['SERVER_NAME']=='iqrh') { 
$baseDatos = 'iqrh';
$usuario = 'root';
$clave = '';
}

$mbd = new PDO('mysql:host=' . $servidor . ';dbname=' . $baseDatos, $usuario, $clave);
$sqlconsulta = "select codigo, primer_nombre, primer_apellido,horas, puntualida, asistencia from usuario where horas >0 and  empresa like '%" . $empresa . "%' order by primer_apellido ";
$cantidad = 0;
$data = null;
 $conta=0;
foreach ($mbd->query($sqlconsulta) as $fila) {
    $conta++;
    $nombre = utf8_encode($fila['primer_nombre']);
    $codigo = $fila['codigo'];
    $apellido = utf8_encode($fila['primer_apellido']);
    $nombreCompleto = $apellido . " " . $nombre;
    $nombreCompleto = str_replace("á", "a", $nombreCompleto);
    $nombreCompleto = str_replace("é", "e", $nombreCompleto);
    $nombreCompleto = str_replace("í", "i", $nombreCompleto);
    $nombreCompleto = str_replace("ó", "o", $nombreCompleto);
    $nombreCompleto = str_replace("ú", "u", $nombreCompleto);
    $nombreCompleto = str_replace("´", "", $nombreCompleto);
    
       $nombreCompleto = str_replace("Á", "A", $nombreCompleto);
    $nombreCompleto = str_replace("É", "E", $nombreCompleto);
    $nombreCompleto = str_replace("Í", "I", $nombreCompleto);
    $nombreCompleto = str_replace("Ó", "O", $nombreCompleto);
    $nombreCompleto = str_replace("Ú", "U", $nombreCompleto);
    $nombreCompleto = str_replace("", "", $nombreCompleto);
    
//    echo $nombreCompleto;
//    echo "<br>";
    $lista['nombre'] = $nombreCompleto; // . " " . $apellido;
    //  $lista['nombre'] = $codigo;
    $lista['y'] = ($conta+5);
    $lista['x'] = $fila['horas'];
    $data[] = $lista;
}

//echo "<pre>";
//print_r($data);
?>
       <?php  $port=''; ?>   
        <?php if ($_SERVER['SERVER_NAME']=='iqrh') { ?>
     <?php  $port=':8080'; ?>   
     <?php  } ?>
<!-- Styles -->
<style>
#chartdiv {
  width	: 100%;
  height	: 500px;
}									
</style>

<script type="text/javascript" src="/js/amcharts.js"></script>

<!--<script src="https://www.amcharts.com/lib/3/serial.js"></script>-->

<script type="text/javascript" src="/js/serial.js"></script>

<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
<!--        <script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/serial.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/exporting/amexport_combined.js"></script>
-->


<script type="text/javascript" src="/js/amexport_combined.js"></script>


    <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
<!--        <script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
        <script type="text/javascript" src="http://www.amcharts.com/lib/3/serial.js"></script>
        <script type="text/javascript" src="http://www.amcharts.com/lib/3/exporting/amexport_combined.js"></script>
      -->


<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/xy.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
var chart = AmCharts.makeChart( "chartdiv", {
  "type": "xy",
  "theme": "none",
  "balloon":{
   "fixedPosition":true,
  },
          "dataProvider": [
<?php foreach ($data as $regi) { ?>

                {
                    "y": "<?php echo $regi['x'] ?>",
                    "x": <?php echo $regi['y'] ?>,
                    "value": 25
                },
<?php } ?>

        ],

  "valueAxes": [ {
    "position": "bottom",
    "axisAlpha": 0
  }, {
    "minMaxMultiplier": 1.2,
    "axisAlpha": 0,
    "position": "left"
  } ],
  "startDuration": 1.5,
  "graphs": [ {
    "balloonText": "x:<b>[[x]]</b> y:<b>[[y]]</b><br>value:<b>[[value]]</b>",
    "bullet": "circle",
    "bulletBorderAlpha": 0.2,
    "bulletAlpha": 0.8,
    "lineAlpha": 0,
    "fillAlphas": 0,
    "valueField": "value",
    "xField": "x",
    "yField": "y",
    "maxBulletSize": 100
  }, {
    "balloonText": "x:<b>[[x]]</b> y:<b>[[y]]</b><br>value:<b>[[value]]</b>",
    "bullet": "diamond",
    "bulletBorderAlpha": 0.2,
    "bulletAlpha": 0.8,
    "lineAlpha": 0,
    "fillAlphas": 0,
    "valueField": "value2",
    "xField": "x2",
    "yField": "y2",
    "maxBulletSize": 100
  } ],
  "marginLeft": 46,
  "marginBottom": 35,
  "export": {
    "enabled": true
  }
} );
chart.addListener("rendered", function (e) {
                setTimeout(function () {
                    var ame = new AmCharts.AmExport(e.chart, {}, true);
                    ame.output({
                        format: "png",
                        output: "datastring"
                    }, function (datastring) {
                        var img = document.createElement("img");
                        img.src = datastring;
                    //      alert(datastring);
                        // document.getElementById("base").innerHTML = datastring;
                        document.getElementById("imagen").value = datastring;
                        document.getElementById("results").appendChild(img);
                    });
                }, 3000); // startDuration
                setTimeout(function () {
                    var imagen = document.getElementById("imagen").value;
                    alert(imagen);
                    $.post('http://<?php  echo $_SERVER['SERVER_NAME'];  ?><?php echo $port; ?>/iqrh_dev.php/rest_asiste/graficaXY', {imagen: imagen}, function (response) {
                    });
                     alert(imagen);

                }, 3010); // startDuration
            });
</script>
    <div id="base" name="base"></div>    
        <input type="hidden" name="imagen" id="imagen">
<!-- HTML -->
<div id="chartdiv"></div>