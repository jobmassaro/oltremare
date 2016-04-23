<?php
include('auth/protect.php');
//REDIRECT IF NOT ADMIN LEVEL 1 USER
if($user_level!='1'){header('Location: dashboard');}
//SITE SETTINGS
list($meta_title, $meta_description, $site_title, $site_email, $site_logo) = all_settings();
list($timeout_enabled, $warning_title, $warning_message, $inactivity_timer, $inactivity_warning)= inactivity_settings();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $meta_description;?>">
    <meta name="author" content="">

    <title><?php echo $meta_title;?></title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/base.css" rel="stylesheet">
    
        <!-- Font Awesome Icons -->
        <link href="assets/fonts/css/fa.css" rel="stylesheet">
        <!-- Webfont -->
        <link href='http://fonts.googleapis.com/css?family=Archivo+Narrow:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <!-- SweetAlert Plugin -->
        <link href="assets/css/plugins/sweetalert.css" rel="stylesheet" media="all">
        <!-- Datatables Plugin -->
        <link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css" rel="stylesheet" media="all">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 <style>
form#contact  {font-family:arial;font-size:100%;color:#000;}
form#contact label  {float:left;display:block;margin:3px 0;clear:both;}
form#contact input  {color:#000;margin:0 0 7px 0;border:1px solid #d8d8d8;width:220px;float:right;-moz-border-radius:9px;-webkit-border-radius:9px;background: url('gradient_white.png') repeat-x top left #efefef;padding:3px 10px;}
 
form#contact select {color:#000;margin:0 0 7px 0;border:1px solid #d8d8d8;width:240px;float:right;-moz-border-radius:9px;-webkit-border-radius:9px;background: url('gradient_white.png') repeat-x top left #efefef;padding:3px 5px 3px 10px;}
form#contact option {display:block;color:#666;}
 
form#contact textarea {color:#666; float:right;font-size:110%;font-family:arial;height:80px;border:1px solid #d8d8d8;width:220px;-moz-border-radius:12px;-webkit-border-radius:12px;background: url('gradient_white.png') repeat-x top left #efefef;padding:2px 10px;margin-bottom:10px;}
#send {background: url('gradient_black.png') repeat-x top left #a80329; clear:both;-moz-border-radius:15px;-webkit-border-radius:15px;border:0;cursor:pointer;color:#fff;margin-top:15px;float:right;font-weight:bold;font-size:110%;padding:5px 15px;}
.faulty_field{background:#fff4f4 !important;color:#ff0000;border:1px solid #ff0000 !important;}
label span {color:#ff0000;font-size:85%; }
 
#main{ width:500px; height:400px; margin:0 auto; padding:0;}
</style>

</head>

<body>

<?php include('assets/comp/top-nav.php');?>

<div id="page-content-wrapper">
    <div class="container-fluid">
            <div class="row">
                <!-- Start Panel -->
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading panel-warning">
                            <span class="title">Informazioni Utente</span>
                        </div>
                                                <br><br>
                                                <?php

                                                    $fname = '';
                                                    $lname = '';
                                                    $username = '';
                                                    $email = '';

                                                    
                                                    if($user_level=='2')
                                                    {
                                                        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
                                                        {
                                                            if(!empty($_POST['fname']))
                                                            {
                                                                $fname = $_POST['fname'];
                                                                echo $_POST['fname'];
                                                            }

                                                            if(!empty($_POST['lname']))
                                                            {
                                                                $lname = $_POST['lname'];
                                                                echo $_POST['fname'];
                                                            
                                                            }

                                                            if(!empty($_POST['username']))
                                                            {
                                                                $username = $_POST['username'];
                                                                echo $_POST['username'];
                                                            }

                                                            if(!empty($_POST['email']))
                                                            {
                                                                $email = $_POST['email'];
                                                                echo $email;    
                                                            }










                                                        }

                                                        $query = "SELECT * FROM ".$prefix."members WHERE  email = '" .$user_email ."'  LIMIT 1";
                                                    
                                                        if ($result = $mysqli->query($query))
                                                        {
                                                                while($row = $result->fetch_assoc())
                                                                {
                                                                    $fname = $row['name'];
                                                                    $lname = $row['surname'];
                                                                    $username = $row['username'];
                                                                    $email = $row['email'];

                                                                        
                                                                }
                                                        }

                                                        $query = "SELECT * FROM ".$prefix."profile_complete WHERE idmember = " .$uid ." LIMIT 1";
                                                        if($result = $mysqli->query($query))
                                                        {
                                                            $num_results = mysqli_num_rows($result);
                                                            if(!$num_results == 0 || !$num_results == null)
                                                            {
                                                                while($row = $result->fetch_assoc())
                                                                {
                                                                    $codfiscale = $row['codicefiscale'];
                                                                    $partitaiva  = $row['partitaiva'];
                                                                    $datanascita  = $row['datanascita'];
                                                                    $stato = $row['stato'];
                                                                    $sposato =$row['sposato'];
                                                                    $professione =$row['professione'];
                                                                    $sesso = $row['sesso'];
                                                                    $via =  $row['via'];
                                                                    $civico = $row['civico'];
                                                                    $cap  = $row['cap'];
                                                                    $comune  =  $row['comune'];
                                                                    $provincia = $row['provincia'];
                                                                    $numtelefono = $row['numtelefono'];
                                                                    $mobile =  $row['mobile'];
                                                                    $tshirt = $row['tshirt'];
                                                                    $caparra = $row['caparra'];
                                                                    $iban = $row['iban'];
                                                                    $numerocartacredito =  $row['numerocartacredito'];
                                                                    $codicefornitore = $row['codicefornitore'];
                                                                    $attivitafornitore = $row['attivitafornitore'];
                                                                    $numuisp =  $row['numuisp'];
                                                                    $datarilascio = $row['datarilascio'];
                                                                    $certificatomedico = $row['certificatomedico'];
                                                                    $uploadcertificato = $row['uploadcertificato']; 
                                                                    $datarilasciomedico = $row['datarilasciomedico'];
                                                                    $prezzotessera = $row['prezzotessera']; 
                                                                    $pagatoil = $row['pagatoil'];                
                                                                    $modalitapagamento = $row ['modalitapagamento'];
                                                                    $fattura = $row['fattura'];
                                                                    $numfattura = $row['numfattura'];                           
                                                                    $datafattura  =$row['datafattura'];                         
                                                             
                                                                }
                                                                
                                                            }
                                                        }   


                                                    }
        


                                                ?>



<form method="POST" action="profile-user.php" id="edit-form">
<div class="container">
<div class="col-sm-12">
    <div class="row">
    </div>  
</div>
<!-- -->

<div id="wrapper">
    <input id="fileUpload" type="file" multiple />
    <br />
    <div id="image-holder"></div>
</div>


<!-- -->


<div class="form-group col-sm-3">
<div class="list-group">
  <a href="#">
    <legend><span>Dati</span></legend>
  </a>
    <label for="inputFName">Nome:</label>
    <input type="text" class="form-control" required="required" id="inputFName" value="<?php echo !empty($fname)?$fname:''; ?>" name="fname" placeholder="Nome">
    <span class="help-block"></span>
    

    <label for="lname">Cognome:</label>
    <input type="text" class="form-control" required="required" id="lname" value="<?php echo !empty($lname)?$lname:''; ?>" name="lname" placeholder="Cognome">
    <span class="help-block"></span>
    
    <label for="username">Username:</label>
    <input type="text" class="form-control" required="required" id="username" value="<?php echo !empty($username)?$username:''; ?>" name="username" placeholder="Username">
    <span class="help-block"></span>
    
    <label for="email">Email:</label>
    <input type="text" class="form-control" required="required" id="email" value="<?php echo !empty($email)?$email:''; ?>" name="email" placeholder="Email">
    <span class="help-block"></span>
    
    <label for="codfiscale">CodiceFiscale:<span>(richiesto)</span></label><a name="codfiscale"></a></label>
    <input type="text" class="form-control" required id="codfiscale" value="<?php echo !empty($codfiscale)?$codfiscale:'000'; ?>" name="codfiscale" placeholder="CodiceFiscale">
    <span class="help-block"></span>

    <?php 
    if($user_level== 1 || $user_level == 4) { ?>
    <label for="partitaiva">PartitaIva:</label>
    <input type="text" class="form-control" required="required" id="partitaiva" value="<?php echo !empty($partitaiva)?$partitaiva:'000'; ?>" name="partitaiva" placeholder="Partita Iva">
    <span class="help-block"></span>
    <?php } ?>

    <label for="datanascita">Data Nascita:<span>(richiesto)</span></label><a name="datanascita"></a></label><br />
    <input type="text" id="datanascita" value="<?php echo !empty($datanascita)?$datanascita:''; ?>" name="datanascita" placeholder="Data Nascita" />
    <div id='log'></div>
    <span class="help-block"></span>

    <?php 

    $table_name = $prefix . "profile_complete";
    $column_name = "sesso";

    $query = "SELECT COLUMN_TYPE  FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'";
    
        echo "<label for='sesso'>Sesso:</label><br />";
        echo "<select name=\"$column_name\" id='sesso'>";

            $result = $mysqli->query($query);

    $row = $result->fetch_assoc();
        $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));

    foreach($enumList as $value)
     echo "<option value=\"$value\">$value</option>";

    echo "</select><span class='help-block'></span>";

?>
    <label for="professione">Professione:<span>(richiesto)</span></label><a name="professione"></a></label>
    <input type="text" class="form-control" required="required" id="professione" value="<?php echo !empty($professione)?$professione:''; ?>" name="professione" placeholder="professione">
    <span class="help-block"></span>


    </div>
</div>





<div class="form-group col-sm-3">
    <div class="list-group">
  <a href="#" class="list-group-item disabled" style="text-align:center;">
    <b> Dati Personali</b>
  </a>
    
    <label for="via">Via:<span>(richiesto)</span></label><a name="professione"></a></label>
    <input type="text" class="form-control" required="required" id="via" value="<?php echo !empty($via)?$via:''; ?>" name="via" placeholder="via">
    <span class="help-block"></span>
    
    <label for="civico">Num.Civico:<span>(richiesto)</span></label><a name="professione"></a></label>
    <input type="text" class="form-control" required="required" id="civico" value="<?php echo !empty($civico)?$civico:''; ?>" name="civico" placeholder="numero civico">
    <span class="help-block"></span>

    <label for="cap">Cap:<span>(richiesto)</span></label><a name="professione"></a></label>
    <input type="text" class="form-control" required="required" id="cap" value="<?php echo !empty($cap)?$cap:''; ?>" name="cap" placeholder="cap">
    <span class="help-block"></span>

    <label for="comune">Comune:<span>(richiesto)</span></label><a name="professione"></a></label>
    <input type="text" class="form-control" required="required" id="comune" value="<?php echo !empty($comune)?$comune:''; ?>" name="comune" placeholder="comune">
    <span class="help-block"></span>
    
    <label for="provincia">Provincia:<span>(richiesto)</span></label><a name="professione"></a></label>
    <input type="text" class="form-control" required="required" id="provincia" value="<?php echo !empty($provincia)?$provincia:''; ?>" name="provincia" placeholder="provincia">
    <span class="help-block"></span>

    <?php 

        $table_name = $prefix . "profile_complete";
        $column_name = "sposato";

        $query = "SELECT COLUMN_TYPE  FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'";
        
            echo "<label for='sposato'>Sposato:</label><br />";
            echo "<select name=\"$column_name\" id='sposato'>";

                $result = $mysqli->query($query);

        $row = $result->fetch_assoc();
            $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));

        foreach($enumList as $value)
         echo "<option value=\"$value\">$value</option>";

        echo "</select><span class='help-block'></span>";

    ?>

    
    <label for="telefono">Telefono:<span>(richiesto)</span></label><a name="professione"></a></label>
    <input type="text" class="form-control" required="required" id="numtelefono" value="<?php echo !empty($numtelefono)?$numtelefono:''; ?>" name="numtelefono" placeholder="telefono">
    <span class="help-block"></span>

    <label for="mobile">Mobile:<span>(richiesto)</span></label><a name="professione"></a></label>
    <input type="text" class="form-control" required="required" id="inputMobile" value="<?php echo !empty($mobile)?$mobile:''; ?>" name="mobile" placeholder="phone">
    <span class="help-block"></span>

<?php 

    $table_name = $prefix . "profile_complete";
    $column_name = "tshirt";

    $query = "SELECT COLUMN_TYPE  FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'";
    
        echo "<label for='tshirt'>Tshirt:</label><br />";
        echo "<select name=\"$column_name\" id='tshirt'>";

            $result = $mysqli->query($query);

    $row = $result->fetch_assoc();
        $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));

    foreach($enumList as $value)
         echo "<option value=\"$value\">$value</option>";

    echo "</select> <span class='help-block'></span>";

?>
    </div>
</div>
<div class="form-group col-sm-3">   
    <div class="list-group">
     <a href="#" class="list-group-item disabled" style="text-align:center;">
      <b>Dati Economici</b>
     </a>


    <label for="caparra">Acconto:</label>
    <input readonly type="text" class="form-control" id="caparra" value="<?php echo !empty($caparra)?$caparra:''; ?>" name="caparra" placeholder="0.00">
    <span class="help-block"></span>

    <label for="iban">IBAN:</label>
    <input readonly type="text" class="form-control"  id="iban" value="<?php echo !empty($iban)?$iban:''; ?>" name="iban" placeholder="IT60X0542811101000000123456">
    <span class="help-block"></span>
    
    <label for="numcredit">Carta Credito:</label>
    <input readonly type="text" class="form-control" id="numcredit" value="<?php echo !empty($numerocartacredito)?$numerocartacredito:''; ?>" name="numcredit" placeholder="4222222222222">
    <span class="help-block"></span>

</div>
    <div class="list-group">
     <a href="#" class="list-group-item disabled" style="text-align:center;">
      <b>Fornitore </b>
     </a>

    <label for="codicefornitore">Codice Fornitore:</label>
    <input readonly type="text" class="form-control" id="codicefornitore" value="<?php echo !empty($codicefornitore)?$codicefornitore:''; ?>" name="codicefornitore" placeholder="codicefornitore">
    <span class="help-block"></span>
    
    <label for="attivitafornitore">Attivita' Fornitore:</label>
    <input  readonly type="text" class="form-control" id="attivitafornitore" value="<?php echo !empty($attivitafornitore)?$attivitafornitore:''; ?>" name="attivitafornitore" placeholder="codicefornitore">
    <span class="help-block"></span>    
    </div>
    <div class="list-group">
         <a href="#" class="list-group-item disabled" style="text-align:center;">
            <b>Tutor </b>
        </a>
        <label for="tutor">Tutor associato:</label>
        <input readonly type="text" class="form-control" id="tutor" value="<?php echo !empty($tutor)?$tutor:''; ?>" name="tutor" placeholder="tutor">
        <span class="help-block"></span>
    </div>
</div>
<div class="form-group col-sm-3">   
    <div class="list-group">
        <a href="#" class="list-group-item disabled" style="text-align:center;">
        <b>Socio UISP </b>
     </a>   
        <label for="numuisp">Num UISP:</label>
        <input readonly type="text" class="form-control" id="numuisp" value="<?php echo !empty($numuisp)?$numuisp:''; ?>" name="numuisp" placeholder="numero uisp">
        <span class="help-block"></span>

        <label for="datarilascio">Data Rilascio:</label>
        <input readonly type="text" class="form-control" id="datarilascio" value="<?php echo !empty($datarilascio)?$datarilascio:''; ?>" name="datarilascio" placeholder="data rilascio">
        <span class="help-block"><?php echo $fnameError;?></span>

<?php 

    $table_name = $prefix . "profile_complete";
    $column_name = "certificatomedico";

    $query = "SELECT COLUMN_TYPE  FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'";
    
        echo "<label for='certificatomedico'>Certificato medico:</label><br />";
        echo "<select name=\"$column_name\" id='certificatomedico'>";

            $result = $mysqli->query($query);

    $row = $result->fetch_assoc();
        $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));

    foreach($enumList as $value)
         echo "<option value=\"$value\">$value</option>";

    echo "</select> <span class='help-block'></span>";

?>


        <label for="datarilasciomedico">Data Rilascio Medico:</label>
        <input readonly type="text" class="form-control" id="datarilasciomedico" value="<?php echo !empty($datarilasciomedico)?$datarilasciomedico:''; ?>" name="datarilasciomedico" placeholder="data rilascio">
        <span class="help-block"><?php echo $fnameError;?></span>   

        <label for="prezzotessera">Prezzo Tessera:</label>
        <input readonly type="text" class="form-control" id="prezzotessera" value="<?php echo !empty($prezzotessera)?$prezzotessera:''; ?>" name="prezzotessera" placeholder="Prezzo Tessera">
        <span class="help-block"><?php echo $fnameError;?></span>   
    
        <label for="pagatoil">Pagato il:</label>
        <input readonly type="text" class="form-control" id="pagatoil" value="<?php echo !empty($pagatoil)?$pagatoil:''; ?>" name="pagatoil" placeholder="Pagato il">
        <span class="help-block"><?php echo $fnameError;?></span>   

<?php 

    $table_name = $prefix . "profile_complete";
    $column_name = "modalitapagamento";

    $query = "SELECT COLUMN_TYPE  FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'";
    
        echo "<label for='modalitapagamento'>Modalita pagamento:</label><br />";
        echo "<select name=\"$column_name\" id='modalitapagamento'>";

            $result = $mysqli->query($query);

    $row = $result->fetch_assoc();
        $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));

    foreach($enumList as $value)
         echo "<option value=\"$value\">$value</option>";

    echo "</select> <span class='help-block'></span>";

?>


        <!--<label for="fattura">Fattura:</label>
        <input type="text" class="form-control" id="fattura" value="" name="fattura" placeholder="Fattura">
        <span class="help-block"><?php echo $fnameError;?></span>   -->

        <label for="numfattura">Fattura Num:</label>
        <input readonly type="text" class="form-control" id="numfattura" value="<?php echo !empty($numfattura)?$numfattura:''; ?>" name="numfattura" placeholder="Fattura">
        <span class="help-block"></span>    

        <label for="datafattura">Data Fattura:</label>
        <input readonly type="text" class="form-control" id="datafattura" value="<?php echo !empty($datafattura)?$datafattura:''; ?>" name="datafattura" placeholder="Fattura">
        <span class="help-block"></span>    
    
    </div>

</div>
</div>
    <div class="form-actions">
        <input type="hidden" value="<?php echo $uid; ?>" name="idmember" id="idmember" />
        <button type="submit" class="btn btn-lg btn-primary">AGGIORNA</button>
        <a class="btn btn-lg btn-default" href="./dashboard.php">INDIETRO</a>
    </div>


                                                                            </form>
  
                                                    <!-- SIMULATE PAYMENT - REMOVE ME FOR PRODUCTION-->
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Panel -->
                                </div>
                            </div>
            </div>
        </div>
        <!-- End Page Content -->

    </div><!-- End Main Wrapper  -->
   

