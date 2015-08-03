<?php
	$session_expiration = time() + 3600 * 24 * 7; // +7 days
	session_set_cookie_params($session_expiration);
	session_start();// Starting Session
	// Confirming that session exists and user can  view page
	if(!isset($_SESSION['logged_in_user']))	{
		header('Location:index.php'); // Redirecting To Login Page
	}
	include("pdo-connect.php");
?>