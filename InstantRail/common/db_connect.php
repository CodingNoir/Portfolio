<?php

	/*
	 * db_connect.php
	 * Creates and checks connection to the database.
	 */

	// Set authentication parameters for DBMS.
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "instanttransport";
	

	// Create connection to database.
	$conn = new mysqli($servername, $username, $password, $dbname);

	// End execution if there is a connection error.
	if ($conn->connect_error)
		die("Connection failed: " . $conn->connect_error);
?>