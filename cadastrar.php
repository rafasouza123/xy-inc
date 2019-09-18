<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<title>Cadastrar pontos de interesse (POIs):</title>

<link rel="stylesheet" type="text/css" href="css/pois.css">
<script src="jquery/jquery-3.4.1.min.js"></script>

</head>
<body>

<div id="menu"><a href="index.php">CoordinatesCompany</a></div>

<div id="center">

<h3>Cadastrar pontos de interesse (POIs):</h3>

<form action="/json/js_cadastrar.php" id="form32" method="post">
  <span class="bold">Nome do POI:</span><br>
  <input type="text" name="nome" placeholder="ex: shopping" required><br><br>
  <span class="bold">Coordenada X:</span><br>
  <input type="number" name="coordx" placeholder="ex: 20" required><br><br>
  <span class="bold">Coordenada Y:</span><br>
  <input type="number" name="coordy" placeholder="ex: 30" required><br><br>
  <input type="submit" id="submit" value="Cadastrar POI">
</form>

</div>

<script>
$('#submit').click(function (e) {
  var form = $('#form32');

    e.preventDefault();
	
	var html = "";
	
    $.ajax({
      url: 'json/js_cadastrar.php',
      type: 'POST',
      cache: false,
      data: form.serialize(),
      success: function(data){
		alert("Inserido!");
		$('#form32')[0].reset();
	  }
	});
});
</script>

</body>
</html>