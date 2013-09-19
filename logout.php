<?php
	
	session_start();
	
	session_destroy();
	
	session_start();
	
	$_SESSION['outMessage'] = "<p>Du är nu utloggad</p>";
	
	header('Location: index.php');
	
?>