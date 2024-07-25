<?php


function getCurrentUser(){
    return 1;
}
function getCurrentFolder(){
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


function addFolder($folderName){
    $this_user_id = getCurrentUser(); 
    global $conn;
    $sql = "INSERT INTO folders (name, user_id) VALUES (:name, :user_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $folderName);
    $stmt->bindParam(':user_id', $this_user_id);
    $stmt->execute();
    return $stmt->rowCount();
}


function getTasks(){
    global $conn;
    $sql = "select * from tasks";
    $stmt = $conn -> prepare($sql);
    $stmt ->execute();
    $records = $stmt ->fetchAll(PDO::FETCH_OBJ);
    return $records; 
}


function deleteTask($task_id){
    global $conn;
    $sql = "delete from tasks where id = $task_id";
    $stmt = $conn -> prepare($sql);
    $stmt ->execute(); 
    return $stmt ->rowCount();
}

function addTask($taskName) {
    $this_user_id = getCurrentUser(); 
    $this_folder_id = getCurrentFolder(); // Assuming this function gets the current folder
    global $conn;

    $sql = "INSERT INTO tasks (title, user_id, folder_id) VALUES (:title, :user_id, :folder_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $taskName);
    $stmt->bindParam(':user_id', $this_user_id);
    $stmt->bindParam(':folder_id', $this_folder_id);

    $stmt->execute();
    return $stmt->rowCount();
}

?>