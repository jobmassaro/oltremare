<?php include_once '../auth/protect.php';
secure_session_start();
$plan_id = filter_input(INPUT_POST, 'pid', FILTER_SANITIZE_STRING);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$trial_period = filter_input(INPUT_POST, 'trial_period', FILTER_SANITIZE_STRING);
$trial_cost = filter_input(INPUT_POST, 'trial_cost', FILTER_SANITIZE_STRING);
$membership_cost = filter_input(INPUT_POST, 'membership_cost', FILTER_SANITIZE_STRING);
$recurring_period = filter_input(INPUT_POST, 'recurring_period', FILTER_SANITIZE_STRING);
$user_level = filter_input(INPUT_POST, 'user_level', FILTER_SANITIZE_STRING);

	$update_one = $mysqli->prepare("UPDATE ".$prefix."memberships SET title = ?, trial_period = ?, trial_cost = ?, membership_cost = ?, recurring_period = ?, user_level = ? WHERE id = $plan_id"); 
	$update_one->bind_param('ssssss', $title, $trial_period, $trial_cost, $membership_cost, $recurring_period, $user_level);
	$update_one->execute();
	$update_one->close();
	$mysqli->close();
	$_SESSION['action_updated']='1';
	header('Location: ../membership-settings');
	
?>