<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['entryId'])) {
    $entryId = $_GET['entryId'];

    // this performs the deletion based on the entryId
    $mysqli = include __DIR__ . "/database.php";
    $query = "DELETE FROM soap_entries WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $entryId);
    $stmt->execute();
    $stmt->close();
    $mysqli->close();

    // this redirects back to the view-soap.php page after deletion
    header("Location: ../php/view-soap2.php");
    exit;
} else {
    // handles invalid requests
    http_response_code(400);
    exit;
}
?>
