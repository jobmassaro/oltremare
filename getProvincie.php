<?php include('auth/db-connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $meta_description;?>">
    <meta name="author" content="">
    <title><?php echo $site_title;?></title>
    <!-- Bootstrap Core CSS -->

   <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
	
	<link href="assets/css/login.css" rel="stylesheet"> 
	<!--<link href="assets/fonts/css/fa.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php

$provincie = file('listacomuni.txt');

for($row = 0; $row < count($provincie); $row++)
{
    if($row != 0 )
	{
		$header = explode(';', $provincie[$row]);
		for($count= 0; $count < count($header); $count++)
		{
            if($count == 1)
                $comune = $header[$count];
            if($count == 2)
                $provincia = $header[$count];
            if($count == 3)
            {
                
                //echo 'abb. regione: ' . $header[$count] .'<br/>';
                $abb = $header[$count];

                if($header[$count] == 'VDA')
                    $regione ="VALLE D\\'AOSTA";
                
                if($header[$count] == 'PIE')
                    $regione = 'PIEMONTE';
                
                if($header[$count] == 'LIG')
                    $regione = 'LIGURIA';
                if($header[$count] == 'LOM')
                    $regione = 'LOMBARDIA';
                if($header[$count] == 'TAA')
                    $regione = 'TRENTINO ALTO ADIGE';
                if($header[$count] == 'VEN')
                    $regione = 'VENETO';
                if($header[$count] == 'FVG')
                    $regione = 'FRIULI VENEZIA GIULIA';
                if($header[$count] == 'EMR')
                    $regione = 'EMILIA ROMAGNA';
                if($header[$count] == 'TOS')
                    $regione = 'TOSCANA';
                if($header[$count] == 'UMB')
                    $regione = 'UMBRIA';
                if($header[$count] == 'MAR')
                    $regione = 'MARCHE';
                if($header[$count] == 'ABR')
                    $regione = 'ABRUZZO';
                if($header[$count] == 'LAZ')
                    $regione = 'LAZIO';
                if($header[$count] == 'MOL')
                    $regione = 'MOLISE';
                if($header[$count] == 'CAM')
                    $regione = 'CAMPANIA';
                if($header[$count] == 'PUG')
                    $regione = 'PUGLIA';
                if($header[$count] == 'BAS')
                    $regione = 'BASILICATA';
                if($header[$count] == 'CAL')
                    $regione = 'CALABRIA';
                if($header[$count] == 'SIC')
                    $regione = 'SICILIA';
                if($header[$count] == 'SAR')
                    $regione = 'SARDEGNA';

            }
                
            if($count == 5){

               
                
                $replace = "'"; 
                    
                $comune = str_replace($replace,"\'",$comune);

                 $sql = "INSERT INTO cv_provincie (id,comune,provincia,regione,abbreviazione,cap) VALUES( ".
                "null,'" . $comune. "','" .$provincia . "','" .$regione . "','" .$abb . "','" .$header[$count] . "');";


                if($mysqli->query($sql) === TRUE)
                {
                   // echo 'Database Provincie insertito/aggiornato con successo';
                }else
                {
                    echo 'Errore ' .$sql .'<br>'.$mysqli->error;
                }


            }
                
		}
		
		
	}
}


?>



<table class="table table-striped">
  


</table>