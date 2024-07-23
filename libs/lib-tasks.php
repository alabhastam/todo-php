<?php


function getCurrentUser(){
    return 1;
}

function deleteFolder($folder_id){
    global $conn;
    $sql = "delete from folders where id = $folder_id";
    $stmt = $conn -> prepare($sql);
    $stmt ->execute(); 
    return $stmt ->rowCount(); 
}


function getFolders(){
    global $conn;
    $sql = "select * from folders";
    $stmt = $conn -> prepare($sql);
    $stmt ->execute();
    $records = $stmt ->fetchAll(PDO::FETCH_OBJ);
    return $records; 
}


function addFolder(){
    $this_user_id = 1 ; 
    global $conn;
    $sql = "INSERT INTO `folders`(`name`, `user_id`) VALUES ('[value-1]','$this_user_id')";
    $stmt = $conn -> prepare($sql);
    $stmt ->execute();
    $records = $stmt ->fetchAll(PDO::FETCH_OBJ);
    return $records; 
}
?>