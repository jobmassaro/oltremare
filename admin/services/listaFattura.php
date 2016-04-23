<?php


$host = "localhost";
$user = "root";
$password = "developer";
$database ="UOLTRE";

$mysqli = new mysqli($host, $user, $password, $database);
if(mysqli_connect_errno()){
  echo "Errore connessione al DB: ".mysqli_connect_error();
}


$arr = array();
$sql = "SELECT id, name, surname FROM cv_members";

$result = $mysqli->query($sql);

if($result->num_rows >0)
{
	while($row = $result->fetch_array(MYSQLI_ASSOC))
	{

		$sql2 = "SELECT * FROM cv_contabilita WHERE id_utente = " . $row['id'];
		$r2 = $mysqli->query($sql2); 
		if($r2->num_rows > 0)
		{
			while($row2 = $r2->fetch_array(MYSQLI_ASSOC))
			{
				$arr[] = $row2;	
			}

		}else{
			$sql_insert = "INSERT INTO cv_contabilita (id_utente,name, surname) VALUES(" .$row['id'] .",'".$row['name'] .
				"','" .$row['surname'] ."')";
			if ($mysqli->query($sql_insert) === TRUE) 
			{
				$sql2 = "SELECT * FROM cv_contabilita";
				$r2 = $mysqli->query($sql2); 
				if($r2->num_rows > 0)
				{
					while($row3 = $r2->fetch_array(MYSQLI_ASSOC))
					{
						$arr[] = $row3;	
					}
				}
			}	
		}
		/*if($r2->num_rows > 0)
		{
			while($row2 = $r2->fetch_array(MYSQLI_ASSOC))
			{
				$arr[] = $row2;	
			}

			
		}//se non ci sono utenti 
		else{
			echo 'secondo';
			$sql_insert = "INSERT INTO cv_contabilita (id_utente,name, suername) VALUES ('".
			.$row['id'] ."','".$row['name']."','".$row['surname'] ."');";
			var_dump($sql_insert);
		}*/
	}
}

echo $json_info = json_encode($arr);


?>