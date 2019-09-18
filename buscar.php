<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<title>Listar pontos de interesse (POIs):</title>

<link rel="stylesheet" type="text/css" href="/css/pois.css">
<script src="/jquery/jquery-3.4.1.min.js"></script>

</head>
<body>

<div id="menu"><a href="/index.php">CoordinatesCompany</a></div>

<div id="center">

<h3>Buscar POIs próximos:</h3>

<form action="/json/js_listar.php" id="form32" method="post">
  <span class="bold">Coordenada X:</span><br>
  <input type="number" name="coordx" placeholder="ex: 20" required><br><br>
  <span class="bold">Coordenada Y:</span><br>
  <input type="number" name="coordy" placeholder="ex: 10" required><br><br>
  <span class="bold">Distância máxima (em metros):</span><br>
  <input type="number" name="max" placeholder="ex: 10" required><br><br>
  <input type="submit" id="submit" value="Buscar próximos">
</form>
<br>
<div id="json_result">



</div>

</div>

<script>
$('#submit').click(function (e) {
  var form = $('#form32');

    e.preventDefault();
	$('#json_result').html("");
	
	var html = "";
	
    $.ajax({
      url: '/json/js_buscar.php',
      type: 'POST',
      cache: false,
      data: form.serialize(),
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