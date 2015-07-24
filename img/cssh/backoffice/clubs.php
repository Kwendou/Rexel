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

						require_once dirname(__FILE__) . '/config.inc.php';

						// Process DB
						// Connect to server
						$link = mysqli_connect($db_server, $db_user, $db_password, $db_database) or die("Error " . mysqli_error($link));
						if (!$link) {
							echo ('Could not connect: ' . mysqli_error());
							exit;
						}
												
						// Query for process data from table `process_data`
						$query = "SELECT c.CLUB_ID,c.NOM_CLUB,u.USER_ID,u.NOM,u.PRENOM,u.EMAIL,u.ALIAS FROM `$db_database`.clubs c LEFT JOIN `$db_database`.utilisateurs u ON u.USER_ID = c.RESPONSABLE";
						// Process DB query
						$result = mysqli_query($link, $query);

						if (!$result) {
							$message  = 'Invalid query: ' . mysqli_error() . "\n";
							echo $message;
							exit;
						}

						$query = "SELECT NOM_CLUB FROM `$db_database`.clubs";

						$result_clubs = mysqli_query($link, $query);

						if (!$result_clubs) {
							$message  = 'Invalid query: ' . mysqli_error() . "\n";
							echo $message;
							exit;
						}
						
						$query = "SELECT NOM, PRENOM FROM `$db_database`.utilisateurs";

						$result_utils = mysqli_query($link, $query);

						if (!$result_utils) {
							$message  = 'Invalid query: ' . mysqli_error() . "\n";
							echo $message;
							exit;
						}
						// Show data
						// Print table header
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
						// print table data
						echo "<tbody>";

						while($row = mysqli_fetch_assoc($result)){
							echo "    <tr>";
							foreach($row as $key => $value){
								//echo "<td>$key</td>";
								$champs[$key]=$value;
							}
							echo "<td>".$champs['NOM_CLUB']."</td>";				
							echo "<td>".$champs['NOM']." ".$champs['PRENOM']."</td>";	
							echo "<td>".$champs['EMAIL']."</td>";	
							
							echo '
									<form>
										<input type="hidden" name="action" value="' . $row['CLUB_ID'] . '">
										<input type="hidden" name="id" value="' . $row['CLUB_ID'] . '">
										<input type="hidden" value="' . $row['CLUB_ID'] . '">
									</form>
									<td>
										<form name="pin' . $row['CLUB_ID'] . '" action="club_edit.php" method="post">
											<input type="hidden" name="action" value="edit">
											<input type="hidden" name="CLUB_ID" value="' . $row['CLUB_ID'] . '">
											<input type="hidden" name="NOM_CLUB" value="' . $row['NOM_CLUB'] . '">
											<input type="hidden" name="USER_ID" value="' . $row['USER_ID'] . '">
											<input type="hidden" name="NOM" value="' . $row['NOM'] . '">
											<input type="hidden" name="PRENOM" value="' . $row['PRENOM'] . '">
											<input type="hidden" name="EMAIL" value="' . $row['EMAIL'] . '">
											<input type="hidden" name="utilisateur" value="' . $row['NOM'] . " ". $row['PRENOM'] .'">
											<input type="hidden" name="ALIAS_UTILISATEUR" value="' . $row['ALIAS'] . '">
											<input type="submit" class="btn btn-success addmore" value="Editer">
										</form>
									</td>
								</tr>';
						}
						echo "</tbody>";

						// print table footer
						echo "</table>\n";
						?>
						<button type="button" id="bouton_ajouter" onclick="document.location.href='club_register.php';" >+ Ajouter un club</button>
						<br><br>
						<?php
						// Show data
						// Print table header
						echo "
						<table>
							<tr>
								<th class = \"titretableau\" colspan=\"100\">Liste complète</th>
							</tr>
							";
						// print table data
						echo "<tr>";
						echo "<th class=\"utils_clubs\">Util. / Club</th>";
						$nombre_clubs=0;
						while($row = mysqli_fetch_assoc($result_clubs)){
							foreach($row as $key => $value){
								echo "<th class=\"entetecolonnesD\">$value</th>";	
								$nombre_clubs++;
							}
						}
						
						
						echo "</tr>";

						echo "<tr>";

						while($row = mysqli_fetch_assoc($result_utils)){
							foreach($row as $key => $value){
								if ($key=="NOM") {
									$nom = $row['NOM']." ".$row['PRENOM'];
									echo "<td class=\"entetecolonnesA\">$nom</td>";	
									for ($i=0;$i<$nombre_clubs;$i++) {
										echo '
											<td>
												<form action="toto.php" method="get"> 
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

						// print table footer
						echo "</table>\n";

						// free result
						mysqli_free_result($result);
						?>
						<!-- <button type="button" id="bouton_ajouter" onclick="document.location.href='register.php';" >+ Ajouter un club</button> -->

					</div>
				</div>
				

</div>
</body>