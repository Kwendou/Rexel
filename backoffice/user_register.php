<?php require_once 'config.php'; ?>
<?php 
	if(!empty($_POST)){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->registration( $_POST );
			if($data)$success = USER_REGISTRATION_SUCCESS;
		} catch (Exception $e) {
			$error = $e->getMessage();
		}
	}
	
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
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-register" role="form" id="register-form">
				<div id="gauche">
					<input name="nom" id="nom" type="text" class="form-control" placeholder="Nom" required> 
					<span class="help-block"></span>
				</div>
				<div id="droite">
					<input name="prenom" id="prenom" type="text" class="form-control" placeholder="Prénom" required> 
					<span class="help-block"></span>
				</div>					
				<div id="gauche">
					<input name="rue" id="rue" type="text" class="form-control" placeholder="Rue" required> 
					<span class="help-block"></span>
				</div>
				<div id="droite">
					<input name="numero" id="numero" type="text" class="form-control" placeholder="Numéro" required> 
					<span class="help-block"></span>
				</div>
				<div id="gauche">
					<input name="cp" id="cp" type="text" class="form-control" placeholder="Code postal" required> 
					<span class="help-block"></span>
				</div>
				<div id="droite">
					<input name="localite" id="localite" type="text" class="form-control" placeholder="Localité" required> 
					<span class="help-block"></span>
				</div>
				<div id="gauche">
					<input name="pays" id="pays" type="text" class="form-control" placeholder="Pays" required> 
					<span class="help-block"></span>
				</div>
				<div  id="droite">
					<input name="email" id="email" type="email" class="form-control" placeholder="Adresse e-mail" required> 
					<span class="help-block"></span>
				</div>
				<div id="gauche">
					<input name="telephone" id="telephone" type="text" class="form-control" placeholder="Téléphone" required> 
					<span class="help-block"></span>
				</div>
				<div  id="droite">
					<input name="gsm" id="gsm" type="text" class="form-control" placeholder="GSM" required> 
					<span class="help-block"></span>
				</div>
				<div id="gauche">
					<input name="password" id="password" type="password" class="form-control" placeholder="Mot de passe" required> 
					<span class="help-block"></span>
				</div>
				<div id="droite">
					<input name="confirm_password" id="confirm_password" type="password" class="form-control" placeholder="Confirmez mot de passe" required> 
					<span class="help-block"></span>
				</div>

				<button class="btn btn-block bt-login" type="submit">Enregistrer</button>
			</form>
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