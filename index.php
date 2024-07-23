<?php
include "C:/xampp/htdocs/todo-php/bootstrap/constant.php";
include ROOT_URL."bootstrap/init.php"; 

if (isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])) {
    deleteFolder($_GET['delete_folder']);
}


$folders = getFolders();

include ROOT_URL."tls/tls-index.php";

 ?>