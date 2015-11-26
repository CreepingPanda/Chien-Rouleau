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