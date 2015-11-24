<?php
	$selectQuery = "SELECT * FROM messages ORDER BY id DESC LIMIT 0, 10";
	$selectResult = mysqli_query($database, $selectQuery);

	if ( $selectResult )
	{
		while ( $message = mysqli_fetch_assoc($selectResult) )
		{
			$userQuery = "SELECT * FROM users WHERE id = '".$message['id_user']."'";
			$userResult = mysqli_query($database, $userQuery);
			$user = mysqli_fetch_assoc($userResult);
			require('views/messages.phtml');
		}
	}
	else {
		echo "Aucun message à afficher.";
	}
?>