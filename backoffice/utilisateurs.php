<?php
	include "header.php";
?>
<script type="text/javascript">
	//quicksearch
	$(function () {
		$('input#id_search').quicksearch('table#table_example tbody tr');
	});
</script>
<body>
<div class="form-signin">
	<p>
	<div id="div_titre_accessoires" >
		<h4><!--<input type="button" id="bouton_update" OnClick="javascript:window.location.href='sheets/upload.php'" value="Update database"> !-->
			<u><b>Utilisateurs</b></u> :
		</h4>
	</div>
				<div>
					<div class="table-responsive">
						<?php

						require_once dirname(__FILE__) . '/config.inc.php';

						// Process DB
						// Connect to server
						$link = mysqli_connect($db_server, $db_user, $db_password, $db_database) or die("Error " . mysqli_error($link));
						if (!$link) {
							echo ('Could not connect: ' . mysqli_error());
							exit;
						}
												
						// Query for process data from table `process_data`
						$query = "SELECT `USER_ID`,`NOM`,`PRENOM`,`ALIAS`,`RUE`,`NUMERO`,`CODE_POSTAL`,`LOCALITE`,`PAYS`,`TELEPHONE`,`GSM`,`EMAIL`
							FROM `$db_database`.`utilisateurs`";
						// Process DB query
						$result = mysqli_query($link, $query);
						if (!$result) {
							$message  = 'Invalid query: ' . mysqli_error() . "\n";
							echo $message;
							exit;
						}
						// Show data
						// Print table header
						echo "
						<form action='#'>
							<input type='text' name='search' id='id_search' placeholder='Chercher' class='large'/>
						</form>
						<br>
						<table id='table_example'>
							<thead>
								<tr>
									<th class = \"titretableau\" colspan=\"8\">Liste des utilisateurs</th>
								</tr>
								<tr>
									<th class=\"entetecolonnesA\">Nom</th>
									<th class=\"entetecolonnesA\">Prénom</th>
									<th class=\"entetecolonnesA\">Alias</th>
									<th class=\"entetecolonnesA\">CP</th>
									<th class=\"entetecolonnesA\">Localité</th>
									<th class=\"entetecolonnesA\">GSM</th>
									<th class=\"entetecolonnesD\">E-mail</th>
								</tr>
							</thead>
						";
						// print table data
						echo "<tbody>";
						while($row = mysqli_fetch_assoc($result)){
							echo "    <tr>";
							foreach($row as $key => $value){
								//echo "<td>$value</td>";
								$champs[$key]=$value;
							}
							echo "<td>".$champs['NOM']."</td>";				
							echo "<td>".$champs['PRENOM']."</td>";	
							echo "<td>".$champs['ALIAS']."</td>";	
							echo "<td>".$champs['CODE_POSTAL']."</td>";	
							echo "<td>".$champs['LOCALITE']."</td>";	
							echo "<td>".$champs['GSM']."</td>";	
							echo "<td>".$champs['EMAIL']."</td>";	
							
							echo '
									<form>
										<input type="hidden" name="action" value="' . $row['USER_ID'] . '">
										<input type="hidden" name="id" value="' . $row['USER_ID'] . '">
										<input type="hidden" value="' . $row['USER_ID'] . '">
									</form>
									<td>
										<form name="pin' . $row['USER_ID'] . '" action="user_edit.php" method="post">
											<input type="hidden" name="action" value="edit">
											<input type="hidden" name="ID" value="' . $row['USER_ID'] . '">
											<input type="hidden" name="NOM" value="' . $row['NOM'] . '">
											<input type="hidden" name="ALIAS" value="' . $row['ALIAS'] . '">
											<input type="hidden" name="PRENOM" value="' . $row['PRENOM'] . '">
											<input type="hidden" name="RUE" value="' . $row['RUE'] . '">
											<input type="hidden" name="NUMERO" value="' . $row['NUMERO'] . '">
											<input type="hidden" name="CODE_POSTAL" value="' . $row['CODE_POSTAL'] . '">
											<input type="hidden" name="LOCALITE" value="' . $row['LOCALITE'] . '">
											<input type="hidden" name="PAYS" value="' . $row['PAYS'] . '">
											<input type="hidden" name="EMAIL" value="' . $row['EMAIL'] . '">
											<input type="hidden" name="TELEPHONE" value="' . $row['TELEPHONE'] . '">
											<input type="hidden" name="GSM" value="' . $row['GSM'] . '">
											<input type="submit" class="btn btn-success addmore" value="Edit">
										</form>
									</td>
									<td>
										<form name="pin' . $row['USER_ID'] . '" action="user_delete.php" method="post">
											<input type="hidden" name="action" value="edit">
											<input type="hidden" name="ID" value="' . $row['USER_ID'] . '">
											<input type="hidden" name="NOM" value="' . $row['NOM'] . '">
											<input type="hidden" name="ALIAS" value="' . $row['ALIAS'] . '">
											<input type="hidden" name="PRENOM" value="' . $row['PRENOM'] . '">
											<input type="hidden" name="RUE" value="' . $row['RUE'] . '">
											<input type="hidden" name="NUMERO" value="' . $row['NUMERO'] . '">
											<input type="hidden" name="CODE_POSTAL" value="' . $row['CODE_POSTAL'] . '">
											<input type="hidden" name="LOCALITE" value="' . $row['LOCALITE'] . '">
											<input type="hidden" name="PAYS" value="' . $row['PAYS'] . '">
											<input type="hidden" name="EMAIL" value="' . $row['EMAIL'] . '">
											<input type="hidden" name="TELEPHONE" value="' . $row['TELEPHONE'] . '">
											<input type="hidden" name="GSM" value="' . $row['GSM'] . '">
											<input type="submit" class="btn btn-success addmore" value="Select">
										</form>
									</td>
								</tr>';
						}
						echo "</tbody>";
						// print table footer
						echo "</table>\n";

						// free result
						mysqli_free_result($result);
						?>
						<button type="button" id="bouton_ajouter" onclick="document.location.href='user_register.php';" >+ Ajouter un utilisateur</button>

					</div>
				</div>
				

</div>
</body>