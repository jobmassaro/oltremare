<?php include_once '../auth/db-connect.php';
$member_id = filter_input(INPUT_POST, 'custom', FILTER_SANITIZE_STRING);
$status = 'active';

	$update_one = $mysqli->prepare("UPDATE ".$prefix."members SET status = ? WHERE id = $member_id"); 
	$update_one->bind_param('s', $status);
	$update_one->execute();
	$update_one->close();

header('Location: ../dashboard');
?>