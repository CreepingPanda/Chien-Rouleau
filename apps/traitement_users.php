<?php
$login = "";
$pass = "";
$log = "";
$password = "";

if (isset($_POST['log'], $_POST['pass']))
{
	$log = mysqli_real_escape_string($database, $_POST['log']);
	$pass = mysqli_real_escape_string($database, $_POST['pass']);
	

	if (strlen($pass) < 6)
	{
		$errors[] = "Mot de passe trop court";
	}
	if (strlen($log) < 4)
	{
		$errors[] = "Login trop court";
	}

	if (count($errors) == 0)
	{
		$hash = password_hash($_POST['pass'], PASSWORD_BCRYPT, array("cost"=>10));
		$query = "INSERT INTO users (login, pass) VALUES('$log', '$hash')";
		$resultat = mysqli_query($database, $query);

		header('Location: index.php?page=login');
		exit;
	}
}

if (isset($_POST['login'], $_POST['password']))
{
	$login = mysqli_real_escape_string($database, $_POST['login']);
	$password = $_POST['password'];
	$query = "SELECT * FROM users WHERE login='".$login."'";
	$resultat = mysqli_query($database, $query);
	if ($resultat)
	{
		$user = mysqli_fetch_assoc($resultat);
		if ($user)
		{
			if (password_verify($password, $user['pass']))
			{
				$_SESSION['id'] = $user['id'];
				$_SESSION['login'] = $user['login'];
				header('Location: index.php');
				exit;
			}
			else
			{
				$errors[] = "Incorrect password";
			}
		}
		else
		{
			$errors[] = "Login unknown";
		}
	}
	else
	{
		$errors[] = "Internal server error";
	}
}

?>