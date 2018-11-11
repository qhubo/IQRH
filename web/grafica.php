<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
$sqlconsulta = "select codigo, primer_nombre, primer_apellido, puntualida, asistencia from usuario where  empresa like '%" . $empresa . "%' order by primer_apellido ";
$cantidad = 0;
$data = null;
foreach ($mbd->query($sqlconsulta) as $fila) {
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
    
    echo $nombreCompleto;
    echo "<br>";
    $lista['nombre'] = $nombreCompleto; // . " " . $apellido;
    //  $lista['nombre'] = $codigo;
    $lista['dos'] = $fila['puntualida'];
    $lista['uno'] = $fila['asistencia'];
    $data[] = $lista;
}

//echo "<pre>";
//print_r($data);
?>
       <?php  $port=''; ?>   
        <?php if ($_SERVER['SERVER_NAME']=='iqrh') { ?>
     <?php  $port=':8080'; ?>   
     <?php  } ?>
<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }	
</style>


<!-- Resources -->
<!--<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>-->

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


<!-- Chart code -->
<script>
    var chart = AmCharts.makeChart("chartdiv", {
        "type": "serial",
        "addClassNames": true,
        "theme": "light",
        "autoMargins": false,
        "marginLeft": 30,
        "marginRight": 8,
        "marginTop": 10,
        "marginBottom": 26,
        "balloon": {
            "adjustBorderColor": false,
            "horizontalPadding": 10,
            "verticalPadding": 8,
            "color": "#ffffff"
        },

        "dataProvider": [
<?php foreach ($data as $regi) { ?>

                {
                    "year": "<?php echo $regi['nombre'] ?>",
                    "income": <?php echo $regi['uno'] ?>,
                    "expenses": <?php echo $regi['dos'] ?>
                },
<?php } ?>

        ],
        "valueAxes": [{
                "axisAlpha": 0,
                "position": "left"
            }],
        "startDuration": 1,
        "graphs": [{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
                "fillAlphas": 1,
                "title": "Puntualidad",
                "type": "column",
                "valueField": "income",
                "dashLengthField": "dashLengthColumn"
            }, {
                "id": "graph2",
                "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
                "bullet": "round",
                "lineThickness": 3,
                "bulletSize": 7,
                "bulletBorderAlpha": 1,
                "bulletColor": "#FFFFFF",
                "useLineColorForBulletBorder": true,
                "bulletBorderThickness": 3,
                "fillAlphas": 0,
                "lineAlpha": 1,
                "title": "Asistencia",
                "valueField": "expenses",
                "dashLengthField": "dashLengthLine"
            }],
        "categoryField": "year",
        "categoryAxis": {
            "gridPosition": "start",
            "axisAlpha": 0,
            "tickLength": 0,
            "labelRotation": 10
        },
        "export": {
            "enabled": true
        }
    });
    chart.addListener("rendered", function (e) {
        setTimeout(function () {
            var ame = new AmCharts.AmExport(e.chart, {}, true);
            ame.output({
                format: "png",
                output: "datastring"
            }, function (datastring) {
                var img = document.createElement("img");
                img.src = datastring;
                //  alert(datastring);
                // document.getElementById("base").innerHTML = datastring;
                document.getElementById("imagen").value = datastring;
                document.getElementById("results").appendChild(img);
            });
        }, 3000); // startDuration
        setTimeout(function () {
            var imagen = document.getElementById("imagen").value;
            //   alert(imagen);
            $.post('http://<?php  echo $_SERVER['SERVER_NAME'];  ?><?php echo $port; ?>/iqrh_dev.php/rest_asiste/grafica', {imagen: imagen}, function (response) {
            });
            // alert(imagen);

        }, 4010); // startDuration
    });
</script>
<div id="base" name="base"></div>    
<input type="hidden" name="imagen" id="imagen">
<!-- HTML -->
<div id="chartdiv"></div>