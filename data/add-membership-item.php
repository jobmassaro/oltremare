<?php include_once '../auth/protect.php';
if($user_level=='1'){
	//DATA REQURED
	$i = 0;
	foreach ($_POST as $field => $value ) { 
		${$field} = filter_var($value, FILTER_SANITIZE_STRING);
		$i++;
	}

	$Q = str_repeat("?, ", $i);
	$Q = substr($Q, 0, -2);
	$S = str_repeat("s", $i);

	$stmt = $mysqli->prepare("INSERT INTO ".$prefix."membership_items (plan_id, order_id, title) VALUES ($Q)");
	$stmt->bind_param($S, $pid, $order_id, $title);
	$stmt->execute();
	$stmt->close();
	$_SESSION['action_saved']='1';
}

header('Location: ../membership-items');
?>