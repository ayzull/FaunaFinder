<?php 
	
	session_start();
	unset($_SESSION["id"]);
	unset($_SESSION["email"]);
	unset($_SESSION["role"]);
	echo "<script>window.location.replace('login.php');</script>";

?>