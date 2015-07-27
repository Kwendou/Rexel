<?php require 'backoffice/config/config2.php';?>
<?php 
session_start();
if(!empty($_GET)){
	$email=$_GET['EMAIL'];
}

	if(!empty($_POST)){
		$email=$_POST['EMAIL'];

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
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <link href='http://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>

    <title>Mot de passe oublié</title>

    	<link rel="stylesheet" type="text/css" href="_style/style.css">
   	<link rel="stylesheet" type="text/css" href="_style/reset.css">
	<script src="_js/Jquery.js"></script>

  </head>
  <body>
	<div class="forgotPassword">
		<div class="login-form">
			<?php require_once 'templates/message.php';?>

			<img src="_img/RexelLogo.png" alt="Logo de la société Rexel">
			<h1 class="text-center">Rexel Multi-Energy</h1>
			<div class="form-header">
				<i class="fa fa-user"></i>
			</div>
			<form id="forgetpassword-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-register" role="form">
				<div>
					<input id="email" name="EMAIL" type="email" class="form-control" placeholder="Email address" value="<?php echo $email; ?>">  
					<span class="help-block"></span>
				</div>
				<button class="btn btn-block bt-login" type="submit">Reset password</button>
			</form>
			<div class="form-register annulForgot">
			    <button id="index_link" class="btn btn-block bt-login" >Back</button>
			</div>
		</div>
	</div>

    <script src="js/jquery.validate.min.js"></script>
    <script src="_js/forgetpassword.js"></script>
  </body>
</html>