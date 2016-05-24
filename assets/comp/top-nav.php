<nav class="navbar navbar-default navbar-fixed-top">
		<!-- Logo -->
		<div class="logo">
			<a href="dashboard.php"> <img src="assets/img/logo-oltremare-1985.png">
			</a>
		</div>
		<!-- End Logo -->
		<div id="navbar">
			<ul class="nav navbar-nav">
				<li class="active menu-toggle">
					<a href="#menu-toggle" id="menu-toggle">
						<i class="fa fa-menu"></i>
					</a>
				</li>
				
			</ul>
			
			<!-- Start Notifications -->
			<ul class="nav navbar-nav navbar-right notifications">
				<li class="dropdown language">
					<div class="control-group">
					  <div class="controls">
						  <form method="post" action="lang/change-lang.php">
								<div class="lang-select">
									<button type="button" class="btn btn-default" value="it" <?php if($language=='it'){echo 'selected="selected"';}?> style="background-color:white; color:black;">Italiano</button>
							  <!--<select onchange="this.form.submit()" name="selected_lang" class="input-large">
							  	  <option value="it" <?php if($language=='it'){echo 'selected="selected"';}?>>Italiano</option>
								<!--  <option value="en" <?php if($language=='en'){echo 'selected="selected"';}?>>English</option>
								  <option value="fr" <?php if($language=='fr'){echo 'selected="selected"';}?>>French</option>
								  <option value="de" <?php if($language=='de'){echo 'selected="selected"';}?>>German</option>
								  <option value="es" <?php if($language=='es'){echo 'selected="selected"';}?>>Spanish</option> -->
								</select>
								</div>
						  </form>
							
					  </div>
					</div>
				</li>
				
				<!-- Start My Account Dropdown -->
				<li class="dropdown account-dropdown"  style="color:red">

					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php avatar($user_id);?>
						<span class="navbar-user"><span><?php echo ucwords($user_name);?></span></span>
						<b class="caret"></b>
					</a>
					<ul class="nav-account dropdown-menu">
						<li>
							<a href="profile.php"><i class="icon-primary fa fa-fw fa-smile"></i> <?php echo $lang['ACCOUNT_PROFILE'];?></a>
						</li>
						
						<?php 
							
							$lang_u = $lang['USER_MANAGEMENT'];
							$lang_a = $lang['ADMIN_SETTINGS'];
							admin_control($admin_user, $lang_u, $lang_a);
						?>
						
						 <li><a href="change_password.php"><i class="fa fa-pencil fa-fw"></i>Cambia Password</a></li>

						<li>
							<a href="access/logout.php"><i class="icon-danger fa fa-fw fa-circle-notch"></i> Esci</a>
						</li>

					</ul>
				</li>
				<!-- End My Account Dropdown -->
			</ul><!-- End Notfications --> 
        </div>
   </nav><!-- End Top Navigation --> 