<?php

$root = $_SERVER['DOCUMENT_ROOT']; 
include("$root/config.php"); // inclui o arquivo de conexão com o banco.

$res = array();

$stmt = $mysqli_link->prepare("SELECT nome, coordx, coordy FROM pois");
$stmt->execute();
$stmt->bind_result($nome, $coordx, $coordy);

while($stmt->fetch()) {
 
 array_push($res, array(
 "nome"=>$nome,
 "coordx"=>$coordx,
 "coordy"=>$coordy
 )
 );
 
} // while

echo json_encode($res);

?>