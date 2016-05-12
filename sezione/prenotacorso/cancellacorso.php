<?php 
// Including database connections
 $servername = "localhost";
 $username = "root";
 $password = "developer";
 $dbname = "oltremare";
  

 $mysqli = new mysqli($servername, $username, $password, $dbname);
  

  if ($mysqli->connect_errno) {
      echo "Connessione fallita: ". $mysqli->connect_error . ".";
      exit();
  }
  
// Fetching the updated data & storin in new variables
$data = json_decode(file_get_contents("php://input")); 
$id = mysqli_real_escape_string($mysqli, $data->id);
$id_utente = mysqli_real_escape_string($mysqli, $data->id_utente);


$sql = "DELETE FROM cv_prenotazione WHERE id_utente=" .$id_utente ." AND id=" .$id;
$result = $mysqli->query($sql);
 $arr = array();
 if(mysqli_num_rows($result) != 0) 
 {  
   while($row = mysqli_fetch_assoc($result)) 
   {
       $arr[] = $row;
   }
   unlink("sezione/prenotacorso/utente.json");
   $myfile = fopen("sezione/prenotacorso/corsi_prenotati.json", "w") or die("Unable to open file!");
   $txt =json_encode($arr);
   fwrite($myfile, $txt);
   fclose($myfile);
 }

echo true;


?>

