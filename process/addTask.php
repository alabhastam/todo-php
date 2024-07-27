<?php

include "../bootstrap/init.php";
$taskName = $_POST['taskName'];
addTask($taskName);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    
</head>
<body>
<div class="container mt-3">
    <h1>you added a new task namedv : <?php $_POST['folderName'] ?> </h1>
    <a href="../index.php">Go to Main Page</a>
</div>
</body>
</html>