<?php 


	$servername = "localhost";
	$username = "root";
	$password = "developer";
	$dbname = "oltremare";

	$mysqli = new mysqli($servername, $username, $password, $dbname);

	if ($mysqli->connect_errno) {
   		echo "Connessione fallita: ". $con->connect_error . ".";
	   	exit();
	}
		
	$sql = "SELECT id FROM cv_cantiere";

	if ($result=mysqli_query($mysqli,$sql))
  	{
  		// Return the number of rows in result set
		$rowcount=mysqli_num_rows($result);


  	
	//  	printf("Result set has %d rows.\n",$rowcount);
  		// Free result set
  	
  		mysqli_free_result($result);
  	}

	$query = "SELECT * FROM cv_cantiere";
	$result = $mysqli->query($query);
	$arr1 ="[";
	$arr = array();

	if(mysqli_num_rows($result) != 0) {
		$i = 1; $cnt = 0;
	while($row = mysqli_fetch_assoc($result)) {
		if($i != $rowcount)
		{
			$arr1 .= '{ "id":"' .$row['id'] .'","id_utente":"'. $row['id_utente'] . '","id_modello":"'.$row['id_modello'] .'","nome_cantiere":"' .$row['nome_cantiere'] .'", "Loa":"' .$row['Loa'] .'","modello":"'. $row['modello'].'", "cantiere":"' .$row['cantiere'] .'"},';
			$i++;
		}else{
			$arr1 .= '{ "id":"' .$row['id'] .'","id_utente":"'. $row['id_utente'] . '","id_modello":"'.$row['id_modello'] .'","nome_cantiere":"' .$row['nome_cantiere'] .'", "Loa":"' .$row['Loa'] .'","modello":"'. $row['modello'].'", "cantiere":"' .$row['cantiere'] .'"}';
			$i++;

		}
			
			
	}
	
}
$arr1 .="]"; 
$myfile = fopen("modello.json", "w") or die("Unable to open file!");
$txt =$arr1;
fwrite($myfile, $txt);
fclose($myfile);
//echo $arr1;
?>