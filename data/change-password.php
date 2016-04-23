<?php include_once '../auth/db-connect.php';
include('../auth/protect.php');
include('../auth/password.php');

	//DATA REQURED
	$owner = $user_id;
	$pwd = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
	$cpwd = filter_input(INPUT_POST, 'cpwd', FILTER_SANITIZE_STRING);

	if($pwd == $cpwd){
		//HASH NEW PASSWORD
		$hash = password_hash($pwd, PASSWORD_DEFAULT, array("cost" => 10));
		//UPDATE DB
		$update_one = $mysqli->prepare("UPDATE ".$prefix."members SET password = ? WHERE id=$user_id"); 
		$update_one->bind_param('s', $hash);
		$update_one->execute();
		$update_one->close();
		$_SESSION['action_saved'] = '1';
		header('Location: ../profile.php');
	}else{
		//PASSWORDS DO NOT MATCH
		header('Location: ../profile.php?error=1');
	}


?>