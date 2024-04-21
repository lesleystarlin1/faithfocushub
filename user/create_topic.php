<?php
session_start();

require_once '../php/database.php';

// checks if the user is logged in
if (!isset($_SESSION["user_id"])) {
    // redirects to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// checks if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // retrieves the form data
    $topicTitle = $_POST["topic_title"];
    $topicContent = $_POST["topic_content"];
    $userId = $_SESSION["user_id"];

    // inserts the new topic into the database
    $sql = "INSERT INTO topics (title, content, user_id) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssi", $topicTitle, $topicContent, $userId);

    if ($stmt->execute()) {
        $topicId = $mysqli->insert_id;
        echo "Topic created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

    // redirects to the newly created topic page
    header("Location: topic.php?id=" . $topicId);
    exit();
}
?>