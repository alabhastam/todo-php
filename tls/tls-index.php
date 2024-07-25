<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Task Manager UI</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="page">
  <div class="pageHeader">
    <div class="title">Dashboard</div>
    <div class="userPanel"><i class="fa fa-chevron-down"></i><span class="username">John Doe </span><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/73.jpg" width="40" height="40"/></div>
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
          <li class="active"> <i class="fa fa-folder"></i>Active Folder</li>        
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
        <div class="title">Manage Tasks</div>
        <div class="functions">
          <div class="button active">Add New Task</div>
          <div class="button">Completed</div>
          <div class="button inverz"><i class="fa fa-trash-o"></i></div>
        </div>
      </div>
      <div class="content">
        <div class="list">
          <div class="title">Today</div>
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
          <div class="title">Tomorrow</div>
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
