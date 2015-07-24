<?php

$config = array(
    'host'      => 'localhost',
    'port'      => 3306, // MAC = 8889 / Windows = 3306
    'username'  => 'dlinkrouter',
    'password'  => '4568', // MAC = 'root' / Windows = null
    'database'  => 'user_login',
);


require_once 'messages.php';

//site specific configuration declartion
define( 'BASE_PATH', 'http://localhost/rexel_me/');
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

?>