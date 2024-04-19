<?php
session_start();
require_once '../php/database.php';

// this checks if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // this redirects to the admin login page if admin is not logged in
    header("Location: admin_login.php");
    exit();
}

// this checks if the topic ID is provided in the URL
if (isset($_GET['id'])) {
    $topicId = $_GET['id'];

    // this deletes the topic from the database
    $query = "DELETE FROM topics WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $topicId);
    $stmt->execute();

    // this redirects to the manage discussions page after deleting the topic
    header("Location: manage_discussions.php");
    exit();
} else {
    // this redirects to the manage discussions page if no topic ID is provided
    header("Location: manage_discussions.php");
    exit();
}
?>