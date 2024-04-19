<?php
session_start(); // Start the session

require_once '../php/database.php';

// checks if the user is logged in
if (!isset($_SESSION["user_id"])) {
    // redirects to the login page if the user is not logged in
    header("Location: login2.php");
    exit();
}

// checks if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // retrieves the reply ID and topic ID from the form
    $replyId = $_POST["reply_id"];
    $topicId = $_POST["topic_id"];

    // deletes the reply from the database
    $sql = "DELETE FROM replies WHERE id = ? AND user_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ii", $replyId, $_SESSION["user_id"]);

    if ($stmt->execute()) {
        echo "Reply deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

    // redirects back to the topic page
    header("Location: topic.php?id=" . $topicId);
    exit();
}
?>