<?php
session_start();

// Clear the session array.
$_SESSION = [];

// Destroy the session.
session_destroy();

// Delete the session cookie.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),    // The name of the session cookie
        '',                // Empty the cookie value
        time() - 3600,     // Expire the cookie in the past
        $params["path"], 
        $params["domain"], 
        $params["secure"], 
        $params["httponly"]
    );
}

// Prevent browser caching.
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Redirect to login page.
header("Location: ../StylenFlo.html");
exit();
?>
