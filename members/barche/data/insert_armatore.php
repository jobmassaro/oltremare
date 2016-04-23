<?php 

	$id_utente = $_POST['id_utente'];
	$nome = $_POST['name'];
	$cognome = $_POST['surname'];
	$armatore = $_POST['armatore'];
	$tipo = $_POST['tipo'];
	$attributo = $_POST['attribute_select'];
	$tipo = $_POST['tipo'];
	$modello = $_POST['modello'];
	$metri = $_POST['metri'];

/*	if($armatore == 1)
		$armatore = "SI";
	else
		$armatore = "NO";

	if($tipo == 1)
		$tipo = "Motore";
	else
		$tipo = "Vela";


	if($attributo == 1)
		$attributo = "Derive";
	if($attributo == 2)
		$attributo = "Multicab";
	if($attributo == 3)
		$attributo = "Monotipi";
	if($attributo == 4)
		$attributo = "Multi Sport";
	if($attributo == 5)
		$attributo = "Cabinati";
*/

	$servername = "localhost";
	$username = "root";
	$password = "developer";
	$dbname = "UOLTRE";

	$con = new mysqli($servername, $username, $password, $dbname);



	if ($con->connect_errno) {
    	echo "Connessione fallita: ". $con->connect_error . ".";
    	exit();
	}



	$sql = "SELECT * FROM cv_cantiere WHERE id = " . $modello;

	if ($result=mysqli_query($con,$sql))
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
			$modello =  $row['nome_cantiere'];
			$cantiere = $row['id'];
		}
			
	}


	$sql = "INSERT INTO cv_barche VALUES (NULL ,'$id_utente','$nome','$cognome','$armatore','$tipo','$cantiere','$modello','$metri')";
	$con->query($sql);
	$con->close();
	header('Location: ../../../manager-users.php');
	exit;

/*	var_dump($sql);
	var_dump($id_utente);
	var_dump($nome);
	var_dump($surname);
	var_dump($armatore);
	var_dump($tipo);
	var_dump($attributo);
	var_dump("CANTIERE " .$cantiere);
	var_dump("MODELLOO" .$modello);
	var_dump($metri);*/





?>