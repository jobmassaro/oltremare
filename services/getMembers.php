<?php
// Including database connections
$servername = "localhost";
$username = "root";
$password = "developer";
$dbname = "oltremare";


$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_errno) {
    echo "Connessione fallita: ". $con->connect_error . ".";
    exit();
}


$q = "SELECT id FROM oltremare.cv_members";

if ($result=mysqli_query($con,$q))
  {
  	// Return the number of rows in result set
	$rowcount=mysqli_num_rows($result);
  	
//  	printf("Result set has %d rows.\n",$rowcount);
  	// Free result set
  	
  	mysqli_free_result($result);
  }


$query = "SELECT * FROM oltremare.cv_members; ";
$result = $con->query($query);
$arr1 ="[";
$arr = array();

if(mysqli_num_rows($result) != 0) {
	$i = 1;
	while($row = mysqli_fetch_assoc($result)) {
		if($i != $rowcount)
		{
			if($row['email_confirmed'] == 1)
				$row['email_confirmed'] = "SI";
			else
				$row['email_confirmed'] = "NO";

			if($row['terms'] == 1)
				$row['terms'] = "SI";
			else
				$row['terms'] = "NO";		

			$time = strtotime($row['reg_date']);
			$reg_date = date("d/m/y ", $time);
			
			
			$time = strtotime($row['last_login']);
			$last_login = date("d/m/y ", $time);
			

			//$arr[] = $row;
			$pic = ($row['profilo_pic'] <> "") ? $row['profilo_pic'] : "profile_pic/no_avatar.png" ;

			$arr1 .= '{ "id":"' .$row['id'] .'","id_utente":"'. $row['id_utente'] . '","level":"'.$row['user_level'] .'","foto":"' .$pic .'", "name":"' .$row['name'] .'","surname":"' .$row['surname'] .'","username":"'. $row['username'] .'","email":"'.$row['email'] .
			'","email_confirmed":"'.$row['email_confirmed'].'","terms":"' .$row['terms']. '","reg_date":"' . $reg_date.'","certificato":"'. $row['certificato']. '","last_login":"' . $last_login .'"},';
			$i++;
		}else{

				if($row['email_confirmed'] == 1)
				$row['email_confirmed'] = "SI";
			else
				$row['email_confirmed'] = "NO";

			if($row['terms'] == 1)
				$row['terms'] = "SI";
			else
				$row['terms'] = "NO";	

			$time = strtotime($row['reg_date']);
			$reg_date = date("d/m/y ", $time);
			
			
			$time = strtotime($row['last_login']);
			$last_login = date("d/m/y ", $time);	

			$arr1 .= '{ "id":"' .$row['id']  .'","id_utente":"'. $row['id_utente'] . '","level":"'.$row['user_level'] .'","foto":"' .$pic .'", "name":"' .$row['name'] .'","surname":"' .$row['surname'] .'","username":"'. $row['username'] .'","email":"'.$row['email'] .
			'","email_confirmed":"'.$row['email_confirmed'].'","terms":"' .$row['terms']. '","reg_date":"' . $reg_date .'","certificato":"'. $row['certificato']. '","last_login":"' .$last_login .'"}';
			$i++;
		}
			
			
	}
	
}
$arr1 .="]"; 
echo $arr1;
?>