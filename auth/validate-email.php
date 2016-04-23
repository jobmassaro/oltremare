<?php
include_once('db-connect.php');
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$prep_stmt = "SELECT id FROM ".$prefix."members WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            echo 'false';
        }else{
            echo 'true';
        }
	}
?>