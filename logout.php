<?php
	
	session_start();
	
	session_destroy();
	
	session_start();
	
	$_SESSION['outMessage'] = "Du är nu utloggad";
	
	header('Location: index.php');
	
?>