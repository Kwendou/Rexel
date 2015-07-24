<?php require_once 'config.php'; ?>
<?php 
	$page = "home_utilisateurs.php";

	if(!empty($_POST)){
		$id = $_POST['ID'];
		if( isset($_POST['action']) and ($_POST['action']=="edit") ) {	
	} else {
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->user_update( $_POST );
			if($data)$success = USER_UPDATE_SUCCESS;
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
echo "ID=".$id."<br>";	
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
			margin-left:  25%;
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
				<form method="post" action="user_delete.php" role="form" >
					<input name="ID" id="id" type="hidden" class="form-control" placeholder="id" value=" <?php echo $_POST['ID']; ?>">
					<button id="supprimer" class="btn btn-block bt-login" type="submit">Supprimer l'utilisateur</button>				
				</form>

				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  role="form" >
					<div id="centre">
						<input name="ID" id="id" type="hidden" class="form-control" placeholder="id" value=" <?php echo $_POST['ID']; ?>">
						<span class="help-block"></span>
					</div>
					<div id="gauche">
						<input name="NOM" id="nom" type="text" class="form-control" placeholder="Nom" value=" <?php echo $_POST['NOM']; ?>">
						<span class="help-block"></span>
					</div>
					<div id="droite">
						<input name="PRENOM" id="prenom" type="text" class="form-control" placeholder="Prénom" value=" <?php echo $_POST['PRENOM']; ?>"> 
						<span class="help-block"></span>
					</div>					
					<div id="gauche">
						<input name="RUE" id="rue" type="text" class="form-control" placeholder="Rue" value=" <?php echo $_POST['RUE']; ?>">  
						<span class="help-block"></span>
					</div>
					<div id="droite">
						<input name="NUMERO" id="numero" type="text" class="form-control" placeholder="Numéro" value=" <?php echo $_POST['NUMERO']; ?>">  
						<span class="help-block"></span>
					</div>
					<div id="gauche">
						<input name="CODE_POSTAL" id="cp" type="text" class="form-control" placeholder="Code postal" value=" <?php echo $_POST['CODE_POSTAL']; ?>"> 
						<span class="help-block"></span>
					</div>
					<div id="droite">
						<input name="LOCALITE" id="localite" type="text" class="form-control" placeholder="Localité" value=" <?php echo $_POST['LOCALITE']; ?>">  
						<span class="help-block"></span>
					</div>
					<div id="gauche">
						<input name="PAYS" id="pays" type="text" class="form-control" placeholder="Pays" value=" <?php echo $_POST['PAYS']; ?>">  
						<span class="help-block"></span>
					</div>
					<div  id="droite">
						<input name="EMAIL" id="email" type="email" class="form-control" placeholder="Adresse e-mail" value=" <?php echo $_POST['EMAIL']; ?>"> 
						<span class="help-block"></span>
					</div>
					<div id="gauche">
						<input name="TELEPHONE" id="telephone" type="text" class="form-control" placeholder="Téléphone" value=" <?php echo $_POST['TELEPHONE']; ?>"> 
						<span class="help-block"></span>
					</div>
					<div  id="droite">
						<input name="GSM" id="gsm" type="text" class="form-control" placeholder="GSM" value=" <?php echo $_POST['GSM']; ?>"> 
						<span class="help-block"></span>
					</div>
					
					<button class="btn btn-block bt-login" type="submit">Enregistrer les modifications</button>	
					
				</form>
			</div>
		</div>
		<div>
			<center><button class="btn btn-primary" onClick="window.location='home_utilisateurs.php'">Retour</button>
		</div>

	</div>
	<!-- /container -->

	
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/register.js"></script>
  </body>
</html>