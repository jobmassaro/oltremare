<?php
/* ===========================================
	TOP NAV FUNCTION 
   ========================================= */
function admin_control($admin_user, $lang_u, $lang_a){
	if($admin_user=='1'){
	echo '<li>
		<a href="user-management.php"><i class="icon-default fa fa-fw fa-user"></i> '.$lang_u.'</a>
	</li>
	<li>
		<a href="settings.php"><i class="icon-default fa fa-fw fa-cog"></i> '.$lang_a.'</a>
	</li>';}
}

function avatar($userid){
	include('auth/db-connect.php');
	$get_email = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT email FROM ".$prefix."members WHERE id=$userid"));
	$email = $get_email['email'];
	//GRAVATAR IMAGE URL
	$size = 40;
	$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
	echo '<img src="'.$grav_url.'">';
}

/* ===========================================
	PROFILE FUNCTION 
   ========================================= */

function profile_name($owner){
	include('auth/db-connect.php');
	$get_profile = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT fullname FROM ".$prefix."members WHERE id=$owner"));
	$name = $get_profile['fullname'];
	echo $name;
}

function profile_img($owner){
	include('auth/db-connect.php');
	$get_profile = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT avatar FROM ".$prefix."members WHERE id=$owner"));
	if($get_profile['avatar']==''){
		//GRAVATAR IMAGE URL
		$email = $get_profile['email'];
		$size = 180;
		$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
		echo '<img src="'.$grav_url.'">';
	}
}

function profile_details($owner){
	include('auth/db-connect.php');
	include('lang/'.$_SESSION['language'].'.php');
	$get_profile = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT fullname, email, username FROM ".$prefix."members WHERE id=$owner"));
	$profile_name = $get_profile['fullname'];
	$profile_email = $get_profile['email'];
	$profile_username = $get_profile['username'];
	echo '
		<form method="post" action="data/update-user.php">
			<input type="text" name="f" value="'.$profile_name.'">
			<input type="text" name="e" value="'.$profile_email.'">
			<input type="submit" class="btn btn-success" value="Save">
		</form>';

}

/* ===========================================
	PERMISSION LEVELS FUNCTION 
   ========================================= */
function permission_levels_table($language){
	include('auth/db-connect.php');
	include('lang/'.$language.'.php');
	$query = "SELECT * FROM ".$prefix."permission_levels ORDER BY level ASC";
	$query = $mysqli->real_escape_string($query);
		if($result = $mysqli->query($query)){
			$num_results = mysqli_num_rows($result);
			while($row = $result->fetch_array())
				{
				$user_level = $row['level'];
				echo '<tr>
						<form method="post" action="data/update-level.php">
						<input type="hidden" name="lid" value="'.$row['id'].'">
						<td><input type="text" name="lname" value="'.$row['name'].'"></td>
						<td>';if($row['level']=='1'){echo $row['level']; echo '<input type="hidden" name="level" value="1">';}else{echo '<input type="text" name="level" value="'.$row['level'].'" style="width:50px;">';} echo '</td>
						<td><input type="text" name="redirect_login" value="';if($row['redirect_login']==''){echo '(Default Redirect)';}else{echo $row['redirect_login'];} echo '" style="width:300px;"></td>
						<td>';total_users_by_level($user_level); echo '
						<td>
						<input type="submit" class="btn btn-sm btn-success" value="'.$lang['SAVE_CHANGES'].'" style="float:left;">
						</form>';
						if($row['level']!='1'){ echo '
							<form method="post" action="data/delete-level.php">
								<input type="hidden" name="m" value="'.$row['id'].'">
								<input type="submit" class="btn btn-sm btn-danger" value="'.$lang['DELETE'].'" style="float:left;">
							</form>';} echo '
						</td>
					</tr>';
			}
		}
}

function permission_select($default_level){
	include('auth/db-connect.php');
	$query = "SELECT * FROM ".$prefix."permission_levels ORDER BY level ASC";
	$query = $mysqli->real_escape_string($query);
		if($result = $mysqli->query($query)){
			$num_results = mysqli_num_rows($result);
			while($row = $result->fetch_array())
				{
				echo '<option value="'.$row['level'].'"';if($default_level==$row['level']){echo 'selected';}echo '>'.$row['name'].'</option>';
			}
		}
}

function permission_select_selected($user_level){
	include('auth/db-connect.php');
	$query = "SELECT * FROM ".$prefix."permission_levels ORDER BY level ASC";
	$query = $mysqli->real_escape_string($query);
		if($result = $mysqli->query($query)){
			$num_results = mysqli_num_rows($result);
			while($row = $result->fetch_array())
				{
				echo '<option value="'.$row['level'].'"';if($user_level==$row['level']){echo 'selected';}echo '>'.$row['name'].'</option>';
			}
		}
}

/* ===========================================
	MEMBERSHIP PLANS FUNCTION 
   ========================================= */
function membership_plans_table($language){
	include('auth/db-connect.php');
	include('lang/'.$language.'.php');
	$query = "SELECT * FROM ".$prefix."memberships ORDER BY membership_cost ASC";
	$query = $mysqli->real_escape_string($query);
		if($result = $mysqli->query($query)){
			$num_results = mysqli_num_rows($result);
			while($row = $result->fetch_array())
				{
				$user_level = $row['level'];
				echo '<tr>
						<form method="post" action="data/update-membership.php">
						<input type="hidden" name="pid" value="'.$row['id'].'">
						<td><input type="text" name="title" value="'.$row['title'].'"></td>
						<td><input type="text" name="trial_period" value="'.$row['trial_period'].'"></td>
						<td><input type="text" name="trial_cost" value="'.$row['trial_cost'].'"></td>
						<td><input type="text" name="membership_cost" value="'.$row['membership_cost'].'"></td>
						<td>
						<select name="recurring_period">
							<option value="0"'; if($row['recurring_period']=='0'){echo 'selected';} echo '>Never, One-time Fee</option>
							<option value="daily" '; if($row['recurring_period']=='daily'){echo 'selected';} echo '>Daily</option>
							<option value="weekly" '; if($row['recurring_period']=='weekly'){echo 'selected';} echo '>Weekly</option>
							<option value="biweekly" '; if($row['recurring_period']=='biweekly'){echo 'selected';} echo '>Bi-Weekly</option>
							<option value="monthly" '; if($row['recurring_period']=='monthly'){echo 'selected';} echo '>Monthly</option>
							<option value="quarterly" '; if($row['recurring_period']=='quarterly'){echo 'selected';} echo '>Quarterly</option>
							<option value="semi-annually" '; if($row['recurring_period']=='semi-annually'){echo 'selected';} echo '>Semi-Annually</option>
							<option value="annually" '; if($row['recurring_period']=='annually'){echo 'selected';} echo '>Annually</option>
						</select>
						</td>
						<td>
						<select name="user_level">';
							permission_select_selected($row['user_level']); echo '
						</select>
						</td>
						<td><a href="membership-items.php?pid='.$row['id'].'" class="btn btn-xs btn-primary">View / Edit</a></td>
						<td>
						<input type="submit" class="btn btn-xs btn-success" value="Save" style="float:left;">
						</form>';
						if($row['level']!='1'){ echo '
							<form method="post" action="data/delete-membership.php" style="float:left;">
								<input type="hidden" name="m" value="'.$row['id'].'">
								<input type="submit" class="btn btn-xs btn-danger" value="Delete" >
							</form>';} echo '
						</td>
					</tr>';
			}
		}
}

function membership_items_table($pid){
	include('auth/db-connect.php');
	include('lang/'.$language.'.php');
	$query = "SELECT * FROM ".$prefix."membership_items WHERE plan_id=$pid ORDER BY order_id ASC";
	$query = $mysqli->real_escape_string($query);
		if($result = $mysqli->query($query)){
			$num_results = mysqli_num_rows($result);
			while($row = $result->fetch_array())
				{
				echo '<tr>
						<form method="post" action="data/update-membership-item.php">
						<input type="hidden" name="iid" value="'.$row['id'].'">
						<td><input type="text" name="title" value="'.$row['title'].'" style="width:80%;"></td>
						<td><input type="text" name="order_id" value="'.$row['order_id'].'"></td>
						<td><input type="submit" class="btn btn-sm btn-success" value="Save" style="float:left;">
						</form>';
						if($row['level']!='1'){ echo '
							<form method="post" action="data/delete-membership-item.php" style="float:left;">
								<input type="hidden" name="m" value="'.$row['id'].'">
								<input type="submit" class="btn btn-sm btn-danger" value="Delete" >
							</form>';} echo '
						</td>
					</tr>';
			}
		}
}

function get_membership_name($pid){
	include('auth/db-connect.php');
	$get_settings = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM ".$prefix."memberships WHERE id=$pid"));
	$plan_title = $get_settings['title'];
	echo $plan_title;
}

function membership_pricing_table($register_page){
	include('auth/db-connect.php');
	$query = "SELECT * FROM ".$prefix."memberships ORDER BY membership_cost ASC";
	$query = $mysqli->real_escape_string($query);
		if($result = $mysqli->query($query)){
			$num_results = mysqli_num_rows($result);
			while($row = $result->fetch_array())
				{
				$cost = $row['membership_cost']; $dollar = floor($cost); $cents = substr(number_format($cost - $dollar, 2), 2);
				if($row['recurring_period']=='0'){$rp='One-time';}
				if($row['recurring_period']=='daily'){$rp='a day';}
				if($row['recurring_period']=='weekly'){$rp='wk.';}
				if($row['recurring_period']=='biweekly'){$rp='2 weeks';}
				if($row['recurring_period']=='monthly'){$rp='mo.';}
				if($row['recurring_period']=='quarterly'){$rp='qtr.';}
				if($row['recurring_period']=='annually'){$rp='yr.';}
				echo '<div class="col-sm-3">
								<div class="panel panel-default text-center">
									<div class="plan-heading">
										<h3>'.$row['title'].'</h3>
									</div>
									<div class="panel-body">
										<h3 class="panel-title price">$'.$dollar.'<span class="price-cents">'.$cents.'</span><span class="price-month">'.$rp.'</span></h3>
									</div>
									<ul class="list-group">';
									$plan_id = $row['id'];
									$queryB = "SELECT * FROM ".$prefix."membership_items WHERE plan_id=$plan_id ORDER BY order_id ASC";
									$queryB = $mysqli->real_escape_string($queryB);
										if($resultB = $mysqli->query($queryB)){
											$num_resultsB = mysqli_num_rows($resultB);
											while($rowB = $resultB->fetch_array())
												{
													echo '<li class="list-group-item">'.$rowB['title'].'</li>';
											}
										}
										if($row['trial_period']!='0'){
												echo '<li class="list-group-item">'.$row['trial_period'].' day trial for '; if($row['trial_cost']=='0.00'){echo '<strong>Free!</strong>';}else{echo '$'.$row['trial_cost'];} echo '</li>';
										}
				
										echo '<li class="list-group-item"><a href="'.$register_page.'?plan='.$row['id'].'" class="btn btn-success">Sign Up Now!</a></li>
									</ul>
								</div>          
							</div>';
			}
		}
}


function membership_select($plan){
	include('auth/db-connect.php');
	$query = "SELECT * FROM ".$prefix."memberships ORDER BY membership_cost ASC";
	$query = $mysqli->real_escape_string($query);
		if($result = $mysqli->query($query)){
			$num_results = mysqli_num_rows($result);
			while($row = $result->fetch_array())
				{
				echo '<option value="'.$row['id'].'"';if($plan==$row['id']){echo 'selected';}echo '>'.$row['title'].' ($'.$row['membership_cost'].')</option>';
			}
		}
}
/* ===========================================
	TRAFFIC STATS FUNCTION 
   ========================================= */
function traffic_table(){
	include('auth/db-connect.php');
	include('lang/'.$language.'.php');
	$query = "SELECT * FROM ".$prefix."traffic_statistics ORDER BY id DESC";
	$query = $mysqli->real_escape_string($query);
		if($result = $mysqli->query($query)){
			$num_results = mysqli_num_rows($result);
			while($row = $result->fetch_array())
				{
				echo '<tr>
						<td>'.$row['ip'].'</td>
						<td>'.$row['browser'].'</td>
						<td>'; if($row['device_type']=='1'){echo 'Desktop';} if($row['device_type']=='2'){echo 'Phone';} if($row['device_type']=='3'){echo 'Tablet';} echo'</td>
						<td>'.$row['os'].'</td>
						<td>'.$row['country'].'</td>
						<td>'.date("m/d/Y H:m",strtotime($row['datetime'])).'</td>
						<td>
							<form method="post" action="page-track.php" style="float:left;">
								<input type="hidden" name="page" value="'.$row['id'].'">
								<input type="submit" class="btn btn-sm btn-primary" value="View Page Track">
							</form>
							<form method="post" action="data/delete-traffic.php" style="float:left;">
								<input type="hidden" name="m" value="'.$row['id'].'">
								<input type="submit" class="btn btn-sm btn-danger" value="Delete">
							</form>
						</td>
					</tr>';
			}
		}
}

function page_track_table($page_id){
	include('auth/db-connect.php');
	include('lang/'.$language.'.php');
	$query = "SELECT * FROM ".$prefix."page_tracker WHERE session_id=$page_id ORDER BY action_order DESC";
	$query = $mysqli->real_escape_string($query);
		if($result = $mysqli->query($query)){
			$num_results = mysqli_num_rows($result);
			while($row = $result->fetch_array())
				{
				echo '<tr>
						<td>'.$row['action_order'].'</td>
						<td>'.$row['page'].'</td>
						<td>'.date("m/d/Y H:i",strtotime($row['datetime'])).'</td>
						<td>
							<form method="post" action="data/delete-page-track.php" style="float:left;">
								<input type="hidden" name="m" value="'.$row['id'].'">
								<input type="submit" class="btn btn-sm btn-danger" value="Delete">
							</form>
						</td>
					</tr>';
			}
		}
}

/* ===========================================
	USER MANAGEMENT FUNCTION 
   ========================================= */
function user_table(){
	include('auth/db-connect.php');
	include('lang/'.$language.'.php');
	$query = "SELECT * FROM ".$prefix."members ORDER BY name ASC";
	$query = $mysqli->real_escape_string($query);
	if($result = $mysqli->query($query)){

			$num_results = mysqli_num_rows($result);
			while($row = $result->fetch_array())
				{
				$member = $row['id'];
				$terms = $row['terms'];
				$user_level = $row['user_level'];
				$plan = $row['plan_id'];
				/**/
				$plus = 138;
				$minus = 59;

				$totalnumber = $plus + $minus;

				$pluspercent = round(($plus / $totalnumber) * 100);
				$minuspercent = round(($minus / $totalnumber) * 100);

				$total = round($plus + $minus);
				$totalVotes += $total;

				/**/


				echo '<tr>
						<td>'.$row['name'].'</td>
						<td>'.$row['surname'].'</td>
						<td>'.$row['username'].'</td>
						<td>'.$row['email'].'</td>
						<td>';if($row['email_confirmed']=='1'){echo 'Yes';}else{echo 'No';} echo '</td>
						<td>'; if($terms=='1'){echo 'Yes';}else{echo 'No';} echo '</td>
						<td>
							<form method="post" action="data/change-user-membership.php">
								<input type="hidden" name="m" value="'.$row['id'].'">
								<select name="l" onchange="this.form.submit()">
									<option value="">None</option>';
									membership_select($plan); echo '
								</select>
							</form>
						</td>
						<td>
							<form method="post" action="data/change-user-level.php">
								<input type="hidden" name="m" value="'.$row['id'].'">
								<select name="l" onchange="this.form.submit()">';
									permission_select_selected($user_level); echo '
								</select>
							</form>
						</td>
						<td>
						<form method="post" action="data/change-user-status.php">
							<input type="hidden" name="m" value="'.$row['id'].'">
							<select name="status" onchange="this.form.submit()">
								<option value="">No Status Set</option>
								<option value="active"'; if($row['status']=='active'){echo 'selected';} echo '>Active</option>
								<option value="inactive"'; if($row['status']=='inactive'){echo 'selected';} echo '>Inactive</option>
								<option value="suspended"'; if($row['status']=='suspended'){echo 'selected';} echo '>Suspended</option>
								<option value="cancelled"'; if($row['status']=='cancelled'){echo 'selected';} echo '>Cancelled</option>
							</select>
						</form>
						<td>'.date("m/d/Y",strtotime($row['reg_date'])).'</td>
						<td>
							<div class="graphcont"><div class="graph"><strong class="bar" style="width:'.$pluspercent.'%;">'.$pluspercent.'%</strong></div></div>
						</td>
						<td>';if($row['last_login']=="0000-00-00 00:00:00"){echo 'Never';}else{echo date("m/d/Y",strtotime($row['last_login']));} echo '</td>
						<td>
							<form method="post" action="data/delete-user.php">
								<input type="hidden" name="m" value="'.$row['id'].'">
								<input type="submit" class="btn btn-sm btn-danger" value="Delete">
							</form>
						</td>
						<td>
							<form method="post" action="data/edit-user.php">
								<input type="hidden" name="m" value="'.$row['id'].'">
								<input type="submit" class="btn btn-sm btn-info" value="Edit">
							</form>
						</td>
					</tr>';
			}
		}
}

/* ===========================================
	PROFILE COMPLETE FUNCTIONS	 
   ========================================= */
function user_table_complete(){
	include('auth/db-connect.php');
	include('lang/'.$language.'.php');

	$query = "SELECT * FROM ".$prefix."members ORDER BY name ASC";
	$query = $mysqli->real_escape_string($query);
	if($result = $mysqli->query($query))
	{
		$num_results = mysqli_num_rows($result);
		while($row = $result->fetch_array())
		{
			$maxinumPoints = 100;
			$point = 0;

			$q = "SELECT * FROM ".$prefix."profile_complete WHERE idmember = " .$row['id'] ."";
			$q = $mysqli->real_escape_string($q);
			$n = '';
			if($r = $mysqli->query($q))
			{
				$num = mysqli_num_rows($r);
				if($num == null )
				{
					$n ='<div class="graphcont"><div class="graph"><strong class="bar" style="width:'.$pluspercent.'%;color:red;">30%</strong></div></div>';
					
				}else if(count($num)>0)
				{
					$n ='<div class="graphcont"><div class="graph"><strong class="bar" style="width:'.$pluspercent.'%;color:green;">100%</strong></div></div>';
				}
					
			}
			//
			$member = $row['id'];
				$terms = $row['terms'];
				$user_level = $row['user_level'];
				$plan = $row['plan_id'];
				/**/
				$plus = 138;
				$minus = 59;

				$totalnumber = $plus + $minus;

				$pluspercent = round(($plus / $totalnumber) * 100);
				$minuspercent = round(($minus / $totalnumber) * 100);

				$total = round($plus + $minus);
				$totalVotes += $total;

				/**/


				echo '<tr>
						<td>'.$row['name'].'</td>
						<td>'.$row['surname'].'</td>
						<td>'.$row['username'].'</td>
						<td>'.$row['email'].'</td>
						<td>';if($row['email_confirmed']=='1'){echo 'Yes';}else{echo 'No';} echo '</td>
						<td>'; if($terms=='1'){echo 'Yes';}else{echo 'No';} echo '</td>
				<!--		<td>
							<form method="post" action="data/change-user-membership.php">
								<input type="hidden" name="m" value="'.$row['id'].'">
								<select name="l" onchange="this.form.submit()">
									<option value="">None</option>';
									membership_select($plan); echo '
								</select>
							</form>
						</td> -->
						<td>
							<form method="post" action="data/change-user-level.php">
								<input type="hidden" name="m" value="'.$row['id'].'">
								<select name="l" onchange="this.form.submit()">';
									permission_select_selected($user_level); echo '
								</select>
							</form>
						</td>
						<td>
						<form method="post" action="data/change-user-status.php">
							<input type="hidden" name="m" value="'.$row['id'].'">
							<select name="status" onchange="this.form.submit()">
								<option value="">No Status Set</option>
								<option value="active"'; if($row['status']=='active'){echo 'selected';} echo '>Active</option>
								<option value="inactive"'; if($row['status']=='inactive'){echo 'selected';} echo '>Inactive</option>
								<option value="suspended"'; if($row['status']=='suspended'){echo 'selected';} echo '>Suspended</option>
								<option value="cancelled"'; if($row['status']=='cancelled'){echo 'selected';} echo '>Cancelled</option>
							</select>
						</form>
						<td>'.date("m/d/Y",strtotime($row['reg_date'])).'</td>
						<td>' . $n . '</td>
						<td>';if($row['last_login']=="0000-00-00 00:00:00"){echo 'Never';}else{echo date("m/d/Y",strtotime($row['last_login']));} echo '</td>
						<td>
							<form method="post" action="data/delete-user.php">
								<input type="hidden" name="m" value="'.$row['id'].'">
								<input type="submit" class="btn btn-sm btn-danger" value="Delete">
							</form>
						</td>
						<td>
							<form method="post" action="edit-user.php">
								<input type="hidden" name="m" value="'.$row['id'].'">
								<input type="submit" class="btn btn-sm btn-info" value="Edit">
							</form>
						</td>
						<td>
							<form method="post" action="show-user.php">
								<input type="hidden" name="m" value="'.$row['id'].'">
								<input type="submit" class="btn btn-sm btn-success" value="Dettagli">
							</form>
						</td>
					</tr>';
			
		}
	}


	
	
}


/* ===========================================
	PROFILE COMPLETE FUNCTIONS	 
   ========================================= */
function user_table_complete2(){
	include('auth/db-connect.php');
	include('lang/'.$language.'.php');

	$query = "SELECT * FROM ".$prefix."members ORDER BY name ASC";
	$query = $mysqli->real_escape_string($query);
	if($result = $mysqli->query($query))
	{
		$num_results = mysqli_num_rows($result);
		while($row = $result->fetch_array())
		{
			$maxinumPoints = 100;
			$point = 0;

			$q = "SELECT * FROM ".$prefix."profile_complete WHERE idmember = " .$row['id'] ."";
			$q = $mysqli->real_escape_string($q);
			$n = '';
			if($r = $mysqli->query($q))
			{
				$num = mysqli_num_rows($r);
				if($num == null )
				{
					$n ='<div class="graphcont"><div class="graph"><strong class="bar" style="width:'.$pluspercent.'%;color:red;">30%</strong></div></div>';
					
				}else if(count($num)>0)
				{
					$n ='<div class="graphcont"><div class="graph"><strong class="bar" style="width:'.$pluspercent.'%;color:green;">100%</strong></div></div>';
				}
					
			}
			//
			$member = $row['id'];
				$terms = $row['terms'];
				$user_level = $row['user_level'];
				$plan = $row['plan_id'];
				/**/
				$plus = 138;
				$minus = 59;

				$totalnumber = $plus + $minus;

				$pluspercent = round(($plus / $totalnumber) * 100);
				$minuspercent = round(($minus / $totalnumber) * 100);

				$total = round($plus + $minus);
				$totalVotes += $total;

				/**/
				$pic = ($row['profilo_pic'] <> "") ? $row['profilo_pic'] : "profile_pic/no_avatar.png" ;
			

				echo '<tr style="text-align:center;">
						<td><a href="#" target="_black"><img src="'. $pic.'" alt="" width="50" height="50"> </td>
						<td>'.$row['name'].'</td>
						<td>'.$row['surname'].'</td>
						<td>'.$row['username'].'</td>
						<td>'.$row['email'].'</td>
						<td>';if($row['email_confirmed']=='1'){echo 'Yes';}else{echo 'No';} echo '</td>
						<td>'; if($terms=='1'){echo 'Yes';}else{echo 'No';} echo '</td>
				
						<td>
							<form method="post" action="data/change-user-level.php">
								<input type="hidden" name="m" value="'.$row['id'].'">
								<select name="l" onchange="this.form.submit()">';
									permission_select_selected($user_level); echo '
								</select>
							</form>
						</td>
						<td>'.date("m/d/Y",strtotime($row['reg_date'])).'</td>
						<td>' ;if($row['certificatomedico']=='' ||$row['certificatomedico'] =='0' ){echo 'NO';}else{echo 'SI';} echo '</td>
						<td>' . $n . '</td>
						<td>';if($row['last_login']=="0000-00-00 00:00:00"){echo 'Never';}else{echo date("d/m/Y",strtotime($row['last_login']));} echo '</td>
						<td>
							<form method="post" action="data/delete-user.php">
								<input type="hidden" name="m" value="'.$row['id'].'">
								<input type="submit" class="btn btn-sm btn-danger" value="Cancella">
							</form>
						</td>
						<td>
							<form method="post" action="manager-users.php">
								<input type="hidden" name="m" value="'.$row['id'].'">
								<input type="submit" class="btn btn-sm btn-info" value="Dettagli">
							</form>
						</td>
					</tr>';
			
		}
	}


	
	
}

/* ===========================================
	GET PROVINCIE	 
   ========================================= */
function get_comune()
{
	$table_name = $prefix . "provincie";
								$column_name = "";

								$query = "SELECT * FROM " . $table_name .' ORDER BY comune ASC; ' ;

								echo '<td align=\"left\" ><select id="regioni" class="showcase themes select-theme-default" placeholder="">';
								
								$result = $mysqli->query($query);

								if($result) 
								{
									while($row = mysqli_fetch_assoc($result)){
										printf("<option value=\"%s\">%s</option>\n", $row['comune'], $row['comune']);
									}
								}


   	 							echo "</select></td></tr>";

}

/* ===========================================
	EMAIL FUNCTIONS	 
   ========================================= */
function get_users_management(){
	include('auth/db-connect.php');
	include('lang/'.$language.'.php');

	$table_name = $prefix . "members";
	$column_name = "";

	$query = "SELECT * FROM " . $table_name .' ORDER BY name ASC; ' ;

	$result = $mysqli->query($query);

	if($result) 
	{
		
		while($row = mysqli_fetch_assoc($result))
		{

			$q = "SELECT * FROM ".$prefix."profile_complete WHERE idmember = " .$row['id'] ."";
			$q = $mysqli->real_escape_string($q);
			$n = '';
			if($r = $mysqli->query($q))
			{
				$num = mysqli_num_rows($r);
				if($num == null )
				{
					$n ='<div class="graphcont"><div class="graph"><strong class="bar" style="width:'.$pluspercent.'%;color:red;">30%</strong></div></div>';
					
				}else if(count($num)>0)
				{
					$n ='<div class="graphcont"><div class="graph"><strong class="bar" style="width:'.$pluspercent.'%;color:green;">100%</strong></div></div>';
				}
					
			}
			



			echo ' <tr style="text-align: center";>';
			$pic = ($row['profile_pic'] <> "") ? $row['profile_pic'] : "no_avatar.png" ;
			echo '<td><a href="profile_pic/"' .  $pic .'" target="_black"><img src="profile_pic/'. $pic.'" alt="" width="50" height="50"> </td>';	
			echo '<td>' .$row['name'].' </td>';	
			echo '<td>' .$row['surname'].' </td>';	
			echo '<td>' .$row['username'].' </td>';	
			echo '<td>' .$row['email'].' </td>';	
			echo '<td>';if($row['email_confirmed']=='1'){echo 'Yes';}else{echo 'No';} echo '</td>';
			echo '<td>'; if($terms=='1'){echo 'Yes';}else{echo 'No';} echo '</td>';
			echo '<td>
							<form method="post" action="data/change-user-level.php">
								<input type="hidden" name="m" value="'.$row['id'].'">
								<select name="l" onchange="this.form.submit()">';
									permission_select_selected($user_level); echo '
								</select>
							</form>
						</td>';
			echo '<td>'.date("m/d/Y",strtotime($row['reg_date'])).'</td>';
			echo '<td>';if($row['certificato_medico']=='1'){echo 'Yes';}else{echo 'No';} echo '</td>';
			echo '<td>' .$n.' </td>';	
			echo '<td>';if($row['last_login']=="0000-00-00 00:00:00"){echo 'Never';}else{echo date("m/d/Y",strtotime($row['last_login']));} echo '</td>';
			echo '<td>
							<form method="post" action="data/delete-user.php">
								<input type="hidden" name="m" value="'.$row['id'].'">
								<input type="submit" class="btn btn-sm btn-danger" value="Cancella">
							</form>
						</td>
						<td>
							<form method="post" action="edit-user.php">
								<input type="hidden" name="m" value="'.$row['id'].'">
								<input type="submit" class="btn btn-sm btn-info" value="Modifica">
							</form>
						</td>
						
			</tr>';

		}
		
	}




}



/* ===========================================
	NUOVA TABLE FUNCTIONS	 
   ========================================= */
function get_users_management_table()
{

	include('auth/db-connect.php');
	include('lang/'.$language.'.php');

	$table_name = $prefix . "members";
	$column_name = "";

	$query = "SELECT * FROM " . $table_name .' ORDER BY name ASC; ' ;

	$result = $mysqli->query($query);

	if($result) 
	{
		
		while($row = mysqli_fetch_assoc($result))
		{

			$q = "SELECT * FROM ".$prefix."profile_complete WHERE idmember = " .$row['id'] ."";
			$q = $mysqli->real_escape_string($q);
			$n = '';
			if($r = $mysqli->query($q))
			{
				$num = mysqli_num_rows($r);
				if($num == null )
				{
					$n ='<div class="graphcont"><div class="graph"><strong class="bar" style="width:'.$pluspercent.'%;color:red;">30%</strong></div></div>';
					
				}else if(count($num)>0)
				{
					$n ='<div class="graphcont"><div class="graph"><strong class="bar" style="width:'.$pluspercent.'%;color:green;">100%</strong></div></div>';
				}
					
			}

	echo '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingOne">
			<h4 class="panel-title">
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">' 
				. $row['name'] .'&nbsp;' . $row['surname'] .'</a>
			</h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
			<div class="panel-body">
				<table id="accordion-example-1" class="table" data-paging="true" data-filtering="true" data-sorting="true">';
					$pic = ($row['profile_pic'] <> "") ? $row['profile_pic'] : "no_avatar.png" ;
					echo '<td><a href="profile_pic/"' .  $pic .'" target="_black"><img src="profile_pic/'. $pic.'" alt="" width="50" height="50"> </td>';	


echo '
				</table>
			</div>
		</div>
	</div>'
	;

		}
	}

}

/**/

/* ===========================================
	EMAIL FUNCTIONS	 
   ========================================= */
function get_email_content($email_type){
	include('auth/db-connect.php');
	$get_ec = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM ".$prefix."email_content WHERE id=1"));
	$email_content = $get_ec[$email_type];
	echo $email_content;
}

function all_available_emails($prefix){
	include('auth/db-connect.php');
	$query = "SELECT fullname, email FROM ".$prefix."members ORDER BY fullname DESC";
	$query = $mysqli->real_escape_string($query);
		if($result = $mysqli->query($query)){
			$num_results = mysqli_num_rows($result);
			while($row = $result->fetch_array())
				{
				echo '"'.$row['fullname'].' <'.$row['email'].'>",';
			}
		}
}

/* ===========================================
	TOTALS FUNCTION 
   ========================================= */

function total_users(){
	include('auth/db-connect.php');
	$sql = "SELECT * FROM ".$prefix."members";
	$result = $mysqli->query($sql);
	$num = $result->num_rows;
	if($num==''){$num='0';}
	echo $num;
}

function total_confirmed(){
	include('auth/db-connect.php');
	$sql = "SELECT * FROM ".$prefix."members WHERE email_confirmed=1";
	$result = $mysqli->query($sql);
	$num = $result->num_rows;
	if($num==''){$num='0';}
	echo $num;
}

function total_accepted(){
	include('auth/db-connect.php');
	$sql = "SELECT * FROM ".$prefix."members  WHERE terms=1";
	$result = $mysqli->query($sql);
	$num = $result->num_rows;
	if($num==''){$num='0';}
	echo $num;
}

function total_users_by_level($user_level){
	include('auth/db-connect.php');
	$sql = "SELECT * FROM ".$prefix."members WHERE user_level=$user_level GROUP BY user_level";
	$result = $mysqli->query($sql);
	$num = $result->num_rows;
	if($num==''){$num='0';}
	echo $num;
}

function total_unqiue(){
	include('auth/db-connect.php');
	$sql = "SELECT id FROM ".$prefix."traffic_statistics";
	$result = $mysqli->query($sql);
	$num = $result->num_rows;
	if($num==''){$num='0';}
	echo $num;
}

function total_page_views(){
	include('auth/db-connect.php');
	$get_tu = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(id) as tu FROM ".$prefix."traffic_statistics"));
	$tu = $get_tu['tu'];
	$get_tpv = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(id) as tpv FROM ".$prefix."page_tracker"));
	$tpv = $get_tpv['tpv'];
	$total = $tu + $tpv;
	if($total==''){$total='0';}
	echo $total;
}

/* ===========================================
	Charts FUNCTIONS	 
   ========================================= */

function total_device_type($device_type){
	include('auth/db-connect.php');
	$get_tdt = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(id) as tdt FROM ".$prefix."traffic_statistics WHERE device_type=$device_type"));
	$tdt = $get_tdt['tdt'];
	if($tdt==''){$tdt='0';}
	echo $tdt;
}

function get_recent_dates(){
	include('auth/db-connect.php');
	$i = 0;
	$query = "SELECT COUNT(id) as foo, DATE(datetime), DATE(datetime) as daterow FROM ".$prefix."traffic_statistics GROUP BY DATE(".$prefix."traffic_statistics.datetime)";
	$query = $mysqli->real_escape_string($query);
		if($result = $mysqli->query($query)){
			$num_results = mysqli_num_rows($result);
			while($row = $result->fetch_array())
				{
				if($i<7){
				echo '"'.date("F jS",strtotime($row['daterow'])).'", ';
				$i++;
				}
			}
		}
}

function bar_chart_unqiue_visits(){
	include('auth/db-connect.php');
	$query = "SELECT COUNT(id) as uv, DATE(datetime), DATE(datetime) as daterow FROM ".$prefix."traffic_statistics GROUP BY DATE(".$prefix."traffic_statistics.datetime)";
	$query = $mysqli->real_escape_string($query);
		if($result = $mysqli->query($query)){
			$num_results = mysqli_num_rows($result);
			while($row = $result->fetch_array())
				{
				echo '"'.$row['uv'].'", ';
				}
			}
		}

function bar_chart_page_views(){
	include('auth/db-connect.php');
	$query = "SELECT COUNT(id) as uv, DATE(datetime), DATE(datetime) as daterow FROM ".$prefix."page_tracker GROUP BY DATE(".$prefix."page_tracker.datetime)";
	$query = $mysqli->real_escape_string($query);
		if($result = $mysqli->query($query)){
			$num_results = mysqli_num_rows($result);
			while($row = $result->fetch_array())
				{
				echo '"'.$row['uv'].'", ';
				}
			}
		}
/* ===========================================
	SETTINGS FUNCTIONS	 
   ========================================= */
function all_settings(){
	include('auth/db-connect.php');
	$get_settings = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM ".$prefix."settings WHERE id=1"));
	$meta_title = $get_settings['meta_title'];
	$meta_description = $get_settings['meta_description'];
	$site_title = $get_settings['site_title'];
	$site_email = $get_settings['site_email'];
	$site_logo = $get_settings['site_logo'];
	return array($meta_title, $meta_description, $site_title, $site_email, $site_logo);
}

function rl_settings(){
	include('auth/db-connect.php');
	$get_settings = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM ".$prefix."rl_settings WHERE id=1"));
	$public_reg = $get_settings['public_registration'];
	$require_cap = $get_settings['require_cap'];
	$require_email = $get_settings['require_email_activation'];
	$require_terms = $get_settings['require_terms'];
	$default_level = $get_settings['default_user_level'];
	$min_password = $get_settings['min_password_length'];
	$require_plans = $get_settings['require_plans'];
	$redirect_login = $get_settings['redirect_login'];
	$redirect_logout = $get_settings['redirect_logout'];
	$gc_key = $get_settings['gc_key'];
	$gc_secret = $get_settings['gc_secret'];
	return array($public_reg, $require_cap, $require_email, $require_terms, $default_level, $min_password, $require_plans, $redirect_login, $redirect_logout, $gc_key, $gc_secret);
}

function inactivity_settings(){
	include('auth/db-connect.php');
	$get_settings = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM ".$prefix."inactivity_settings WHERE id=1"));
	$timeout_enabled = $get_settings['timeout_enabled'];
	$warning_title = $get_settings['title'];
	$warning_message = $get_settings['message'];
	$inactivity_timer = $get_settings['inactivity_timer'];
	$inactivity_warning = $get_settings['inactivity_warning'];
	return array($timeout_enabled, $warning_title, $warning_message, $inactivity_timer, $inactivity_warning);
}

function registration_settings(){
	include('auth/db-connect.php');
	$get_settings = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM ".$prefix."rl_settings WHERE id=1"));
	$public_reg = $get_settings['public_registration'];
	$require_cap = $get_settings['require_cap'];
	$require_email = $get_settings['require_email_activation'];
	$require_terms = $get_settings['require_terms'];
	$default_level = $get_settings['default_user_level'];
	$min_password = $get_settings['min_password_length'];
	$require_plans = $get_settings['require_plans'];
	$gc_key = $get_settings['gc_key'];
	$gc_secret = $get_settings['gc_secret'];
	return array($public_reg, $require_cap, $require_email, $require_terms, $default_level, $min_password, $require_plans, $gc_key, $gc_secret);
}
