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
    // retrieves the topic ID from the form
    $topicId = $_POST["topic_id"];

    // deletes the topic from the database
    $sql = "DELETE FROM topics WHERE id = ? AND user_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ii", $topicId, $_SESSION["user_id"]);

    if ($stmt->execute()) {
        echo "Topic deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

    // redirects back to the discussion page
    header("Location: discussion.php");
    exit();
}
?>