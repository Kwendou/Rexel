<?php 
	ob_start();
	session_start();
	require_once 'config.php'; 
	//print_r($_SESSION);
	if(!isset($_SESSION['logged_in'])){
		header('Location: index.php');
	}
	if($_SESSION['logged_in']== ""){
		header('Location: index.php');
	}
    $json = array();


	// On récupère les informations de connection à  notre base de données dans le tableau (array) $database
	
	require 'config/config.php';
	
	include 'functions/database.fn.php';	

	$bdd = getPDOLink($config);
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smart Login Page</title>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
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
			<h1 class="text-center">C.S.S.H.</h1>
			<div class="form-header">
				<h2 class="text-center">Hall omnisports</h2>
			</div>
			<form id="login-form" method="post" class="form-signin" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>"><center>
				<table name="GPIO"><tr><th><center>Eclairage</th><th><center>Statut</th><th><center>Action</th></tr>
				
				<?php
				If (isset($_GET['action'])){
					If ($_GET['action'] == "logout"){
						$_SESSION = array();
						session_destroy();
						header('Location: index3.php');
					} else If ($_GET['action'] == "setPassword"){
						print '
						<form name="changePassword" action="index3.php" method="post">
						<input type="hidden" name="action" value="setPassword">
						<p>Enter New Password: <input type="password" name="password1">  Confirm: <input type="password" name="password2"><input type="submit" value="submit"></p>
						</form>
						';
					} else {
						$action = $_GET['action'];

						$pin = $_GET['pin'];

						if ($action == "turnOn"){
							$setting = "1";
							$requete = "UPDATE pinStatus SET pinStatus='$setting' WHERE pinNumber='$pin';";
							$bdd->exec($requete);

							header('Location: index3.php');
						} else If ($action == "turnOff"){
							$setting = "0";
							if ($pin == "17") { 
								$requete = "SELECT MAX(ID) FROM `user_login`.`sessions`";
								$resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
								$descRow = $resultat->fetch(PDO::FETCH_ASSOC);
								$max_id = $descRow['MAX(ID)'];
								$requete = "UPDATE `user_login`.`sessions` SET `DATEHEURELOGOUT`= Now(),`INDEXLOGOUT`='$max_id' WHERE `ID` = '$max_id';";
								$bdd->exec($requete);

								session_destroy();
								header('Location: logout.php');
							}
							$requete = "UPDATE pinStatus SET pinStatus='$setting' WHERE pinNumber='$pin';";
							$bdd->exec($requete);

							header('Location: index3.php');
						} else IF ($action =="edit"){
							$pin = $_GET['pin'];
							$requete = "SELECT pinDescription FROM pinDescription WHERE pinNumber='$pin';";
							$resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
							while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
								$descRow = $donnees;
							}
							$description = $descRow['pinDescription'];
							print '
							<html><head><title>Update Pin ' . $pin . '</title></head><body>
							<table border="0">
							<form name="edit" action="index3.php" method="get">
							<input type="hidden" name="action" value="update">
							<input type="hidden" name="pin" value="' . $pin . '">
							<tr>
							<td><p>Description: </p></td><td><input type="text" name="description" value="' . $description . '"></td><td><input type="submit" value="Confirm"></td>
							</tr>
							</form>
							</table>
							</body></html>
							';
						} else IF ($action =="update"){
							$pin = $_GET['pin'];
							$description = $_GET['description'];
							$requete = "UPDATE pinDescription SET pinDescription='$description' WHERE pinNumber='$pin';";
							$bdd->exec($requete);

							header('Location: index3.php');
						} else {
							header('Location: index3.php');
						}
					}
				} else {
						$count=0;
						$requete = "SELECT pinNumber, pinStatus FROM pinStatus;";
						$resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
						while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
							$query[] = $donnees;
							$count++;
						}

						$requete = "SELECT pinNumber, pinDescription FROM pinDescription;";
						$resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
						while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
							$query2[] = $donnees;
						}

						$totalGPIOCount = 4;
						$currentGPIOCount = 0;
						print '<table name="GPIO" border="1" cellpadding="5">';
						while ($currentGPIOCount < $totalGPIOCount){
							$pinRow = $query[$currentGPIOCount];
							$descRow = $query2[$currentGPIOCount];
							$pinNumber = $pinRow['pinNumber'];
							$pinStatus = $pinRow['pinStatus'];
							$pinDescription = $descRow['pinDescription'];
							If ($pinStatus == "0"){
								$buttonValue = "Allumer";
								$action = "turnOn";
								$image = "img/offpng.png";
							} else {
								$buttonValue = "Eteindre";
								$action = "turnOff";
								$image = "img/onpng.png";
							}
							print '<tr>';
							if ($currentGPIOCount==0) {
								print '	
									<td class="texte" style="display:none"><b>' . $pinDescription . '</b></td>
									<td align="center" style="display:none"><img src="' . $image . '" width="50"></td>
									<td align="center" valign="middle" style="display:none">
										<form name="pin' . $pinNumber . 'edit" action="index3.php" method="get">
										<input type="hidden" name="action" value="' . $action . '">
										<input type="hidden" name="pin" value="' . $pinNumber . '">';
										if ($currentGPIOCount>0) {
											if ($action == "turnOff") {
												print '<input type="submit" class="bouton_off" value="' . $buttonValue . '" valign="middle">';
											} else {
												print '<input type="submit" class="bouton_on" value="' . $buttonValue . '" valign="middle">';
											} 
										}
							} else {
									print '	
										<td class="texte"><b>' . $pinDescription . '</b></td>
										<td align="center"><img src="' . $image . '" width="50"></td>
										<td align="center" valign="middle">
											<form name="pin' . $pinNumber . 'edit" action="index3.php" method="get">
											<input type="hidden" name="action" value="' . $action . '">
											<input type="hidden" name="pin" value="' . $pinNumber . '">';
											if ($currentGPIOCount>0) {
												if ($action == "turnOff") {
													print '<input type="submit" class="bouton_off" value="' . $buttonValue . '" valign="middle">';
												} else {
													print '<input type="submit" class="bouton_on" value="' . $buttonValue . '" valign="middle">';
												} 
											}
								}
							
							print '</form>
								</td>';
							print '</tr>';

							print '</tr>';
							$currentGPIOCount ++;
						}
				 
				 print '
								</font>
							</html>
						</table>			
					</form>

					';
				}
				?>				
			<br><br>
			<form id="login-form" method="post" role="form" action="logout.php">
				<button class="btn btn-block bt-login" type="submit" width="50 px">Déconnexion</button>
			</form>

		</div>
	</div>
  </body>
</html>
<?php ob_end_flush(); ?>
