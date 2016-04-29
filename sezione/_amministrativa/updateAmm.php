<?php

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

// Escaping special characters from updated data
$id = mysqli_real_escape_string($mysqli, $data->id);
$id_utente = mysqli_real_escape_string($mysqli, $data->id_utente);
$banca = mysqli_real_escape_string($mysqli, $data->banca);
$abi = mysqli_real_escape_string($mysqli, $data->abi);
$cab = mysqli_real_escape_string($mysqli, $data->cab);
$cin = mysqli_real_escape_string($mysqli, $data->cin);
$cc =  mysqli_real_escape_string($mysqli, $data->cc);
$iban =  mysqli_real_escape_string($mysqli, $data->iban);
$carta_credito =mysqli_real_escape_string($mysqli, $data->carta_credito); 
$data_scadenza = mysqli_real_escape_string($mysqli, $data->data_scadenza);
/*$patente_tipo = mysqli_real_escape_string($mysqli, $data->patente_tipo);
$data_scadenza_patente = mysqli_real_escape_string($mysqli, $data->data_scadenza_patente);
$fiv_scadenza = mysqli_real_escape_string($mysqli, $data->fiv_scadenza);
*/
// mysqli query to insert the updated data
$query = "UPDATE cv_amministrazione  SET id_utente ='" . $id_utente ."',banca ='" . $banca ."',abi='" . $abi ."',cab='" .$cab ."',cin='" .$cin .
"',cc='" .$cc ."',iban='" .$iban . "',carta_credito='" .$carta_credito .
"',data_scadenza='" .$data_scadenza. "' WHERE id=". $id ." AND id_utente=".$id_utente ;
mysqli_query($mysqli, $query);

/*  LOG */

    $myfile = fopen("log.txt", "w") or die("Unable to open file!");
    $txt =json_encode($query);
    fwrite($myfile, $txt);
    fclose($myfile);
/**/

  $sql = "SELECT * FROM cv_amministrazione where id_utente =" . $id_utente;
  $result = $mysqli->query($sql);
  $arr = array();
    if(mysqli_num_rows($result) != 0) 
    {  
       while($row = mysqli_fetch_assoc($result)) 
       {
         $arr[] = $row;
       }
       $myfile = fopen("amministrativa.json", "w") or die("Unable to open file!");
       $txt =json_encode($arr);
       fwrite($myfile, $txt);
       fclose($myfile);
     }


echo true;
?>