<?php 
	require_once 'token.php';

	session_start();


	$GLOBALS['config'] = array(
		'mysql' => array(
			'host' => '127.0.0.1',
			'username' => 'root',
			'password' => '',
			'db' => 'eportal'
		),
		'session' => array(
			'session_name' => 'user',
			'token' =>  token::getToken()
			)
		);

	spl_autoload_register(
		function($class){
		require_once '../../controllers/'.$class.'.php';	
		}
	);

	