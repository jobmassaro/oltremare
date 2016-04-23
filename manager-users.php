<?php
//PROTECT THIS PAGE - REQUIRE LOGIN TO ACCESS
include('auth/protect.php');
//REDIRECT IF NOT ADMIN LEVEL 1 USER
if($user_level!='1'){header('Location: dashboard');}

include('data/data-functions.php');
include('lang/translate.php');
//SITE SETTINGS
list($meta_title, $meta_description, $site_title, $site_email, $site_logo) = all_settings();
setlocale(LC_MONETARY, 'it_IT');
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
    <link rel="stylesheet" type="text/css" href="assets/datatables/media/css/jquery.dataTables_themeroller.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>    
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/cupertino/jquery-ui.css"> 
  

    
    <link rel="stylesheet" href="assets/css/tabelle.css">
     <link rel="stylesheet" href="node_modules/angular-material/angular-material.css">
    <script type="text/javascript" charset="utf8" src="assets/datatables/media/js/jquery.dataTables.min.js"></script>
  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
#imagePreview 
{
    width: 20%;
    height: 50px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>

  <script>
         $(function() {
           
            $("#data_nascita").datepicker({ dateFormat: "dd-mm-yy" }).val(); 
            $("#uisp_scadenza").datepicker({ dateFormat: "dd-mm-yy" }).val();
            $("#fiv_scadenza").datepicker({ dateFormat: "dd-mm-yy" }).val();
            $("#datascadenzacc").datepicker({ dateFormat: "dd-mm-yy" }).val();
            $("#data_scadenza_patente").datepicker({ dateFormat: "dd-mm-yy" }).val();
      $("#data_contabile").datepicker({ dateFormat: "dd-mm-yy" }).val();
            
            
         });
      </script>


<script type="text/javascript">
$(function(){
  $("#profile_pic").on("change", function(){
    var files = !!this.files ? this.files : [];
    if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

    if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
         reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
        
  });

  $("#certificato_pic").on("change", function(){
    var files = !!this.files ? this.files : [];
    if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

    if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
         reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
        
  });



});
</script>




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
              <div class="row">
              <!-- Start Panel -->
                <div class="col-lg-12">
                  <div class="panel">
                    <div class="panel-heading panel-primary">
                      <span class="title">
                        <?php echo $lang['USERS_MANAGEMENT'];?>
                        <div class="pull-right">
                          <!--<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-success" style="margin-right:10px;"><i class="fa fa-plus-circled"></i> <?php echo $lang['ADD_USER'];?></a> -->
                        </div>
                      </span>
                    </div>



<?php
      $uid = filter_input(INPUT_POST, 'm', FILTER_SANITIZE_STRING);


      if(count($uid) == 0 || $uid == '' )
        header('Location: http://oltremare.cloudapp.net');

      $query = "SELECT * FROM ".$prefix."members WHERE id =". $uid ." LIMIT 1";
      
      if ($result = $mysqli->query($query))
      {
          while($row = $result->fetch_assoc())
          {
            $id = $row['id'];
            $profilo_pic = $row['profilo_pic'];
            $certificato_pic = $row['certificato_pic'];
            $name = $row['name'];
            $surname = $row['surname'];
            $username = $row['username'];
            $data_nascita = $row['data_nascita'];
            $email = $row['email'];
            $indirizzo = $row['via'];
            $civico = $row['civico'];
            $cap = $row['cap'];
            $comune =$row['comune'];
            $provincia =$row['provincia'];
            $cod_fiscale = $row['cod_fiscale'];
            $cod_piva = $row['cod_piva']; 
            $telefono= $row['telefono']; 
            $cellulare = $row['cellulare']; 
            $sesso = $row['sesso']; 
            $professione = $row['professione']; 
            $sposato = $row['sposato']; 
            $figli = $row['figli']; 
            // UISP
            $uisp = $row['uisp'];  
              $uisp_numero = $row['uisp_numero'];  
              $uisp_datarilascio = $row['uisp_datarilascio'];  
              $certificato = $row['certificato'];
              $patente = $row['patente'];
            $patente_tipo =$row['patente_tipo'];
              $data_scadenza_patente = $row['data_scadenza_patente'];
              $fiv = $row['fiv'];
              $fiv_scadenza = $row['fiv_scadenza'];
              $fiv_certificato= $row['fiv_certificato'];

              //ARMATORE
              $armatore = $row['armatore'];
              $miglia = $row['miglia'];
              $tipo = $row['tipo'];
              $cantiere = $row['cantiere'];
                $modello = $row['modello'];
                    $piedi = $row['piedi'];

              //SOCIAL                
              $facebook = $row['facebook'];
              $whatsapp = $row['whatsapp'];
              $googleplus = $row['googleplus'];
              $twitter = $row['twitter'];
              

          }
      }
  

//CONTABILITA

//include ('admin/services/listaFattura.php');
      //get_list_contabile($uid);
      
      $arr = array();
      $sql = "SELECT * FROM ".$prefix."contabilita WHERE id_utente =". $uid ; 
      
      if ($result = $mysqli->query($sql))
      {
        if(mysqli_num_rows($result) != 0) 
        {
          while($row = $result->fetch_assoc())
          {
            $arr[] = $row;
            $idc = $row['id'];
            $id_utente = $row['id_utente'];
              $nome_banca = $row['nome_banca'];
            $abi = $row['abi'];
            $cab = $row['cab'];
            $cin = $row['cin'];
            $contocorrente =$row['contocorrente'];
            $iban = $row['iban'];
            $cartacredito = $row['cartacredito'];
            $datascadenzacc = $row['datascadenzacc'];
              $ccv = $row['ccv'];
              $data_contabile = $row['data_contabile'];
              $prodotto =$row['prodotto'];
            $quantita = $row['quantita'];
            $descrizione = $row['descrizione'];
            $doc_riferimento= $row['doc_riferimento'];
            $importo =$row['importo'];
              $acconto =$row['acconto'];
              $iva = $row['iva'];
              $totale = $row['totale'];

          }
        }
      }



?>


<?php

// Inizio tabella pagina principale ----------------------------------------------------------
echo "<table width=\"100%\" cellspacing=\"0\" align=\"left\" cellpadding=\"0\">\n";
echo "<tr>";

echo "<td width=\"100%\" align=\"center\" valign=\"top\" class=\"foto\">\n";

if ($user_level)
{


    echo "<span class=\"testo_blu\"><br><b>Modifica Anagrafica $_tipo</b></span><br><br>";

    echo "<form action=\"process_data.php\" method=\"POST\" enctype=\"multipart/form-data\">";
    
  printf("<input type=\"hidden\" name=\"old_pic\" id=\"old_pic\" value=\"%s\">",!empty($profile_pic)?$profile_pic:'');
  printf("<input type=\"hidden\" name=\"id\"  id=\"id\" value=\"%s\">",!empty($id)?$id:'');
  printf("<input type=\"hidden\" name=\"id_utente\"  id=\"id_utente\" value=\"%s\">",!empty($id_utente)?$id_utente:'');

    echo "<div id=\"tabs\">\n";
    echo "<ul>\n";
    echo "<li><a href=\"#tabs-1\">Generale</a></li>\n";
    echo "<li><a href=\"#tabs-2\">Socio UISP</a></li>\n";
    echo "<li><a href=\"#tabs-3\">Amministrativa</a></li>\n";
  //  echo "<li><a href=\"#tabs-4\">Contabilita</a></li>\n";
    echo "<li><a href=\"#tabs-4\">Barche</a></li>\n";
    echo "<li><a href=\"#tabs-5\">Formazione</a></li>\n";
    echo "<li><a href=\"#tabs-7\">Recapiti</a></li>\n";
    echo "<li><a href=\"#tabs-6\">STAMPA CV</a></li>\n";
    echo "</ul>\n";


  #sezione Generale..
    echo "<div id=\"tabs-1\">\n";
      include ('members/generale/index.php');

//--------------------------------------------------------------SECONDA TABS-------------------------------------------------------------------------
    echo "<div id=\"tabs-2\">\n";
    echo "<table class=\"classic_bordo\">";


// inizio destinazione diversa dalla ragione sociale


// CAMPO UISP ---------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"><b>Tessera UISP:&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"uisp\" id=\"uisp\" value=\"%s\" size=\"10\" maxlength=\"10\"></td></tr>\n", !empty($uisp)?$uisp:'');


// CAMPO UISP NUMERO  ---------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"><b>UISP numero:&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"uisp_numero\" id=\"uisp_numero\" value=\"%s\" size=\"10\" maxlength=\"10\"></td></tr>\n", !empty($uisp_numero)?$uisp_numero:'');    

// CAMPO UISP SCADENZA  ---------------------------------------------------------------------------------------
    if($uisp_scadenza=="0000-00-00 00:00:00")
    {
    $uisp_scadenza = 'Non dichiarata';
    }
    echo "<tr><td align=\"left\"><b>Data di rilascio UISP :&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"uisp_datarilascio\" id=\"uisp_datarilascio\" value=\"%s\" ></td></tr>\n", !empty($uisp_datarilascio)?$uisp_datarilascio:'');    

// CAMPO CERTIFICATO MEDICO  ---------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"><b>Certificato Medico:&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"certificato\" id=\"certificato\" value=\"%s\" size=\"10\" maxlength=\"10\"></td></tr>\n", !empty($certificato)?$certificato:'');    


// CAMPO CERTIFICATO MEDICO IMMAGINE ---------------------------------------------------------------------------------------

if(!empty($certificato_pic))
{
  echo "<tr><td align=\"left\"  ><b>Foto Certificato Medico</b> :&nbsp;</td>";
  printf("<td align=\"left\"><img src=\"%s \" width=\"50\" height=\"50\"></td>",$certificato_pic);
  
}else{
  echo "<tr><td align=\"left\"  ><b>Foto Certificato Medico</b> :&nbsp;</td>";
  printf("<td align=\"left\" ><input type=\"file\"  id=\"certificato_pic\" name=\"certificato_pic\" size=\"6\" maxlength=\"6\"><div id=\"imagePreview\"></div></td></tr>",  !empty($certificato_pic)?$certificato_pic:'');
}

// CAMPO Tessera  ---------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"><b>Tessera F.I.V:&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"fiv\" id=\"fiv\" value=\"%s\" size=\"2\" maxlength=\"10\"></td></tr>\n", !empty($fiv)?$fiv:'');    


// CAMPO Scadenza Tessera  ---------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"><b>Scadenza F.I.V:&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"fiv_scadenza\" id=\"fiv_scadenza\" value=\"%s\" size=\"10\" maxlength=\"2\"></td></tr>\n", !empty($fiv_scadenza)?$fiv_scadenza:'');    

// CAMPO FIV certificato Tessera  ---------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"><b>Certificato F.I.V:&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"fiv_certificato\" id=\"fiv_certificato\" value=\"%s\" size=\"5\" maxlength=\"2\"></td></tr>\n", !empty($fiv_certificato)?$fiv_certificato:'');    



          
              
// CAMPO Patente  ---------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"><b>Patente:&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"patente\" id=\"patente\" value=\"%s\" size=\"2\" maxlength=\"2\"></td></tr>\n", !empty($patente)?$patente:'');    


// CAMPO patente_tipo  ---------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"><b>Patente Tipo:&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"patente_tipo\" id=\"patente_tipo\" value=\"%s\" size=\"3\" maxlength=\"3\"></td></tr>\n", !empty($patente_tipo)?$patente_tipo:'');   


// CAMPO data_scadenza_patente  ---------------------------------------------------------------------------------------
    if($data_scadenza_patente=="0000-00-00 00:00:00")
    {
    $data_scadenza_patente = 'Non dichiarata';
    }
    echo "<tr><td align=\"left\"><b>Data di scadenza della patente:&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"data_scadenza_patente\" id=\"data_scadenza_patente\" value=\"%s\" size=\"10\" maxlength=\"10\"></td></tr>\n", !empty($data_scadenza_patente)?$data_scadenza_patente:'');   

    echo "</table>\n";
    echo "</div>\n";

//--------------------------------------------------------------TERZA TABS-------------------------------------------------------------------------

    echo "<div id=\"tabs-3\">\n";
    echo "<table class=\"classic_bordo\">";

// CAMPO Banca -----------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  >Banca :&nbsp;</td>\n";
    printf("<td align=\"left\" ><input type=\"text\" name=\"nome_banca\" id=\"nome_banca \" value=\"%s\" size=\"50\" maxlength=\"50\"></td></tr>\n", !empty($nome_banca)?$nome_banca:'');

// CAMPO ABI ------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  >Abi :&nbsp;</td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"abi\"  id=\"abi\" value=\"%s\" size=\"5\" maxlength=\"5\"></td><tr>", !empty($abi)?$abi:'');

// CAMPO CAB ------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  >Cab :&nbsp;</td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"cab\" id=\"cab\" value=\"%s\" size=\"5\" maxlength=\"5\"></td><tr>", !empty($cab)?$cab:'');

// CAMPO Cin ------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  >Cin :&nbsp;</td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"cin\"  id=\"cin\" value=\"%s\" size=\"5\" maxlength=\"5\"></td><tr>", !empty($cin)?$cin:'');

// CAMPO cc ------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  >C/C :&nbsp;</td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"contocorrente\"  id=\"contocorrente\" value=\"%s\" size=\"13\" maxlength=\"12\"></td><tr>", !empty($contocorrente)?$contocorrente:'');

// CAMPO iban ------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  >Iban :&nbsp;</td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"iban\" id=\"iban\" value=\"%s\" size=\"30\" maxlength=\"30\"></td><tr>", !empty($iban)?$iban:'');

// CAMPO Carta di Credito ------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  >Carta Credito :&nbsp;<i class=\"fa fa-credit-card\"></i></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"cartacredito\" id=\"cartacredito\" value=\"%s\" size=\"22\" maxlength=\"22\"></td><tr>", !empty($cartacredito)?$cartacredito:'');
  
// CAMPO Carta di Credito Data Scadenza ------------------------------------------------------------------------------------
     if($datascadenzacc=="0000-00-00 00:00:00")
    {
    $datascadenzacc = 'Non dichiarata';
    }
    echo "<tr><td align=\"left\"  >Data di scadenza :&nbsp;<i class=\"fa fa-credit-card\"></i></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"datascadenzacc\" id=\"datascadenzacc\" value=\"%s\" size=\"22\" maxlength=\"22\"></td><tr>", !empty($datascadenzacc)?$datascadenzacc:'');
    
// CAMPO Carta di Credito CCV ------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  >CCV :&nbsp;<i class=\"fa fa-credit-card\"></i></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"ccv\" id=\"ccv\" value=\"%s\" size=\"22\" maxlength=\"22\"></td><tr>", !empty($ccv)?$ccv:'');
    

      
     echo "</table>\n";
    echo "</div>\n";

// TAB 4 -- BARCHE 


include ('members/barche/index.php');


include ('members/formazione/index.php');



// -----------------------------------------TAB 4 CONTABILITA -----------------------------------
    //include('admin/contabilita.php');
 /*   
  echo "<div id=\"tabs-4\">\n";
  echo '<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#nuovaModal">
    Nuova Entrata
</button>';
//

echo '<div class="modal fade" id="nuovaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuova Entrata</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8">';

      printf("<div class=\"form-group\"><label for=\"data_contabile\">Data</label><input type=\"text\" name=\"data_contabile\" id=\"data_contabile\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($data_contabile)?$data_contabile:'');
      printf("<div class=\"form-group\"><label for=\"data_contabile\">Fattura</label><input type=\"text\" name=\"prodotto\" id=\"prodotto\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($prodotto)?$prodotto:'');
      printf("<div class=\"form-group\"><label for=\"descrizione\">Descrizione</label><input type=\"text\" name=\"descrizione\" id=\"descrizione\"  class=\"form-control\" value=\"%s\" size=\"55\" maxlength=\"55\"></div>",!empty($descrizione)?$descrizione:'');
      printf("<div class=\"form-group\"><label for=\"quantita\">Quantita</label><input type=\"text\" name=\"quantita\" id=\"quantita\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($quantita)?$quantita:'');
      printf("<div class=\"form-group\"><label for=\"importo\">Importo EUR:</label><input type=\"text\" name=\"importo\" id=\"importo\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($importo)?money_format('%.2n', $importo):'');
      printf("<div class=\"form-group\"><label for=\"acconto\">Acconto EUR:</label><input type=\"text\" name=\"acconto\" id=\"acconto\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($acconto)?money_format('%.2n', $acconto):'');
      printf("<div class=\"form-group\"><label for=\"iva\">Iva</label><input type=\"text\" name=\"iva\" id=\"iva\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\" readonly></div>",!empty($iva)?$iva:'');

      // CAMPO Totale ------------------------------------------------------------------------------------

      printf("<div class=\"form-group\"><label for=\"totale\">Totale EUR:</label><input type=\"text\" name=\"totale\" id=\"totale\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>");








echo '    </div>
    </div>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
        <button type="button" class="btn btn-primary">Salva cambiamenti</button>
      </div>
    </div>
  </div>
</div>';

//-- Modal -


echo'
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuova Entrata</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8">';
    //  ------------
 
      printf("<div class=\"form-group\"><label for=\"data_contabile\">Data</label><input type=\"text\" name=\"data_contabile\" id=\"data_contabile\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($data_contabile)?$data_contabile:'');
      printf("<div class=\"form-group\"><label for=\"data_contabile\">Fattura</label><input type=\"text\" name=\"prodotto\" id=\"prodotto\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($prodotto)?$prodotto:'');
      printf("<div class=\"form-group\"><label for=\"descrizione\">Descrizione</label><input type=\"text\" name=\"descrizione\" id=\"descrizione\"  class=\"form-control\" value=\"%s\" size=\"55\" maxlength=\"55\"></div>",!empty($descrizione)?$descrizione:'');
      printf("<div class=\"form-group\"><label for=\"quantita\">Quantita</label><input type=\"text\" name=\"quantita\" id=\"quantita\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($quantita)?$quantita:'');
      printf("<div class=\"form-group\"><label for=\"importo\">Importo EUR:</label><input type=\"text\" name=\"importo\" id=\"importo\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($importo)?money_format('%.2n', $importo):'');
      printf("<div class=\"form-group\"><label for=\"acconto\">Acconto EUR:</label><input type=\"text\" name=\"acconto\" id=\"acconto\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($acconto)?money_format('%.2n', $acconto):'');
      printf("<div class=\"form-group\"><label for=\"iva\">Iva</label><input type=\"text\" name=\"iva\" id=\"iva\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\" readonly></div>",!empty($iva)?$iva:'');

      // CAMPO Totale ------------------------------------------------------------------------------------
if(!empty($quantita))
  if(!empty($importo)){
    $totale = (($quantita * $importo) *$iva/100) +(($quantita * $importo) -$acconto);

    }



      printf("<div class=\"form-group\"><label for=\"totale\">Totale EUR:</label><input type=\"text\" name=\"totale\" id=\"totale\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($totale)?money_format('%.2n', $totale) :'');








echo '    </div>
    </div>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
        <button type="button" class="btn btn-primary">Salva cambiamenti</button>
      </div>
    </div>
  </div>
</div>';




//--- END MODAL








































  echo " <p></p><table id=\"tblcont\" class=\"table table-hover sortable\">
      <thead>
        <tr>
          <th data-sort=\"date\">Data</th>
          <th data-sort=\"prodotto\">Fattura</th>
          <th data-sort=\"name\">Descrizione</th>
          <th data-sort=\"quantita\">Quantita</th>
          <th data-sort=\"importo\">Importo EUR</th>
          <th data-sort=\"acconto\">Acconto EUR</th>
          <th data-sort=\"acconto\">Iva %</th>
          <th data-sort=\"totale\">Totale EUR</th>
          <th>Stampa</th>
        </tr>
      </thead>
      <tbody>
        <tr>";


// CAMPO Data ------------------------------------------------------------------------------------
    if($data_contabile=="0000-00-00 00:00:00")
    {
    $data_contabile = 'Non dichiarata';
    }
printf("<td><button type=\"button\" id=\"link\" data-toggle=\"modal\" data-target=\"#myModal\"><i class=\"fa fa-plus\"></i></button><input type=\"text\" name=\"data_contabile\" id=\"data_contabile\" value=\"%s\" size=\"10\" maxlength=\"10\" readonly></td>", !empty($data_contabile)?$data_contabile:'');

// CAMPO Fattura ------------------------------------------------------------------------------------
printf("<td><input type=\"text\" name=\"prodotto\" id=\"prodotto\" value=\"%s\" size=\"10\" maxlength=\"10\" readonly></td>", !empty($prodotto)?$prodotto:'');

// CAMPO Descrizione ------------------------------------------------------------------------------------
printf("<td><input type=\"text\" name=\"descrizione\" id=\"descrizione\" value=\"%s\" size=\"22\" maxlength=\"22\"readonly></td>", !empty($descrizione)?$descrizione:'');

// CAMPO Quantita ------------------------------------------------------------------------------------
printf("<td><input type=\"text\" name=\"quantita\" id=\"quantita\" value=\"%s\" size=\"3\" maxlength=\"3\"readonly></td>", !empty($quantita)?$quantita:'');

// CAMPO Importo ------------------------------------------------------------------------------------
printf("<td><input type=\"text\" name=\"importo\" id=\"importo\" value=\"%s\" size=\"8\" maxlength=\"8\"readonly></td>", !empty($importo)?money_format('%.2n', $importo):'');


// CAMPO Acconto ------------------------------------------------------------------------------------
printf("<td><input type=\"text\" name=\"acconto\" id=\"acconto\" value=\"%s\" size=\"8\" maxlength=\"8\"readonly></td>", !empty($acconto)?money_format('%.2n', $acconto):'');

// CAMPO Acconto ------------------------------------------------------------------------------------
printf("<td><input type=\"text\" name=\"iva\" id=\"iva\" value=\"%s\" size=\"8\" maxlength=\"8\" readonly></td>", !empty($iva)?$iva:'');

// CAMPO Totale ------------------------------------------------------------------------------------
if(!empty($quantita))
  if(!empty($importo)){
    $totale = (($quantita * $importo) *$iva/100) +(($quantita * $importo) -$acconto);

    }


printf("<td><input type=\"text\" name=\"totale\" id=\"totale\" value=\"%s\" size=\"10\" maxlength=\"10\"readonly></td>", !empty($totale)? money_format('%.2n', $totale) :'');

echo "<td><a href=\"#\"><i class=\"fa fa-print\"></i>Ricevuta</a></td></tr>";
echo "</tbody>
    </table>";
  echo "</div>";*/


// -----------------------------------------TAB 5 RECAPITI -----------------------------------

include ('members/stampacv/index.php');

// -----------------------------------------TAB 6 RECAPITI -----------------------------------

    
   echo "<div id=\"tabs-7\">\n";
    echo "<table class=\"classic_bordo\">";

// CAMPO Telefono -----------------------------------------
  echo "<tr><td align=\"left\"  >Num. Telefono :&nbsp;<i class=\"fa fa-phone\"></i></td>";   
  printf("<td><input type=\"text\" name=\"telefono\" id=\"telefono\" value=\"%s\" size=\"15\" maxlength=\"15\"></td>", !empty($telefono)?$telefono:'');

// CAMPO Cellulare -----------------------------------------
  echo "<tr><td align=\"left\"  >Cellulare :&nbsp;<i class=\"fa fa-mobile\"></i></td>";   
  printf("<td><input type=\"text\" name=\"cellulare\" id=\"cellulare\" value=\"%s\" size=\"15\" maxlength=\"15\"></td>", !empty($cellulare)?$cellulare:'');


// CAMPO Email -----------------------------------------
  echo "<tr><td align=\"left\"  >Email :&nbsp;<i class=\"fa fa-envelope-o\"></i></td>";   
  printf("<td><input type=\"text\" name=\"email\" id=\"email\" value=\"%s\" size=\"25\" maxlength=\"25\"></td>", !empty($email)?$email:'');


// CAMPO Facebook -----------------------------------------
  echo "<tr><td align=\"left\"  >Facebook :&nbsp;<i class=\"fa fa-facebook-official\"></i></td>";   
  printf("<td><input type=\"text\" name=\"facebook\" id=\"facebook\" value=\"%s\" size=\"25\" maxlength=\"25\"></td>", !empty($facebook)?$facebook:'');

// CAMPO whatsapp -----------------------------------------
  echo "<tr><td align=\"left\"  >Whatsapp :&nbsp;<i class=\"fa fa-whatsapp\"></i></td>";   
  printf("<td><input type=\"text\" name=\"whatsapp\" id=\"whatsapp\" value=\"%s\" size=\"25\" maxlength=\"25\"></td>", !empty($whatsapp)?$whatsapp:'');

// CAMPO googleplus -----------------------------------------
  echo "<tr><td align=\"left\"  >Googleplus :&nbsp;<i class=\"fa fa-google-plus-square\"></i></td>";   
  printf("<td><input type=\"text\" name=\"googleplus\" id=\"googleplus\" value=\"%s\" size=\"25\" maxlength=\"25\"></td>", !empty($googleplus)?$googleplus:'');

// CAMPO twitter -----------------------------------------
  echo "<tr><td align=\"left\"  >Twitter :&nbsp;<i class=\"fa fa-twitter\"></i></td>";   
  printf("<td><input type=\"text\" name=\"twitter\" id=\"twitter\" value=\"%s\" size=\"25\" maxlength=\"15\"></td>", !empty($twitter)?$twitter:'');
echo "</table></div>";

} 
echo "<input type=\"submit\" value=\"Invia\" class=\"btn btn-lg btn-info\">";
echo "</form>\n";
//// Fine tabella pagina princ
// Fine tabella pagina principale -----------------------------------------------------------
?>


 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <!-- Bootstrap -->
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- Base Theme JS -->
  <script src="assets/js/base.js"></script>
  <!-- SweetAlert -->

  <script src="assets/js/plugins/sweetalert.min.js"></script>
  <!-- Datatables -->
  <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
  
  <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    

    <!-- Load jQuery UI Main JS  -->

    <!-- Load jQuery UI Main JS  -->
    
    <script src="assets/js/reg-edit-validate.js"></script>
    <script src="assets/js/tether.min.js"></script>
  <script src="assets/js/select.min.js"></script>
  <script src="assets/js/sort-table.js"></script>

  <script type="text/javascript">
      $(function() {
        $( "#tabs" ).tabs();
      });
    </script>

  <!--<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-touch.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-animate.js"></script>
    <script src="http://ui-grid.info/docs/grunt-scripts/csv.js"></script>
    <script src="http://ui-grid.info/docs/grunt-scripts/pdfmake.js"></script>
    <script src="http://ui-grid.info/docs/grunt-scripts/vfs_fonts.js"></script>
  <script src="https://cdn.rawgit.com/angular-ui/bower-ui-grid/master/ui-grid.min.js"></script> 
  <script> 
    var app = angular.module('app', ['ngTouch', 'ui.grid']);
 
    app.controller('MainCtrl', ['$scope', function ($scope) {
 
      $scope.myData = [
      {
          "firstName": "Cox",
          "lastName": "Carney",
          "company": "Enormo",
          "employed": true
      },
      {
          "firstName": "Lorraine",
          "lastName": "Wise",
          "company": "Comveyer",
          "employed": false
      },
      {
          "firstName": "Nancy",
          "lastName": "Waters",
          "company": "Fuelton",
          "employed": false
      }
  ];
}]);


  </script> -->
  <!--<script src="assets/js/select2.js"></script>
  <script>
        $(document).ready(function() { 
            $("#regioni").select2({
                    placeholder: "Comune",
                    allowClear: true
             }); 
        });

  </script> -->
  
</body>
</html>
