<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> Big Data </title>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	
	<link rel="stylesheet" href="css/style_bigdata.css">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/plugins/wordCloud.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
	
<h1 align="center">Nuvem de Dados </h1>	

<?php
	
 $textos_dados  = test_input($_POST['texto']);
	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
		// echo strlen($textos_dados);
?>
	
<canvas></canvas>
	
<div id="chartdiv">
	
</div>	

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- partial -->
 <script src="js/script_bigdata.js"></script>
 <!-- <script src="js/script_cloud_words.js"> </script> -->
	
 <script type="text/javascript">
	
	 // Themes begin
am4core.useTheme(am4themes_animated);
// Themes end


var chart = am4core.create("chartdiv", am4plugins_wordCloud.WordCloud);
var series = chart.series.push(new am4plugins_wordCloud.WordCloudSeries());

series.accuracy = 4;
series.step = 15;
series.rotationThreshold = 0.7;
series.maxCount = 200;
series.minWordLength = 2;
series.labels.template.tooltipText = "{word}: {value}";
series.fontFamily = "Courier New";
series.maxFontSize = am4core.percent(30);
	 
  series.text = "<?php echo($textos_dados); ?>";
	 
</script>

</body>
</html>
