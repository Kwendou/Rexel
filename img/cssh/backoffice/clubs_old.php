<head>
 <meta charset="utf-8">
 <title>menu demo</title>
 <link rel="stylesheet" href="js/jquery-ui.theme/ui-darkness/jquery-ui.css">
 <style>
 .ui-menu
 {
 width: 115px;
 font-size: 16px;
 min-height: 28px; /* définit la hauteur minimale du menu (dépendante de la valeur de font-size) */
 }
 ul#menu
 {
 width: 550px; /* définit la largeur totale du menu */
 }
 ul#menu > li
 {
 width: 115px; /* définit la largeur des items de niveau 1 */
 float: left; /* définit le positionnement des items de niveau 1 */
 }
 </style>
</head>
<header id="banner">
 <ul id="menu">
 <li><a href="home_facturation.php">Facturation</a></li>
 <li><a href="home_clubs.php">Clubs</a></li>
 <li><a href="home_utilisateurs.php">Utilisateurs</a>
 <ul>
 <li><a href="#">Item 3-1</a></li>
 <li><a href="#">Item 3-2</a></li>
 <li><a href="#">Item 3-3</a></li>
 <li><a href="#">Item 3-4</a>
 <ul>
 <li><a href="#">Item 3-4-1</a></li>
 <li><a href="#">Item 3-4-2</a></li>
 <li><a href="#">Item 3-4-3</a></li>
 <li><a href="#">Item 3-4-4</a></li>
 <li><a href="#">Item 3-4-5</a></li>
 </ul>
 </li>
 <li><a href="#">Item 3-5</a></li>
 </ul>
 </li>
 <li><a href="home_aide.php">Aide</a></li>
 </ul>
 <script>
 // initialise le menu
 $("#menu").menu({ position: { using: positionnerSousMenu} });
 // remplace la flèche droite par la flèche bas pour les menus de premier niveau
 $("#menu > li > a > span.ui-icon-carat-1-e").removeClass("ui-icon-carat-1-e").addClass("ui-icon-carat-1-s");
 function positionnerSousMenu(position, elements) {
 var options = {
 of: elements.target.element
 };
 if (elements.element.element.parent().parent().attr("id") === "menu") {
 // le menu à positionner est de niveau 2 :
 // on va superposer le point central du haut du menu sur le point central bas du menu parent
 options.my = "center top";
 options.at = "center bottom";
 }
 else {
 // le menu à positionner est de niveau > 2
 // le positionnement reste celui par défaut : on va superposer le coin haut gauche et le coin haut droit du menu parent
 options.my = "left top";
 options.at = "right top";
 }
 elements.element.element.position(options);
 };
 </script>

</header>
<body>
<div id="fond">
	<p>
	<div id="div_titre_accessoires" >
		<h4><!--<input type="button" id="bouton_update" OnClick="javascript:window.location.href='sheets/upload.php'" value="Update database"> !-->
			<u>Clubs</u>
			<input type="button" id="bouton_reset" OnClick="javascript:window.location.reload()" value="Reset">
		</h4>
	</div>

	<form id="div_accessoires" class="div_liste_accessoires" action="sheets/recherche.php" method="get"> 
		<div id="seche_serviettes">
			<div id="accordion" class="div_liste_accessoires">

				<h3>P&eacute;riode de facturation</h3>
				<div>
					<div class="ui-widget">
						<label for="from">Du:</label>
						<input type="text" id="from" name="from" class="select_moyen" class="large">
						<label for="to">au:</label>
						<input type="text" id="to" name="to" class="select_moyen" class="large">

					</div>
				</div>
				
				<h3>Club</h3>
				<div>
					<div class="ui-widget">
						<label for="customer">D&eacute;nomination: </label>
						<input type="text" name="customer" id="customer" class="large" />
					</div>
				</div>

				<h3>Infrastructure</h3>
				<div>
					<div class="ui-widget">
						<label for="name">D&eacute;nomination: </label>
						<input type="text" name="name" id="name" class="large" /><br>
					</div>
				</div>
				
				<h3>Co&ucirc;t de l&acute;&eacute;nergie</h3>
				<div>
					<div class="ui-widget">
						<label for="user">Prix du kWh &eacute;lectrique: </label>
						<input type="number" name="user" id="user" />
						&euro;cent/kWh
					</div>
				</div>				
			</div>
		</div>
				
		<br><hr>
		
		<div id="tableau">
		</div>
		<p><center>	
			<input type="submit" id="bouton_recherche" value="G&eacute;n&eacute;rer la facture" title="G&eacute;n&eacute;rer la facture" />
		</p>
	</form>

</div>
</body>