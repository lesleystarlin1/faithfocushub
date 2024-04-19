<?php
session_start();


if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    // this redirects to the user dashboard if already logged in
    header("Location: ../user/index2.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../php/database.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    // validates user credentials
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password_hash'])) {
            // sets session variables and redirect to user dashboard
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_firstname'] = $user['firstname'];
            header("Location: ../user/index2.php");
            exit();
        }
    }

    $error_message = "Invalid email or password.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bible Study Website - Login</title>
  <link rel="stylesheet" href="../css/style2.css">
</head>
<body>
  <header>
    <div class="logo">
        <a href="../html/index2.html"><img src="../images/logo.png" class="logo"></a> 
    </div>
    <nav>
        <ul>
            <li><a href="../html/index2.html">Home</a></li>
            <li><a href="../html/about2.html">About</a></li>
            <li><a href="../html/bible2.html">Bible</a></li>
            <li><a href="../html/resources.html">Resources</a></li>
            <li><a href="../php/login2.php">Login</a></li>
            <li><a href="../admin/admin_login.php">Admin Login</a></li>
          </ul>
    </nav>
  </header>

  <main1>
    <section class="auth-form">
      <h2>Login</h2>

      <?php 
      if (isset($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
      <?php } ?>

      <form action="login2.php" method="post" novalidate>
        <div>
          <label for="email">Email</label>
          <input type="email" name="email" id="email" placeholder="Enter your email" required>
        </div>
        <div>
          <label for="password">Password</label>
          <input type="password" name="password" id="password" placeholder="Enter your password" required>
        </div>
        <button type="submit">Login</button>
      </form>

      <p>Don't have an account? <a href="../html/register.html">Register here</a></p>
    </section>

  </main1>

  <footer>
    <p>&copy; 2024 FaithFocusHub. All rights reserved.</p>
  </footer>
</body>
</html>