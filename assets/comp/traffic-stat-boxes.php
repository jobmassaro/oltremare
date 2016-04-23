<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="stat-box">
			<a href="affiliates.php">
				<div class="stat-icon stat-primary hvr-bounce-in">
					<i class="fa-rocket"></i>
				</div>
				<div class="stat-data">
					<h2><?php total_unqiue();?> <span class="stat-info"><?php echo $lang['TOTAL_UNIQUE'];?></span></h2>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="stat-box">
			<a href="referral-traffic.php">
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