<?php

if ( isset($_POST['message']) )
{
	$messagesManager = new MessagesManager($database);
	$usersManager = new UsersManager($database);

	$user = $usersManager->getCurrent();

	$message = $messagesManager->create($_POST['message'], $user);
	exit;
}

?>