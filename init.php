<?php 
include ROOT_URL."constant.php";
include ROOT_URL."bootstrap/config.php";
include ROOT_URL."libs/lib-helpers.php";
include ROOT_URL."libs/lib-tasks.php";
include ROOT_URL."vendor/autoload.php";


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