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
				$_SESSION['LANGUAGE']=$_POST['language'];
				header('Location: index3.php');
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
		}
	}
	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
		$_SESSION['LANGUAGE']=$_POST['language'];

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
                                   
				<form id="login-form" method="post" class="form-signin" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>">  
				
                    <input name="email" id="email" type="email"  placeholder="Email address">
                    <input name="password" id="password" type="password" placeholder="Password">
					                   
                    <div class="log__language switch">
                        
                        <input type="radio" id="fr" name="language" value="fr" checked/>
                        <input type="radio" id="nl" name="language" value="nl"/>
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

<?php ob_end_flush(); ?>