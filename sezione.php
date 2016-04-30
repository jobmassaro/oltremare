<?php
//PROTECT THIS PAGE - REQUIRE LOGIN TO ACCESS
include('auth/protect.php');
//REDIRECT IF NOT ADMIN LEVEL 1 USER
if($user_level!='1'){header('Location: dashboard.php');}

include('data/data-functions.php');
include('lang/translate.php');
//SITE SETTINGS
list($meta_title, $meta_description, $site_title, $site_email, $site_logo) = all_settings();
setlocale(LC_MONETARY, 'it_IT');


  $uid = filter_input(INPUT_POST, 'm', FILTER_SANITIZE_STRING);

  $servername = "localhost";
  $username = "root";
  $password = "developer";
  $dbname = "oltremare";
  

  $mysqli = new mysqli($servername, $username, $password, $dbname);
  

  if ($mysqli->connect_errno) {
      echo "Connessione fallita: ". $mysqli->connect_error . ".";
      exit();
  }
     

  $sql = "SELECT id_utente FROM cv_barche where id_utente =" . $uid ;
  $result = $mysqli->query($sql);
  $numero_righe_presenti  = mysqli_num_rows($result);
 
  if( $numero_righe_presenti === 0) 
  {
    $s = "INSERT INTO cv_barche (id_utente,nome,cognome) SELECT id_utente,name as nome, surname as cognome FROM cv_generale where id_utente =" . $uid;

/*  LOG 

    $myfile = fopen("sezione/log.json", "w") or die("Unable to open file!");
    $txt =json_encode($s);
    fwrite($myfile, $txt);
    fclose($myfile);
*/
    $r1 = $mysqli->query($s);  
  }

  

  $sql = "SELECT * FROM cv_generale where id_utente =" . $uid ;
  $result = $mysqli->query($sql);
  $arr = array();
    if(mysqli_num_rows($result) != 0) 
    {  
       while($row = mysqli_fetch_assoc($result)) 
       {
         $arr[] = $row;
       }
       unlink("sezione/generale/generale.json");
       $myfile = fopen("sezione/generale/generale.json", "w") or die("Unable to open file!");
       $txt =json_encode($arr);
       fwrite($myfile, $txt);
       fclose($myfile);
     }




      // TAB SOCIO 
      $sql = "SELECT * FROM cv_socio WHERE id_utente =" . $uid . " LIMIT 1";
      $result = $mysqli->query($sql);
      $arr = array();
      if(mysqli_num_rows($result) != 0) 
      {
         while($row = mysqli_fetch_assoc($result)) 
         {
           $arr[] = $row;
         }
        $myfile = fopen("sezione/socio/socio.json", "w") or die("Unable to open file!");
        $txt =json_encode($arr);
        fwrite($myfile, $txt);
        fclose($myfile);
      }else
      {

        $sql = "INSERT INTO cv_socio (id_utente, tess_uisp, uisp_numero, datarilascio,certificato,fiv,fiv_scadenza,fiv_certificato,patente,patente_tipo,data_scadenza_patente) " .
          " SELECT id_utente, uisp as tess_uisp, uisp_numero, uisp_datarilascio as datarilascio ,certificato, fiv, fiv_scadenza,fiv_certificato,patente,patente_tipo,data_scadenza_patente FROM cv_members WHERE id_utente =" .$uid;
        
   


        $result = $mysqli->query($sql);
        $arr = array();
        if(mysqli_num_rows($result) != 0) 
        {
           while($row = mysqli_fetch_assoc($result)) 
           {
             $arr[] = $row;
           }
           $myfile = fopen("sezione/socio/socio.json", "w") or die("Unable to open file!");
           $txt =json_encode($arr);
           fwrite($myfile, $txt);
           fclose($myfile);
            
        }
      }

      //TAB INFO BANCA

      $sql = "SELECT * FROM cv_amministrazione WHERE id_utente =" . $uid . " LIMIT 1";
      $result = $mysqli->query($sql);
      $arr = array();
      if(mysqli_num_rows($result) != 0) 
      {
         while($row = mysqli_fetch_assoc($result)) 
         {
           $arr[] = $row;
         }

         /*  LOG */

        /*  $myfile = fopen("log.txt", "w") or die("Unable to open file!");
          $txt =json_encode($sql);
          fwrite($myfile, $txt);
          fclose($myfile);
    /**/
          
          $myfile = fopen("sezione/infobanca/infobanca.json", "w") or die("Unable to open file!");
          $txt =json_encode($arr);
          fwrite($myfile, $txt);
          fclose($myfile);
      }else
      {

         $sql = "INSERT INTO cv_amministrazione (id_utente) " .
          "SELECT id_utente FROM cv_members WHERE id_utente =" .$uid;
    
          $result = $mysqli->query($sql);
          $arr = array();
          if(mysqli_num_rows($result) != 0) 
          {
           while($row = mysqli_fetch_assoc($result)) 
           {
             $arr[] = $row;
           }
           $myfile = fopen("sezione/infobanca/infobanca.json", "w") or die("Unable to open file!");
           $txt =json_encode($arr);
           fwrite($myfile, $txt);
           fclose($myfile);
            
        }





      }
  

       //TAB CONTABILITA
      $sql = "SELECT * FROM cv_contabilita WHERE id_utente =" .$uid;
      $result = $mysqli->query($sql);
      $arr = array();
      if(mysqli_num_rows($result) != 0) 
      {
         while($row = mysqli_fetch_assoc($result)) 
         {
           $arr[] = $row;
         }
         
         $myfile = fopen("sezione/contabilita/contabilita.json", "w") or die("Unable to open file!");
         $txt =json_encode($arr);
         fwrite($myfile, $txt);
         fclose($myfile);
      }else{
        $sql = "INSERT INTO cv_contabilita (id_utente, name, surname) SELECT id_utente, name,surname FROM cv_members WHERE id_utente =" .$uid;
        $result = $mysqli->query($sql);
        $arr = array();
        if(mysqli_num_rows($result) != 0) 
        {
           while($row = mysqli_fetch_assoc($result)) 
           {
             $arr[] = $row;
           }
           $myfile = fopen("sezione/contabilita/contabilita.json", "w") or die("Unable to open file!");
            $txt =json_encode($arr);
            fwrite($myfile, $txt);
            fclose($myfile);
        }
      }
  






      //TAB BARCHE
      $sql = "SELECT b.* FROM cv_armatore as b where b.id_utente = " .$uid;
      $result = $mysqli->query($sql);

      $arr = array();
      if(mysqli_num_rows($result) != 0) 
      {
         while($row = mysqli_fetch_assoc($result)) 
         {
          
          if($row['armatore'] == 1)
            $row['armatore'] = 'SI';
          if($row['armatore'] == 2 || $row['armatore'] == "")
            $row['armatore'] = 'NO';


          if($row['tipo'] == 1)
            $row['tipo'] = 'vela';
          if($row['tipo'] == 2 )
            $row['tipo'] = 'motore';



           $arr[] = $row;
         }
            unlink("sezione/barche/barche.json");
            $myfile = fopen("sezione/barche/barche.json", "w") or die("Unable to open file!");
            $txt =json_encode($arr);
            fwrite($myfile, $txt);
            fclose($myfile);
         }else{
              /* SE non presente nella tabella rmatore*/
               $sql = "SELECT * FROM cv_barche where id_utente = " .$uid;
               $result = $mysqli->query($sql);
               $arr = array();
                if(mysqli_num_rows($result) != 0)
                {
                  while($row = mysqli_fetch_assoc($result)) 
                  {
                    $arr[] = $row;
                  }
                }
              unlink("sezione/barche/barche.json");
              $myfile = fopen("sezione/barche/barche.json", "w") or die("Unable to open file!");
              $txt =json_encode($arr);
              fwrite($myfile, $txt);
              fclose($myfile);
           } 

      //TAB FORMAZIONE
          $sql = "SELECT * from cv_formazione_utente  WHERE id_utente =" .$uid ;
          $result = $mysqli->query($sql);
            $arr = array();
            if(mysqli_num_rows($result) != 0) 
            {
                while($row = mysqli_fetch_assoc($result)) 
                {
                  $arr[] = $row;  
                }

             
              $myfile = fopen("sezione/formazione/formazione.json", "w") or die("Unable to open file!");
              $txt =json_encode($arr);
              fwrite($myfile, $txt);
              fclose($myfile);

           }else{
               $sql = "INSERT INTO cv_formazione_utente (id_utente,nome,cognome) SELECT id_utente, name as nome, surname as cognome FROM cv_generale WHERE id_utente = ". $uid;
               $result = $mysqli->query($sql);
               $arr = array();
                if(mysqli_num_rows($result) != 0)
                {
                  while($row = mysqli_fetch_assoc($result)) 
                  {
                    $arr[] = $row;
                  }
                }
              unlink("sezione/formazione/formazione.json");
              $myfile = fopen("sezione/formazione/formazione.json", "w") or die("Unable to open file!");
              $txt =json_encode($arr);
              fwrite($myfile, $txt);
              fclose($myfile);
           } 

           //TAB AMICO
           unlink("sezione/amico/amico.json");
          $sql = "SELECT * FROM cv_amico WHERE id_utente = " .$uid;
          $result = $mysqli->query($sql);
          $arr = array();
          
          if(mysqli_num_rows($result) != 0) 
           {
               while($row = mysqli_fetch_assoc($result)) 
               {
                  $arr[] = $row;  
               }
            $myfile = fopen("sezione/amico/amico.json", "w") or die("Unable to open file!");
            $txt =json_encode($arr);
            fwrite($myfile, $txt);
            fclose($myfile);  
           }else{
                $sql = "INSERT INTO cv_amico (id_utente) SELECT id_utente FROM cv_generale WHERE id_utente = ". $uid;
                $result = $mysqli->query($sql);
                $arr = array();
                if(mysqli_num_rows($result) != 0)
                {
                  while($row = mysqli_fetch_assoc($result)) 
                  {
                    $arr[] = $row;
                  }
                }
              unlink("sezione/amico/amico.json");
              $myfile = fopen("sezione/amico/amico.json", "w") or die("Unable to open file!");
              $txt =json_encode($arr);
              fwrite($myfile, $txt);
              fclose($myfile);
           }


      
          //TAB FORMAZIONE
          $sql = "SELECT * from cv_recapiti  WHERE id_utente =" .$uid ;
          $result = $mysqli->query($sql);
            $arr = array();
            if(mysqli_num_rows($result) != 0) 
            {
                while($row = mysqli_fetch_assoc($result)) 
                {
                  $arr[] = $row;  
                }
              $myfile = fopen("sezione/recapiti/recapiti.json", "w") or die("Unable to open file!");
              $txt =json_encode($arr);
              fwrite($myfile, $txt);
              fclose($myfile);

           }else{
               $sql = "INSERT INTO cv_recapiti (id_utente,nome,cognome) SELECT id_utente, name as nome, surname as cognome FROM cv_generale WHERE id_utente = ". $uid;
               $result = $mysqli->query($sql);
               $arr = array();
                if(mysqli_num_rows($result) != 0)
                {
                  while($row = mysqli_fetch_assoc($result)) 
                  {
                    $arr[] = $row;
                  }
                }
              unlink("sezione/recapiti/recapiti.json");
              $myfile = fopen("sezione/recapiti/recapiti.json", "w") or die("Unable to open file!");
              $txt =json_encode($arr);
              fwrite($myfile, $txt);
              fclose($myfile);
           }            

   

          //TAB STAMPA
          $sql = "SELECT g.name, g.surname, s.fiv, s.fiv_scadenza, s.tess_uisp, s.uisp_numero, f.abilitazione, f.attivita, f.scuola, f.sede, f.anno  FROM oltremare.cv_socio as s, oltremare.cv_generale as g, oltremare.cv_formazione_utente as f where s.id_utente =" .$uid . " and f.id_utente =" .$uid . " and g.id_utente =" .$uid ;
          $result = $mysqli->query($sql);
          $arr = array();
          $arr1 = array();
          if(mysqli_num_rows($result) != 0) 
           {
             while($row = mysqli_fetch_assoc($result)) 
             {
                $arr1[] = $row;
                $arr = $row['name'] .';'. $row['surname'] .';'.$row['fiv'] .';'.$row['fiv_scadenza'] .';'.$row['tess_uisp'] .';'.$row['uisp_numero'] .';'.$row['abilitazione']. ';' . $row['attivita'] . ';' .$row['scuola'] . ';' .$row['sede']. ';' .$row['anno'];
                

             }

            /* PER STAMPA*/
            $myfile = fopen("sezione/stampa/cv.txt", "w") or die("Unable to open file!");
            fwrite($myfile, $arr);
            fclose($myfile);

            //PER CARICAMENTO VIDEO
            unlink("sezione/stampa/cv.json");
            $myfile = fopen("sezione/stampa/cv.json", "w") or die("Unable to open file!");
            $txt =json_encode($arr1);
            fwrite($myfile, $txt);
            fclose($myfile);

           }
   
    //echo $json_info = json_encode($arr);


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

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/base.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="assets/fonts/css/fa.css" rel="stylesheet">
    <!-- Webfont -->
    <link href='http://fonts.googleapis.com/css?family=Archivo+Narrow:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <!-- SweetAlert Plugin -->
    <link href="assets/css/plugins/sweetalert.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="node_modules/angular-material/angular-material.css">
     <link rel="stylesheet" href="node_modules/flat-datepicker/ng-flat-datepicker.css">
      <link href="http://cdn-na.infragistics.com/igniteui/2016.1/latest/css/themes/infragistics/infragistics.theme.css" rel="stylesheet" />
    <link href="http://cdn-na.infragistics.com/igniteui/2016.1/latest/css/structure/infragistics.css" rel="stylesheet" />

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
.tabsdemoDynamicHeight md-content {
  background-color: transparent !important; }
  .tabsdemoDynamicHeight md-content md-tabs {
    background: #f6f6f6;
    border: 1px solid #e1e1e1; }
    .tabsdemoDynamicHeight md-content md-tabs md-tabs-wrapper {
      background: white; }
  .tabsdemoDynamicHeight md-content h1:first-child {
    margin-top: 0; }

    </style>
</head>
<body>

<!-- Start Top Navigation -->
  <?php include('assets/comp/top-nav.php');?>
    <!-- Start Main Wrapper --> 
    <div id="wrapper">
    <!-- Side Wrapper -->
        <div id="side-wrapper">
            <ul class="side-nav">
                <?php include('assets/comp/side-nav.php');?>
            </ul>
        </div><!-- End Main Navigation --> 
        <div id="page-content-wrapper">
            <div class="container-fluid">
              <?php include('assets/comp/stat-boxes.php');?>
                  
<div ng-cloak="" class="tabsdemoDynamicHeight" ng-app="MyApp">
  <md-content>
    <md-tabs md-dynamic-height="" md-border-bottom="">
      <md-tab label="Generale">
        <md-content class="md-padding">
          <h1 class="md-display-2">Generale</h1>
          <?php echo $uid; ?>
           <div ng-include src="'sezione/generale/index.php'"></div>
        </md-content>
      </md-tab>
      <md-tab label="Socio UISP">
        <md-content class="md-padding">
          <h1 class="md-display-2">Socio UISP</h1>
            <div ng-include src="'sezione/socio/index.php'"></div>
        </md-content>
      </md-tab>
      <md-tab label="Info Bancarie">
        <md-content class="md-padding">
          <h1 class="md-display-2">Amministrativa</h1>
          <div ng-include src="'sezione/infobanca/index.php'"></div>
        </md-content>
      </md-tab>
        <md-tab label="Contabilita">
        <md-content class="md-padding">
          <h1 class="md-display-2">Contabilita'</h1>
          <div ng-include src="'sezione/contabilita/index.php'"></div>
        </md-content>
      </md-tab>
       <md-tab label="Barche">
        <md-content class="md-padding">
          <h1 class="md-display-2">Barche</h1>
          <div ng-include src="'sezione/barche/index.php'"></div>
        </md-content>
      </md-tab>
       <md-tab label="Formazione">
        <md-content class="md-padding">
          <h1 class="md-display-2">Formazione</h1>
          <div ng-include src="'sezione/formazione/index.php'"></div>
        </md-content>
      </md-tab>
       <md-tab label="Recapiti">
        <md-content class="md-padding">
          <h1 class="md-display-2">Recapiti</h1>
          <div ng-include src="'sezione/recapiti/index.php'"></div>
        </md-content>
      </md-tab>
       <md-tab label="Invita Amico">
        <md-content class="md-padding">
          <h1 class="md-display-2">Invita Amico</h1>
          <div ng-include src="'sezione/amico/index.php'"></div>
        </md-content>
      </md-tab>
       <md-tab label="STAMPA CV">
        <md-content class="md-padding">
          <h1 class="md-display-2">STAMPA CV</h1>
          <div ng-include src="'sezione/stampa/index.php'"></div>
        </md-content>
      </md-tab>
    </md-tabs>
  </md-content>
</div>
</div>
</div>


      
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 <script src="assets/js/bootstrap.min.js"></script>
 <script src="node_modules/angular/angular.min.js"></script>
 <script src="node_modules/angular-animate/angular-animate.js"></script>
 <script src="node_modules/angular-aria/angular-aria.js"></script>
 <script src="node_modules/angular-material/angular-material.js"></script>
 <script src="node_modules/moment/moment.js"></script>
 <script src="node_modules/flat-datepicker/ng-flat-datepicker.js"></script>

    <script src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.8.3.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>

    <!-- Ignite UI Required Combined JavaScript Files -->
    <script src="http://cdn-na.infragistics.com/igniteui/2016.1/latest/js/infragistics.core.js"></script>
    <script src="http://cdn-na.infragistics.com/igniteui/2016.1/latest/js/infragistics.lob.js"></script>

  <script type="text/javascript">
    var app = angular.module('MyApp',['ngMaterial','ngFlatDatepicker']);
  </script>
<!-- SEZIONE PAGINE -->
<script src="sezione/generale/data/generale.js"></script>
<script src="sezione/socio/socio.js"></script>
<script src="sezione/infobanca/infobanca.js"></script>
<script src="sezione/barche/barche.js"></script>
<script src="sezione/formazione/formazione.js"></script>
<script src="sezione/contabilita/contabilita.js"></script>
<script src="sezione/recapiti/recapiti.js"></script>
<script src="sezione/amico/amico.js"></script>
<script src="sezione/stampa/stampa.js"></script>

</body>
</html>