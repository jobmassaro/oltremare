<?php
include_once('db-connect.php');
//GET SETTINGS
$get_settings = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT require_cap FROM ".$prefix."rl_settings WHERE id = 1"));
$require_cap = $get_settings['require_cap'];
if($require_cap=='1'){
  include('register.recap.inc.php');
}else{
  include('register.inc.php');
}