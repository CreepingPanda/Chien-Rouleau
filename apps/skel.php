<?php
	$titre = "ChienRouleau";

	if (isset($_GET['ajax'], $page))
		require('apps/'.$page.'.php');
	else	
		require('views/skel.phtml');
?>