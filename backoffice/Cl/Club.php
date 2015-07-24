<?php
/**
 * This User will have functions that hadles club registration,
 * login and forget password functionality
 * @author muni
 * @copyright www.smarttutorials.net
 */
class Cl_Club
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
	 * this will handles club delete process
	 * @param array $data
	 * @return boolean true or false based success 
	 */
	public function club_delete( array $data )
	{
		if( !empty( $data ) ){
			
			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);
			
			// escape variables for security
			$id = mysqli_real_escape_string( $this->_con, $trimmed_data['CLUB_ID'] );
			
			$query = "DELETE FROM `user_login`.`clubs` WHERE `clubs`.`CLUB_ID` = ".$id;
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			};
		} else{
			throw new Exception( CLUB_REGISTRATION_FAIL );
		}
	}


	/**
	 * this will handles club registration process
	 * @param array $data
	 * @return boolean true or false based success 
	 */
	public function club_registration( array $data )
	{
		if( !empty( $data ) ){
			
			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);		

			// escape variables for security
			$club = mysqli_real_escape_string( $this->_con, $trimmed_data['club'] );
			$alias = mysqli_real_escape_string( $this->_con, $trimmed_data['ALIAS_UTILISATEUR'] );
			
			$query = "SELECT `USER_ID` FROM `utilisateurs` WHERE `ALIAS` LIKE '".$alias."'";

			$resultat = mysqli_query($this->_con, $query);
			while ($row = mysqli_fetch_array($resultat))
			$responsable = $row['USER_ID'];
					
			if((!$club) || (!$alias)|| (!$responsable)) {
				throw new Exception( FIELDS_MISSING );
			}

			$query = "INSERT INTO `user_login`.`clubs` 
			(`CLUB_ID`, `NOM_CLUB`, `ALIAS`, `RESPONSABLE`, `created`) 
			VALUES 
			(NULL, '$club', '$alias', '$responsable', Now())";

			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			};
		} else{
			throw new Exception( CLUB_REGISTRATION_FAIL );
		}
	}
	/**
	 * this will handles club update process
	 * @param array $data
	 * @return boolean true or false based success 
	 */
	public function club_update( array $data )
	{
		if( !empty( $data ) ){
			
			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);
			
			// escape variables for security
			$id = mysqli_real_escape_string( $this->_con, $trimmed_data['CLUB_ID'] );			
			$nom = mysqli_real_escape_string( $this->_con, $trimmed_data['NOM_CLUB'] );
			$alias = mysqli_real_escape_string( $this->_con, $trimmed_data['ALIAS_UTILISATEUR'] );
			
			$query = "SELECT `USER_ID` FROM `utilisateurs` WHERE `ALIAS` LIKE '".$alias."'";

			$resultat = mysqli_query($this->_con, $query);
			while ($row = mysqli_fetch_array($resultat))
			$responsable = $row['USER_ID'];
			
			if((!$nom) || (!$responsable)) {
				throw new Exception( FIELDS_MISSING );
			}
			$query = "UPDATE `user_login`.`clubs` SET 
			`RESPONSABLE` = ".$responsable." WHERE `CLUB_ID` = ".$id;
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			};
		} else{
			throw new Exception( CLUB_REGISTRATION_FAIL );
		}
	}
}