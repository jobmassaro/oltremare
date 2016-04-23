 <form method="post" action="access/process_login" class="form-horizontal login-form">
								<fieldset>
									<legend>Login</legend>
											<?php if($_GET['logoff']=='1'){
													echo '<span class="success-text">You have logged off successfully</span>';
											} 
											if($_GET['error']=='1'){
													echo '<span class="red">Invalid Username or Password</span>';
											}?>
											<!-- Username -->
											<div class="control-group">
												<label class="control-label" for="textinput">Username or E-mail Address</label>
												<div class="controls">
												<input id="textinput" name="email" type="text" placeholder="username" class="input-xlarge">
												</div>
											</div>

											<!-- Password input-->
											<div class="control-group">
												<label class="control-label" for="passwordinput">Password</label>
												<div class="controls">
												<input id="passwordinput" name="p" type="password" placeholder="password" class="input-xlarge">
												</div>
											</div>

											<div class="control-group forgot-link">
												<a href="forgot">Dimenticata la password?</a>
											</div>

											<!-- Submit-->
											<div class="control-group">
												<div class="controls">
												<input type="submit" class="btn btn-primary btn-block login-btn" value="Login">
												</div>
											</div>
								</fieldset>
							</form> 