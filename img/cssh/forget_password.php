<?php require_once 'config.php'; ?>
<?php 
	if(!empty($_POST)){
		if( !isset($_POST['ACTION']) ) {
			try {
				$user_obj = new Cl_User();
				$data = $user_obj->forgetPassword( $_POST );
				if($data)$success = PASSWORD_RESET_SUCCESS;
			} catch (Exception $e) {
				$error = $e->getMessage();
			}
		}
	}
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>

    <title>Mot de passe oublié</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="container">
		<?php require_once 'templates/ads.php';?>
		<div class="login-form">
			<h1 class="text-center">C.S.S.H.</h1>
			<div class="form-header">
				<i class="fa fa-user"></i>
			</div>
			<form id="forgetpassword-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-register" role="form">
				<div>
					<input id="email" name="EMAIL" type="email" class="form-control" placeholder="Adresse e-mail" value="<?php echo $_POST['EMAIL']; ?>">  
					<span class="help-block"></span>
				</div>
				<button class="btn btn-block bt-login" type="submit">Réinitialiser le mot de passe</button>
			</form>
			<div class="form-register">
				<div>
					<center><button class="btn btn-block bt-login" onClick="window.location='backoffice/home_utilisateurs.php'">Annuler</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /container -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/forgetpassword.js"></script>
  </body>
</html>