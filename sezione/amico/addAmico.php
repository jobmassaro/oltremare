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
$nome = mysqli_real_escape_string($mysqli, $data->nome);
$cognome = mysqli_real_escape_string($mysqli, $data->cognome);
$telefono = mysqli_real_escape_string($mysqli, $data->telefono);
$cellulare = mysqli_real_escape_string($mysqli, $data->cellulare);
$email = mysqli_real_escape_string($mysqli, $data->email);
$whatsapp= mysqli_real_escape_string($mysqli, $data->whatsapp);
$facebook = mysqli_real_escape_string($mysqli, $data->facebook);

$sql = "INSERT INTO cv_amico (id_utente,nome,cognome,email, telefono, facebook,whatsapp) VALUES (" .$id_utente . ",'". $nome . "','". $cognome .  "','" . $email 
  ."','" .$telefono ."','". $facebook."','". $whatsapp. "')";
$result = $mysqli->query($sql);
  $arr = array();
    if(mysqli_num_rows($result) != 0) 
    {  
       while($row = mysqli_fetch_assoc($result)) 
       {
         $arr[] = $row;
       }
       $myfile = fopen("amico.json", "w") or die("Unable to open file!");
       $txt =json_encode($arr);
       fwrite($myfile, $txt);
       fclose($myfile);
     }

echo true;


?>

