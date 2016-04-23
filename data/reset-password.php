<?php 

include_once '../auth/db-connect.php';
include('../auth/password.php');

//DATA REQURED
$key = filter_input(INPUT_POST, 'key', FILTER_SANITIZE_STRING);
$pin = filter_input(INPUT_POST, 'pin', FILTER_SANITIZE_STRING);
$pwd = filter_input(INPUT_POST, 'new_pass', FILTER_SANITIZE_STRING);
$cpwd = filter_input(INPUT_POST, 'c_pass', FILTER_SANITIZE_STRING);



if($key!='' || $pin != '')
{

	$query = "SELECT * FROM ".$prefix."members WHERE forgot_key = '" . $key ."'";
	$user_id = $mysqli->query($query)->fetch_object()->id; 
	if(count($user_id) == 1)
	{
		if($pwd == $cpwd)
		{
			$hash = password_hash($pwd, PASSWORD_DEFAULT, array("cost" => 10));
			$reset = '';
			$query = "UPDATE ".$prefix."members SET password ='" . $hash ."', forgot_pin = '" . $reset."', forgot_key = '". $reset ."' WHERE id= " . $user_id .";";
			
			if (!mysqli_query($mysqli, $query)) 
			{
				header('Location: ../error.php');    					
			}else{
				header('Location: ../login.php?success=1');	
			}

			
				
		}else
		{
			//PASSWORDS DO NOT MATCH
			header('Location: ../reset.php?k='.$key.'&error=1');
		}//secondo if annidato
		

	}//primo if annidato

}else{
	header('Location: ../reset.php?k='.$key.'&error=3');
}// chiude if in testa 

?>