<nav class="navbar navbar-default navbar-fixed-top">
		<!-- Logo -->
		<div class="logo">
			<a href="dashboard.php"> <img src="assets/logos/<?php echo $site_logo;?>">
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
				<li class="dropdown account-dropdown" >
					<a href="access/logout.php"><i class="icon-danger fa fa-fw fa-circle-notch"></i> <?php echo $lang['LOGOFF'];?></a>
				</li>
				<!-- End My Account Dropdown -->
			</ul><!-- End Notfications --> 
        </div>
   </nav><!-- End Top Navigation --> 