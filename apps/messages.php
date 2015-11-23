<?php
	$query = "SELECT * FROM messages ORDER BY id DESC LIMIT 5";
	$result = mysqli_query($database, $query);

	while ( $message = mysqli_fetch_assoc($result) )
		require('views/messages.phtml');
?>