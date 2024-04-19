<?php
session_start();
require_once '../php/database.php';

// this checks if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // this redirects to the admin login page if not logged in
    header("Location: admin_login.php");
    exit();
}

// this retrieves the list of topics from the database
$query = "SELECT topics.*, user.firstname FROM topics 
          INNER JOIN user ON topics.user_id = user.id
          ORDER BY topics.created_at DESC";
$result = $mysqli->query($query);
$topics = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Discussions - FaithFocusHub</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            padding: 0.8rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #0c726b;
            color: #fff;
        }

        a {
            display: inline-block;
            background-color: #0c726b;
            color: #fff;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-right: 0.5rem;
        }

        a:hover {
            background-color: #094e48;
        }
        
        .logo a{
            background-color: #5e9a83;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <a href="../admin/admin_dashboard.php"><img src="../images/logo.png" alt="FaithFocusHub Logo"></a> 
        </div>
        
        <div class="welcome-message">
            <?php echo "Welcome, " . $_SESSION['admin_firstname'] . "!"; ?>
        </div>
    </header>

    <main>
        <section>
            <h2>Manage Discussions</h2>
            <table>
                <thead>
                    <tr>
                        <th>Topic Title</th>
                        <th>Author</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($topics as $topic): ?>
                        <tr>
                            <td><?php echo $topic['title']; ?></td>
                            <td><?php echo $topic['firstname']; ?></td>
                            <td>
                                <a href="edit_topic.php?id=<?php echo $topic['id']; ?>">Edit</a>
                                <a href="delete_topic.php?id=<?php echo $topic['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 FaithFocusHub</p>
    </footer>
</body>
</html>