<?php
/*
 * login.php
 * Checks that a user can log into the system and creates a user session.
 */
	 
// Connect to database.
include "./common/db_connect.php";

// Encrypt submitted password.
$hashed = hash("sha256", $_POST["pwd"]);

// Prepare and execute SQL statement to search for user with submitted username.
$stmt = $conn->prepare("SELECT * FROM cuenta WHERE nombre_usuario_pk = ?");
$stmt->bind_param("s", $_POST["user"]);
$stmt->execute();

// Fetch record data based on row obtained from SQL statement execution.
$result = $stmt->get_result();
$record = $result->fetch_assoc();

// Release database resources.
$stmt->close();
$conn->close();
	
// Redirect to login error screen if there is no record.
if (!$record) {
	header("location:login_error_screen.php");
	exit;
}

// Redirect to login error screen if submitted password does not match stored
// password based on their encrypted values.
if ($hashed != $record["Password"]) {
	header("location:login_error_screen.php");
	exit;
}

// Create user session and save user data.
session_start();
$_SESSION["tipo_cuenta"] = $record["tipo_cuenta"]; // Store user type
$_SESSION["nombre_usuario_pk"] = $record["nombre_usuario_pk"]; // Store username

// Redirect to list screen if everything is still ok.
header("location: ...");
?>
