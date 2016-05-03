 <div id="login-overlay" class="">
      <div class="modal-content">
          <div class="modal-body" style="padding-bottom:-180px">
            <?php if($public_reg=='1'){?>  
              <div class="row">
                  <div class="col-md-5">
                     <legend id="registrazione"><b>Login</b></legend>
                    <form method="post" action="access/process_login.php" class="">
                        
                      <?php if($_GET['logoff']=='1'){
                          echo '<span class="success-text">You have logged off successfully</span>';
                      } 
                    if($_GET['v']=='1'){
                          echo '<span class="success-text"><h3>Email Verified Successfully! Login below.</h3></span>';
                      } 
                      if($_GET['success']=='1'){
                          echo '<span class="success-text">Your password has been reset successfully.</span>';
                      } 
                      if($_GET['error']=='1'){
                          echo '<span class="red">Invalid Username or Password</span>';
                      }
                      if($_GET['error']=='2'){
                          echo '<span class="red">Your account has been locked out for 5 minutes</span>';
                      }?>
                      <!-- Username -->
                      <div class="control-group">
                        <label class="control-label" for="textinput">Accedi con la tua EMAIL</label>
                        <div class="controls">
                        <input id="textinput" name="email" type="text" placeholder="" class="form-control">
                        </div>
                      </div>

                      <!-- Password input-->
                      <div class="control-group">
                        <label class="control-label" for="passwordinput">Password</label>
                        <div class="controls">
                        <input id="passwordinput" name="p" type="password" placeholder="" size="65%" class="form-control" style="height:50px;background-color:#f8f8f8;">
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <div class="control-group forgot-link">
                          <a href="forgot.php" id="dimentica"><b>Hai dimenticato la password?</b></a>
                        </div>
                      </div>
                      <p>&nbsp;</p>
                      <!-- Submit-->
                      <div class="control-group">
                        <div class="controls">
                          <input type="submit" id="login" class="btn btn-lg btn-block" value="Accedi">
                        </div>
                      </div>
                      
                </fieldset>
              </form> 
            </div>
            <div class="col-md-1" id="vertical" style="height:800px; ">
              <p class="vertical-line"></p>
            </div>
                 <div class="col-md-5" >
                      <fieldset>
                        <legend id="registrazione"><b>Registrati Ora</b></legend>
                       
                          <form id="reg-form" action="index.php" method="post" class="">
                              <div class="form-group">
                                <label class="control-label" for="name">Nome</label>
                                  <div class="controls">
                                    <input id="name" name="name" type="text" placeholder="" class="form-control" value="<?php echo $_POST['name'];?>" required>
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="control-label" for="surname">Cognome</label>
                                    <div class="controls">
                                        <input id="surname" name="surname" type="text" placeholder="" class="form-control"  value="<?php echo $_POST['surname'];?>" required>
                                    </div>
                              </div>

                              <div class="form-group">
                                 <label class="control-label" for="username">Username</label>
                                  <div class="controls">
                                   <input id="username" name="username" type="text" placeholder="" class="form-control" value="<?php echo $_POST['username'];?>" required>
                                  </div>
                               </div>

                               <div class="form-group">
                                  <label class="control-label" for="email">Indirizzo E-Mail</label>
                                  <div class="controls">
                                  <input id="email" name="email" type="text" placeholder="" class="form-control" value="<?php echo $_POST['email'];?>" required>
                                  </div>
                               </div>
                     

                                <div class="form-group">
                                   <label class="control-label" for="passwordinput">Password</label>
                                    <div class="controls">
                                    <input id="password" name="p" type="password" placeholder="" size="65%" class="form-control" style="height:50px;background-color:#f8f8f8;" value="<?php echo $_POST['qp'];?>" required>
                                    </div>
                                 </div>  


                                <div class="form-group">
                                 <label class="control-label" for="passwordinput">Conferma Password</label>
                                  <div class="controls">
                                  <input id="confirmpwd" name="confirmpwd" type="password" placeholder="" size="65%" class="form-control" style="height:50px;background-color:#f8f8f8;" value="<?php echo $_POST['qcp'];?>" required>
                                  </div>
                                </div>  
                                  
                                 <?php if($require_terms=='1'){?>
                                <p></p>
                                <div class="control-group">
                                    <input type="checkbox" id="" value="1" name="terms" title="Autorizzo, ai sensi dell’art. 23 del Decreto Legislativo 196/2003, Oltre Mare S.S.D.a.R.L al trattamento dei propri dati personali.
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
                          <p>&nbsp;</p>
                        <?php } ?>

                          <div class="control-group">
                              <div class="controls">
                               <input type="submit" id="login" class="btn btn-lg btn-block" value="Continua la Registrazione">
                              </div>
                          </div>

                              
                          </form>   
                      </fieldset>

  <?php }else{?>
               <form class="form-horizontal login-form">
                <fieldset>
                  <h3>Public registration is currently closed.</h3>
                 </fieldset>
              </form>
              <?php } ?>

</div>
                     
                             

                               

                              
                              


                              

                             



                      
                      




                      




                       
      

