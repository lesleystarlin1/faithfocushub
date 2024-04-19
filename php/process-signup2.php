<?php
session_start();
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];

    // validate form data
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confirmPassword)) {
        $_SESSION['signup_error'] = "Please fill in all fields.";
        header("Location: ../html/register.html");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['signup_error'] = "Invalid email format.";
        header("Location: ../html/register.html");
        exit();
    }

    if ($password !== $confirmPassword) {
        $_SESSION['signup_error'] = "Passwords do not match.";
        header("Location: ../html/register.html");
        exit();
    }

    // hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // insert user into the database
    $stmt = $mysqli->prepare("INSERT INTO user (firstname, lastname, email, password_hash) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstname, $lastname, $email, $hashedPassword);

    if ($stmt->execute()) {
        $_SESSION['signup_success'] = "Registration successful. You can now login.";
        header("Location: ../html/login2.html");
        exit();
    } else {
        $_SESSION['signup_error'] = "Registration failed. Please try again.";
        header("Location: ../html/register.html");
        exit();
    }
}
?>