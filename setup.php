<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<title>Cadastrar pontos de interesse (POIs):</title>

<link rel="stylesheet" type="text/css" href="pois.css">
<script src="jquery/jquery-3.4.1.min"></script>

</head>
<body>

<div id="center">

<h3>Setup:</h3>

<?php

$root = $_SERVER['DOCUMENT_ROOT']; 
include("config.php"); // inclui o arquivo de conexão com o banco.

// sql da database

$sql = "

CREATE TABLE IF NOT EXISTS `pois` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(180) NOT NULL,
  `coordx` int(11) UNSIGNED NOT NULL,
  `coordy` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`nome`, `coordx`, `coordy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

";

if ($mysqli_link->query($sql) === TRUE) {
    echo "Tabela POIs criada com sucesso";
	
	$stmt = $mysqli_link->prepare("
	INSERT INTO `pois` (`id`, `nome`, `coordx`, `coordy`) VALUES
	(1, 'Lanchonete', 27, 12),
	(2, 'Posto', 31, 18),
	(3, 'Joalheria', 15, 12),
	(4, 'Floricultura', 19, 21),
	(5, 'Pub', 12, 8),
	(6, 'Supermercado', 23, 6),
	(7, 'Churrascaria', 28, 2);

");
	$stmt->execute();
	$stmt->close();
	
} 
else {
    echo "Erro: " . $mysqli_link->error;
}

$mysqli_link->close();


?>

</div>

</body>
</html>