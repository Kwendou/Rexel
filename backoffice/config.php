<?php
/**
@author muni
@copyright http:www.smarttutorials.net
 */

require_once 'messages.php';

//site specific configuration declartion
define( 'BASE_PATH', 'http://localhost/cssh/');
define( 'DB_HOST', 'localhost' );
define( 'DB_USERNAME', 'dlinkrouter');
define( 'DB_PASSWORD', '4568');
define( 'DB_NAME', 'user_login');

function __autoload($class)
{
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	require_once $path . '.php';
}
