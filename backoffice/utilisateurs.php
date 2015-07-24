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

						require 'config/config.php';
		
						try {
							$bdd = new PDO('mysql:host='.$config['host'].';dbname='.$config['database'], $config['username'],  $config['password']);
						}
						catch (Exception $e) {
						die('Erreur : ' . $e->getMessage());
						}
												
						// Query for process data from table `process_data`
						$query = "SELECT `USER_ID`,`NOM`,`PRENOM`,`ALIAS`,`RUE`,`NUMERO`,`CODE_POSTAL`,`LOCALITE`,`PAYS`,`TELEPHONE`,`GSM`,`EMAIL`
							FROM ".$config['database'].".`utilisateurs`";
						// Process DB query
						$resultat = $bdd->query($query) or die(print_r($bdd->errorInfo()));
	 
						// résultats
						while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
							$result[] = $donnees;
						}
						$resultat->closeCursor();

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
						foreach($result as $ligne => $value){
							echo "    <tr>";
							//foreach($row as $key => $value){
								//echo "<td>$value</td>";
								//$champs[$key]=$value;
							//}
							echo "<td>".$result[$ligne]['NOM']."</td>";				
							echo "<td>".$result[$ligne]['PRENOM']."</td>";	
							echo "<td>".$result[$ligne]['ALIAS']."</td>";	
							echo "<td>".$result[$ligne]['CODE_POSTAL']."</td>";	
							echo "<td>".$result[$ligne]['LOCALITE']."</td>";	
							echo "<td>".$result[$ligne]['GSM']."</td>";	
							echo "<td>".$result[$ligne]['EMAIL']."</td>";	
							
							echo '
									<form>
										<input type="hidden" name="action" value="' . $result[$ligne]['USER_ID'] . '">
										<input type="hidden" name="id" value="' . $result[$ligne]['USER_ID'] . '">
										<input type="hidden" value="' . $result[$ligne]['USER_ID'] . '">
									</form>
									<td>
										<form name="pin' . $result[$ligne]['USER_ID'] . '" action="user_edit.php" method="post">
											<input type="hidden" name="action" value="edit">
											<input type="hidden" name="ID" value="' . $result[$ligne]['USER_ID'] . '">
											<input type="hidden" name="NOM" value="' . $result[$ligne]['NOM'] . '">
											<input type="hidden" name="ALIAS" value="' . $result[$ligne]['ALIAS'] . '">
											<input type="hidden" name="PRENOM" value="' . $result[$ligne]['PRENOM'] . '">
											<input type="hidden" name="RUE" value="' . $result[$ligne]['RUE'] . '">
											<input type="hidden" name="NUMERO" value="' . $result[$ligne]['NUMERO'] . '">
											<input type="hidden" name="CODE_POSTAL" value="' . $result[$ligne]['CODE_POSTAL'] . '">
											<input type="hidden" name="LOCALITE" value="' . $result[$ligne]['LOCALITE'] . '">
											<input type="hidden" name="PAYS" value="' . $result[$ligne]['PAYS'] . '">
											<input type="hidden" name="EMAIL" value="' . $result[$ligne]['EMAIL'] . '">
											<input type="hidden" name="TELEPHONE" value="' . $result[$ligne]['TELEPHONE'] . '">
											<input type="hidden" name="GSM" value="' . $result[$ligne]['GSM'] . '">
											<input type="submit" class="btn btn-success addmore" value="Edit">
										</form>
									</td>
									<td>
										<form name="pin' . $result[$ligne]['USER_ID'] . '" action="user_delete.php" method="post">
											<input type="hidden" name="action" value="edit">
											<input type="hidden" name="ID" value="' . $result[$ligne]['USER_ID'] . '">
											<input type="hidden" name="NOM" value="' . $result[$ligne]['NOM'] . '">
											<input type="hidden" name="ALIAS" value="' . $result[$ligne]['ALIAS'] . '">
											<input type="hidden" name="PRENOM" value="' . $result[$ligne]['PRENOM'] . '">
											<input type="hidden" name="RUE" value="' . $result[$ligne]['RUE'] . '">
											<input type="hidden" name="NUMERO" value="' . $result[$ligne]['NUMERO'] . '">
											<input type="hidden" name="CODE_POSTAL" value="' . $result[$ligne]['CODE_POSTAL'] . '">
											<input type="hidden" name="LOCALITE" value="' . $result[$ligne]['LOCALITE'] . '">
											<input type="hidden" name="PAYS" value="' . $result[$ligne]['PAYS'] . '">
											<input type="hidden" name="EMAIL" value="' . $result[$ligne]['EMAIL'] . '">
											<input type="hidden" name="TELEPHONE" value="' . $result[$ligne]['TELEPHONE'] . '">
											<input type="hidden" name="GSM" value="' . $result[$ligne]['GSM'] . '">
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