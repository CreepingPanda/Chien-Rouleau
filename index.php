<?php

	session_start();

	$database = mysqli_connect('192.168.1.97', 'chien', 'chien', 'chien_rouleau');
	if ($database === false)
		die(mysqli_connect_error());

	$traitements = array('chat', 'users');
	$ways = array('home', 'login', 'register', 'chat');

	$page = 'home';

	if (isset($_GET['page']))
	{
		if (in_array($_GET['page'], $traitements))
		{
			require('apps/traitement_'.$_GET['page'].'.php');
		}
		if (in_array($_GET['page'], $ways))
		{
			$page = $_GET['page'];
		}
	}

	require('apps/skel.php');

?>