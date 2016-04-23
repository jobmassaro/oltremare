<?php

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$offset = ($page-1)*$rows;
$result = array();




$servername = "localhost";
$username = "root";
$password = "developer";
$dbname = "UOLTRE";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_errno) {
   	echo "Connessione fallita: ". $con->connect_error . ".";
   	exit();
}
$id = intval($_REQUEST['id']);
$sql = "SELECT count(*) FROM cv_barca WHERE id_utente = " . $id ;
$rs = mysqli_query($con, $sql);
$row = mysqli_fetch_row($con, $rs);
$result["total"] = $row[0];
$sql2 = "SELECT * FROM cv_barca WHERE id_utente = " . $id ." limit ". $offset .',' . $rows ;
$rs = mysqli_query($con, $sql2);
$items = array();
while($row = mysqli_fetch_object($rs))
{
	array_push($items, $row);
}
$result["rows"] = $items;
echo json_encode($result);


?>