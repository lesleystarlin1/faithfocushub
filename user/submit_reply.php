<?php
session_start(); // starts the session

require_once '../php/database.php';

//checks if the user is logged in
if (!isset($_SESSION["user_id"])) {
    // redirects to the login page if the user is not logged in
    header("Location: login2.php");
    exit();
}

// retrieves the logged-in user's information from the session
$userId = $_SESSION["user_id"];

// checks if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $topicId = $_POST["topic_id"];
    $replyContent = $_POST["reply_content"];

    // inserts the new reply into the "replies" table
    $sql = "INSERT INTO replies (topic_id, content, user_id) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("isi", $topicId, $replyContent, $userId);

    if ($stmt->execute()) {
        echo "Reply submitted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

    header("Location: topic.php?id=" . $topicId);
    exit();
}
?>