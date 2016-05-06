<?php
require('WriteHTML.php');

$pdf=new PDF_HTML();

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();
$pdf->Image('../../assets/img/lplogo-1.png',18,13,33);
$pdf->SetFont('Arial','B',14);
$pdf->WriteHTML('');

$pdf->SetFont('Arial','B',7); 

  $lines = file('cv.txt');
  

 $servername = "localhost";
 $username = "root";
 $password = "developer";
 $dbname = "oltremare";
  

 $mysqli = new mysqli($servername, $username, $password, $dbname);
  

  if ($mysqli->connect_errno) {
      echo "Connessione fallita: ". $mysqli->connect_error . ".";
      exit();
  }


   $sql = "SELECT f.nome, f.cognome, s.fiv, s.fiv_scadenza, s.tess_uisp, s.uisp_numero, f.corsi_oltremare, f.sede, f.sede, f.data_corso_oltremare, f.corso_extra, f.scuola_extra,f.data_extra, f.abilitazionioni  FROM oltremare.cv_socio as s, oltremare.cv_formazione_oltremare as f where s.id_utente =" .$uid . " and f.id_utente =" .$uid . " and s.id_utente =" .$uid ;
   $result = $mysqli->query($sql);
   if(mysqli_num_rows($result) != 0) 
   {
     while($row = mysqli_fetch_assoc($result)) 
     {
     	
     }
   }
         

  
  $data = array();
  
  foreach($lines as $line)
  	 $data[] = explode(';',trim($line));
   
 $pdf->SetFillColor(255,0,0);


$htmlTable='<h1>Dati Generali</h1><TABLE style="color:red;">
<TR>
<TD>Nome:</TD>
<TD>'. $data[0][0].'</TD>
</TR>
<TR>
<TD>Congnome:</TD>
<TD>'. $data[0][1].'</TD>
</TR>
<TR>
<TD>Tessera FIV:</TD>
<TD>'. $data[0][2].'</TD>
</TR>
<TR>
<TD>Scadenza:</TD>
<TD>'. $data[0][3].'</TD>
</TR>
<TR>
<TD>Tessera UISP:</TD>
<TD>'. $data[0][4].'</TD>
</TR>
<TR>
<TD>Numero UISP:</TD>
<TD>'. $data[0][5].'</TD>
</TR>
<TR>
</TABLE>';
$pdf->WriteHTML2("<br><br><br>$htmlTable");

$htmlTable='<p></p>
<h1>Attivita Oltremare</h1>
<table>
<tr>
<td>Attivita</td>
<td>'.$data[0][6] . '</td>
</tr><tr>
<td>Scuola</td>
<td>'.$data[0][8] . '</td>
</tr><tr>
<td>Sede</td>
<td>'.$data[0][8] . '</td>
</tr><tr>
<td>Data</td>
<td>'.$data[0][9] . '</td>
</tr><tr>

</table>';
$pdf->WriteHTML2("<br><br><br>$htmlTable");


$htmlTable='<p></p>
<h1>Attivita ExtraOltremare</h1>
<table>
<tr>
<td>Attivita</td>
<td>'.$data[0][10] . '</td>
</tr><tr>
<td>Scuola</td>
<td>'.$data[0][11] . '</td>
</tr><tr>
<td>Sede</td>
<td>' . substr_count($data, ';') .'</td>
</tr><tr>
<td>Data</td>
<td>'.$data[0][12] . '</td>
</tr><tr>
</table>';
$pdf->WriteHTML2("<br><br><br>$htmlTable");



$htmlTable='<p></p>
<h1>Attivita ExtraOltremare</h1>
<table>
<tr>
<td>Attivita</td>
<td>'.$data[0][13] . '</td>
</tr><tr>
<td>Scuola</td>
<td>'.$data[0][11] . '</td>
</tr><tr>
<td>Sede</td>
<td>'.$data[0][9] . '</td>
</tr><tr>
<td>Data</td>
<td>'.$data[0][12] . '</td>
</tr><tr>
</table>';
$pdf->WriteHTML2("<br><br><br>$htmlTable");




$htmlTable='<p></p>
<h1>Abilitazioni</h1>
<table>
<tr>
<td>Abilitazioni</td>
<td>'.$data[0][6] . '</td>
</tr><tr>
</table>';
$pdf->WriteHTML2("<br><br><br>$htmlTable");

$pdf->SetFont('Arial','B',12);
$pdf->Output(); 
?>