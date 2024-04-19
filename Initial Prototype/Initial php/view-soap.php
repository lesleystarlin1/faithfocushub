<?php
include 'database.php';
session_start();

// checks if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../user/index-user.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// retrieves SOAP entries for the user
$mysqli = include __DIR__ . "/database.php";
$query = "SELECT * FROM soap_entries WHERE user_id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your SOAP Entries</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        h2{
            display: Center;
        }
        table {
            width: 80%; 
            margin: 0 auto; 
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .soap-entry {
            margin-bottom: 20px;
        }

        #banner a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        #banner a:hover {
            text-decoration: underline;
        }
    </style>
    <script>
    function deleteEntry(entryId) {
        var confirmation = confirm("Are you sure you want to delete this entry?");
        if (confirmation) {
            window.location.href = "delete-soap-entry.php?entryId=" + entryId;
        }
    }
</script>
</head>

<body>

<header>
    <img src="../images/logo.png" class="logo">
    <div class="banner-text">
        <h1>Faith Focus Hub</h1>
    </div>
</header>

<section id="banners">
    <h2>Study Entries</h2>

    <?php
$rows = $result->fetch_all(MYSQLI_ASSOC);

if (!empty($rows)) {
    echo "<table>";
    echo "<tr><th>Date and Time</th><th>Scripture</th><th>Observation</th><th>Application</th><th>Prayer</th><th>Action</th></tr>";
    foreach ($rows as $row) {
        // Display each SOAP entry in a table row
        echo "<tr>";
        echo "<td>" . $row['datetime'] . "</td>";
        echo "<td>" . $row['scripture'] . "</td>";
        echo "<td>" . $row['observation'] . "</td>";
        echo "<td>" . $row['application'] . "</td>";
        echo "<td>" . $row['prayer'] . "</td>";
        echo "<td><button class='delete-btn' onclick='deleteEntry(" . $row['id'] . ")'>Delete</button></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No SOAP entries found.</p>";
}

$stmt->close();
$mysqli->close();
?>


    <a href="../user/study-user.php">Back to SOAP Form</a>
</section>



<div id="sideNav">
    <nav>
        <ul>
            <li><a href="../user/index-user.php">HOME</a></li>
            <li><a href="../user/bible-user.php">BIBLE</a></li>
            <li><a href="../user/study-user.php">STUDY OPTIONS</a></li>
            <li><a href="../user/about-user.php">ABOUT</a></li>
            <li><a href="../html/logout.php">LOG OUT</a></li>
        </ul>
    </nav>
</div>

<div id="menuBtn">
    <img src="../images/menu.png" id="menu">
</div>

<script>
    var menuBtn = document.getElementById("menuBtn")
    var sideNav = document.getElementById("sideNav")
    var menu = document.getElementById("menu")

    sideNav.style.right = "-250px"

    menuBtn.onclick = function () {
        if (sideNav.style.right == "-250px") {
            sideNav.style.right = "0";
            menu.src = "../images/x.png";
        } else {
            sideNav.style.right = "-250px";
            menu.src = "../images/menu.png";
        }
    }
</script>

</body>
</html>
