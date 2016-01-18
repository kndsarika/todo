<?php

   require_once 'init.php';
   $itemsQuery = $db->prepare("
    SELECT id, name, done
    FROM items
    WHERE user = :user
	 ");
   $itemsQuery->execute(['user' => $_SESSION['user_id']]);
   $items = $itemsQuery->rowCount() ? $itemsQuery : [];
   foreach($items as $item) {
      echo $item['name'],'<br>';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>To Do</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
    <link rel="stylesheet" href="main.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <div class="list">
      <h1 class="header">To Do</h1>
        <?php if(!empty($items)) : ?>
      
      <ul class="items">
        <?php foreach ($items as $item):?>
      	<li>
      	<span class="item<?php echo $item['done'] ? ' done' : '' ?>"><?php echo $item['name']; ?></span>
      	<?php if(!$item['done']): ?>
      	<a href="mark.php?as=done&item=<?php echo $item['id']; ?>" class="done-button">Mark as done</a>
      <?php endif; ?>
      	</li>
      <?php endforeach;  ?>
      	 </ul>
        <?php else: ?>
        	<p>You haven't added any items yet</p>
mark.php?as=done&item=<?php echo $item['id']; ?>
        <?php endif; ?>
     
      <form class="item-add" action="add.php" method="post">
      	<input type="text" name="name" placeholder="Type a new item here" class="input" autocomplete="off" required>
      	<input type="submit" value="Add" class="submit">
      </form>
      <a href="del.php?as=del&item=<?php echo $item['id']; ?>"; style="margin: 44%" class="submit">Delete</a>
      
      </div>
</body>
</html># todo main.css
# todo main.css mark.php add.php del.php init.php database_info.txt
# todo main.css mark.php add.php del.php init.php database_info.txt
