<?php $page = basename($_SERVER['PHP_SELF']);?>
<div class="side-heading">MENU</div>



<?php if($user_level=='1'){?>
<li class="side-menu menu-item <?php if($page=='dashboard.php'){echo 'active';}?>">
	<a href="dashboard.php">
		<i class="fa-desktop"></i> <?php echo $lang['DASHBOARDIT'];?><br />
	</a>   
</li>


<li class="side-menu menu-item <?php if($page=='user-management.php'){echo 'active';}?>">
	<a href="user-management.php">
		<i class="fa-users"></i> <?php echo $lang['USERS_MANAGEMENT'];?>
	</a>
</li>
<!-- -->

<li class="side-menu menu-item <?php if($page=='formazine.php'){echo 'active';}?>">
	<a href="formazione.php">
		<i class="fa fa-list" aria-hidden="true"></i><?php echo 'FORMAZIONE';?>
	</a>
</li>

<li class="side-menu menu-item <?php if($page=='scuolextra.php'){echo 'active';}?>">
	<a href="scuolextra.php">
		<i class="fa fa-list" aria-hidden="true"></i><?php echo 'SCUOLE EXTRA';?>
	</a>
</li>

<li class="side-menu menu-item <?php if($page=='prenotazioni.php'){echo 'active';}?>">
	<a href="prenotazioni.php">
		<i class="fa fa-bookmark" aria-hidden="true"></i><?php echo 'PRENOTAZIONI';?>
	</a>
</li>

<!-- -->

<li class="side-menu menu-item <?php if($page=='traffic-statistics.php'){echo 'active';}?>">
	<a href="traffic-statistics.php">
		<i class="fa-rocket"></i> <?php echo $lang['TRAFFIC_STATISTICS'];?>
	</a>
</li>
<li class="side-menu menu-item <?php if($page=='settings.php' || $page=='rl-settings.php' || $page=='user-levels.php' || $page=='email-welcome.php' || $page=='send-email.php' || $page=='update.php'){echo 'active';}?>" >
	<a href="#" data-toggle="collapse" data-target="#settings-sub-menu">
		<i class="fa-cog"></i> <?php echo 'IMPOSTAZIONI';?>
	</a>
	<ul id="settings-sub-menu" class="collapse">
		<li class="sub-menu"><a href="settings.php"><i class="fa-list-alt"></i> <?php echo $lang['SITE_SETTINGS'];?></a></li>
		<li class="sub-menu"><a href="rl-settings.php"><i class="fa-key"></i> <?php echo $lang['REGISTER_LOGIN_SETTINGS'];?></a></li>
		<li class="sub-menu"><a href="membership-settings.php"><i class="fa-users"></i> <?php echo $lang['MEMBERSHIP_SETTINGS'];?></a></li>
		<li class="sub-menu"><a href="user-levels.php"><i class="fa-list-numbered"></i> <?php echo $lang['PERMISSION_LEVELS'];?></a></li>
		<li class="sub-menu"><a href="inactivity-settings.php"><i class="fa-pause"></i> <?php echo $lang['INACTIVITY_SETTINGS'];?></a></li>
		<li class="sub-menu"><a href="email-welcome.php"><i class="fa-mail"></i> <?php echo $lang['EMAIL_SETTINGS'];?></a></li>
		<li class="sub-menu"><a href="send-email.php"><i class="fa-mail-alt"></i> <?php echo $lang['SEND_EMAIL'];?></a></li>
		<li class="sub-menu"><a href="update.php"><i class="fa-up-circled2"></i> <?php echo $lang['UPDATE'];?></a></li>
	</ul>
</li>
<?php }else if($user_level=='2'){ ?>
	<li class="side-menu menu-item <?php if($page=='dashboard.php'){echo 'active';}?>">
	<a href="dashboard.php">
		<i class="fa-users"></i> <?php echo $lang['PROFILE_USER'];?><br />
	</a>   
</li>
<li class="side-menu menu-item <?php if($page=='prenotacorso.php'){echo 'active';}?>">
	<a href="prenotacorso.php">
		<i class="fa fa-bookmark" aria-hidden="true"></i><?php echo 'PRENOTA CORSO';?>
	</a>
</li>
<?php }else if($user_level=='3'){ ?>
<li class="side-menu menu-item <?php if($page=='dashboard.php'){echo 'active';}?>">
	<a href="dashboard.php">
		<i class="fa-users"></i> <?php echo $lang['PROFILE_TEACHER'];?><br />
	</a>   
</li>
<?php }else if($user_level=='4'){ ?>
<li class="side-menu menu-item <?php if($page=='dashboard.php'){echo 'active';}?>">
	<a href="dashboard.php">
		<i class="fa-users"></i> <?php echo $lang['PROFILE_FORNITORE'];?><br />
	</a>   
</li>

<?php } ?>

<li class="side-menu menu-item <?php if($page=='forum/'){echo 'active';}?>">
	<a href="forum/">
		<i class="fa fa-toggle-on"></i> <?php //echo $lang['FORUM'];?>
	</a>
</li>
<li class="side-menu menu-item <?php if($page=='calendario.php'){echo 'active';}?>">
	<a href="calendario/index.php">
		<i class="fa fa-calendar"></i> <?php //echo $lang['CALENDARIO'];?>
	</a>
</li>
