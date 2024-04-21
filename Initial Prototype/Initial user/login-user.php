<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FaithFocusHub</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    
<body>
<section id="banner">
    <img src="../images/logo.png" class="logo">
    <div class="banner-text">
        <h1>Faith Focus Hub</h1>
    </div> 
</section>

<div id="sideNav">
    <nav>
        <ul>
            <li><a href="../user/index-user.php">HOME</a></li>
            <li><a href="../user/bible-user.php">BIBLE</a></li>
            <li><a href="../user/study-user.php">STUDY OPTIONS</a></li>
            <li><a href="../user/about-user.php">ABOUT</a></li>
            <li><a href="../html/index.html">LOG OUT</a></li>
        </ul>
    </nav>
</div>
<div id="menuBtn">
    <img src="../images/menu.png" id="menu">
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