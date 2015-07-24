<?php require_once 'config.php'; ?>
<?php 
	//$page = "home_utilisateurs.php";

	if(!empty($_POST)){
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/
		if( isset($_POST['DELETED']) and ($_POST['DELETED']=="DELETE") ) {			
		try {
			$club_obj = new Cl_Club();
			$data = $club_obj->club_delete( $_POST );
			if($data)$success = CLUB_DELETE_SUCCESS;
				//echo '<meta http-equiv="refresh" content="0;url='.$page.'">';
				} catch (Exception $e) {
					$error = $e->getMessage();
				}
		} 
	}
	
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="ISO8859-15">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <title>Smart Login Page</title>
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
		#retour {
			width: 180px;
			padding: 10px 10px 10px;
			background-color: #fff;
			border: 1px solid rgba(0,0,0,0.1);  
			border-bottom: 0px; 
			border-top: 0px; 
			margin-bottom: 0px;

		}

	</style>

  </head>
  <body>
	<div class="container">
		<div class="login-form">
			<?php require_once 'templates/message.php';?>
			<img src="../img/rexel.png" width="100">
			<h1 class="text-center" >Multi Energie</h1>
			<div class="form-header">
				<i class="fa fa-user"></i>
			</div>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-register" role="form" id="register-form">					
				<center><label for="delete" color="red">Voulez-vous r&eacuteellement supprimer ce club ?</label><br><br>
				<input name="CLUB_ID" id="id" type="hidden" class="form-control" value=" <?php echo $_POST['CLUB_ID']; ?>">
				<input name="DELETED" id="deleted" type="hidden" class="form-control" value="DELETE">
				<button class="btn btn-block bt-login" type="submit">Supprimer</button>
			</form>
		</div>
		<div>
			<center><button class="btn btn-primary" onClick="window.location='home_clubs.php'">Retour</button>
		</div>
	</div>

	<!-- /container -->
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/login.js"></script>
  </body>
</html>
