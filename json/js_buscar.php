<?php

// --------------- Recebe os dados digitados:

$control = 0; // não se deve confiar somente no required do input

if(isset($_POST['coordx'])) {
	$coordx=$_POST['coordx'];
	$control = $control + 1;
}

if(isset($_POST['coordy'])){
	$coordy=$_POST['coordy'];
	$control = $control + 1;
}

if(isset($_POST['max'])) {
	$proximidade=$_POST['max'];
	$control = $control + 1;
}

if($control == 3) {
	
$root = $_SERVER['DOCUMENT_ROOT']; 
include("../config.php"); // inclui o arquivo de conexão com o banco.
	
$res = array();

// sqrt( (x - location_x)^2 + (y - location_y)^2 )

$stmt = $mysqli_link->prepare("
SELECT nome, coordx, coordy FROM pois
  WHERE SQRT((POWER(? + -coordx,2)) + (POWER(? + -coordy,2))) < + ?
");
$stmt->bind_param('iii', $coordx, $coordy, $proximidade);
$stmt->execute();
$stmt->bind_result($data_nome, $data_coordx, $data_coordy);
$stmt->store_result();

while($stmt->fetch()) {
 
 array_push($res, array(
 "nome"=>$data_nome,
 "coordx"=>$data_coordx,
 "coordy"=>$data_coordy
 )
 );
 
} // while

echo json_encode($res);
	
}

?>