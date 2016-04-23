<?php
include_once('db-connect.php');
include_once('access-functions.php');
secure_session_start();
$login_check = login_check($mysqli, $prefix);
if($login_check === true){
	$user_id = $_SESSION['user_id'];
	$user_name = $_SESSION['name'];
	$user_surname = $_SESSION['surname'];
	$user_email = $_SESSION['email_address'];
	$get_access_level = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT user_level, status FROM ".$prefix."members WHERE id = $user_id"));
	$user_level = $get_access_level['user_level'];
	$status = $get_access_level['status'];
	if($status==''){$status='active';}
}else{
	header('Location: '.$login_check);
}

