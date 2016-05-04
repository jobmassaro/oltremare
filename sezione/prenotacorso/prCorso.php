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

$nome_corso = mysqli_real_escape_string($mysqli, $data->nome_corso);
$stagione = mysqli_real_escape_string($mysqli, $data->stagione);

$user_surname;

var_dump($user_surname);

echo true;


?>

