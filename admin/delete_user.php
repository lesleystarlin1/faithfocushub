<?php
session_start();
require_once '../php/database.php';

// this checks if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // this redirects to the admin login page if not logged in
    header("Location: admin_login.php");
    exit();
}

// this checks if the user ID is provided in the URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // this deletes the user from the database
    $query = "DELETE FROM user WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();

    // this redirects to the manage users page after deleting the user
    header("Location: manage_users.php");
    exit();
} else {
    // this redirects to the manage users page if no user ID is provided
    header("Location: manage_users.php");
    exit();
}
?>