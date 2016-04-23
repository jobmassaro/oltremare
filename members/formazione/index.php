<script type="text/javascript">
	$(function() 
	{
		$("#datacorso").datepicker({ dateFormat: "dd-mm-yy" }).val(); 
	
 	});
</script>
<div id="tabs-5">
	<div class="container">
		<div class="col-md-6">
			<p></p>
			
			<p></p>
			

		</div>
		<div class="col-md-5">
			
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Cognome:</th>
					<th>Nome:</th>
					<th>Attività Oltremare:</th> 	
					<th>in Data:</th>
					<th>Istruttore:</th>
					<th>Voto:</th>
					<th>Note:</th>
				</tr>
			</thead>
			<tbody>
				<td><?php echo $surname; ?></td>
				<td><?php echo $name; ?></td>
				<td>
					<?php 

						echo '<select>';
						$servername = "localhost";
						$username = "root";
						$password = "developer";
						$dbname = "UOLTRE";
						
						$con = new mysqli($servername, $username, $password, $dbname);
							if ($con->connect_errno) {
    							echo "Connessione fallita: ". $con->connect_error . ".";
    							exit();
							}
						
						
						$sql = "SELECT * FROM  cv_formazione_utente WHERE id_utente = " .$uid;

						if ($result = mysqli_query($con,$sql))
						{	
							if(!$result)
							{
								echo '<option>Test</option>';
							}
							else
							{
								
								$sql = "SELECT * FROM  cv_formazione_oltremare";								

								if ($result = mysqli_query($con,$sql))
								{
		
									while($row=mysqli_fetch_assoc($result)) 
									{
  											echo '<option>'.$row['nome_corso'].'</option>';
									}
									echo '</select>';
								}	
							}

						}
						mysqli_close($con);
						
					?>
				</td>
				<td>
					<input type="text" name="datacorso" id="datacorso" >
				</td>
				<td>
					<?php 

						echo '<select>';
						$servername = "localhost";
						$username = "root";
						$password = "developer";
						$dbname = "UOLTRE";
						
						$con = new mysqli($servername, $username, $password, $dbname);
							if ($con->connect_errno) {
    							echo "Connessione fallita: ". $con->connect_error . ".";
    							exit();
							}
						
						
						$sql = "SELECT * FROM  cv_formazione_utente WHERE id_utente = " .$uid;

						if ($result = mysqli_query($con,$sql))
						{	
							if(!$result)
							{
								echo '<option>Test</option>';
							}
							else
							{
								
								//Controllo i vari istruttori presenti nel DB
								$sql = "SELECT name, surname  FROM cv_members where user_level = 3";;								

								if ($result = mysqli_query($con,$sql))
								{
		
									while($row=mysqli_fetch_assoc($result)) 
									{
  											echo '<option>'.$row['surname']. '-' . $row['name']. '</option>';
									}
									echo '</select>';
								}	
							}

						}
						mysqli_close($con);
			
					?>
				</td>
				<td>
					<select>
  						<option value="1">1</option>
  						<option value="2">2</option>
  						<option value="3">3</option>
  						<option value="4">4</option>
  						<option value="5">5</option>
  						<option value="6">6</option>
  						<option value="7">7</option>
  						<option value="8">8</option>
  						<option value="9">9</option>
  						<option value="10">10</option>
			
					</select>
				</td>
			</tbody>
		</table>
	</div>
</div>
