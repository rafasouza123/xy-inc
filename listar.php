<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<title>Listar pontos de interesse (POIs):</title>

<link rel="stylesheet" type="text/css" href="css/pois.css">
<script src="jquery/jquery-3.4.1.min.js"></script>

</head>
<body>

<div id="menu"><a href="index.php">CoordinatesCompany</a></div>

<div id="center">

<h3>Todos os pontos de interesse (POIs):</h3>

<div id="json_result">



</div>

<br><br><a href="buscar.php">Buscar um POI nas proximidades</a>

</div>

<!-- aqui não trava o carregamento da página ;) -->

<script>
$(document).ready(function(){
	
var html = "";
	
$.ajax({
	type: "POST",
	url: "json/js_listar.php",
	data: {"myvar":"check",},

    success: function(data){
		$.each(JSON.parse(data), function(idx, obj) {
			html += "'" + obj.nome + "'" + " (x=" + obj.coordx + ',' + " y=" + obj.coordy + ')<br>';
			$('#json_result').html(html);
		});
	}
});
});
</script>

</body>
</html>