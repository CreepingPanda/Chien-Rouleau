<?php

	$selectQuery = "SELECT * FROM users WHERE logged = 1 ORDER BY id DESC LIMIT 0, 44";
	$selectResult = mysqli_query($database, $selectQuery);

	if ( $selectResult )
	{
		while ( $user = mysqli_fetch_assoc($selectResult) )
		{
			require('views/userlist.phtml');
		}
	}
	else {
		echo "Aucun utilisateur en ligne";
	}

	require('views/userlist.phtml');
?>