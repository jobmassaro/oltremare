<?php include_once '../auth/db-connect.php';
include_once '../auth/protect.php';
$plan_id = filter_input(INPUT_POST, 'l', FILTER_SANITIZE_STRING);
$uid = filter_input(INPUT_POST, 'm', FILTER_SANITIZE_STRING);
if($user_level=='1'){
	$update_one = $mysqli->prepare("UPDATE ".$prefix."members SET plan_id = ? WHERE id=$uid"); 
	$update_one->bind_param('s', $plan_id);
	$update_one->execute();
	$update_one->close();
}
$mysqli->close();
$_SESSION['action_saved'] = '1';
header('Location: ../user-management');
