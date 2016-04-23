<?php include_once '../auth/protect.php';
$uid = filter_input(INPUT_POST, 'm', FILTER_SANITIZE_STRING);
if($user_level=='1'){
if ($stmt = $mysqli->prepare("DELETE FROM ".$prefix."members WHERE id = ? LIMIT 1"))
	{ 
	$stmt->bind_param("i", $uid);	
	$stmt->execute();
	$stmt->close();
	} else { echo "ERROR: could not prepare SQL statement."; }

$mysqli->close();
}
header('Location: ../user-management.php');