<?php

$data = json_decode(file_get_contents("php://input")); 
if(isset($_GET['action']) and $_GET['action']=='delete')
{
		var_dump('dsda' .$data);
		die();
}

