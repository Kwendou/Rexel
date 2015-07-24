<?php 
ob_start();
session_start();
require_once 'config.php'; 
require_once 'templates/message.php';
?>
<?php 
	if( !empty( $_POST )){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->login( $_POST );
			if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
				header('Location: index3.php');
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
		}
	}
	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
		header('Location: index2.php');
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Dimensionary | Log In</title>
        <link rel="stylesheet" href="_style/reset.css">
        <link rel="stylesheet" href="_style/style.css">
        <link href='http://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>
        <meta name="description" content="">
    </head>
    <body>

        <main class="logIn">

            <div class="log">
               
                <img src="_img/RexelLogo.png" alt="Logo de la société Rexel">
                <h1 class="log__title">Rexel Multi-Energy</h1>
                
                <form method="" action="">
                    
				<form id="login-form" method="post" class="form-signin" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>">  
				
                    <input name="email" id="email" type="email"  placeholder="Email address">
                    <input name="password" id="password" type="password" placeholder="Password">
					                   
                    <div class="log__language switch">
                        
                        <input type="radio" id="fr" name="language" checked/>
                        <input type="radio" id="nl" name="language" />
                        <label for="fr" class="cb-enable selected"><span>Français</span></label>
                        <label for="nl" class="cb-disable "><span>Nederlands</span></label>
                        
                    </div>
                    
                    <a href="forget_password.php">Forgotten password ? Follow me ...</a>
					
                    <button type="submit">Dimensoning</button>
                    
                </form>
				
				<a href="register.php"> Sign Up </a>
                    
            </div>

        </main>
    
    <script src="_js/Jquery.js"></script>
    <script src="_js/main.js"></script>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <title>Smart Login Page</title>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="https://www.google.com/fonts#UsePlace:use/Collection:Dosis" rel='stylesheet' type='text/css'>
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
  </head>
  <body>
	<div class="container">
		<?php require_once 'templates/ads.php';?>
		<div class="login-form">
			<?php require_once 'templates/message.php';?>
			<img src="img/rexel.png" width="100">
			<h1 class="text-center">Multi Energie</h1>
			<div class="form-header">
				<i class="fa fa-user"></i>
			</div>
			<form id="login-form" method="post" class="form-signin" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input name="email" id="email" type="email" class="form-control" placeholder="Adresse e-mail" autofocus> 
				<input name="password" id="password" type="password" class="form-control" placeholder="Mot de passe"> 
				<button class="btn btn-block bt-login" type="submit">Connexion</button>
			</form>
<!-- 			<div class="form-footer">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<i class="fa fa-lock"></i>
						<a href="forget_password.php"> Mot de passe oublié ? </a>
					
					</div>
					
					<div class="col-xs-6 col-sm-6 col-md-6">
						<i class="fa fa-check"></i>
						<a href="register.php"> Nouvel utilisateur </a>
					</div>
				</div>
-->
			</div>
		</div>
	</div>
	<!-- /container -->
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/login.js"></script>
  </body>
</html>
<?php ob_end_flush(); ?>
