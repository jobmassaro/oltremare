<?php include_once '../auth/db-connect.php';
$level_id = filter_input(INPUT_POST, 'lid', FILTER_SANITIZE_STRING);
$level_name = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
$level_value = filter_input(INPUT_POST, 'level', FILTER_SANITIZE_STRING);
$redirect_login = filter_input(INPUT_POST, 'redirect_login', FILTER_SANITIZE_STRING);
$get_level = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT id, level FROM ".$prefix."permission_levels WHERE level = $level_value"));
	$level_exists = $get_level['level'];
	if($level_exists == $level_value){
		$update_one = $mysqli->prepare("UPDATE ".$prefix."permission_levels SET name = ?, redirect_login = ? WHERE id = $level_id"); 
		$update_one->bind_param('ss', $level_name, $redirect_login);
		$update_one->execute();
		$update_one->close();
		$_SESSION['action_updated']='1';
		header('Location: ../user-levels');
	}else{
	$update_one = $mysqli->prepare("UPDATE ".$prefix."permission_levels SET name = ?, level = ?, redirect_login = ? WHERE id = $level_id"); 
	$update_one->bind_param('sss', $level_name, $level_value, $redirect_login);
	$update_one->execute();
	$update_one->close();
	$mysqli->close();
	$_SESSION['action_updated']='1';
	header('Location: ../user-levels');
	}
?>