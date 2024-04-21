<?php
session_start();
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validate form data
    if (empty($_POST["scripture"])) {
        $_SESSION['soap_error'] = "Scripture field is required.";
        header("Location: ../user/soap-entry.php");
        exit;
    }

    // extract form data
    $scripture = $_POST["scripture"];
    $observation = $_POST["observation"];
    $application = $_POST["application"];
    $prayer = $_POST["prayer"];
    $datetime = date("Y-m-d H:i:s");
    $user_id = $_SESSION['user_id'];

    // saves data to database 
    $mysqli = include __DIR__ . "/database.php";

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare("INSERT INTO soap_entries (user_id, scripture, observation, application, prayer, datetime) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $user_id, $scripture, $observation, $application, $prayer, $datetime);
    $stmt->execute();
    $stmt->close();

    $mysqli->close();

    // this redirects to the view-soap page
    header("Location: ../php/view-soap2.php");
    exit;
} else {
    // handles invalid requests
    http_response_code(400);
    exit;
}
?>
