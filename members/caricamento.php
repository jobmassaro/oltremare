<?php


// Dump the games.csv file into an array
$games = file('cabinati.csv');
// Parse the array
foreach($games as $game) 
{
	list($nome,$loa,$cantiere) = split(',',$game);

	echo "INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'$nome','$loa','$cantiere');" ."<br/>";

}


?>


