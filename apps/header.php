<?php
if (isset($_SESSION['id']))
{
		require('views/header_logged.phtml');
}
else
{
	require('views/header.phtml');
}
?>