<?php include_once '../auth/protect.php';
session_start();
$et = filter_input(INPUT_POST, 'et', FILTER_SANITIZE_STRING);
$ec = $_POST['ec'];

$update_one = $mysqli->prepare("UPDATE ".$prefix."email_content SET $et = ? WHERE id=1"); 
$update_one->bind_param('s', $ec);
$update_one->execute();
$update_one->close();
$_SESSION['action_saved'] = '1';
if($et=='email_activation'){
header('Location: ../email-welcome');
}
if($et=='forgot_password'){
header('Location: ../email-forgot');
}
?>