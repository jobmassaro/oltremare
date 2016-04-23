<?php
include_once('auth/db-connect.php');
include_once('auth/access-functions.php');
secure_session_start();
$datetime = date("Y-m-d H:i:s");
//CHECK SESSION AND SET IF EMPTY
if($_SESSION['lp_visitor_session']==''){
  //BASIC DATA
	$ip = $_SERVER['REMOTE_ADDR'];
	$agent = $_SERVER['HTTP_USER_AGENT'];
  if($user_id==''){$user_id='0';}
	
	//ADVANCED DATA
	include_once('stat-sorter/detect.php');
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? '3' : '2') : '1');
	include_once('stat-sorter/os.php');
	include_once('stat-sorter/country.php');
  $stmt = $mysqli->prepare("INSERT INTO ".$prefix."traffic_statistics (user_id, agent, ip, browser, device_type, os, country, datetime) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param('ssssssss', $user_id, $agent, $ip, $browser, $deviceType, $os, $country, $datetime);
	$stmt->execute();
	$stmt->close();
  $session = $mysqli->insert_id;
  $_SESSION['lp_visitor_session'] = $session;
}else{
  //PAGE LOG ACTION
  $page = "http://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI]."";
  $session = $_SESSION['lp_visitor_session'];
  $get_data = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT action_order FROM ".$prefix."page_tracker WHERE session_id=$session ORDER BY id DESC"));
	$action_order = $get_data['action_order'];
  $action_order = $action_order + 1;
  $stmt = $mysqli->prepare("INSERT INTO ".$prefix."page_tracker (session_id, action_order, page, datetime) VALUES (?, ?, ?, ?)");
	$stmt->bind_param('ssss', $session, $action_order, $page, $datetime);
	$stmt->execute();
	$stmt->close();
}
