<?php include_once '../auth/protect.php';
secure_session_start();
$item_id = filter_input(INPUT_POST, 'iid', FILTER_SANITIZE_STRING);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$order_id = filter_input(INPUT_POST, 'order_id', FILTER_SANITIZE_STRING);

	$update_one = $mysqli->prepare("UPDATE ".$prefix."membership_items SET title = ?, order_id = ? WHERE id = $item_id"); 
	$update_one->bind_param('ss', $title, $order_id);
	$update_one->execute();
	$update_one->close();
	$mysqli->close();
	$_SESSION['action_updated']='1';
	header('Location: ../membership-items');
	
?>