<?php

$hostname="localhost";
$user="root"; //usuário do banco de dados
$pass=""; //senha do banco de dados
$bd="site"; //nome do banco de dados

mysqli_report(MYSQLI_REPORT_STRICT);

try {
 $mysqli_link = new mysqli($hostname, $user, $pass, $bd);
} 
catch (Exception $e ) {
 echo mysqli_connect_error();
 exit();
}

mysqli_report(MYSQLI_REPORT_OFF);

$mysqli_link->set_charset("utf8mb4");
ini_set('default_charset','utf-8');

// segurança:

foreach($_POST as $key => $value){ 
  if (!is_array($value)){
   $_POST[$key] = trim(strip_tags($value));
  }
}

foreach($_GET as $key => $value){ 
  if (!is_array($value)){
   $_GET[$key] = trim(strip_tags($value));
  }
}

?>
