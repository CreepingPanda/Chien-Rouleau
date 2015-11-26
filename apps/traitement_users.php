<?php

// ________ LOGIN ________
	if (isset($_POST['login'], $_POST['password']))
	{
		$manager = new UsersManager($database);
		$retour = $manager->findByLogin($_POST['login']);
		if (is_string($retour))
		{
			$errors[] = $retour;
		}
		else
		{
			$user = $retour;
			if ($user->verifPassword($_POST['password']))
			{
				$_SESSION['id'] = $user->getId();
				header('Location: index.php');
				exit;
			}
			else
			{
				$errors[] = 'Incorrect Password';
			}
		}
	}

// ________ REGISTER ________
	if (isset($_POST['log'], $_POST['pass']))
	{
		$manager = new UsersManager($database);
		$retour = $manager->create($_POST['log'], $_POST['pass']);
		if (is_string($retour))
		{
			$errors[] = $retour;
		}
		else
		{
			header('Location: index.php?page=login');
			exit;
		}
	}
	// else if ($action == 'logout')
	// {
	// 	session_destroy();
	// 	$_SESSION = array();
	// 	header('Location: index.php');
	// 	exit;
	// }

?>