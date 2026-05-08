<?php
    // add_user_debug.php

    // Authenticate user session.
    include "./common/authenticate.php";

    // Extract submitted username, password, and retyped password.
    extract($_POST);

    // Redirect to transaction error screen if data is missing or not properly formatted.
    if (empty($user) || empty($pwd) || 
        !preg_match("/^[a-zA-Z0-9]{5,}$/", $user) || 
        !preg_match("/^[a-zA-Z0-9]{8,}$/", $pwd) ||
        $pwd != $retyped_pwd) {
        $error = urlencode("Error Adding User: Invalid Username or Password.");
        header("location: transaction_error_screen.php?error=" . $error);
        exit;
    }

    if (empty($emeil) || !filter_var($emeil, FILTER_VALIDATE_EMAIL)) {
        $error = urlencode("Error Adding User: Invalid Email Format.");
        header("location: transaction_error_screen.php?error=" . $error);
        exit;
    }

    $student_status = isset($_POST['student_status']) ? $_POST['student_status'] : 'Inactivo';
    $disability_status = isset($_POST['disability_status']) ? $_POST['disability_status'] : 'no';

    if (empty($fecha_nacimiento)) {
        $error = urlencode("Error Adding User: Invalid Date of Birth.");
        header("location: transaction_error_screen.php?error=" . $error);
        exit;
    }

    // Connect to the database.
    include "./common/db_connect.php";

    // Encrypt the submitted password.
    $hashed = hash("sha256", $pwd);

    // Debug output: Print the data being prepared for insertion.
    echo "<pre>";
    echo "Debug Info:\n";
    echo "Username: $user\n";
    echo "Email: $emeil\n";
    echo "Date of Birth: $fecha_nacimiento\n";
    echo "Student Status: $student_status\n";
    echo "Disability Status: $disability_status\n";
    echo "Password (hashed): $hashed\n";
    echo "</pre>";

    //Prepare and execute SQL statement to create user record with submitted username and password.
    $stmt = $conn->prepare(
        "INSERT INTO Cuenta (nombre_usuario_pk, emeil, fecha_nacimiento, student_status, disability_status, Password, tipo_cuenta) 
         VALUES (?, ?, ?, ?, ?, ?, 'User')"
    );

    // Check if the query preparation succeeded.
    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }

    $stmt->bind_param("ssssss", $user, $emeil, $fecha_nacimiento, $student_status, $disability_status, $hashed);

    // Execute the statement and check if it succeeded.
    if (!$stmt->execute()) {
        echo "SQL Execution Error: " . $stmt->error;
        exit;
    }

    // Get number of affected rows.
    $affected_rows = $stmt->affected_rows;

    // Release database resources.
    $stmt->close();
    $conn->close();

    // Redirect to transaction error screen if no user was created.
    if ($affected_rows != 1) {
        $error = urlencode("Error Adding User: Duplicate Username");
        header("location: transaction_error_screen.php?error=" . $error);
        exit;
    }

    // Redirect to screen if everything still ok.
    header("location: login_screen.php");
    exit; 
?>
