<?php 
// Define application environment
defined('APPLICATION_ENV') ||
	define('APPLICATION_ENV',
			(getenv('APPLICATION_ENV') ?
			 getenv('APPLICATION_ENV') : 'production'));

	
$ruta = $_SERVER['DOCUMENT_ROOT']."/../application/";
set_include_path(get_include_path() . PATH_SEPARATOR . $ruta);

	
$configFile="../application/configs/config.ini";
require_once ("../application/autoload.php");

$bootstrap = new Bootstrap($configFile);
$bootstrap->run();


// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";


