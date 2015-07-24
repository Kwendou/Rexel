<head>
 <meta charset="ISO8859-15">
 <title>menu demo</title>
 <link rel="stylesheet" href="js/jquery-ui.theme.min.css">
 <link href="css/login.css" rel="stylesheet">

 <style>
 .ui-menu
 {
 width: 200px;
 font-size: 16px;
 min-height: 28px; /* définit la hauteur minimale du menu (dépendante de la valeur de font-size) */
 }
 ul#menu
 {
 width: 705px; /* définit la largeur totale du menu */
 }
 ul#menu > li
 {
 width: 95px; /* définit la largeur des items de niveau 1 */
 float: left; /* définit le positionnement des items de niveau 1 */
 }


 </style>
 
</head>
<header id="banner">
 <ul id="menu">
 <li><a href="home_facturation.php">Projet</a></li>
 <li><a href="home_clubs.php">Locaux</a></li>
 <li><a href="#">Techniques</a>
	 <ul>
		 <li class="alignement_gauche"><a href="#">Chauffage</a></li>
		 <li class="alignement_gauche"><a href="#">Climatisation</a></li>
		 <li class="alignement_gauche"><a href="#">ECS</a>
			 <ul>
				 <li class="sous_menu"><a href="#">Thermodynamique</a></li>
				 <li class="sous_menu"><a href="#">Solaire thermique</a></li>
			 </ul>
		 </li>
		 <li class="alignement_gauche"><a href="#">Ventilation</a>
			 <ul>
				 <li class="sous_menu"><a href="#">Simple flux</a></li>
				 <li class="sous_menu"><a href="#">Double flux</a></li>
			 </ul>
		 </li>
		 <li class="alignement_gauche"><a href="#">Sanitaire</a></li>
		 <li class="alignement_gauche"><a href="#">Photovoltaïque</a></li>
	</ul>
 </li>
 <li><a href="home_utilisateurs.php">Installateurs</a></li>
 <li><a href="home_aide.php">Aide</a></li>
 <li><a href="../logout.php">Logout</a></li>
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
 // le menu à  positionner est de niveau 2 :
 // on va superposer le point central du haut du menu sur le point central bas du menu parent
 options.my = "center top";
 options.at = "center bottom";
 }
 else {
 // le menu à  positionner est de niveau > 2
 // le positionnement reste celui par défaut : on va superposer le coin haut gauche et le coin haut droit du menu parent
 options.my = "left top";
 options.at = "right top";
 }
 elements.element.element.position(options);
 };
 </script>
<script src="js/jquery.quicksearch.js"></script>
</header>