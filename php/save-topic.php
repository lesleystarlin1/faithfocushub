<?php
session_start();
include 'database.php';

if (isset($_SESSION['user_id']) && isset($_POST['topic']) && isset($_POST['scripture']) && isset($_POST['observation']) && isset($_POST['reflection'])) {
    $user_id = $_SESSION['user_id'];
    $topic = $_POST['topic'];
    $scripture = $_POST['scripture'];
    $observation = $_POST['observation'];
    $reflection = $_POST['reflection'];

    $query = "INSERT INTO topic_entries (user_id, topic, scripture, observation, reflection) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("issss", $user_id, $topic, $scripture, $observation, $reflection);
    $stmt->execute();
    $stmt->close();
}

header("Location: ../php/view-soap2.php");
exit();
?>