<?php include_once '../auth/db-connect.php';
	
	//DATA REQURED
	$level_name = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
	$level_value = filter_input(INPUT_POST, 'level', FILTER_SANITIZE_STRING);
	$redirect_login = filter_input(INPUT_POST, 'redirect_login', FILTER_SANITIZE_STRING);
	
	$get_level = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT id, level FROM ".$prefix."permission_levels WHERE level = $level_value"));
	$level_exists = $get_level['level'];
	if(isset($level_exists)){
		header('Location: ../user-levels?e=1');
	}else{
	$stmt = $mysqli->prepare("INSERT INTO ".$prefix."permission_levels (name, level, redirect_login) VALUES (?, ?, ?)");
	$stmt->bind_param('sss', $level_name, $level_value, $redirect_login);
	$stmt->execute();
	$stmt->close();
	$_SESSION['action_saved']='1';
	header('Location: ../user-levels');
	}
?>