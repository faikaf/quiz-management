<?php
session_start(); // Start the session

// Clear all session variables
$_SESSION=[];

// Destroy the session
session_destroy();

// Remove the session cookie (optional)
if (ini_get("session.use_cookies")){
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 3600, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

// Redirect the user to the login page
header("Location: ../../company/signInUp.php");
exit;
?>
