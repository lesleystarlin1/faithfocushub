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
$soap_query = "SELECT * FROM soap_entries WHERE user_id = ?";
$soap_stmt = $mysqli->prepare($soap_query);
$soap_stmt->bind_param("i", $user_id);
$soap_stmt->execute();
$soap_result = $soap_stmt->get_result();

// retrieves SWORD entries for the user
$sword_query = "SELECT * FROM sword_entries WHERE user_id = ?";
$sword_stmt = $mysqli->prepare($sword_query);
$sword_stmt->bind_param("i", $user_id);
$sword_stmt->execute();
$sword_result = $sword_stmt->get_result();

// retrieves Topical entries for the user
$topic_query = "SELECT * FROM topic_entries WHERE user_id = ?";
$topic_stmt = $mysqli->prepare($topic_query);
$topic_stmt->bind_param("i", $user_id);
$topic_stmt->execute();
$topic_result = $topic_stmt->get_result();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your SOAP Entries</title>
    <link rel="stylesheet" href="../css/style2.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #7fb8a5;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 25px;
            font-size: 2.5rem

        }

        h2 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 1.8 rem;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #f9f4ec;
            color: #a6a6a6;
            border-radius: 5px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #7fb8a5;
            color: white;
            font-weight: bold;
        }

       

        .delete-btn {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #c0392b;
        }

        .back-link {
            display: inline-block;
            background-color: #0c726b;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .back-link:hover {
            background-color: #7fb8a5;
            color: #fff;
        }

        .entry-section {
            margin-bottom: 40px;
            padding: 20px;
            background-color: #5e9a83;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        /*navigation links */
        nav ul li a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #0c726b;
        }

        /*dropdown button */
        .dropdown .dropbtn {
            display: block;
            background-color: transparent;
            color: #fff;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            cursor: pointer;
            border: none;
            font-size: inherit;
            font-family: inherit;
        }

        .dropdown .dropbtn:hover {
            background-color: #0c726b;
        }

        /*dropdown content */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #5e9a83;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
            padding: 10px;
        }

        .dropdown-content a {
            color: #fff;
            padding: 10px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s ease;
            border-radius: 5px;
            margin-bttom: 5px;
        }

        .dropdown-content a:last-child {
            margin-bottom: 0;
        }

        .dropdown-content a:hover {
            background-color: #0c726b;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /*nested dropdown content */
        .study-methods-content {
        display: none;
        position: absolute;
        background-color: #5e9a83;
        min-width: 200px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        border-radius: 5px;
        padding: 10px;
        }

        .study-methods-dropdown:hover .study-methods-content {
        display: block;
        }

        .no-entries {
            text-align: center;
            color: #fff;
            margin-top: 20px;
        }

        .welcome-message {
            margin-right: 20px;
            color: #fff;
            font-weight: bold;
            font-size: 18px;
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
        <div class="logo">
            <a href="../user/index2.php"><img src="../images/logo.png" class="logo"></a> 
        </div>

        <div class="welcome-message">
        <?php
        if (isset($_SESSION["user_id"])) {
            require_once '../php/database.php';

            $user_id = $_SESSION["user_id"];
            
            // retrieves the user's first name from the database
            $sql = "SELECT firstname FROM user WHERE id = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $stmt->bind_result($firstname);
            $stmt->fetch();
            $stmt->close();
            
            echo "God Bless You " . $firstname . " !";
        }
        ?>

    </div>

        <nav>
            <ul>
                <li><a href="../user/index2.php">Home</a></li>
                <li><a href="../user/about2.php">About</a></li>
                <li><a href="../user/bible2.php">Bible</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">My Account</a>
                    <div class="dropdown-content">
                        <a href="../php/view-soap2.php">Study Entries</a>
                        <a href="../user/discussion.php">Discussions</a>
                        <div class="study-methods-dropdown">
                        <a href="#" class="dropbtn study-method-btn">Study Methods</a>
                        <div class="study-methods-content">
                            <a href="../user/soap-entry.php">SOAP method</a>
                            <a href="../user/sword-entry.php">SWORD method</a>
                            <a href="../user/topic-entry.php">Topical method</a>
                        </div>
                        </div>
                    </div>
                </li>            
                         <li><a href="../php/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>

    <section id="banner">
            <h1>Your Study Entries</h1>

            <div class="entry-section">
                <h2> SOAP Entries</h2>
                <?php
                $soap_rows = $soap_result->fetch_all(MYSQLI_ASSOC);
                if (!empty($soap_rows)) {
                    echo "<table>";
                    echo "<tr><th>Scripture</th><th>Observation</th><th>Application</th><th>Prayer</th><th>Action</th></tr>";
                    foreach ($soap_rows as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['scripture'] . "</td>";
                        echo "<td>" . $row['observation'] . "</td>";
                        echo "<td>" . $row['application'] . "</td>";
                        echo "<td>" . $row['prayer'] . "</td>";
                        echo "<td><button class='delete-btn' onclick='deleteEntry(" . $row['id'] . ")'>Delete</button></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p class='no-entries'>No SOAP entries found.</p>";
                }
                ?>
                <a href="../user/soap-entry.php" class="back-link">Back to SOAP Form</a>
            </div>

            <div class="entry-section">
                <h2> SWORD Entries</h2>
                <?php
                $sword_rows = $sword_result->fetch_all(MYSQLI_ASSOC);
                if (!empty($sword_rows)) {
                    echo "<table>";
                    echo "<tr><th>Scripture</th><th>Writing</th><th>Observation</th><th>Reflection</th><th>Devotion</th><th>Action</th></tr>";
                    foreach ($sword_rows as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['scripture'] . "</td>";
                        echo "<td>" . $row['writing'] . "</td>";
                        echo "<td>" . $row['observation'] . "</td>";
                        echo "<td>" . $row['reflection'] . "</td>";
                        echo "<td>" . $row['devotion'] . "</td>";
                        echo "<td><button class='delete-btn' onclick='deleteEntry(" . $row['id'] . ")'>Delete</button></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p class='no-entries'>No SWORD entries found.</p>";
                }
                ?>
                <a href="../user/sword-entry.php" class="back-link">Back to SWORD Form</a>
            </div>

            <div class="entry-section">
                <h2> Topical Entries</h2>
                <?php
                $topic_rows = $topic_result->fetch_all(MYSQLI_ASSOC);
                if (!empty($topic_rows)) {
                    echo "<table>";
                    echo "<tr><th>Topic</th><th>Scripture</th><th>Observation</th><th>Reflection</th><th>Action</th></tr>";
                    foreach ($topic_rows as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['topic'] . "</td>";
                        echo "<td>" . $row['scripture'] . "</td>";
                        echo "<td>" . $row['observation'] . "</td>";
                        echo "<td>" . $row['reflection'] . "</td>";
                        echo "<td><button class='delete-btn' onclick='deleteEntry(" . $row['id'] . ")'>Delete</button></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p class='no-entries'>No Topical entries found.</p>";
                }
                ?>
                <a href="../user/topic-entry.php" class="back-link">Back to Topical Form</a>
            </div>
        </section>

    </main>

    <footer>
        <p>&copy; 2024 FaithFocusHub</p>
    </footer>
</body>
</html>