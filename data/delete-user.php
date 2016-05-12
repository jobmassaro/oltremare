<?php include_once '../auth/protect.php';
$uid = filter_input(INPUT_POST, 'm', FILTER_SANITIZE_STRING);

 $servername = "localhost";
 $username = "root";
 $password = "developer";
 $dbname = "oltremare";
  

  $mysqli = new mysqli($servername, $username, $password, $dbname);
  

  if ($mysqli->connect_errno) {
      echo "Connessione fallita: ". $mysqli->connect_error . ".";
      exit();
  }

if($user_level=='1')
{

	$sql = "SELECT id_utente FROM cv_members WHERE id=". $uid; 
	$result = $mysqli->query($sql);
	if(mysqli_num_rows($result) != 0) 
    {
        while($row = mysqli_fetch_assoc($result)) 
        {
        	$id_utente = $row['id_utente'];
        }
    }



	$sql = "DELETE FROM ".$prefix."members WHERE id_utente = ". $id_utente ." LIMIT 1";
	$result = $mysqli->query($sql);

	$sql = "DELETE FROM cv_generale WHERE id_utente = ". $id_utente ;

	$result = $mysqli->query($sql);

	$sql = "DELETE FROM cv_socio WHERE id_utente = ". $id_utente ;
	$result = $mysqli->query($sql);

	$sql = "DELETE FROM cv_contabilita WHERE id_utente = ". $id_utente ;
	$result = $mysqli->query($sql);

	$sql = "DELETE FROM cv_barche WHERE id_utente = ". $id_utente ;
	$result = $mysqli->query($sql);


	$sql = "DELETE FROM cv_formazione_oltremare WHERE id_utente = ". $id_utente ;
	$result = $mysqli->query($sql);


	$sql = "DELETE FROM cv_amico WHERE id_utente = ". $id_utente ;
	$result = $mysqli->query($sql);

	$sql = "DELETE FROM cv_recapiti WHERE id_utente = ". $id_utente ;
	$result = $mysqli->query($sql);

	$sql = "DELETE FROM cv_stampacv WHERE id_utente = ". $id_utente ;
	$result = $mysqli->query($sql);


	} else { echo "ERROR: could not prepare SQL statement."; }

$mysqli->close();

header('Location: ../user-management.php');