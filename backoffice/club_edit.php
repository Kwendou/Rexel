<?php require_once 'config.php'; ?>
<?php 
	// On récupère les informations de connection à  notre base de données dans le tableau (array) $database
	require 'config/config.php';
	include 'functions/database.fn.php';	
	$db_database = $config['database'];	

	$bdd = getPDOLink($config);

	$page = "backoffice/home_clubs.php";

	if(!empty($_POST)){	
		
		if( isset($_POST['action']) and ($_POST['action']=="edit") ) {	
	} else {
		try {
			$club_obj = new Cl_Club();
			$data = $club_obj->club_update( $_POST );
			if($data)$success = CLUB_UPDATE_SUCCESS;
			//echo '<meta http-equiv="refresh" content="0;url='.$page.'">';
			} catch (Exception $e) {
				$error = $e->getMessage();
			}
		}
	}
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/


	$query = "SELECT `USER_ID`,`NOM`,`PRENOM`,`ALIAS`,`RUE`,`NUMERO`,`CODE_POSTAL`,`LOCALITE`,`PAYS`,`TELEPHONE`,`GSM`,`EMAIL`
		FROM `$db_database`.`utilisateurs`";
	$resultat = $bdd->query($query) or die(print_r($bdd->errorInfo()));
	while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
		$users[] = $donnees;
	}
/*
echo "<pre>";
print_r($users);
echo "</pre>";
*/

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="ISO8859-15">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <title>Smart Registration Form</title>

    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

	<style>
		#droite {
			margin-left:  50%;
		}
		#gauche {
		  float: left;
		  width: 50%;
		}
		#centre {
			width: 480px;
			margin-left:  28%;
		}
		#supprimer {
			width: 180px;
			margin-left:  30%;
		}

	</style>
  </head>
  <body>
	<div class="container">
		<?php require_once 'templates/ads.php';?>
		<div class="login-form">
			<?php require_once 'templates/message.php';?>
			<img src="../img/rexel.png" width="100">
			<h1 class="text-center">Multi Energie</h1>
			<div class="form-header">
				<i class="fa fa-user"></i>
			</div>
			<div class="form-register">
				<form method="post" action="club_delete.php" role="form" >
					<input name="CLUB_ID" id="club_id" type="hidden" placeholder="club_id" value=" <?php echo $_POST['CLUB_ID']; ?>">
					<button id="supprimer" class="btn btn-block bt-login" type="submit">Supprimer le club</button>				
				</form>

				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" role="form" >
					<div id="centre">
						<input name="CLUB_ID" id="club_id" type="hidden" placeholder="club_id" value=" <?php echo $_POST['CLUB_ID']; ?>">
						<span class="help-block"></span>
					</div>
					<div id="gauche">
						<input name="NOM_CLUB" id="nom" type="text" class="form-control" placeholder="Nom" value=" <?php echo $_POST['NOM_CLUB']; ?>">
						<span class="help-block"></span>
					</div>
					<div id="droite">
						<div class="ui-widget">
							<select id="table_alias" name="ALIAS_UTILISATEUR" class="form-control" required >
								<option name="ALIAS_UTILISATEUR" ><?php echo ($_POST['ALIAS_UTILISATEUR']); ?></option>
							</select>
						</div>
					</div>					

					<button class="btn btn-block bt-login" type="submit">Enregistrer les modifications</button>	
					
				</form>
				</div>
		</div>
		<div>
			<center><button class="btn btn-primary" onClick="window.location='home_clubs.php'">Retour</button>
		</div>
	</div>
	<!-- /container -->

	
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/register.js"></script>
    <script src="js/scripts.js"></script>

  </body>
</html>