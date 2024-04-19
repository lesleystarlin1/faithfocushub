<?php
include 'database.php';

session_start();

if (empty($_POST["firstname"]) || empty($_POST["email"]) || empty($_POST["password"])) {
    $_SESSION['signup_error'] = "All fields are required";
    header("Location: ../html/signup.html");
    exit;
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['signup_error'] = "Invalid email format";
    header("Location: ../html/signup.html");
    exit;
}

if (strlen($_POST["password"]) < 8 || !preg_match("/[a-zA-Z]/", $_POST["password"]) || !preg_match("/[0-9]/", $_POST["password"])) {
    $_SESSION['signup_error'] = "Invalid password format. Password must be at least 8 characters and contain at least one uppercase letter and one number";
    header("Location: ../html/signup.html");
    exit;
}

if ($_POST["password"] !== $_POST["confirmpassword"]) {
    $_SESSION['signup_error'] = "Passwords do not match";
    header("Location: ../html/signup.html");
    exit;
}

$email = $_POST["email"];
$mysqli = include __DIR__."/database.php";

// checks if the email already exists
$queryCheckExisting = "SELECT id FROM user WHERE email = ?";
$stmtCheckExisting = $mysqli->prepare($queryCheckExisting);
$stmtCheckExisting->bind_param("s", $email);
$stmtCheckExisting->execute();
$stmtCheckExisting->store_result();

if ($stmtCheckExisting->num_rows > 0) {
    // user with the provided email already exists
    $_SESSION['signup_error'] = "Email address is already taken. Please choose a different one.";
    $stmtCheckExisting->close();
    header("Location: ../html/signup.html");
    exit;
}

$stmtCheckExisting->close();

// if the email doesn't exist, proceed with the registration
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "INSERT INTO user (firstname, lastname, email, password_hash) VALUES (?,?,?,?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    $_SESSION['signup_error'] = "SQL error:" . $mysqli->error;
    header("Location: ../html/signup.html");
    exit;
}

$stmt->bind_param("ssss",
    $_POST["firstname"],
    $_POST["lastname"],
    $email,
    $password_hash);

if ($stmt->execute()) {
    $_SESSION['signup_success'] = true;
    header("Location: ../html/signup-success.html");
    exit;
} else {
    $_SESSION['signup_error'] = "Registration failed. Please try again later.";
    header("Location: ../html/signup.html");
    exit;
}
?>