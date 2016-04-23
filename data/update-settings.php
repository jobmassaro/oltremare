<?php include_once '../auth/protect.php';
session_start();
$rs_meta_title = filter_input(INPUT_POST, 'mt', FILTER_SANITIZE_STRING);
$rs_meta_description = filter_input(INPUT_POST, 'md', FILTER_SANITIZE_STRING);
$rs_site_title = filter_input(INPUT_POST, 'st', FILTER_SANITIZE_STRING);
$rs_site_email = filter_input(INPUT_POST, 'se', FILTER_SANITIZE_STRING);

$update_one = $mysqli->prepare("UPDATE ".$prefix."settings SET meta_title = ?, meta_description = ?, site_title = ?, site_email = ? WHERE id=1"); 
$update_one->bind_param('ssss', $rs_meta_title, $rs_meta_description, $rs_site_title, $rs_site_email);
$update_one->execute();
$update_one->close();
$_SESSION['action_saved'] = '1';
header('Location: ../settings');
?>