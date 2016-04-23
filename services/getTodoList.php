<?php

include('../auth/protect.php');
//REDIRECT IF NOT ADMIN LEVEL 1 USER
if($user_level!='1'){header('Location: dashboard');}
// Including database connections
$servername = "localhost";
$username = "root";
$password = "developer";
$dbname = "UOLTRE";


$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_errno) {
    echo "Connessione fallita: ". $con->connect_error . ".";
    exit();
}


$q = "SELECT id FROM cv_todolist";

if ($result=mysqli_query($con,$q))
  {
  	// Return the number of rows in result set
	$rowcount=mysqli_num_rows($result);
  	
//  	printf("Result set has %d rows.\n",$rowcount);
  	// Free result set
  	
  	mysqli_free_result($result);
  }


$query = "SELECT id,completated,titolo, descrizione,DATE_FORMAT(date, '%d/%m/%Y') as date FROM cv_todolist ORDER BY date DESC;";
$result = $con->query($query);
$arr1 ="[";

if(mysqli_num_rows($result) != 0) {
	$i = 1;
	while($row = mysqli_fetch_assoc($result)) {
		if($i != $rowcount)
		{
			//$arr[] = $row;
			
			$arr1 .= '{ "id":"' .$row['id'] . '","completated":"' . $row['completated'] .'","titolo":"' . $row['titolo'] .'","descrizione":"' .$row['descrizione'] . '","date":"' . $row['date'] .'"},';
			$i++;
		}else{
			$arr1 .= '{ "id":"' .$row['id'] . '","completated":"' . $row['completated'] .'","titolo":"' . $row['titolo'] .'","descrizione":"' .$row['descrizione'] . '","date":"' . $row['date'] .'"}';
			$i++;
		}
			
			
	}
	
}
$arr1 .="]"; 
echo $arr1;
?>