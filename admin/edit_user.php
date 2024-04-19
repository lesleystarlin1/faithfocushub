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

    // this retrieves the user details from the database
    $query = "SELECT * FROM user WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // thus checks if the user exists
    if (!$user) {
        // this redirects to the manage users page if the user doesn't exist
        header("Location: manage_users.php");
        exit();
    }
} else {
    // this redirects to the manage users page if no user ID is provided
    header("Location: manage_users.php");
    exit();
}

//  form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the updated user details from the form
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    // this updates the user details in the database
    $query = "UPDATE user SET firstname = ?, lastname = ?, email = ? WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sssi", $firstname, $lastname, $email, $userId);
    $stmt->execute();

    // this redirects to the manage users page after updating the user details
    header("Location: manage_users.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - FaithFocusHub</title>
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

        a {
            display: inline-block;
            background-color: #0c726b;
            color: #fff;
            text-decoration: none;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
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
            <h2>Edit User</h2>
            <form method="POST" action="">
                <div>
                    <label for="firstname">First Name:</label>
                    <input type="text" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>" required>
                </div>
                <div>
                    <label for="lastname">Last Name:</label>
                    <input type="text" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
                </div>
                <div>
                    <button type="submit">Update User</button>
                </div>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 FaithFocusHub</p>
    </footer>
</body>
</html>