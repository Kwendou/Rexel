<?php 
ob_start();
session_start();
require_once 'config.php'; 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smart Login Page</title>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
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
			margin-left:  0%;
		}
		#gauche {
		  float: left;
		  width: 85%;
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
		<div class="login-form">
			<?php require_once 'templates/message.php';?>
			<h1 class="text-center">C.S.S.H.</h1>
			<div class="form-header">
				<i class="fa fa-lightbulb-o"></i>
			</div>
			<div id="gauche">
				<button class="bouton_ecl">LED</button><br>
			</div>
			<div id="droite">
					<img src="img/on.jpg" width="42" id="dagger" />
			</div>
				<button class="btn btn-block bt-login">Sodium (jaune)</button><br>
				<button class="btn btn-block bt-login">Iodure (blanc)</button><br>
				<button class="btn btn-block bt-login" onClick="window.location='../logout.php'">Déconnexion</button>
			</div>
		</div>
	</div>
	<!-- /container -->
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/login.js"></script>
  </body>
</html>
<?php ob_end_flush(); ?>
