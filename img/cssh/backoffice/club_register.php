<?php require_once 'config.php'; ?>
<?php 
	if(!empty($_POST)){
		try {
			$club_obj = new Cl_Club();
			$data = $club_obj->club_registration( $_POST );
			if($data)$success = CLUB_REGISTRATION_SUCCESS;
		} catch (Exception $e) {
			$error = $e->getMessage();
		}
	}
	
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/
	
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="ISO8859-15">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
			
			<h1 class="text-center">C.S.S.H.</h1>
			<div class="form-header">
				<i class="fa fa-user"></i>
			</div>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-register" role="form" id="register-form">
			<div id="gauche">
					<input name="club" id="club" type="text" class="form-control" placeholder="Dénomination"> 
					<span class="help-block"></span>
				</div>
				<div id="droite">
					<select id="table_alias" name="ALIAS_UTILISATEUR" class="form-control"  >
						<option value="">-- RESPONSABLE --</option>
					</select>
					<span class="help-block"></span>
				</div>					

				<button class="btn btn-block bt-login" type="submit">Enregistrer</button>
			</form>
			<?php
			if(isset($_POST['submit'])){
			// As output of $_POST['Color'] is an array we have to use foreach Loop to display individual value
			foreach ($_POST['user_id'] as $select)
			{
			echo "You have selected :" .$select; // Displaying Selected Value
			} 
			}
			?>
			<div class="form-footer">
				<center><button class="btn btn-block bt-login" onClick="window.location='home_clubs.php'">Retour</button>
			</div>
		</div>
	</div>
	<!-- /container -->

	
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/register.js"></script>
	<script src="js/scripts.js"></script>


  </body>
</html>