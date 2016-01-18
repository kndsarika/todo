<?php

  require_once 'init.php';

  if(isset($_GET['as'], $_GET['item'])) {
	  $as	= $_GET['as'];
	  $item	= $_GET['item'];
	
	  switch($as) {
		  case 'del':
			  $delQuery = $db->prepare("
				  DELETE FROM items
				  WHERE id = :item
				  AND user = :user
			  ");
			
			  $delQuery->execute([
				  'item' => $item,
				  'user' => $_SESSION['user_id']
			  ]);
		  break;
	  }
    }
header('location: index.php');
?>