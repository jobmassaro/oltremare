<?php
include('../auth/protect.php');
secure_session_start();
$_SESSION = array();
$params = session_get_cookie_params();
setcookie(session_name(), '', time() - 42000, 
   $params["path"], 
   $params["domain"], 
   $params["secure"], 
   $params["httponly"]);
session_destroy();
$get_settings = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT redirect_logout FROM ".$prefix."rl_settings WHERE id = 1"));
$redirect_logout = $get_settings['redirect_logout']; 
if($redirect_logout==''){
  header('Location: ../login.php');
}else{
  header('Location: '.$redirect_logout.'');
}
