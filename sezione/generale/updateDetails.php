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

// Escaping special characters from updated data
$id = mysqli_real_escape_string($mysqli, $data->id);
$id_utente = mysqli_real_escape_string($mysqli, $data->id_utente);
$name = mysqli_real_escape_string($mysqli, $data->nome);
$surname = mysqli_real_escape_string($mysqli, $data->cognome);
$username = mysqli_real_escape_string($mysqli, $data->username);
$data_nascita = mysqli_real_escape_string($mysqli, $data->data_nascita);
$via = mysqli_real_escape_string($mysqli, $data->via);
$civico = mysqli_real_escape_string($mysqli, $data->civico);
$cap = mysqli_real_escape_string($mysqli, $data->cap);
$comune = mysqli_real_escape_string($mysqli, $data->comune);
$provincia = mysqli_real_escape_string($mysqli, $data->provincia);
$cod_fiscale = mysqli_real_escape_string($mysqli, $data->cod_fiscale);
$cod_piva = mysqli_real_escape_string($mysqli, $data->cod_piva);
$sesso = mysqli_real_escape_string($mysqli, $data->sesso);
$sposato = mysqli_real_escape_string($mysqli, $data->sposato);
$figli = mysqli_real_escape_string($mysqli, $data->figli);
$professione = mysqli_real_escape_string($mysqli, $data->professione);



$sql = "UPDATE cv_members SET name = '" .$name ."',surname='" .$surname ."' WHERE id_utente = " .$id_utente;
mysqli_query($mysqli, $sql);


$sql = "UPDATE cv_contabilita SET name = '" .$name ."',surname='" .$surname ."' WHERE id_utente = " .$id_utente;
mysqli_query($mysqli, $sql);


$sql = "UPDATE cv_barche SET nome = '" .$name ."',cognome='" .$surname ."' WHERE id_utente = " .$id_utente;
mysqli_query($mysqli, $sql);

$sql = "UPDATE cv_formazione_utente SET nome = '" .$name ."',cognome='" .$surname ."' WHERE id_utente = " .$id_utente;
mysqli_query($mysqli, $sql);

$sql = "UPDATE cv_recapiti SET nome = '" .$name ."',cognome='" .$surname ."' WHERE id_utente = " .$id_utente;
mysqli_query($mysqli, $sql);




// mysqli query to insert the updated data
$query = "UPDATE cv_generale  SET name ='" . $name ."',surname ='" . $surname ."',username='" . $username ."',data_nascita='" .$data_nascita ."',via='" .$via .
"',civico='" .$civico ."',cap='" .$cap ."',comune='" .$comune ."',provincia='". $provincia."',cod_fiscale='".$cod_fiscale."',cod_piva='" .$cod_piva ."',sesso='" .$sesso ."', sposato='" .$sposato. "',figli='" .$figli."',professione='" . $professione .
"' WHERE id=". $id ." AND id_utente=".$id_utente ;
mysqli_query($mysqli, $query);


  $sql = "SELECT * FROM cv_generale where id_utente =" . $id_utente;
  $result = $mysqli->query($sql);
  $arr = array();
    if(mysqli_num_rows($result) != 0) 
    {  
       while($row = mysqli_fetch_assoc($result)) 
       {
         $arr[] = $row;
       }
       $myfile = fopen("generale.json", "w") or die("Unable to open file!");
       $txt =json_encode($arr);
       fwrite($myfile, $txt);
       fclose($myfile);
     }


echo true;
?>