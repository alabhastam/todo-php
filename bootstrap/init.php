<?php 
include "constant.php";
include "config.php";
include "libs/libs-helpers.php";
include "vendor/autoload.php";

$servername = $database_config-> host ;
$username = $database_config-> user;
$password =$database_config-> pass ;

try {
  $conn = new PDO("mysql:host=$servername;dbname=todo-php", $username, $password);
  // set the PDO error mode to exception

} catch(PDOException $e) {
  diePage("Connection failed: " . $e->getMessage()) ;
  die();
}


?>