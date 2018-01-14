<?php

	require_once '../../core/init.php';

	session_destroy();
	$_SESSION['id'] = '';
	$_SESSION['role'] = '';

	echo '<script>alert("	<h3>Bye!!!</h3>	");</script>';
	redirect::to('../views/login.php');
?>