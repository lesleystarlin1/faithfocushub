<?php
// File: php/login.php

include 'database.php';

$errorMsg = ""; // this initializes an empty error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // check if the user exists
    $query = "SELECT id, email, password_hash FROM user WHERE email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userId, $storedEmail, $storedPasswordHash);
        $stmt->fetch();

        // verify the password
        if (password_verify($password, $storedPasswordHash)) {
            // if password is correct, set up a session or token for authentication
            session_start();
            $_SESSION['user_id'] = $userId;
            $_SESSION['user_email'] = $storedEmail;

            // this redirects the user to a dashboard or home page
            header("Location: ../user/login-user.php");
            
            exit();
        } else {
            // if the password is incorrect, error message
            $errorMsg = "Incorrect password!";
        }
    } else {
        // user with the provided email does not exist, error message
        $errorMsg = "User not found!";
    }

    $stmt->close();
    
    // stores the error message in a session variable
    session_start();
    $_SESSION['login_error'] = $errorMsg;
    header("Location: ../php/login-error.php"); // this redirects back to the login page
    exit();
}

$mysqli->close();
?>
