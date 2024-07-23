<?php 
///this where you dont have to put BASE_DIR 
include "constant.php";
include "config.php";
include BASE_DIR."process/ajaxHand.php";
include BASE_DIR."libs/lib-helpers.php";
include BASE_DIR."libs/lib-tasks.php";
include BASE_DIR."vendor/autoload.php";


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