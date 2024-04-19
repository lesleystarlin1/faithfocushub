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

    // this retrieves the topic details from the database
    $query = "SELECT * FROM topics WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $topicId);
    $stmt->execute();
    $result = $stmt->get_result();
    $topic = $result->fetch_assoc();

    // this checks if the topic exists
    if (!$topic) {
        // this redirects to the manage discussions page if the topic doesn't exist
        header("Location: manage_discussions.php");
        exit();
    }
} else {
    // this redirects to the manage discussions page if no topic ID is provided
    header("Location: manage_discussions.php");
    exit();
}

//  form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // this retrieves the updated topic details from the form
    $title = $_POST['title'];
    $content = $_POST['content'];

    // this updates the topic details in the database
    $query = "UPDATE topics SET title = ?, content = ? WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssi", $title, $content, $topicId);
    $stmt->execute();

    // this redirects to the manage discussions page after updating the topic
    header("Location: manage_discussions.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Topic - FaithFocusHub</title>
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
            margin-bottom: 2rem;
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

        tr:hover {
            background-color: #7;
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
            background-color: #7;
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
            <h2>Edit Topic</h2>
            <form method="POST" action="">
                <div>
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" value="<?php echo $topic['title']; ?>" required>
                </div>
                <div>
                    <label for="content">Content:</label>
                    <textarea id="content" name="content" required><?php echo $topic['content']; ?></textarea>
                </div>
                <div>
                    <button type="submit">Update Topic</button>
                </div>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 FaithFocusHub</p>
    </footer>
</body>
</html>