<?php include_once '../auth/protect.php';
secure_session_start();
if($user_level=='1'){
$public_registration = filter_input(INPUT_POST, 'public_registration', FILTER_SANITIZE_STRING);
$require_cap = filter_input(INPUT_POST, 'require_cap', FILTER_SANITIZE_STRING);
$require_email_activation = filter_input(INPUT_POST, 'require_email_activation', FILTER_SANITIZE_STRING);
$require_terms = filter_input(INPUT_POST, 'require_terms', FILTER_SANITIZE_STRING);
$dul = filter_input(INPUT_POST, 'dul', FILTER_SANITIZE_STRING);
$min_password_length = filter_input(INPUT_POST, 'min_password_length', FILTER_SANITIZE_STRING);
$require_plans = filter_input(INPUT_POST, 'require_plans', FILTER_SANITIZE_STRING);
$redirect_login = filter_input(INPUT_POST, 'redirect_login', FILTER_SANITIZE_STRING);
$redirect_logout = filter_input(INPUT_POST, 'redirect_logout', FILTER_SANITIZE_STRING);
$gc_key = filter_input(INPUT_POST, 'gckey', FILTER_SANITIZE_STRING);
$gc_secret = filter_input(INPUT_POST, 'gcsecret', FILTER_SANITIZE_STRING);
  
$update_one = $mysqli->prepare("UPDATE ".$prefix."rl_settings SET public_registration = ?, require_cap = ?, require_email_activation = ?, require_terms = ?, default_user_level = ?, min_password_length = ?, require_plans = ?, redirect_login = ?, redirect_logout = ?, gc_key = ?, gc_secret = ? WHERE id=1"); 
$update_one->bind_param('sssssssssss', $public_registration, $require_cap, $require_email_activation, $require_terms, $dul, $min_password_length, $require_plans, $redirect_login, $redirect_logout, $gc_key, $gc_secret);
$update_one->execute();
$update_one->close();
$_SESSION['action_saved'] = '1';
}
header('Location: ../rl-settings');
?>