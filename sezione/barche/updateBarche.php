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
$tipo = mysqli_real_escape_string($mysqli, $data->tipo);
$armatore = mysqli_real_escape_string($mysqli, $data->armatore);
$modello = mysqli_real_escape_string($mysqli, $data->modello);
$cantiere= mysqli_real_escape_string($mysqli, $data->cantiere);
$nome_cantiere = mysqli_real_escape_string($mysqli, $data->nome_cantiere);
$metri = mysqli_real_escape_string($mysqli, $data->metri);

$sql = "UPDATE cv_barche SET id_utente =".$id_utente .",nome='".$nome . "',cognome='" . $cognome. "',armatore='" .$armatore ."',tipo='". $tipo ."',cantiere='" . $cantiere . "',modello='" . $modello . "',metri ='" . $metri. "' WHERE id_utente=". $id_utente ." AND id=" .$id;


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

         