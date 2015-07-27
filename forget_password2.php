<?php require 'backoffice/config/config2.php';?>
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
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <link href='http://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>

    <title>Mot de passe oublié</title>

    <!-- Bootstrap -->
<!--    <link href="css/bootstrap.min.css" rel="stylesheet">-->
<!--	<link rel="stylesheet" type="text/css" href="css/style.css"> -->

    <link rel="stylesheet" type="text/css" href="_style/style.css">
    <link rel="stylesheet" type="text/css" href="_style/reset.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="forgotPassword">
		<?php require_once 'templates/ads.php';?>
		<div>
			<?php require_once 'templates/message.php';?>

			<div class="log__title">
				<p>
					<?php require_once 'templates/message.php';?>
				</p>
			</div>
			<img src="_img/RexelLogo.png" alt="Logo de la société Rexel">
			<h1 class="text-center">Rexel Multi-Energy</h1>
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
			<div class="form-register annulForgot">
			    <button class="btn btn-block bt-login" onClick="window.location='index.php'">Annuler</button>
			</div>
		</div>
	</div>
	<!-- /container -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="_js/Jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<!--    <script src="js/bootstrap.min.js"></script>-->
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/forgetpassword.js"></script>
  </body>
</html>