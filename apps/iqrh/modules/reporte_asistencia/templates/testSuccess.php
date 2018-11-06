<!--<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />-->

<!--		<script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/serial.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/exporting/amexport_combined.js"></script>-->


		<script type="text/javascript" src="/js/amcharts.js"></script>
<script type="text/javascript" src="/js/serial.js"></script>
<script type="text/javascript" src="/js/exporting/amexport_combined.js"></script>

       
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

		<script type="text/javascript">
		
                var chart = AmCharts.makeChart("chartdiv", {
    "theme": "none",
    "type": "serial",
    "dataProvider": [{
        "country": "USA",
        "year2004": 3.5,
        "year2005": 4.2
    }, {
        "country": "UK",
        "year2004": 1.7,
        "year2005": 3.1
    }, {
        "country": "Canada",
        "year2004": 2.8,
        "year2005": 2.9
    }, {
        "country": "Japan",
        "year2004": 2.6,
        "year2005": 2.3
    }, {
        "country": "France",
        "year2004": 1.4,
        "year2005": 2.1
    }, {
        "country": "Brazil",
        "year2004": 2.6,
        "year2005": 4.9
    }, {
        "country": "Russia",
        "year2004": 6.4,
        "year2005": 7.2
    }, {
        "country": "India",
        "year2004": 8,
        "year2005": 7.1
    }, {
        "country": "China",
        "year2004": 9.9,
        "year2005": 10.1
    }],
    "valueAxes": [{
        "stackType": "3d",
        "unit": "%",
        "position": "left",
        "title": "GDP growth rate",
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "GDP grow in [[category]] (2004): <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "2004",
        "type": "column",
        "valueField": "year2004"
    }, {
        "balloonText": "GDP grow in [[category]] (2005): <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "2005",
        "type": "column",
        "valueField": "year2005"
    }],
    "plotAreaFillAlphas": 0.1,
    "depth3D": 60,
    "angle": 30,
    "categoryField": "country",
    "categoryAxis": {
        "gridPosition": "start"
    }
});
chart.addListener("rendered",function(e) {
    setTimeout(function() {
        var ame = new AmCharts.AmExport(e.chart,{},true);
        ame.output({
            format: "png",
            output: "datastring"
        },function(datastring) {
            var img = document.createElement("img");
            img.src = datastring;
            alert(datastring);
            
            document.getElementById("results").appendChild(img);
        });
    },1000); // startDuration
});
                
		</script>
<!--	</head>
	<body>-->
            <div id="results">ssssssssssss</div>
	<div id="chartdiv"></div>
<!--
	</body>
</html>-->