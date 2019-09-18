<?php

// --------------- Recebe os dados do cadastro:

$control = 0; // não se deve confiar somente no required do input

if(isset($_POST['nome'])) {
	$nome=$_POST['nome'];
	$control = $control + 1;
}

if(isset($_POST['coordx'])) {
	$coordx=$_POST['coordx'];
	$control = $control + 1;
}

if(isset($_POST['coordy'])){
	$coordy=$_POST['coordy'];
	$control = $control + 1;
}

// --------------- Insere no banco

$response = array();

if($control == 3) { // todos os dados digitados, insere no banco.
	
	$root = $_SERVER['DOCUMENT_ROOT']; 
	include("../config.php"); // inclui o arquivo de conexão com o banco.
	
	$stmt = $mysqli_link->prepare("INSERT INTO pois (nome, coordx, coordy) VALUES (?,?,?)");
	$stmt->bind_param('sii', $nome, $coordx, $coordy);
	$stmt->execute();
	$stmt->close();
	
	$response["success"] = true;
}
else{
	$response["success"] = false;
}

echo json_encode($response);

?>