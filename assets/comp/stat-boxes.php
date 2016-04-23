<div class="row">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="stat-box">
			<a href="#">
				<div class="stat-icon stat-primary hvr-bounce-in">
					<i class="fa-users"></i>
				</div>
				<div class="stat-data">
					<h2><?php total_users();?> <span class="stat-info"><?php echo $lang['TOTAL_USERS'];?></span></h2>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="stat-box">
			<a href="#">
				<div class="stat-icon stat-success hvr-bounce-in">
					<i class="fa-mail"></i>
				</div>
				<div class="stat-data">
					<h2><?php total_confirmed();?> <span class="stat-info"><?php echo $lang['TOTAL_CONFIRMED'];?></span></h2>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="stat-box">
			<a href="#">
				<div class="stat-icon stat-primary hvr-bounce-in">
					<i class="fa-rocket"></i>
				</div>
				<div class="stat-data">
					<h2><?php total_unqiue();?> <span class="stat-info"><?php echo $lang['TOTAL_UNIQUE'];?></span></h2>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="stat-box">
			<a href="#">
				<div class="stat-icon stat-default hvr-bounce-in">
					<i class="fa-docs"></i>
				</div>
				<div class="stat-data">
					<h2><?php total_page_views();?> <span class="stat-info"><?php echo $lang['TOTAL_PAGE_VIEWS'];?></span></h2>
				</div>
			</a>
		</div>
	</div>
</div>