<?php

// $login = "";
// $pass = "";
// $log = "";
// $password = "";

// if (isset($_POST['log'], $_POST['pass']))
// {
// 	$log = mysqli_real_escape_string($database, $_POST['log']);
// 	$pass = mysqli_real_escape_string($database, $_POST['pass']);
	

// 	if (strlen($pass) < 6)
// 	{
// 		$errors[] = "Mot de passe trop court";
// 	}
// 	if (strlen($log) < 4)
// 	{
// 		$errors[] = "Login trop court";
// 	}

// 	if (count($errors) == 0)
// 	{
// 		$hash = password_hash($_POST['pass'], PASSWORD_BCRYPT, array("cost"=>10));
// 		$query = "INSERT INTO users (login, pass) VALUES('$log', '$hash')";
// 		$resultat = mysqli_query($database, $query);

// 		header('Location: index.php?page=login');
// 		exit;
// 	}
// }

// if (isset($_POST['login'], $_POST['password']))
// {
// 	$login = mysqli_real_escape_string($database, $_POST['login']);
// 	$password = $_POST['password'];
// 	$query = "SELECT * FROM users WHERE login='".$login."'";
// 	$resultat = mysqli_query($database, $query);
// 	if ($resultat)
// 	{
// 		$user = mysqli_fetch_assoc($resultat);
// 		if ($user)
// 		{
// 			if (password_verify($password, $user['pass']))
// 			{
// 				$_SESSION['id'] = intval($user['id']);
// 				$_SESSION['login'] = $user['login'];

// 				$query = "UPDATE users SET logged = 1 WHERE id = '".$user['id']."'";
// 				$result = mysqli_query($database, $query);

// 				header('Location: index.php');
// 				exit;
// 			}
// 			else
// 			{
// 				$errors[] = "Incorrect password";
// 			}
// 		}
// 		else
// 		{
// 			$errors[] = "Login unknown";
// 		}
// 	}
// 	else
// 	{
// 		$errors[] = "Internal server error";
// 	}
// }

// 
require('models/UsersManager.class.php');

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