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
$attivita = mysqli_real_escape_string($mysqli, $data->attivita);
$scuola = mysqli_real_escape_string($mysqli, $data->scuola);
$sede = mysqli_real_escape_string($mysqli, $data->sede);
$anno= mysqli_real_escape_string($mysqli, $data->anno);
$abilitazione = mysqli_real_escape_string($mysqli, $data->abilitazione);
$presso_scuola = mysqli_real_escape_string($mysqli, $data->presso_scuola);
$nellanno = mysqli_real_escape_string($mysqli, $data->nellanno);

$sql = "UPDATE cv_formazione_utente SET id_utente =".$id_utente .",nome='".$nome . "',cognome='" . $cognome. "',attivita='" .$attivita ."',scuola='". $scuola ."',sede='" . $sede . "',anno='" . $anno . "',abilitazione ='" . $abilitazione. "',presso_scuola='".  $presso_scuola ."',nellanno='". $nellanno ."' WHERE id_utente=". $id_utente ." AND id=" .$id;


$result = $mysqli->query($sql);
  $arr = array();
    if(mysqli_num_rows($result) != 0) 
    {  
       while($row = mysqli_fetch_assoc($result)) 
       {
         $arr[] = $row;
       }
       $myfile = fopen("barche.json", "w") or die("Unable to open file!");
       $txt =json_encode($arr);
       fwrite($myfile, $txt);
       fclose($myfile);
     }


echo true;


?>