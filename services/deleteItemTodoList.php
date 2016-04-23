<?php

$servername = "localhost";
$username = "root";
$password = "developer";
$dbname = "UOLTRE";


$con = new mysqli($servername, $username, $password, $dbname);



if ($con->connect_errno) {
    echo "Connessione fallita: ". $con->connect_error . ".";
    exit();
}

$data = json_decode(file_get_contents("php://input")); 
$id = mysqli_real_escape_string($con, $data->id);


$query = "DELETE FROM cv_todolist WHERE id ='$id'";
mysqli_query($con, $query);
echo true;