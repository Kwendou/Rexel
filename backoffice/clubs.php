<?php
	include "header.php";
?>
<style>
.left-inner-addon {
    position: relative;
}
.left-inner-addon input {
    padding-left: 30px;    
}
.left-inner-addon i {
    position: absolute;
    padding: 10px 12px;
    pointer-events: none;
}

.right-inner-addon {
    position: relative;
	width:200px;
}
.right-inner-addon input {
    padding-right: 30px;    
}
.right-inner-addon i {
	
    position: absolute;
    right: 0px;
    padding: 10px 12px;
    pointer-events: none;
}
</style>
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
			<u><b>Clubs</b></u> :
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
						$query = "SELECT c.CLUB_ID,c.NOM_CLUB,u.USER_ID,u.NOM,u.PRENOM,u.EMAIL,u.ALIAS FROM ".$config['database'].".clubs c LEFT JOIN ".$config['database'].".utilisateurs u ON u.USER_ID = c.RESPONSABLE";
						// Process DB query

						$reponse = $bdd->query($query); 
			
						$resultat = $bdd->query($query) or die(print_r($bdd->errorInfo()));
	 
						// résultats
						while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
							$clubs[] = $donnees;
						}
						$resultat->closeCursor();

						$query = "SELECT NOM_CLUB FROM ".$config['database'].".clubs";

						$reponse = $bdd->query($query); 
			
						while ($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
						{  	
							$result_clubs[] = $donnees;
						}	
						
						$query = "SELECT NOM, PRENOM FROM ".$config['database'].".utilisateurs";

						$reponse = $bdd->query($query); 
			
						while ($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
						{  	
							$result_utils[] = $donnees;
						}	

						// Afficher les données
						// table header
						
						echo "
						<form action='#'>
							<input type='text' name='search' id='id_search' placeholder='Chercher' class='large' />
						</form>
						<br>
						<table id='table_example' >
							<thead>
								<tr>
									<th class = \"titretableau\" colspan=\"4\">Liste des clubs</th>
								</tr>
								<tr>
									<th class=\"entetecolonnesD\">Club</th>
									<th class=\"entetecolonnesD\">Responsable</th>
									<th class=\"entetecolonnesD\">E-mail</th>
								</tr>
							</thead>
							";
						// table data
						echo "<tbody>";
	
						foreach($clubs as $ligne => $value){
							
							echo "    <tr>";
							echo "<td>".$clubs[$ligne]['NOM_CLUB']."</td>";				
							echo "<td>".$clubs[$ligne]['NOM']." ".$clubs['PRENOM']."</td>";	
							echo "<td>".$clubs[$ligne]['EMAIL']."</td>";	
							
							echo '
									<form>
										<input type="hidden" name="action" value="' . $clubs[$ligne]['CLUB_ID'] . '">
										<input type="hidden" name="id" value="' . $clubs[$ligne]['CLUB_ID'] . '">
										<input type="hidden" value="' . $clubs[$ligne]['CLUB_ID'] . '">
									</form>
									<td>
										<form name="pin' . $clubs[$ligne]['CLUB_ID'] . '" action="club_edit.php" method="post">
											<input type="hidden" name="action" value="edit">
											<input type="hidden" name="CLUB_ID" value="' . $clubs[$ligne]['CLUB_ID'] . '">
											<input type="hidden" name="NOM_CLUB" value="' . $clubs[$ligne]['NOM_CLUB'] . '">
											<input type="hidden" name="USER_ID" value="' . $clubs[$ligne]['USER_ID'] . '">
											<input type="hidden" name="NOM" value="' . $clubs[$ligne]['NOM'] . '">
											<input type="hidden" name="PRENOM" value="' . $clubs[$ligne]['PRENOM'] . '">
											<input type="hidden" name="EMAIL" value="' . $clubs[$ligne]['EMAIL'] . '">
											<input type="hidden" name="utilisateur" value="' . $clubs[$ligne]['NOM'] . " ". $clubs[$ligne]['PRENOM'] .'">
											<input type="hidden" name="ALIAS_UTILISATEUR" value="' . $clubs[$ligne]['ALIAS'] . '">
											<input type="submit" class="btn btn-success addmore" value="Edit">
										</form>
									</td>
									<td>
										<form name="pin' . $clubs[$ligne]['CLUB_ID'] . '" action="club_delete.php" method="post">
											<input type="hidden" name="action" value="edit">
											<input type="hidden" name="CLUB_ID" value="' . $clubs[$ligne]['CLUB_ID'] . '">
											<input type="hidden" name="NOM_CLUB" value="' . $clubs[$ligne]['NOM_CLUB'] . '">
											<input type="hidden" name="USER_ID" value="' . $clubs[$ligne]['USER_ID'] . '">
											<input type="hidden" name="NOM" value="' . $clubs[$ligne]['NOM'] . '">
											<input type="hidden" name="PRENOM" value="' . $clubs[$ligne]['PRENOM'] . '">
											<input type="hidden" name="EMAIL" value="' . $clubs[$ligne]['EMAIL'] . '">
											<input type="hidden" name="utilisateur" value="' . $clubs[$ligne]['NOM'] . " ". $clubs[$ligne]['PRENOM'] .'">
											<input type="hidden" name="ALIAS_UTILISATEUR" value="' . $clubs[$ligne]['ALIAS'] . '">
											<input type="submit" class="btn btn-success addmore" value="Select">
										</form>
									</td>

								</tr>';
						}
						echo "</tbody>";

						// table footer
						echo "</table>\n";
						?>
						<button type="button" id="bouton_ajouter" onclick="document.location.href='club_register.php';" >+ Ajouter un club</button>
						<br><br>
						<?php
						// Afficher les données
						// table header
						echo "
						<table>
							<tr>
								<th class = \"titretableau\" colspan=\"100\">Liste complète</th>
							</tr>
							";
						// table data
						echo "<tr>";
						echo "<th class=\"utils_clubs\">Util. / Club</th>";
						$nombre_clubs=0;
						foreach($result_clubs as $ligne => $value){
								echo "<th class=\"entetecolonnesD\">$value[NOM_CLUB]</th>";	
								$nombre_clubs++;
						}
						
						
						echo "</tr>";

						echo "<tr>";

						foreach($result_clubs as $ligne => $club_val){
							foreach($clubs[$ligne] as $key => $value){
								if ($key=="NOM") {
									$nom = $clubs[$ligne]['NOM']." ".$clubs[$ligne]['PRENOM'];
									echo "<td class=\"entetecolonnesA\">$nom</td>";	
									for ($i=0;$i<$nombre_clubs;$i++) {
										echo '
											<td>
												<form action="tableau_club_utilisateur.php" method="get"> 
													<select id="type_util" name="type_user" class="type_util" required >
														<option value="aucun" class="option_centre">-</option>
														<option value="responsable" class="option_centre">Responsable</option>
														<option value="membre" class="option_centre">Membre</option>	
													</select>
												</form>
											</td>';	
									}
									echo "</tr>";
								}
							}
						}
						echo "</tr>";

						// table footer
						echo "</table>\n";

						?>

					</div>
				</div>
				

</div>
</body>