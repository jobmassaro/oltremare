<?php
/* ===========================================
		Langauge Support  
   	========================================= */
	if($_SESSION['language']!=''){$language = $_SESSION['language'];}	
	
	//DEFAULT LANGUAGE
  $default_lang = 'it';
	if(empty($language)){$language = $default_lang; }
	include($language.'.php');