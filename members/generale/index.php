<?php
  echo "<table class=\"table table-hover\" style=\"color:black;\">";



// CAMPO Foto ---------------------------------------------------------------------------------------

if(!empty($profilo_pic))
{
	 echo "<tr><td align=\"left\"  ><b>Immagine Profilo</b> :&nbsp;</td>";
	printf("<td align=\"left\"><img src=\"%s \" width=\"50\" height=\"50\"></td>",$profilo_pic);

	
}else{
	echo "<tr><td align=\"left\"  ><b>Immagine Profilo</b> :&nbsp;</td>";
	printf("<td align=\"left\" ><input type=\"file\"  id=\"profilo_pic\" name=\"profilo_pic\" size=\"6\" maxlength=\"6\"><div id=\"imagePreview\"></div></td></tr>",  !empty($profilo_pic)?$profilo_pic:'');
}


 

// CAMPO Nome ---------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  ><b>Nome</b> :&nbsp;</td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"name\" id=\"name\" value=\"%s\" size=\"20\" maxlength=\"20\"></td></tr>",  !empty($name)?$name:'');

// CAMPO Cognome ---------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  ><b>Cognome</b> :&nbsp;</td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"surname\" id=\"surname\" value=\"%s\" size=\"20\" maxlength=\"20\"></td></tr>",  !empty($surname)?$surname:'');


// CAMPO Username ---------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  ><b>Nickname</b> :&nbsp;</td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"username\" id=\"username\" value=\"%s\" size=\"20\" maxlength=\"20\"></td></tr>",  !empty($username)?$username:'');

// CAMPO Data Nascita ---------------------------------------------------------------------------------------
	
	if($data_nascita=="0000-00-00 00:00:00" )
    {
		$data_nascita = 'Non dichiarata';
    }
    echo "<tr><td align=\"left\"  ><b>Data Nascita</b> :&nbsp;</td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"data_nascita\" id=\"data_nascita\" value=\"%s\" size=\"10\" maxlength=\"10\"></td></tr>",  !empty($data_nascita)? $data_nascita:'');

// CAMPO Sesso -----------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  ><b>Sesso :&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"sesso\" id=\"sesso\" value=\"%s\" size=\"6\" maxlength=\"6\"></td></tr>", !empty($sesso)?$sesso:'');

// CAMPO Sposato -----------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  ><b>Sposato :&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"sposato\" id=\"sposato\" value=\"%s\" size=\"6\" maxlength=\"6\"></td></tr>", !empty($sposato)?$sposato:'');

  // CAMPO figli -----------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  ><b>Figli :&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"figli\" id=\"figli\" value=\"%s\" size=\"6\" maxlength=\"6\"></td></tr>", !empty($figli)?$figli:'');

// CAMPO Professione -----------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  ><b>Professione :&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"professione\" id=\"professione\" value=\"%s\" size=\"20\" maxlength=\"20\"></td></tr>", !empty($professione)?$professione:'');


// CAMPO Indirizzo ---------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  ><b>Indirizzo:&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"indirizzo\" name=\"indirizzo\" value=\"%s\" size=\"60\" maxlength=\"60\"></td>\n", !empty($indirizzo)?$indirizzo:'');

// CAMPO Numero civico ---------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  ><b>Numero Civico:&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"civico\" id=\"civico\" value=\"%s\" size=\"6\" maxlength=\"6\"></td>\n", !empty($civico)?$civico:'');

// CAMPO Cap ---------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  ><b>Cap :&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"cap\" id=\"cap\" value=\"%s\" size=\"6\" maxlength=\"5\"></td></tr>", !empty($cap)?$cap:'');

// CAMPO citt�---------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  ><b>Citt&agrave;</b></td>";
    	$table_name = $prefix . "provincie";
		$column_name = "";

		$query = "SELECT * FROM " . $table_name .' ORDER BY comune ASC; ' ;

		echo '<td align=\"left\" ><select id="comune" name="comune" class="showcase themes select-theme-default" placeholder="">';
		
		$result = $mysqli->query($query);

		if($result) 
		{
			while($row = mysqli_fetch_assoc($result)){
				printf("<option value=\"%s\">%s</option>\n", $row['id'], $row['comune']);
			}
		}


				echo "</select></td></tr>";


    		
    		
    /*printf("<td align=\"left\" ><input type=\"text\" name=\"citta\" id=\"citta\" value=\"%s\" size=\"60\" maxlength=\"60\"></td></tr>", !empty($comune)?$comune:'');
	*/

// CAMPO Provincia ---------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  ><b>Prov. :&nbsp;</b></td>";
   $table_name = $prefix . "provincie";
		$column_name = "";

		$query = "SELECT distinct id, provincia FROM " . $table_name ;

		echo '<td align=\"left\" ><select id="provincia" name="provincia" class="showcase themes select-theme-default" placeholder="">';
		
		$result = $mysqli->query($query);

		if($result) 
		{
			while($row = mysqli_fetch_assoc($result)){
				printf("<option value=\"%s\">%s</option>\n", $row['id'], $row['provincia']);
			}
		}


				echo "</select></td></tr>";



// CAMPO codfiscale -----------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  ><b>Codice Fiscale :&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"cod_fiscale\" id=\"cod_fiscale\" value=\"%s\" size=\"20\" maxlength=\"16\"></td></tr>",!empty($cod_fiscale)?$cod_fiscale:'');

// CAMPO Partita iva -----------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  ><b>Partita Iva :&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"cod_piva\" id=\"cod_piva\" value=\"%s\" size=\"20\" maxlength=\"14\"></td></tr>", !empty($cod_piva)?$cod_piva:'');

// CAMPO Telefono -----------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  ><b>Telefono :&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"telefono\"  id=\"telefono\" value=\"%s\" size=\"20\" maxlength=\"20\"></td></tr>", !empty($telefono)?$telefono:'');

// CAMPO Cell -----------------------------------------------------------------------------------------
    echo "<tr><td align=\"left\"  ><b>Cellulare :&nbsp;</b></td>";
    printf("<td align=\"left\" ><input type=\"text\" name=\"cellulare\" id=\"cellulare\" value=\"%s\" size=\"20\" maxlength=\"20\"></td></tr>", !empty($cellulare)?$cellulare:'');



// CAMPO FINE PRIMO TAB -----------------------------------------------------------------------------------------
    echo "</table>\n";
    echo "</div>\n";
 	echo "</form>\n";


?>