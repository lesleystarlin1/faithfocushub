<html>
<head>
    <title>FaithFocusHub</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <meta name="viewport" content="width = device-width, initial-scale=1">
</head>
<body>
<section id="banner">
    <img src="images/logo.png" class="logo">
    <div class="banner-text">
        <h1>Faith Focus Hub</h1>
        <p>Welcome to the best bible study site!</p>
    </div>
</section>

<div id="sideNav">
    <nav>
        <ul>
            <li><a href="index-user.php">HOME</a></li>
            <li><a href="bible-user.php">BIBLE</a></li>
            <li><a href="study-user.php">STUDY OPTIONS</a></li>
            <li><a href="about-user.php">ABOUT</a></li>
            <li><a href="logout.php">LOG OUT</a></li>
        </ul>
    </nav>
</div>
<div id="menuBtn">
    <img src="images/menu.png" id="menu">
</div>

<script>
    var menuBtn = document.getElementById("menuBtn")
    var sideNav = document.getElementById("sideNav")
    var menu = document.getElementById("menu")
    
    sideNav.style.right = "-250px"
    
    menuBtn.onclick = function(){
        if(sideNav.style.right == "-250px"){
            sideNav.style.right = "0";
            menu.src = "images/x.png";
        }
        else{
            sideNav.style.right = "-250px";
            menu.src = "images/menu.png";
        }
    }
    
    </script>
    
    
    
    </body>
    </html>