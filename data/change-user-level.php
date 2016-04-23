<?php include_once '../auth/db-connect.php';
include_once '../auth/protect.php';
$level = filter_input(INPUT_POST, 'l', FILTER_SANITIZE_STRING);
$uid = filter_input(INPUT_POST, 'm', FILTER_SANITIZE_STRING);
if($user_level=='1'){
	$update_one = $mysqli->prepare("UPDATE ".$prefix."members SET user_level = ? WHERE id=$uid"); 
	$update_one->bind_param('i', $level);
	$update_one->execute();
	$update_one->close();
}
$mysqli->close();
$_SESSION['action_saved'] = '1';
header('Location: ../user-management.php');
