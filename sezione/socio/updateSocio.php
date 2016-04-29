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
$tess_uisp = mysqli_real_escape_string($mysqli, $data->tess_uisp);
$uisp_numero = mysqli_real_escape_string($mysqli, $data->uisp_numero);
$datarilascio = mysqli_real_escape_string($mysqli, $data->datarilascio);
$certificato = mysqli_real_escape_string($mysqli, $data->certificato);
$foto_cert =  mysqli_real_escape_string($mysqli, $data->foto_cert);
$fiv =  mysqli_real_escape_string($mysqli, $data->fiv);
$fiv_certificato =mysqli_real_escape_string($mysqli, $data->fiv_certificato); 
$patente = mysqli_real_escape_string($mysqli, $data->patente);
$patente_tipo = mysqli_real_escape_string($mysqli, $data->patente_tipo);
$data_scadenza_patente = mysqli_real_escape_string($mysqli, $data->data_scadenza_patente);
$fiv_scadenza = mysqli_real_escape_string($mysqli, $data->fiv_scadenza);

// mysqli query to insert the updated data
$query = "UPDATE cv_socio  SET id_utente ='" . $id_utente ."',tess_uisp ='" . $tess_uisp ."',uisp_numero='" . $uisp_numero ."',datarilascio='" .$datarilascio ."',certificato='" .$certificato .
"',foto_cert='" .$foto_cert ."',fiv='" .$fiv . "',fiv_certificato='" .$fiv_certificato .
"',patente='" .$patente ."',patente_tipo='" .$patente_tipo ."',data_scadenza_patente='" .$data_scadenza_patente ."',fiv_scadenza='". $fiv_scadenza ."' WHERE id=". $id ." AND id_utente=".$id_utente ;
mysqli_query($mysqli, $query);

/*  LOG 

    $myfile = fopen("log.txt", "w") or die("Unable to open file!");
    $txt =json_encode($query);
    fwrite($myfile, $txt);
    fclose($myfile);
/**/

  $sql = "SELECT * FROM cv_socio where id_utente =" . $id_utente;
  $result = $mysqli->query($sql);
  $arr = array();
    if(mysqli_num_rows($result) != 0) 
    {  
       while($row = mysqli_fetch_assoc($result)) 
       {
         $arr[] = $row;
       }
       $myfile = fopen("socio.json", "w") or die("Unable to open file!");
       $txt =json_encode($arr);
       fwrite($myfile, $txt);
       fclose($myfile);
     }


echo true;
?>