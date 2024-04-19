<?php
include 'database.php';
$errorMsg = ""; // this initializes an empty error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // checks if the user exists
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
            // password is correct, set up a session for authentication
            session_start();
            $_SESSION['user_id'] = $userId;
            $_SESSION['user_email'] = $storedEmail;

            // this redirects the user to a dashboard or home page
            header("Location: ../user/index2.php");
            exit();
        } else {
            // password is incorrect, error messgae
            $errorMsg = "Incorrect password!";
        }
    } else {
        // user with the provided email does not exist, error messsage
        $errorMsg = "User not found!";
    }

    $stmt->close();
} else {
    // if the request method is not POST, redirect back to the login page
    header("Location: ../html/login2.html");
    exit();
}

// stores the error message in a session variable
session_start();
$_SESSION['login_error'] = $errorMsg;

// thid redirects back to the login page
header("Location: ../html/login2.html");
exit();
?>