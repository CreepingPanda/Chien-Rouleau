<?php

$id_user = intval($_SESSION['id']);
$query = "UPDATE users SET logged = 0 WHERE id = '".$id_user."'";
$result = mysqli_query($database, $query);

session_destroy();
$_SESSION = array();

header('Location: index.php');
exit;
?>