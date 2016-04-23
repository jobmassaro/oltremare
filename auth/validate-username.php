<?php
include_once('db-connect.php');
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_EMAIL);
$prep_stmt = "SELECT id FROM ".$prefix."members WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            // A user with this username already exists
            echo 'false';
        }else{
            echo 'true';
        }
	}
?>