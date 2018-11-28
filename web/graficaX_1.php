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
  "dataProvider": [ {
    "y": 10,
    "x": 14,
    "value": 20,
  }, {
    "y": 5,
    "x": 3,
    "value": 20,

  }, {
    "y": -10,
    "x": 8,
    "value": 20,
  }, {
    "y": -6,
    "x": 5,
    "value": 20,
  }, {
    "y": 15,
    "x": -4,
    "value": 20,
  }, {
    "y": 13,
    "x": 1,
    "value": 8,
  }, {
    "y": 1,
    "x": 6,
    "value": 20,
  } ],
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
                          alert(datastring);
                        // document.getElementById("base").innerHTML = datastring;
                        document.getElementById("imagen").value = datastring;
                        document.getElementById("results").appendChild(img);
                    });
                }, 3000); // startDuration
                setTimeout(function () {
                    var imagen = document.getElementById("imagen").value;
                   // alert(imagen);
                    $.post('http://iqrh:8080/iqrh_dev.php/rest_asiste/graficaXY', {imagen: imagen}, function (response) {
                    });
                    // alert(imagen);

                }, 3010); // startDuration
            });
</script>
    <div id="base" name="base"></div>    
        <input type="text" name="imagen" id="imagen">
<!-- HTML -->
<div id="chartdiv"></div>