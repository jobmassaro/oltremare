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
$sede = mysqli_real_escape_string($mysqli, $data->sede);
$corsi_oltremare = mysqli_real_escape_string($mysqli, $data->corsi_oltremare);
$data_corso_oltremare= mysqli_real_escape_string($mysqli, $data->data_corso_oltremare);
$scuola_extra = mysqli_real_escape_string($mysqli, $data->scuola_extra);
$corso_extra = mysqli_real_escape_string($mysqli, $data->corso_extra);
$data_extra = mysqli_real_escape_string($mysqli, $data->data_extra);
$abilitazionioni = mysqli_real_escape_string($mysqli, $data->abilitazionioni);

//$sql = "UPDATE cv_formazione_oltremare SET id_utente =".$id_utente .",nome='".$nome . "',cognome='" . $cognome. "',sede='" .$sede ."',corsi_oltremare='" . $corsi_oltremare . "',data_corso_oltremare='" . $data_corso_oltremare . "',scuola_extra ='" . $scuola_extra. "',corso_extra='".  $corso_extra ."',data_extra='". $data_extra ."',abilitazionioni='" .$abilitazionioni ."' WHERE id_utente=". $id_utente ." AND id=" .$id;
$sql = "INSERT INTO  cv_formazione_oltremare(id_utente, nome,cognome, sede,corsi_oltremare,data_corso_oltremare,scuola_extra,corso_extra,data_extra,abilitazionioni ) VALUES (" . $id_utente .
	",'" .$nome ."','".$cognome."','".$sede ."','" .$corsi_oltremare ."','" .$data_corso_oltremare ."','" .$scuola_extra ."','".$corso_extra."','" .$data_extra."','".$abilitazionioni."');";

$result = $mysqli->query($sql);
  $arr = array();
    if(mysqli_num_rows($result) != 0) 
    {  
       while($row = mysqli_fetch_assoc($result)) 
       {
         $arr[] = $row;
       }
       $myfile = fopen("formazione.json", "w") or die("Unable to open file!");
       $txt =json_encode($arr);
       fwrite($myfile, $txt);
       fclose($myfile);
     }


echo true;


?>