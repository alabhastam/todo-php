<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Task Manager UI</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 0;
    }
    .page {
      display: flex;
      flex-direction: column;
      height: 100vh;
    }
    .pageHeader {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #4a4a55;
      color: white;
      padding: 10px 20px;
    }
    .pageHeader .title {
      font-size: 1.5em;
    }
    .pageHeader .userPanel {
      display: flex;
      align-items: center;
    }
    .pageHeader .userPanel .username {
      margin-right: 10px;
    }
    .main {
      display: flex;
      flex: 1;
    }
    .nav {
      width: 250px;
      background-color: #333;
      color: white;
      padding: 20px;
      display: flex;
      flex-direction: column;
    }
    .nav .searchbox {
      margin-bottom: 20px;
    }
    .nav .searchbox input {
      width: 100%;
      padding: 5px;
      border: none;
      border-radius: 3px;
    }
    .nav .menu .title {
      font-size: 1.2em;
      margin-bottom: 10px;
    }
    .nav .menu ul {
      list-style-type: none;
      padding: 0;
    }
    .nav .menu ul li {
      padding: 10px;
      margin-bottom: 5px;
      background-color: #444;
      border-radius: 3px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .nav .menu ul li.active {
      background-color: #555;
    }
    .nav .menu ul li a {
      color: white;
      text-decoration: none;
    }
    .nav form {
      display: flex;
      align-items: center;
    }
    .nav form input {
      flex: 1;
      padding: 5px;
      margin-right: 5px;
      border: none;
      border-radius: 3px;
    }
    .nav form button {
      padding: 5px 10px;
      background-color: #28a745;
      border: none;
      color: white;
      border-radius: 3px;
      cursor: pointer;
    }
    .view {
      flex: 1;
      padding: 20px;
      background-color: white;
      display: flex;
      flex-direction: column;
    }
    .viewHeader {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    .viewHeader form {
      display: flex;
      align-items: center;
    }
    .viewHeader form input {
      padding: 5px;
      margin-right: 5px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    .viewHeader form button {
      padding: 5px 10px;
      background-color: #007bff;
      border: none;
      color: white;
      border-radius: 3px;
      cursor: pointer;
    }
    .viewHeader .functions .button {
      margin-left: 10px;
      padding: 5px 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      cursor: pointer;
    }
    .viewHeader .functions .button.active {
      background-color: #007bff;
      color: white;
    }
    .content .list ul {
      list-style-type: none;
      padding: 0;
    }
    .content .list ul li {
      padding: 10px;
      margin-bottom: 5px;
      background-color: #f9f9f9;
      border: 1px solid #eee;
      border-radius: 3px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .content .list ul li.checked {
      text-decoration: line-through;
      color: #888;
    }
    .content .list ul li .info {
      display: flex;
      align-items: center;
    }
    .content .list ul li .info .created-at {
      margin-right: 10px;
      color: #888;
    }
    .content .list ul li .info .remove {
      color: red;
      cursor: pointer;
    }
  </style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="page">
  <div class="pageHeader">
    <div class="title">Dashboard</div>
    <div class="userPanel"><i class="fa fa-chevron-down"></i><span class="username">John Doe </span></div>
  </div>
  <div class="main">
    <div class="nav">
      <div class="searchbox">
        <div><i class="fa fa-search"></i>
          <input type="search" placeholder="Search"/>
        </div>
      </div>
      <div class="menu">
        <div class="title">Navigation</div>
        <ul class="folder-list">
          <?php foreach($folders as $folder): ?>
            <li class="folder-list">
            <a href="?folder_id=<?= $folder->id ?>"><i class="fa fa-folder"></i><?= $folder->name ?></a>
            <a href="?delete_folder=<?= $folder->id ?>" class="remove">X</a> 
          </li>
          <?php endforeach; ?>  
          <li class="active"> <i class="fa fa-folder"></i>All</li>        
        </ul>       
      </div>
      <div> 
        <form method="post" action="process/addFolder.php">
          <input type="text" name="folderName" id="addFolderInput" style="width: 65%; margin: 3%;" placeholder="Add new folder"/>
          <button type="submit" class="btn clickable">+</button>
        </form>
      </div>-
    </div>
    <div class="view">
      <div class="viewHeader">
        <form method="post" action="process/addTask.php">
          <input type="text" name="taskName" id="addTaskInput" style="width: 20%; margin: 0%; ; " placeholder="Add new task"/>
          <button type="submit" class="btn clickable" >+</button>
        </form>
        <div class="functions">
          <div class="button active">Add New Task</div>
          <div class="button">Completed</div>
          <div class="button inverz"><i class="fa fa-trash-o"></i></div>
        </div>
      </div>
      <div class="content">
        <div class="list">
          <ul>
          <?php foreach ($tasks as $task): ?>
            <li class="<?=$task->is_done ? 'checked' : '';?>">
              <i data-taskId="<?=$task->id?>" class="isDone clickable fa <?=$task->is_done ? 'fa-check-square-o' : 'fa-square-o';?> "></i>
              <span><?=$task->title?></span>
              <div class="info">
                <span class='created-at'>Created At <?=$task->created_at?></span>
                <a href="?delete_task=<?=$task->id?>" class="remove" onclick="return confirm('Are You Sure to delete this Item?\n<?=$task->title?>');">x</a>
              </div>
            </li>
            <?php endforeach;?>
          </ul>
        </div>
        <div class="list">
          <ul>
            <li><i class="fa fa-square-o"></i><span>Find front end developer</span>
              <div class="info"></div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="assets/js/script.js"></script>
</body>
</html>
