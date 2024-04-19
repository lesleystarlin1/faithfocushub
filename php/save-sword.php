<?php
session_start();
include 'database.php';

if (isset($_SESSION['user_id']) && isset($_POST['scripture']) && isset($_POST['writing']) && isset($_POST['observation']) && isset($_POST['reflection']) && isset($_POST['devotion'])) {
    $user_id = $_SESSION['user_id'];
    $scripture = $_POST['scripture'];
    $writing = $_POST['writing'];
    $observation = $_POST['observation'];
    $reflection = $_POST['reflection'];
    $devotion = $_POST['devotion'];

    $query = "INSERT INTO sword_entries (user_id, scripture, writing, observation, reflection, devotion) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("isssss", $user_id, $scripture, $writing, $observation, $reflection, $devotion);
    $stmt->execute();
    $stmt->close();
}

header("Location: ../php/view-soap2.php");
exit();
?>