<?php
$host = "localhost";
$dbname = "login_db";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validate and sanitize user inputs here
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // checks if the email already exists
    $check_sql = "SELECT id FROM user WHERE email = ?";
    $check_stmt = $mysqli->prepare($check_sql);

    if (!$check_stmt) {
        die("Prepare failed: " . $mysqli->error);
    }

    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        echo "Error: Email address is already taken. Please choose a different one.";
        exit;
    }


    // insert user data into the database
    $sql = "INSERT INTO user (firstname, lastname, email, password_hash) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    
    if (!$stmt) {
        die("Prepare failed: " . $mysqli->error);
    }

    $stmt->bind_param("ssss", $firstname, $lastname, $email, $password_hash);

    if ($stmt->execute()) {
        header("Location: ../html/signup-success.html");
    } else {
        echo "Error: " . $insert_stmt->error;
    }

    $insert_stmt->close();
    $check_stmt->close();}

$mysqli->close();
?>
