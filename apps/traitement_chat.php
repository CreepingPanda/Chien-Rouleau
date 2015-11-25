<?php

if ( isset($_POST['content']) )
{
	require('models/MessagesManager.class.php');
	$messagesManager = new MessagesManager();
	$usersManager = new UsersManager();
	$user = $usersManager->getCurrent();
	$message = $manager->create($_POST['content'], $user);
}

?>






	// if (isset($_SESSION['id']))
	// {
	// 	$id_user = intval($_SESSION['id']);

	// 	if (isset($_POST['message']))
	// 	{
	// 		$message = mysqli_real_escape_string($database, $_POST['message']);

	// 		if (strlen($message)>0 && strlen($message)<512)
	// 		{
	// 			$query = "INSERT INTO messages (content, id_user) VALUES ('".$message."', '".$id_user."')";
	// 			$result = mysqli_query($database, $query);
	// 			exit;
	// 		}
	// 	}
	// 	else if (isset($_POST['pv']))
	// 	{
	// 		$pv = mysqli_real_escape_string($database, $_POST['pv']);
	// 		$id_reader = intval($_GET['id']);

	// 		if (strlen($pv)>0 && strlen($pv)<512)
	// 		{
	// 			$query = "INSERT INTO p_messages (content, id_writer, id_reader) VALUES ('".$pv."', '".$id_user."', '".$id_reader."')";
	// 			$result = mysqli_query($database, $query);
	// 			exit;
	// 		}
	// 	}
	// }

?>