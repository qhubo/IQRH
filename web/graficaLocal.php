<?php
$empresa=$_GET["empresa"];
$servidor = 'localhost'; // : 'localhost'
$baseDatos = 'iqrh';
$usuario = 'root';
$clave = '';
$mbd = new PDO('mysql:host=' . $servidor . ';dbname=' . $baseDatos, $usuario, $clave);
$sqlconsulta = "select codigo, primer_nombre, primer_apellido, puntualida, asistencia from usuario where  empresa like '%".$empresa."%' order by primer_apellido ";
$cantidad = 0;
$data = null;
foreach ($mbd->query($sqlconsulta) as $fila) {
    $nombre = $fila['primer_nombre'];
        $codigo = $fila['codigo'];
    $apellido = $fila['primer_apellido'];
    $lista['nombre'] =$apellido." " .$nombre; // . " " . $apellido;
  //  $lista['nombre'] = $codigo;
    $lista['uno']= $fila['puntualida'];
    $lista['dos']= $fila['asistencia'];
    $data[]=$lista;
}

//echo "<pre>";
//print_r($data);
?>
<style>
    body, html {
        height: 100%;
        padding: 0;
        margin: 0;
        overflow: hidden;
        font-size: 11px;
        font-family: Verdana;
    }
    #chartdiv {
        width: 50%;
        height: 50%;
    }
</style>

<html>
    <head>

        <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
<!--        <script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
        <script type="text/javascript" src="http://www.amcharts.com/lib/3/serial.js"></script>
        <script type="text/javascript" src="http://www.amcharts.com/lib/3/exporting/amexport_combined.js"></script>
      -->
        <script type="text/javascript" src="/js/amcharts.js"></script>
        <script type="text/javascript" src="/js/serial.js"></script>
        <script type="text/javascript" src="/js/amexport_combined.js"></script>

        
        
        <style>

            #chartdiv {
                width: 50%;
                height: 50%;
            }
        </style>

        <script type="text/javascript">

            var chart = AmCharts.makeChart("chartdiv", {
                "theme": "none",
                "type": "serial",
                "dataProvider": [
                   <?php foreach($data as $regi) { ?> 
                    
                    {
                        "country": "<?php echo $regi['nombre'] ?>",
                        "year2004": <?php echo $regi['uno'] ?>,
                        "year2005":  <?php echo $regi['dos'] ?>
                    },
                    <?php }  ?>
        
                ],
                "valueAxes": [{
                        "stackType": "3d",
                        "unit": "%",
                        "position": "left",
                        "fontSize" :8,
                        "title": "Asistencia y puntualidad",
                    }],
                "startDuration": 1,
                "graphs": [{
                        "balloonText": "Asistencias de Empleado</b>",
                        "fillAlphas": 0.9,
                        "lineAlpha": 0.2,
                        "title": "2004",
                        "type": "column",
                        "valueField": "year2004"
                    }, {
                        "balloonText": "Puntualidad <b>[[value]]</b>",
                        "fillAlphas": 0.9,
                        "lineAlpha": 0.2,
                        "title": "2005",
                        "type": "column",
                        "valueField": "year2005"
                    }],
                "plotAreaFillAlphas": 0.1,
                "depth3D": 60,
                "angle": 20,
                "fontSize" :8,
                "categoryField": "country",
                "categoryAxis": {
                    "gridPosition": "start",
                    "labelRotation": 45
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
                   // alert(imagen);
                    $.post('http://iqrh:8080/iqrh_dev.php/rest_asiste/grafica', {imagen: imagen}, function (response) {
                    });
                    // alert(imagen);

                }, 3010); // startDuration
            });

        </script>

        <script>
            //$( "btu" ).click(function() {
            //          var imagen = document.getElementById("imagen").value;
            //            $.post('http://iqrh:8080/iqrh_dev.php/rest_asiste/grafica', {imagen: imagen}, function (response) {
            //         });
            //});
            $(document).ready(function () {
                $("#btnSubmit").click(function () {
                    var imagen = document.getElementById("imagen").value;
                    $.post('http://iqrh:8080/iqrh_dev.php/rest_asiste/grafica', {imagen: imagen}, function (response) {
                    });

                    alert("button");
                });
            });


        </script>


<!--<script>
    $(document).ready(function () {
        setTimeout(function () {
            var imagen = document.getElementById("imagen").value;
            $.post('http://iqrh:8080/iqrh_dev.php/rest_asiste/grafica', {imagen: imagen}, function (response) {
         });
// alert(vima);

        }, 2000); // startDuration
// alert('listo');

    });
</script>-->
        <!--<div id="results"></div>-->
    </head>
    <body>
        <div id="base" name="base"></div>    
        <input type="hidden" name="imagen" id="imagen">
        <div id="chartdiv"></div>
        
<!--        <input id = "btnSubmit" type="submit" value="Release"/>-->

    </body>
</html>