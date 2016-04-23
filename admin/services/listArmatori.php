<?php
$host = "localhost";
$user = "root";
$password = "developer";
$database ="UOLTRE";

$mysqli = new mysqli($host, $user, $password, $database);
if(mysqli_connect_errno()){
  echo "Errore connessione al DB: ".mysqli_connect_error();
}


$arr = array();
$sql = "SELECT armatore, cantiere, modello, metri FROM cv_members";