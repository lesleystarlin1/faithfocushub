<?php session_start(); ?>


<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FaithFocusHub</title>
        <link rel="stylesheet" href="../css/login.css">
    </head>
    
<body>
<section id="banner">
    <img src="../images/logo.png" class="logo">
    <div class="banner-text">
        <h1>Faith Focus Hub</h1>
        <p>Welcome to the best bible study site!</p>
        <div class="banner-btn">
            <a href="../html/login.html"><span></span>Login</a>
            <a href="../html/signup.html"><span></span>Sign up</a>

        </div>
    </div> 
</section>

<div id="sideNav">
    <nav>
        <ul>
            <li><a href="../html/index.html">HOME</a></li>
            <li><a href="../html/bible.html">BIBLE</a></li>
            <li><a href="../html/study.html">STUDY OPTIONS</a></li>
            <li><a href="../html/about.html">ABOUT</a></li>
            <li><a href="../html/login.html">LOGIN</a></li>
        </ul>
    </nav>
</div>
<div id="menuBtn">
    <img src="../images/menu.png" id="menu">
</div>

<?php
// this displays the error message if it exists
if (isset($_SESSION['login_error'])) {
    echo '<script>alert("' . $_SESSION['login_error'] . '");</script>';
    unset($_SESSION['login_error']); // clears the error message
}
?>

<div class="login-box">
    <h1>Login</h1>
    <form action="../php/login.php" method="post" novalidate>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="">
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="">
        <button>Log in</button>
    </form>
    <p class="para-2">Not have an account? <a href="../php/process-signup.php">Sign Up Here</a></p>

</div>

<!-- this makes the menu button work -->
<script>
    var menuBtn = document.getElementById("menuBtn")
    var sideNav = document.getElementById("sideNav")
    var menu = document.getElementById("menu")
    
    sideNav.style.right = "-250px"
    
    menuBtn.onclick = function(){
        if(sideNav.style.right == "-250px"){
            sideNav.style.right = "0";
            menu.src = "../images/x.png";
        }
        else{
            sideNav.style.right = "-250px";
            menu.src = "../images/menu.png";
        }
    }
</script>

</body>
</html>