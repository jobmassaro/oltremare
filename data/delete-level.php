<?php include_once '../auth/protect.php';
session_start();
$level_id = filter_input(INPUT_POST, 'm', FILTER_SANITIZE_STRING);

if($user_level=='1'){
if($stmt = $mysqli->prepare("DELETE FROM ".$prefix."permission_levels WHERE id = ? LIMIT 1"))
	{ 
	$stmt->bind_param("i", $level_id);	
	$stmt->execute();
	$stmt->close();
	} else { echo "ERROR: could not prepare SQL statement."; }
}

$mysqli->close();
$_SESSION['action_deleted'] = '1';
header('Location: ../user-levels');