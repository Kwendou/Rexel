<?php
include "header.php";
//session_start();
//$_SESSION['id']=session_id();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

?>
<body>
<div class="form-signin">
	<p>
	<div id="div_titre_accessoires" >
		<h4><!--<input type="button" id="bouton_update" OnClick="javascript:window.location.href='sheets/upload.php'" value="Update database"> !-->
			<u>Facturation</u>
			
			<input type="button" id="bouton_effacer" OnClick="javascript:window.location.reload()" value="Effacer les données">
		</h4>
	</div>

	<form id="div_accessoires" class="div_liste_accessoires" action="facture.php" method="get"> 
		<div id="seche_serviettes">
			<div id="accordion" class="div_liste_accessoires">

				<h3>Période de facturation</h3>
				<div>
					<div class="ui-widget">
						<label for="from">Du :</label>
						<input type="text" id="from" name="from" class="select_moyen" class="large" required >
						<label for="to">au :</label>
						<input type="text" id="to" name="to" class="select_moyen" class="large" required >

					</div>
				</div>
				
				<h3>Club</h3>
				<div>
					<div class="ui-widget">
						<label for="club">Dénomination : </label>
						<select id="club" name="club" class="select_large" required >
							<option value="">-- CLUB --</option>
						</select>
					</div>
				</div>

				<h3>Infrastructure</h3>
				<div>
					<div class="ui-widget">
						<label for="infra">Dénomination : </label>
						<select id="infra" name="infra" class="select_large"  required >
							<option value="">-- INFRASTRUCTURE --</option>
						</select>
					</div>
				</div>
				
				<h3>Co&ucirc;t de l&acute;énergie</h3>
				<div>
					<div class="ui-widget">
						<label for="kwh">Prix du kWh électrique : </label>
						<input type="number" name="kwh" id="kwh" value=18 required />
						&euro;cent/kWh
					</div>
				</div>				
			</div>
		</div>
				
		<br><hr>
		
		<div id="tableau">
		</div>
		<p><center>	
			<input type="submit" id="bouton_recherche" value="Générer la facture" title="Générer la facture" />
		</p>
	</form>

</div>
</body>