<?php
/**
 * This User will have functions that hadles user registeration,
 * login and forget password functionality
 * @author muni
 * @copyright www.smarttutorials.net
 */
class Cl_User
{
	/**
	 * @var will going contain database connection
	 */
	protected $_con;
	
	/**
	 * it will initalize DBclass
	 */
	public function __construct()
	{
		$db = new Cl_DBclass();
		$this->_con = $db->con;
	}
	
	/**
	 * this will handles user registration process
	 * @param array $data
	 * @return boolean true or false based success 
	 */
	public function registration( array $data )
	{
		if( !empty( $data ) ){
			
			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);
			
			
			
			// escape variables for security
			$nom = mysqli_real_escape_string( $this->_con, $trimmed_data['nom'] );
			$prenom = mysqli_real_escape_string( $this->_con, $trimmed_data['prenom'] );
			$rue = mysqli_real_escape_string( $this->_con, $trimmed_data['rue'] );	
			$numero = mysqli_real_escape_string( $this->_con, $trimmed_data['numero'] );			
			$cp = mysqli_real_escape_string( $this->_con, $trimmed_data['cp'] );			
			$localite = mysqli_real_escape_string( $this->_con, $trimmed_data['localite'] );			
			$pays = mysqli_real_escape_string( $this->_con, $trimmed_data['pays'] );	
			$telephone = mysqli_real_escape_string( $this->_con, $trimmed_data['telephone'] );			
			$gsm = mysqli_real_escape_string( $this->_con, $trimmed_data['gsm'] );	
			$email = mysqli_real_escape_string( $this->_con, $trimmed_data['email'] );						
			$password = mysqli_real_escape_string( $this->_con, $trimmed_data['password'] );
			$cpassword = mysqli_real_escape_string( $this->_con, $trimmed_data['confirm_password'] );
			$alias=$this->alias($prenom,$nom);
			
			// Check for an email address:
			if (filter_var( $trimmed_data['email'], FILTER_VALIDATE_EMAIL)) {
				$email = mysqli_real_escape_string( $this->_con, $trimmed_data['email']);
			} else {
				throw new Exception( "Encodez une adresse email valide !" );
			}
			
			if((!$nom) || (!$prenom) || (!$rue) || (!$numero) || (!$localite) || (!$pays) || (!$telephone) || (!$gsm) || (!$email) || (!$password) || (!$cpassword) ) {
				throw new Exception( FIELDS_MISSING );
			}
			if ($password !== $cpassword) {
				throw new Exception( PASSWORD_NOT_MATCH );
			}
			$password = md5( $password );
			//$query = "INSERT INTO users (user_id, name, email, password, created) VALUES (NULL, '$nom', '$email', '$password', CURRENT_TIMESTAMP)";
			$query = "INSERT INTO `user_login`.`utilisateurs` 
			(`USER_ID`, `NOM`, `PRENOM`, `ALIAS`, `RUE`, `NUMERO`, `CODE_POSTAL`, `LOCALITE`, `PAYS`, `TELEPHONE`, `GSM`, `EMAIL`, `PASSWORD`, `created`) 
			VALUES 
			(NULL, '$nom', '$prenom', '$alias', '$rue', '$numero', '$cp', '$localite', '$pays', '$telephone', '$gsm', '$email', '$password', CURRENT_TIMESTAMP)";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			};
		} else{
			throw new Exception( USER_REGISTRATION_FAIL );
		}
	}

	public function club_registration( array $data )
	{
		if( !empty( $data ) ){
			
			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);
echo "<pre>";
print_r($trimmed_data);
echo "</pre>";			
			
			
			// escape variables for security
			$club = mysqli_real_escape_string( $this->_con, $trimmed_data['club'] );
			$responsable = mysqli_real_escape_string( $this->_con, $trimmed_data['responsable'] );
			$alias="DMA";
						
			if((!$club) || (!$alias)|| (!$responsable)) {
				throw new Exception( FIELDS_MISSING );
			}
			//$query = "INSERT INTO users (user_id, name, email, password, created) VALUES (NULL, '$nom', '$email', '$password', CURRENT_TIMESTAMP)";
			$query = "INSERT INTO `user_login`.`clubs` 
			(`CLUB_ID`, `NOM_CLUB`, `ALIAS`, `RESPONSABLE`, `created`) 
			VALUES 
			(NULL, '$club', '$alias', '$responsable', CURRENT_TIMESTAMP)";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			};
		} else{
			throw new Exception( CLUB_REGISTRATION_FAIL );
		}
	}

	/**
	 * this will handles user update process
	 * @param array $data
	 * @return boolean true or false based success 
	 */
	public function user_update( array $data )
	{
		if( !empty( $data ) ){
			
			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);
			
			// escape variables for security
			$id = mysqli_real_escape_string( $this->_con, $trimmed_data['USER_ID'] );			
			$nom = mysqli_real_escape_string( $this->_con, $trimmed_data['NOM'] );
			$prenom = mysqli_real_escape_string( $this->_con, $trimmed_data['PRENOM'] );
			$rue = mysqli_real_escape_string( $this->_con, $trimmed_data['RUE'] );	
			$numero = mysqli_real_escape_string( $this->_con, $trimmed_data['NUMERO'] );			
			$cp = mysqli_real_escape_string( $this->_con, $trimmed_data['CODE_POSTAL'] );			
			$localite = mysqli_real_escape_string( $this->_con, $trimmed_data['LOCALITE'] );			
			$pays = mysqli_real_escape_string( $this->_con, $trimmed_data['PAYS'] );	
			$telephone = mysqli_real_escape_string( $this->_con, $trimmed_data['TELEPHONE'] );			
			$gsm = mysqli_real_escape_string( $this->_con, $trimmed_data['GSM'] );	
			$email = mysqli_real_escape_string( $this->_con, $trimmed_data['EMAIL'] );						
			
			
			// Check for an email address:
			if (filter_var( $trimmed_data['EMAIL'], FILTER_VALIDATE_EMAIL)) {
				$email = mysqli_real_escape_string( $this->_con, $trimmed_data['EMAIL']);
			} else {
				throw new Exception( "Encodez une adresse email valide !" );
			}
			
			if((!$nom) || (!$prenom) || (!$rue) || (!$numero) || (!$localite) || (!$pays) || (!$telephone) || (!$gsm) || (!$email) ) {
				throw new Exception( FIELDS_MISSING );
			}
			$query = "UPDATE `user_login`.`utilisateurs` SET 
			`NOM` = '".$nom."',
			`PRENOM` = '".$prenom."',
			`RUE` = '".$rue."',
			`NUMERO` = '".$numero."',
			`CODE_POSTAL` = '".$cp."',
			`LOCALITE` = '".$localite."',
			`PAYS` = '".$pays."',
			`TELEPHONE` = '".$telephone."',
			`GSM` = '".$gsm."',
			`EMAIL` = '".$email."'
			
			WHERE `utilisateurs`.`USER_ID` = ".$id;
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			};
		} else{
			throw new Exception( USER_REGISTRATION_FAIL );
		}
	}
	/**
	 * this will handles user check process // teste si utilisateur responsable de club  avent de le supprimer - facturation
	 * @param array $data
	 * @return boolean true or false based success 
	 */
	public function user_check( array $data )
	{
		if( !empty( $data ) ){
			
			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);
			
			// escape variables for security
			$id = mysqli_real_escape_string( $this->_con, $trimmed_data['USER_ID'] );			
						
			if(!$id) {
				throw new Exception( FIELDS_MISSING );
			}
			$query = "SELECT `NOM_CLUB` FROM `clubs` WHERE `RESPONSABLE` = ".$id;
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			};
		} else{
			throw new Exception( USER_REGISTRATION_FAIL );
		}
	}

	/**
	 * this will handles user delete process
	 * @param array $data
	 * @return boolean true or false based success 
	 */
	public function user_delete( array $data )
	{
		if( !empty( $data ) ){
			
			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);
			
			
			
			// escape variables for security
			$id = mysqli_real_escape_string( $this->_con, $trimmed_data['USER_ID'] );
			
			$query = "DELETE FROM `user_login`.`utilisateurs` WHERE `utilisateurs`.`USER_ID` = ".$id;
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			};
		} else{
			throw new Exception( USER_REGISTRATION_FAIL );
		}
	}

	/**
	 * This method will handle user login process
	 * @param array $data
	 * @return boolean true or false based on success or failure
	 */
	public function login( array $data )
	{
		$_SESSION['logged_in'] = false;
		if( !empty( $data ) ){
			
			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);
			
			// escape variables for security
			$email = mysqli_real_escape_string( $this->_con,  $trimmed_data['email'] );
			$password = mysqli_real_escape_string( $this->_con,  $trimmed_data['password'] );
				
			if((!$email) || (!$password) ) {
				throw new Exception( LOGIN_FIELDS_MISSING );
			}
			$password = md5( $password );
			$query = "SELECT USER_ID, NOM, EMAIL, created FROM utilisateurs where EMAIL = '$email' and PASSWORD = '$password' ";
			$result = mysqli_query($this->_con, $query);
			$data = mysqli_fetch_assoc($result);
			$count = mysqli_num_rows($result);
			mysqli_close($this->_con);
			if( $count == 1){
				// On récupère les informations de connection à  notre base de données dans le tableau (array) $database
				require 'config/config.php';
				include 'functions/database.fn.php';	
				$bdd = getPDOLink($config);
				$sql = "SELECT count(*) FROM `user_login`.`sessions` WHERE `INDEXLOGOUT` = 0"; 
				$result = $bdd->prepare($sql); 
				$result->execute(); 
				$count = $result->fetchColumn(); 				
				$_SESSION = $data;
				$_SESSION['logged_in'] = true;
				if ($count == 0) {
					$bdd->exec('INSERT INTO `user_login`.`sessions` (`CLUB`, `UTILISATEUR`, `DATEHEURELOGIN`, `INDEXLOGIN`) VALUES ('.$count.',2,Now(),12345)');
				}
				return true;

			}else{
				throw new Exception( LOGIN_FAIL );
			}
		} else{
			throw new Exception( LOGIN_FIELDS_MISSING );
		}
	}
	
	/**
	 * This will shows account information and handles password change
	 * @param array $data
	 * @throws Exception
	 * @return boolean
	 */
	
	public function account( array $data )
	{
		if( !empty( $data ) ){
			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);
			
			// escape variables for security
			$password = mysqli_real_escape_string( $this->_con, $trimmed_data['password'] );
			$cpassword = $trimmed_data['confirm_password'];
			$user_id = mysqli_real_escape_string( $this->_con, $trimmed_data['user_id'] );
			
			if((!$password) || (!$cpassword) ) {
				throw new Exception( FIELDS_MISSING );
			}
			if ($password !== $cpassword) {
				throw new Exception( PASSWORD_NOT_MATCH );
			}
			$password = md5( $password );
			$query = "UPDATE utilisateurs SET PASSWORD = '$password' WHERE USER_ID = $user_id";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			}
		} else{
			throw new Exception( FIELDS_MISSING );
		}
	}
	
	/**
	 * This handle sign out process
	 */
	public function logout()
	{
		session_unset();
		session_destroy();
		header('Location: index.php');
	}
	
	/**
	 * This reset the current password and send new password to mail
	 * @param array $data
	 * @throws Exception
	 * @return boolean
	 */
	public function forgetPassword( array $data )
	{
		if( !empty( $data ) ){
			
			// escape variables for security
			$email = mysqli_real_escape_string( $this->_con, trim( $data['EMAIL'] ) );
			
			if((!$email) ) {
				throw new Exception( FIELDS_MISSING );
			}
			//$password = $this->randomPassword();
			$password = "REXEL";
			$password1 = md5( $password );
			$query = "UPDATE utilisateurs SET PASSWORD = '$password1' WHERE EMAIL = '$email'";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				//ini_set("SMTP", "aspmx.l.google.com");
				//$smtp = 'ssl//smtp.gmail.com';
				//$email = 'dmarlair@gmail.com';
				//$port = '465';
				//$to = $email;
				//$subject = "New Password Request";
				//$txt = "Your New Password ".$password;
				//$headers = "From: dmarlair@gmail.com" . "\r\n" .
						//"CC: dmarlair@gmail.com";
					
				//mail($to,$subject,$txt,$headers);
				//echo $txt;
				return true;
				//ini_set("SMTP", "aspmx.l.google.com");
				//ini_set("sendmail_from", "dmarlair@gmail.com");
				//$to = $email;
				//$message = "The mail message was sent with the following mail setting:\r\nSMTP = aspmx.l.google.com\r\nsmtp_port = 25\r\nsendmail_from = dmarlair@gmail.com";
				//$headers = "From: dmarlair@gmail.com";
				//echo $to."<br>";
				//mail($to, "Testing", $message, $headers);
				//return true;
			}
		} else{
			throw new Exception( FIELDS_MISSING );
		}
	}
	
	/**
	 * This will generate random password
	 * @return string
	 */
	
	private function randomPassword() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
	
	private function alias($nom, $prenom) {
		$alias=substr($nom,0,2);
		$alias.=substr($prenom,0,1);
		$alias=strtoupper($alias);
		return($alias); //turn the array into a string
	}

}