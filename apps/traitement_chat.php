<?php

if ( isset($_POST['message']) )
{
	require('models/MessagesManager.class.php');
	require('models/UsersManager.class.php');

	$messagesManager = new MessagesManager($database);
	$usersManager = new UsersManager($database);

	$user = $usersManager->getCurrent();

	$message = $messagesManager->create($_POST['message'], $user);
	exit;
}

?>



<?php 
// 	if (isset($_SESSION['id']))
// 	{
// 		$id_user = intval($_SESSION['id']);

// 		if (isset($_POST['message']))
// 		{
// 			$message = mysqli_real_escape_string($database, $_POST['message']);

// 			if (strlen($message)>0 && strlen($message)<512)
// 			{
// 				$query = "INSERT INTO messages (content, id_user) VALUES ('".$message."', '".$id_user."')";
// 				$result = mysqli_query($database, $query);
// 				header('Location: index.php?page=chat');
// 				exit;
// 			}
// 		}
// 		else if (isset($_POST['pv']))
// 		{
// 			$pv = mysqli_real_escape_string($database, $_POST['pv']);
// 			$id_reader = intval($_GET['id']);

// 			if (strlen($pv)>0 && strlen($pv)<512)
// 			{
// 				$query = "INSERT INTO p_messages (content, id_writer, id_reader) VALUES ('".$pv."', '".$id_user."', '".$id_reader."')";
// 				$result = mysqli_query($database, $query);
// 				header('Location: index.php?page=chat');
// 				exit;
// 			}
// 		}
// 	} 
?>