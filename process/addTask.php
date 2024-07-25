<?php

include "../bootstrap/init.php";
$taskName = $_POST['taskName'];
addTask($taskName);
?>