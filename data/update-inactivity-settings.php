<?php include_once '../auth/protect.php';
secure_session_start();
if($user_level=='1'){
$timeout_enabled = filter_input(INPUT_POST, 'timeout_enabled', FILTER_SANITIZE_STRING);
$warning_title = filter_input(INPUT_POST, 'warning_title', FILTER_SANITIZE_STRING);
$warning_message = filter_input(INPUT_POST, 'warning_message', FILTER_SANITIZE_STRING);
$inactivity_timer = filter_input(INPUT_POST, 'inactivity_timer', FILTER_SANITIZE_STRING);
$inactivity_warning = filter_input(INPUT_POST, 'inactivity_warning', FILTER_SANITIZE_STRING);

$update_one = $mysqli->prepare("UPDATE ".$prefix."inactivity_settings SET timeout_enabled = ?, title = ?, message = ?, inactivity_timer = ?, inactivity_warning = ? WHERE id=1"); 
$update_one->bind_param('sssss', $timeout_enabled, $warning_title, $warning_message, $inactivity_timer, $inactivity_warning);
$update_one->execute();
$update_one->close();
$_SESSION['action_saved'] = '1';
}
header('Location: ../inactivity-settings');
?>