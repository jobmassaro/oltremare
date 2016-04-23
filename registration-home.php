	<?php if($public_reg=='1'){?>
                <form id="reg-form" action="index.php" method="post" class="form-horizontal login-form">
								<fieldset>
									<legend id="registrazione">Registrazione</legend>

											<?php echo '<div style="color:red;">'.$error_msg.'</div>'; ?>
											<div class="control-group">
												<label class="control-label" for="name">Nome</label>
												<div class="controls">
												<input id="name" name="name" type="text" placeholder="" class="input-xlarge" value="<?php echo $_POST['name'];?>" required>
												</div>
											</div>	
											<div class="control-group">
												<label class="control-label" for="surname">Cognome</label>
												<div class="controls">
												<input id="surname" name="surname" type="text" placeholder="" class="input-xlarge"  value="<?php echo $_POST['surname'];?>" required>
											</div>

											<div class="control-group">
												<label class="control-label" for="username">Username</label>
												<div class="controls">
												<input id="username" name="username" type="text" placeholder="" class="input-xlarge" value="<?php echo $_POST['username'];?>" required>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="email">Indirizzo E-Mail</label>
												<div class="controls">
												<input id="email" name="email" type="text" placeholder="" class="input-xlarge" value="<?php echo $_POST['email'];?>" required>
												</div>
											</div>

											<!-- Password input-->
											<div class="control-group">
												<label class="control-label" for="passwordinput">Password</label>
												<div class="controls">
												<input id="password" name="p" type="password" placeholder="" class="input-xlarge" value="<?php echo $_POST['qp'];?>" required>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="passwordinput">Conferma Password</label>
												<div class="controls">
												<input id="confirmpwd" name="confirmpwd" type="password" placeholder="" class="input-xlarge" value="<?php echo $_POST['qcp'];?>" required>
												</div>
											</div>
											<!-- Abbonamento -->
											<!-- end abbonamento -->
											<?php if($require_terms=='1'){?>
											<p></p>
											<div class="control-group">
													<input type="checkbox" id="terms" value="1" name="terms" title="Autorizzo, ai sensi dell’art. 23 del Decreto Legislativo 196/2003, Oltre Mare S.S.D.a.R.L al trattamento dei propri dati personali.
" <?php if($_POST['terms']=='1') echo 'checked';?>>
													<a href="#" data-toggle="modal" data-target="#myModal" id="autorizzo"><b id="t2" title="Autorizzo, ai sensi dell’art. 23 del Decreto Legislativo 196/2003, Oltre Mare S.S.D.a.R.L al trattamento dei propri dati personali.
"> Autorizzo al trattamento dei propri dati personali.</b></a>
											</div>

												<div class="modal fade" id="myModal" role="dialog">
												    <div class="modal-dialog">
												    
												      <!-- Modal content-->
												      <div class="modal-content">
												        <div class="modal-header">
												          <button type="button" class="close" data-dismiss="modal">&times;</button>
												          <h4 class="modal-title">INFORMATIVA PRIVACY</h4>
												        </div>
												        <div class="modal-body">
												          <p>Ai sensi dell’art. 13 del Decreto Legislativo 30 giugno 2003, n. 196 – recante disposizione in materia di protezione dei dati personali, si rendono le seguenti informazioni:
i dati personali sono richiesti, raccolti e trattati per lo svolgimento delle specifiche funzioni istituzionali e nei limiti previsti dalla relativa normativa;
la comunicazione o la diffusione dei dati personali a soggetti pubblici o privati sarà effettuata solo se prevista da norme di legge o di regolamento o se risulta necessaria per lo svolgimento delle attività Oltre Mare S.S.D.a.R.L;
l’interessato potrà in ogni momento esercitare i diritti di cui all’art. 7 del D.Lgs. 30 giugno 2003 n. 196;
il titolare dei dati trattati è Oltre Mare S.S.D.a.R.L;
il responsabile del trattamento dei dati è Oltre Mare S.S.D.a.R.L.</p>
												        </div>
												        <div class="modal-footer">
												          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												        </div>
												      </div>
												      
												    </div>
												 </div>
	



											<?php } ?>
										
											<!-- Submit-->
											<div class="control-group">
												<div class="controls">
												<input type="submit" class="btn btn-warning btn-block register-btn" value="Registrazione">
												</div>
											</div>
									</fieldset>
							</form> 
							<?php }else{?>
							 <form class="form-horizontal login-form">
								<fieldset>
									<h3>Public registration is currently closed.</h3>
								 </fieldset>
							</form>
							<?php } ?>
            