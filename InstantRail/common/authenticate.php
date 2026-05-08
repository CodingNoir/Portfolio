<?php
	/*
	 * authenticate.php
	 * Authenticates the user session.
	 */

    // Resume user session.
	session_start();
	
	// Redirect to login screen if there is no session.
	if (!isset($_SESSION["tipo_cuenta"]))
		header("location: login_screen.php");
?>