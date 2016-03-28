<?php

	include 'StandardForms.pkg.php';
	
	//A little debugging never hurt anyone.
		error_reporting(E_ALL);
		ini_set('display_errors',true);

	//Rein in the include paths
		chdir(dirname(__FILE__));

	//Define necessary constants for core usage.
		define('DATABASE_HOST',			'beaconseminar.db.5382461.hostedresource.com');
		define('DATABASE_USERNAME',		'beaconseminar');
		define('DATABASE_PASSWORD',		'Poi23zXr%');
		define('DATABASE_DATABASE',		'beaconseminar');
		define('DATABASE_PERSISTENT',	false);
	
	//Include all traits
		foreach(glob('shared/trait/*.trait.php') as $value) {require_once($value);}
	
	//Include all interfaces
		foreach(glob('shared/interface/*.interface.php') as $value) {require_once($value);}
		
	//Include all classes
		foreach(glob('shared/class/*/*.class.php') as $value) {require_once($value);}

	//Singletons
		$Database = Database::instance();
		$Session = Session::instance();
		$Cookie = Cookie::instance();
		$Self = Main::getLoggedInUser();
		
		if ($Self) {DateTimeHelper::setTimezone($Self->get('timezone'));}

?>