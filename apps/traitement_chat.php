<?php
	
	if (isset($_SESSION['id']))
	{
		$id_user = intval($_SESSION['id']);

		if (isset($_POST['message']))
		{
			$message = json_decode($_POST['message']);
			$message = mysqli_real_escape_string($database, $message);

			if (strlen($message)>0 && strlen($message)<512)
			{
				$query = "INSERT INTO messages (content, id_user) VALUES ('".$message."', '".$id_user."')";
				$result = mysqli_query($database, $query);
				header('Location: index.php?page=chat');
				exit;
			}
		}
	}

?>