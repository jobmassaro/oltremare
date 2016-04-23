<?php
//PROTECT THIS PAGE - REQUIRE LOGIN TO ACCESS
include('auth/protect.php');
//REDIRECT IF NOT ADMIN LEVEL 1 USER
if($user_level!='1'){header('Location: dashboard');}

include('data/data-functions.php');
include('lang/translate.php');
//SITE SETTINGS
list($meta_title, $meta_description, $site_title, $site_email, $site_logo) = all_settings(); 


$reg_errors = array();
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
	$uid = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
	$id_utente = filter_input(INPUT_POST, 'id_utente', FILTER_SANITIZE_STRING);


	if(!empty($_FILES["profilo_pic"]) ) 
	{

		 if (is_uploaded_file($_FILES["profilo_pic"]["tmp_name"])) 
		 {
	    	$filename = time() . '_' . $_FILES["profilo_pic"]["name"];
	    	$filepath = 'profile_pic/' . $filename;
    
	    	if (!move_uploaded_file($_FILES["profilo_pic"]["tmp_name"], $filepath)) 
	    	{
	      		$error = TRUE;
	    	}
  		}

  	}
	
	if(!empty($_FILES["certificato_pic"]))
	{
  		if (is_uploaded_file($_FILES["certificato_pic"]["tmp_name"])) 
	 	{
    		$filename = time() . '_' . $_FILES["certificato_pic"]["name"];
    		$filepath2 = 'profile_pic/' . $filename;
    
    		if (!move_uploaded_file($_FILES["certificato_pic"]["tmp_name"], $filepath)) 
    		{
      			$error = TRUE;
    		}
  		}

  	}

	

		$sql = "SELECT profilo_pic,certificato_pic FROM " .$prefix ."members" ." WHERE id=" .$uid ." LIMIT 1";
	
		$result = $mysqli->query($sql);
		if($result) 
		{
			while($row = mysqli_fetch_assoc($result))
			{

				if(empty($filepath))
					$filepath =  $row['profilo_pic'];
				if(empty($filepath2))
					$filepath2 = $row['certificato_pic'];
			}
		}
	

	

	$comune = $_POST['comune'];
	
	$sql = "SELECT comune, provincia FROM " .$prefix ."provincie" ." WHERE id=" .$comune ." LIMIT 1";
	$result = $mysqli->query($sql);
	if($result) 
	{
		while($row = mysqli_fetch_assoc($result)){
			$comune = $row['comune'];
		}
	}

	
	
	$provincia = $_POST['provincia'];

	$sql = "SELECT comune, provincia FROM " .$prefix ."provincie" ." WHERE id=" .$provincia ." LIMIT 1";
	$result = $mysqli->query($sql);
	if($result) 
	{
		while($row = mysqli_fetch_assoc($result))
		{
			$provincia =$row['provincia'];
		}
	}

	
	
/*
	$sql ="INSERT INTO `cv_members` 
(`id`,`username`,`name`,`surname`,`email`,`via`,`civico`,`cap`,`comune`,`provincia`,`cod_fiscale`,`cod_piva`,`data_nascita`,`telefono`,`cellulare`,`certificatomedico`,`profilo_pic`,`certificato_pic`,`sesso`,`sposato`,`figli`,`professione`,`facebook`,`whatsapp`,`googleplus`,`twitter`,`patente`,`patente_tipo`,`data_scadenza_patente`,`uisp`,`uisp_numero`,`uisp_scadenza`,`certificato`,`armatore`,`miglia`,`fiv`,`fiv_scadenza`,`fiv_certificato`) 
VALUES". "(null,'". trim($_POST['name'])."','". trim($_POST['surname']) ."','". trim($_POST['username'])."','". 
		trim($_POST['email']) ."','".trim($_POST['indirizzo']) ."','".	trim($_POST['civico']) ."','" .trim($_POST['cap'])."','".
		$comune ."','".$provincia ."','" .trim($_POST['cod_fiscale']) ."','".trim($_POST['cod_piva']) ."','" .trim($_POST['data_nascita'])."','".
		trim($_POST['telefono']) ."','".trim($_POST['cellulare']) ."','" .trim($_POST['certificato']) ."','".$filepath ."','" .$filepath2 ."','".
		trim($_POST['sesso'])."','','','".trim($_POST['professione']) ."','".trim($_POST['facebook'])."','" .trim($_POST['whatsapp'])."','".
		trim($_POST['googleplus'])."','".trim($_POST['twitter']) ."','" .trim($_POST['patente']) ."','". trim($_POST['patente_tipo']) .
		"','" .trim($_POST['data_scadenza_patente'])."','".trim($_POST['uisp'])."','".trim($_POST['uisp_numero']). "','" .trim($_POST['uisp_scadenza']) ."','".
			trim($_POST['certificato']). "','','','','','');";

*/


$sql = "UPDATE cv_members ".
"SET username= '".trim($_POST['username']) ."'," .
"name = '".trim($_POST['name']) ."'," .
"surname = '" .trim($_POST['surname']) ."'," .
"email = '" .trim($_POST['email']) ."'," .
"via = '" .trim($_POST['indirizzo']) ."'," .
"civico = '" .trim($_POST['civico']) ."'," .
"cap = '" .trim($_POST['cap']) ."'," .
"comune = '" .$comune ."'," .
"provincia = '" .$provincia ."'," .
"cod_fiscale = '" .trim($_POST['cod_fiscale']) ."'," .
"cod_piva = '" .trim($_POST['cod_piva']) ."'," .
"data_nascita = '" .trim($_POST['data_nascita']) ."'," .
"telefono = '" .trim($_POST['telefono']) ."'," .
"cellulare = '" .trim($_POST['cellulare']) ."'," .
"certificato = '" .trim($_POST['certificato']) ."'," .
"profilo_pic = '"  .$filepath ."'," .
"certificato_pic ='" .$filepath2."'," .
"sesso ='" . trim($_POST['sesso'])."'," .
"professione ='" .trim($_POST['professione'])."'," .
"facebook ='".trim($_POST['facebook'])."',".
"whatsapp ='".trim($_POST['whatsapp'])."',".
"googleplus ='".trim($_POST['googleplus'])."',".
"twitter ='".trim($_POST['twitter'])."',".
"patente ='".trim($_POST['patente'])."',".
"patente_tipo ='".trim($_POST['patente_tipo'])."',".
"data_scadenza_patente ='".trim($_POST['data_scadenza_patente'])."',".
"uisp ='".trim($_POST['uisp'])."',".
"uisp_numero ='".trim($_POST['uisp_numero'])."',".
"uisp_scadenza ='".trim($_POST['uisp_scadenza'])."' WHERE id = ".$uid .";";
	

	echo '<b>' .$sql .'</b>';







	
	
//Contabilita
	echo '<br />';
echo '<br />';
echo 'CONTABILITA';
	echo '<br />';
	echo '<br />';
	var_dump("BANCA",trim($_POST['nome_banca']));
	echo '<br />';
	var_dump("ABI",trim($_POST['abi']));
	echo '<br />';
	var_dump("CAB",trim($_POST['cab']));
	echo '<br />';
	var_dump("CIN",trim($_POST['cin']));
	echo '<br />';
	var_dump("Conto",trim($_POST['contocorrente']));
	echo '<br />';
	var_dump("IBAN:",trim($_POST['iban']));
	echo '<br />';
	var_dump("Carta Credito",trim($_POST['cartacredito']));
	echo '<br />';
	var_dump("Data Scadenza",trim($_POST['datascadenzacc']));
	echo '<br />';
	var_dump("CCV",trim($_POST['ccv']));
	echo '<br />';
	var_dump("Data Contabile",trim($_POST['data_contabile']));
	echo '<br />';
	var_dump("Fattura",trim($_POST['prodotto']));
	echo '<br />';
	var_dump("quantita",trim($_POST['quantita']));
	echo '<br />';
	var_dump("descrizioni:",trim($_POST['descrizione']));
	echo '<br />';
	var_dump("rif.",trim($_POST['doc_riferimento']));
	echo '<br />';
	var_dump("importo",trim($_POST['importo']));
	echo '<br />';
	var_dump("acconto",trim($_POST['acconto']));
	echo '<br />';
	var_dump("iva",trim($_POST['iva']));
	echo '<br />';
	var_dump("totale",trim($_POST['totale']));
	echo '<br />';




	die();

}
