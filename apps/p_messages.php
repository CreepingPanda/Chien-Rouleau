<?php
	$selectQuery = "SELECT * FROM p_messages ORDER BY id DESC LIMIT 0, 100";
	$selectResult = mysqli_query($database, $selectQuery);

	if ( $selectResult )
	{
		while ( $pMessage = mysqli_fetch_assoc($selectResult) )
		{
			$userQuery = "SELECT * FROM users WHERE id = '".$pMessage['id_user']."'";
			$userResult = mysqli_query($database, $userQuery);
			$user = mysqli_fetch_assoc($userResult);
			require('views/p_messages.phtml');
		}
	}
	else {
		echo "Aucun message à afficher.";
	}
?>