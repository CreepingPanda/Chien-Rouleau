<?php

	session_start();

	$database = mysqli_connect('192.168.1.97', 'chien', 'chien', 'chien_rouleau');
		if ($database === false)
		{
			die(mysqli_connect_error());
		}

	$ways = array('home', 'login', 'register', 'chat');
	$traitements = array('chat', 'users');

	$page = 'home';

	if (isset($_GET['page'])
	{
		if (in_array($_GET['page'], $traitements)
		{
			require('apps/traitement_'.$page.'.php');
		}
		else if (in_array($_GET['page'], $ways)
		{
			$page = $_GET['page'];
		}
	}

	require('apps/skel.php');

?>