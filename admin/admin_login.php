<?php
session_start();

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    // this redirects to the admin dashboard if admin is already logged in
    header("Location:../admin/admin_dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../php/database.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    // this validates admin's credentials
    $sql = "SELECT * FROM admin WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            // this sets session variables and redirects to admin dashboard
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_firstname'] = $admin['firstname'];
            header("Location:../admin/admin_dashboard.php");
            exit();
        }
    }

    $error_message = "Invalid email or password.";
}
require_once '../php/database.php';

$admin_email = "admin@admin.com";
$admin_password = "Admin123";
$admin_firstname = "Admin";

$sql = "SELECT * FROM admin WHERE email = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $admin_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO admin (firstname, email, password) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sss", $admin_firstname, $admin_email, $hashed_password);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - FaithFocusHub</title>
    <link rel="stylesheet" href="../css/style2.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="../user/index2.php"><img src="../images/logo.png" class="logo"></a> 
        </div>

        <nav>
        <ul>
            <li><a href="../html/index2.html">Home</a></li>
            <li><a href="../html/about2.html">About</a></li>
            <li><a href="../html/bible2.html">Bible</a></li>
            <li><a href="../html/login2.html">Login</a></li>
            <li><a href="../admin/admin_login.php">Admin Login</a></li>
          </ul>
    </nav>
    </header>

    <main1>
        <section class = "auth-form">
            <h2>Admin Login</h2>
            <?php if (isset($error_message)) { ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php } ?>
            <form method="POST" action="">
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Login</button>
            </form>
        </section>
    </main1>

    <footer>
        <p>&copy; 2024 FaithFocusHub</p>
    </footer>
</body>
</html>