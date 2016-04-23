<?php include('../auth/protect.php');
secure_session_start();
$selected_lang = filter_input(INPUT_POST, 'selected_lang', FILTER_SANITIZE_STRING);
unset($_SESSION['language']);
$_SESSION['language'] = $selected_lang;
header('Location: ../dashboard.php');