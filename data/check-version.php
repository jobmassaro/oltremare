<h4>
  Files Version
</h4>
<?php
define('REMOTE_VERSION', 'http://jdwebdesigner.com/update/login-pro/version.txt');
define('VERSION', '1.2.1');
$script = file_get_contents(REMOTE_VERSION);
$version = VERSION;
if($version < $script) {
  echo '<div class="alert alert-danger"> 
             <h3>Your Version: '.$version.'</h3>
             <h3>Latest Version: '.$script.'</h3>
             <p>Download latest files from codecanyon.net</p>
          </div>';
    
} else {
     echo '<div class="alert alert-success"> 
             <h3>Your Version: '.$version.'</h3>
             <h3>Latest Version: '.$script.'</h3>
             <p>Files are the most updated version - Remember to upgrade your database below if necessary.</p>
          </div>';
}
?>
<hr>
<h4>
  Database Upgrades Available
</h4>
<li><a href="install/update1.0-1.2.php">Upgrade from V1.0 to V1.2 </a>(clicking will start update)</li>
<li><a href="install/update1.2-1.2.1.php">Upgrade from V1.2 to V1.2.1 </a>(clicking will start update)</li>