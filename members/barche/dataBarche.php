<?php

	$id = $_POST['option'];
	$servername = "localhost";
	$username = "root";
	$password = "developer";
	$dbname = "UOLTRE";


	$con = new mysqli($servername, $username, $password, $dbname);



	if ($con->connect_errno) {
    	echo "Connessione fallita: ". $con->connect_error . ".";
    	exit();
	}

	if($id != null && count($id) > 0)
	{
		$sql = "SELECT * FROM  cv_cantiere where id_modello=" .$id;
		if ($result=mysqli_query($con,$sql))
		{
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo "<option value=" . $row['id']. ">".$row['cantiere']."</option>";	
			}
			
		}
		
	}



?>