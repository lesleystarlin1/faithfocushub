<?php
session_start();

// this checks if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // this redirects to the admin login page if admin is not logged in
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - FaithFocusHub</title>
    <link rel="stylesheet" href="../css/style2.css">
    <style>
        main {
            text-align: center;
            margin-top: 2rem;
        }

        section {
            background-color: #5e9a83;
            padding: 2rem;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 1rem;
        }

        .hero a {
            display: inline-block;
            background-color: #0c726b;
            color: #fff;
            text-decoration: none;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .hero a:hover {
            background-color: #094e48;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <a href="#"><img src="../images/logo.png" class="logo"></a> 
        </div>

        <div class="welcome-message">
            <?php echo "Welcome, " . $_SESSION['admin_firstname'] . "!"; ?>
        </div>
    </header>

    <main>
        <section class='hero'>
            <h2>Admin Dashboard</h2>
            <ul>
                <li><a href="manage_users.php">Manage Users</a></li>
                <li><a href="manage_discussions.php">Manage Discussions</a></li>
                <li><a href="admin_logout.php">Logout</a></li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 FaithFocusHub</p>
    </footer>
</body>
</html>