<?php

//DATA REQUIRED
$prefix = filter_input(INPUT_POST, 'prefix', FILTER_SANITIZE_STRING);
$host = filter_input(INPUT_POST, 'dbhost', FILTER_SANITIZE_STRING);
$user = filter_input(INPUT_POST, 'dbusername', FILTER_SANITIZE_STRING);
$dbname = filter_input(INPUT_POST, 'dbname', FILTER_SANITIZE_STRING);
$pass = $_POST['dbpassword'];

//CREATE CONFIGURATION FILE
$new_config = fopen("../auth/config.inc.php", "w") or or die("Non posso creare il file config");
$txt = "<?php \n";
fwrite($new_config , $txt);
$txt = "define('HOST', '".$host."'); \n";
fwrite($new_config , $txt);
$txt = "define('USER', '".$user."'); \n";
fwrite($new_config , $txt);
$txt = "define('PASSWORD', '".$pass."'); \n";
fwrite($new_config , $txt);
$txt = "define('DATABASE', '".$dbname."'); \n";
fwrite($new_config , $txt);
$txt = "define('SECURE', FALSE); \n";
fwrite($new_config , $txt);
$txt = "error_reporting(0); \n";
fwrite($new_config , $txt);
fclose($new_config );



//CREATE DB CONN FILE 
$new_config = fopen("../auth/db-connect.php", "w") or die("Non posso creare il file connct-db" );
$txt = "<?php \n";
fwrite($new_config, $txt);
$txt ="include_once('config.inc.php'); \n";
fwrite($new_config, $txt);
$txt = "\$mysqli = new mysqli(HOST,USER,PASSWORD,DATABASE); \n";
fwrite($new_config, $txt);
$txt = "\$prefix = '" .$prefix."'; \n";
fwrite($new_config, $txt);
fclose($new_config);

//CONNECT TO DATABASE
include_once('../auth/db-connect.php');
//check conn
if($mysqli->connect_errono)
{
	printf("Connessione fallita %s\n", $mysqli->connect_errono);
	exit();
}


//check server
if($mysqli->ping()){
	printf("Connessione is OK!<br>");
}else
{
	printf("Error: %s\n" . $mysqli->error);
}


//CREATE MEMBERS TABLE
$sql = "CREATE TABLE IF NOT EXISTS `".$prefix."members` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `forgot_pin` varchar(255) NOT NULL,
  `forgot_key` varchar(60) NOT NULL,
  `email_key` varchar(255) NOT NULL,
  `email_confirmed` int(1) NOT NULL,
  `terms` int(1) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `user_level` int(10) NOT NULL,
  `reg_date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `plan_id` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;";

if($mysqli->query($sql) === TRUE)
{
	echo 'Tabella member creata!';
}else{
	echo 'Errore nella creazione della tabella !' .  $mysqli->error;
}



//CREATE EMAIL CONTENT TABLE
$sql = "CREATE TABLE IF NOT EXISTS `".$prefix."email_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_activation` text NOT NULL,
  `forgot_password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;";

if ($mysqli->query($sql) === TRUE) {
    echo "Email Creata con Successo<br>";
} else {
	echo 'Errore nella creazione della tabella !' .  $mysqli->error;
}

//INSERT EMAIL CONTENT
$sql = "INSERT INTO `".$prefix."email_content` (`id`, `email_activation`, `forgot_password`) VALUES
(1, '<p><strong>Ciao {\$fullname}, </strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ti ringrazio per esserti registrato al nostro sito! Qui puoi trovare i dettagli del tuo account:</p>\r\n\r\n<p><strong>Username: {\$username} </strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Per usare il tuo account devi confermare la tua email cliccando sotto:</p>\r\n\r\n<p>{\$link}</p>\r\n\r\n<p><strong>Grazie!</strong><br />\r\n<strong>CV.OLTREMARE</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p><strong>Ciao {\$fullname},</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Hai ricevuto una richiesta per il reset della password per il tuo account sul notro website. &nbsp;Se fai questa richiesta, devi seguire il link sotto per reset password.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span class=\"marker\"><strong>Username: {\$username}</strong></span></p>\r\n\r\n<p><span class=\"marker\"><strong>Pin Temporaneo : {\$pin}</strong></span></p>\r\n\r\n<p>{\$link}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Grazie</strong><br />\r\n<strong>CV.OLTREMARE</strong></p>\r\n');
";

if ($mysqli->query($sql) === TRUE) {
    echo "Contenuto della Email inserito con Successo<br>";
} else {
    echo 'Errore nella creazione della tabella !' .  $mysqli->error;
}

//CREATE LOGIN ATTEMPTS TABLE
$sql = "CREATE TABLE IF NOT EXISTS `".$prefix."login_attempts` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(15) NOT NULL,
  `time` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26;";

if ($mysqli->query($sql) === TRUE) {
    echo "Tabella Login Creata con Successo<br>";
} else {
     echo 'Errore nella creazione della tabella !' .  $mysqli->error;
}


//CREATE PERMISSIONS LEVELS TABLE
$sql = "CREATE TABLE IF NOT EXISTS `".$prefix."permission_levels` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `level` int(15) NOT NULL,
  `redirect_login` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;";

if ($mysqli->query($sql) === TRUE) {
    echo "Tabella Permessi Creata con Successo<br>";
} else {
     echo 'Errore nella creazione della tabella !' .  $mysqli->error;
}

//ISERT PERMISSIONS LEVELS TABLE
$sql = "INSERT INTO `".$prefix."permission_levels` (`id`, `name`, `level`, `redirect_login`) VALUES
(1, 'Admin', 1, ''), (2, 'Specialist', 2, '');;";

if ($mysqli->query($sql) === TRUE) {
    echo "Permissi nei Levelli inserit con Successo<br>";
} else {
     echo 'Errore nella creazione della tabella !' .  $mysqli->error;
}


//CREATE RL SETTINGS TABLE
$sql = "CREATE TABLE IF NOT EXISTS `".$prefix."rl_settings` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `public_registration` int(1) NOT NULL,
  `require_cap` int(1) NOT NULL,
  `require_email_activation` int(1) NOT NULL,
  `require_terms` int(1) NOT NULL,
  `default_user_level` int(15) NOT NULL,
  `min_password_length` int(2) NOT NULL,
  `require_plans` int(1) NOT NULL,
  `redirect_login` varchar(255) NOT NULL,
  `redirect_logout` varchar(255) NOT NULL,
  `gc_key` varchar(255) NOT NULL,
  `gc_secret` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;";

if ($mysqli->query($sql) === TRUE) {
    echo "Tabella Permissi Creata con Successo<br>";
} else {
     echo 'Errore nella creazione della tabella !' .  $mysqli->error;
}

//INSERT RL SETTINGS TABLE
$sql = "INSERT INTO `".$prefix."rl_settings` (`id`, `public_registration`, `require_cap`, `require_email_activation`, `require_terms`, `default_user_level`, `min_password_length`, `require_plans`, `redirect_login`, `redirect_logout`, `gc_key`) VALUES
(1, 1, 0, 1, 1, 2, 5, 1, '', '', '');";

if ($mysqli->query($sql) === TRUE) {
    echo "RL settings inserto con Successo<br>";
} else {
    echo 'Errore nella creazione della tabella !' .  $mysqli->error;
}


//CREATE SETTINGS TABLE
$sql = "CREATE TABLE IF NOT EXISTS `".$prefix."settings` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `site_email` varchar(255) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;";

if ($mysqli->query($sql) === TRUE) {
    echo "RL Settings Tabella Creata Successo<br>";
} else {
    echo 'Errore nella creazione della tabella !' .  $mysqli->error;
}



//INSERT SETTINGS TABLE
$sql = "INSERT INTO `".$prefix."settings` (`id`, `meta_title`, `meta_description`, `site_title`, `site_email`, `site_logo`) VALUES
(1, 'CV.OLTREMARE', 'CV.OLTREMARE | PHP User Management Script ', 'CV.OLTREMARE', 'jobmassaro@gmail.com', 'lplogo-1.png');";

if ($mysqli->query($sql) === TRUE) {
    echo "Settings data inserti con Successo<br>";
} else {
    echo 'Errore nella creazione della tabella !' .  $mysqli->error;
}



//CREATE INACTIVITY SETTINGS TABLE
$sql = "CREATE TABLE IF NOT EXISTS `".$prefix."inactivity_settings` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `timeout_enabled` int(15) NOT NULL,
  `title` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `inactivity_timer` int(15) NOT NULL,
  `inactivity_warning` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;";

if ($mysqli->query($sql) === TRUE) {
    echo "Inactivity Table Creata con Successo<br>";
} else {
    echo 'Errore nella creazione della tabella !' .  $mysqli->error;
}

//INSERT INACTIVITY SETTINGS TABLE
$sql = "INSERT INTO `".$prefix."inactivity_settings` (`id`, `timeout_enabled`, `title`, `message`, `inactivity_timer`, `inactivity_warning`) VALUES
(1, 0, 'Session Expiration Warning!', 'Because you have been inactive, your session is about to expire!', 30, 150);";

if ($mysqli->query($sql) === TRUE) {
    echo "Inactivity data inserta con Successo<br>";
} else {
    echo 'Errore nella creazione della tabella !' .  $mysqli->error;
}





//CREATE TABLE
$sql = "CREATE TABLE IF NOT EXISTS `".$prefix."memberships` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `trial_period` int(10) NOT NULL,
  `trial_cost` decimal(10,2) NOT NULL,
  `membership_cost` decimal(10,2) NOT NULL,
  `recurring_period` varchar(15) NOT NULL,
  `user_level` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;";

if ($mysqli->query($sql) === TRUE) {
    echo "Memberships table creata con Successo<br>";
} else {
      echo 'Errore nella creazione della tabella !' .  $mysqli->error;
}

//INSERT TABLE
$sql = "INSERT INTO `".$prefix."memberships` (`id`, `title`, `trial_period`, `trial_cost`, `membership_cost`, `recurring_period`, `user_level`) VALUES
(1, 'Free for Life', 0, '0.00', '0.00', '0', 3),
(3, 'Basic', 0, '0.00', '19.99', '0', 2),
(5, 'Super Plan!', 30, '0.00', '149.90', 'annually', 2),
(6, 'Premium', 21, '1.95', '49.99', 'quarterly', 2);";

if ($mysqli->query($sql) === TRUE) {
    echo "Membership data inserta con Successo<br>";
} else {
     echo 'Errore nella creazione della tabella !' .  $mysqli->error;
}

//CREATE TABLE
$sql = "CREATE TABLE IF NOT EXISTS `".$prefix."membership_items` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `plan_id` int(15) NOT NULL,
  `order_id` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;";

if ($mysqli->query($sql) === TRUE) {
    echo "Membership Items table creata con Successo<br>";
} else {
     echo 'Errore nella creazione della tabella !' .  $mysqli->error;
}

//INSERT TABLE
$sql = "INSERT INTO `".$prefix."membership_items` (`id`, `plan_id`, `order_id`, `title`) VALUES
(2, 1, 1, '1 GB Bandwidth'),
(3, 1, 4, 'Free Support!'),
(4, 1, 2, '500MB Disc Space'),
(5, 1, 3, '5 Users'),
(6, 1, 5, 'Free Setup'),
(7, 3, 1, '5GB Bandwidth'),
(8, 3, 2, '1GB Data Storage'),
(9, 3, 3, 'Another Cool Feature'),
(10, 3, 4, 'Free Setup!'),
(11, 3, 5, 'Awesome Support'),
(12, 6, 1, '10 GB Bandwidth'),
(13, 6, 2, '10 GB Data Storage'),
(14, 6, 3, '10X Faster Speeds!'),
(15, 6, 4, 'Advanced Stuff'),
(16, 6, 5, 'Free Setup'),
(17, 5, 1, 'Unlimited Bandwidth'),
(18, 5, 2, 'Unlimited Storage'),
(19, 5, 3, 'Unlimited Everything!'),
(20, 5, 4, 'Super Fast 100X Faster'),
(21, 5, 5, 'Free Setup');";

if ($mysqli->query($sql) === TRUE) {
    echo "Membership indici data inserti con Successo<br>";
} else {
    echo 'Errore nella creazione della tabella !' .  $mysqli->error;
}

//CREATE TABLE
$sql = "CREATE TABLE IF NOT EXISTS `".$prefix."page_tracker` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `session_id` int(15) NOT NULL,
  `action_order` int(10) NOT NULL,
  `page` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;";

if ($mysqli->query($sql) === TRUE) {
    echo "Page Tracker table creato con Successo<br>";
} else {
    echo 'Errore nella creazione della tabella !' .  $mysqli->error;
}

//CREATE TABLE
$sql = "CREATE TABLE IF NOT EXISTS `".$prefix."traffic_statistics` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(15) NOT NULL,
  `agent` varchar(255) NOT NULL,
  `ip` varchar(60) NOT NULL,
  `browser` varchar(30) NOT NULL,
  `device_type` int(1) NOT NULL,
  `os` varchar(30) NOT NULL,
  `country` varchar(3) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;";

if ($mysqli->query($sql) === TRUE) {
    echo "Tabella Statistiche dei Visitatori e Statistiche creata con successo<br>";
} else {
    echo 'Errore nella creazione della tabella !' .  $mysqli->error;
}
$mysqli->close();
echo 'Installazione Completata.. <a href="../index.php">Click qui per andare sul sito.';










































































































