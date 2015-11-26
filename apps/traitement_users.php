<?php

if (isset($_POST['log'], $_POST['pass']))
		{
			$manager = new UsersManager($database);
			$retour = $manager->findByLogin($_POST['log']);
			if (is_string($retour))
			{
				$errors[] = $retour;
			}
			else
			{
				$user = $retour;
				if ($user->verifPassword($_POST['pass']))
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
		if (isset($_POST['login'], $_POST['password']))
		{
			$manager = new UsersManager($database);
			$retour = $manager->create($_POST['login'], $_POST['password']);
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
	else if ($action == 'logout')
	{
		session_destroy();
		$_SESSION = array();
		header('Location: index.php');
		exit;
	}

?>