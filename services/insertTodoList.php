<?php


$servername = "localhost";
$username = "root";
$password = "developer";
$dbname = "oltremare";


$con = new mysqli($servername, $username, $password, $dbname);



if ($con->connect_errno) {
    echo "Connessione fallita: ". $con->connect_error . ".";
    exit();
}



$data = json_decode(file_get_contents("php://input")); 
$titolo = mysqli_real_escape_string($con, $data->titolo);
$descrizione = mysqli_real_escape_string($con, $data->descrizione);
$date = mysqli_real_escape_string($con, $data->date);
$completated = 'false';
$show_date = date('Y-m-d', strtotime($date));


$query = "INSERT into cv_todolist (id,completated,titolo,descrizione,date) VALUES (null,'$completated','$titolo','$descrizione','$show_date')";
mysqli_query($con, $query);
echo true;
?>