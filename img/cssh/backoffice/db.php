<?php
if(isset($_GET['clubs']) || isset($_GET['utilisateurs']) || isset($_GET['infra']) || isset($_GET['alias'])) {
 
    $json = array();
     
    if(isset($_GET['clubs'])) {
        // requête qui récupère les clubs
        $requete = "SELECT DISTINCT * FROM clubs";
    } else if(isset($_GET['utilisateurs'])) {
        // requête qui récupère les utilisateurs
        $requete = "SELECT * FROM utilisateurs";
    } else if(isset($_GET['infra'])) {
        // requête qui récupère les infrastructures
        $requete = "SELECT * FROM infrastructure";
    } else if(isset($_GET['alias'])) {
        // requête qui récupère les utilisateurs
        $requete = "SELECT * FROM utilisateurs";
	}
	//echo $requete;

	// On récupère les informations de connection à notre base de donnée dans le tableau (array) $database
	
	require 'config/config.php';
	
	include 'functions/database.fn.php';	

	$bdd = getPDOLink($config);
		
    // exécution de la requête
    $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
     
    // résultats
    while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
        // je remplis un tableau et mettant l'id en index 
			if(isset($_GET['clubs'])) {
				$json[$donnees['CLUB_ID']][] = utf8_encode($donnees['NOM_CLUB']);
			}
			if(isset($_GET['utilisateurs'])) {
				$json[$donnees['USER_ID']][] = utf8_encode(rtrim($donnees['NOM'])." ".rtrim($donnees['PRENOM']));
			}
			if(isset($_GET['infra'])) {
				$json[$donnees['ID']][] = utf8_encode(rtrim($donnees['NOM_INFRA']));
			}
			if(isset($_GET['alias'])) {
				$json[$donnees['ALIAS']][] = utf8_encode(rtrim($donnees['ALIAS']));
			}
    }
     
    // envoi du résultat au success
    echo json_encode($json);
}
?>