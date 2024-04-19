<html>
<head>
    <title>FaithFocusHub</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width = device-width, initial-scale=1">
</head>
<body>
<section id="banner">
    <img src="../images/logo.png" class="logo">
    <div class="banner-text">
        <h1>Faith Focus Hub</h1>
    </div>
    
    <!-- Search bar function -->
    <form>
        <div class="search">
            <input type="search" placeholder="Search...">
            <a href="#">
                <i class="fa fa-search"></i>
            </a>
        </div>
    </form>
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

<!--Vesre of the Day-->

<section id="bible">
    <div class="title-text">
        <p> - </p>
    <h1>Verse of the Day</h1>
    <div class="container">
        <div id="verse-container">
            <p id="verse">Loading...</p>
        </div>
    </div>
    <script src="../js/script.js"></script>
    </div>
    
    <div class="bible-box">
        <div class="bible">
            <h1>Explore the bible</h1>
            <div class="bible-desc">
                <div class="bible-icon">
                    <i class="fa fa-book"></i>             
               </div>
                <div class="bible-text">
                    <p>Welcome to bible study website you will enjoy learning....</p>
                </div>
            </div>
            <h1>Join us now</h1>
            <div class="bible-desc">
                <div class="bible-icon">
                    <i class="fa fa-check"></i>             
               </div>
                <div class="bible-text">
                    <p>Welcome to bible study website you will enjoy learning....</p>
                </div>
            </div>
            <h1>Learn more</h1>
            <div class="bible-desc">
                <div class="bible-icon">
                    <i class="fa fa-book"></i>             
               </div>
                <div class="bible-text">
                    <p>Welcome to bible study website you will enjoy learning....</p>
                </div>
            </div>
        </div>
        <div class="bible-img">
            <img src="../images/bible.png">
        </div>
    </div>
</section>

<!--Study Options-->

<section id="study">
    <div class="title-text">
        <p> STUDY OPTIONS</p>
    <h1>What are the Study Options?</h1>
    </div>
    <div class="study-box">
        <div class="single-study">
            <img src="../images/pic1.jpg">
            <div class="overlay"></div>
            <div class="study-desc">
                <h3>Group Study</h3>
                <hr>
                <p>Study with others- blah blah blah, learn learn learn learn</p>
            </div>
        </div>
        <div class="single-study">
            <img src="../images/pic1.jpg">
            <div class="overlay"></div>
            <div class="study-desc">
                <h3>Self Study</h3>
                <hr>
                <p>Study with others- blah blah blah, learn learn learn learn</p>
            </div>
        </div>
        <div class="single-study">
            <img src="../images/pic1.jpg">
            <div class="overlay"></div>
            <div class="study-desc">
                <h3>Commentaries</h3>
                <hr>
                <p>Study with others- blah blah blah, learn learn learn learn</p>
            </div>
        </div>
        <div class="single-study">
            <img src="../images/pic1.jpg">
            <div class="overlay"></div>
            <div class="study-desc">
                <h3>Other</h3>
                <hr>
                <p>Study with others- blah blah blah, learn learn learn learn</p>
            </div>
        </div>
    </div>

</section>

<!--Reviews-->

<section id="reviews">
    <div class="title-text">
        <p>REVIEWS</p>
    <h1>What Users Say</h1>
    </div>
    <div class="reviews-row">
        <div class="reviews-col">
            <div class="user">
                <img src="../images/img1.jpg">
                <div class="user-info">
                    <h4>Jenna Marsh <i class="fab fa-twitter"></i></h4>
                    <small> @christfollower123</small>
                </div>
            </div>
            <p>random random random random random random random random
                random random random random random random random random
                random random random random random random random</p>
        </div>
        <div class="reviews-col">
            <div class="user">
                <img src="../images/img1.jpg">
                <div class="user-info">
                    <h4>Daniel Crossman <i class="fab fa-twitter"></i></h4>
                    <small> @danielcross</small>
                </div>
            </div>
            <p>random random random random random random random random
                random random random random random random random</p>
        </div>
        <div class="reviews-col">
            <div class="user">
                <img src="../images/img1.jpg">
                <div class="user-info">
                    <h4>Rachel Love <i class="fab fa-twitter"></i></h4>
                    <small> @lovechristalways1</small>
                </div>
            </div>
            <p>random random random random random random random random
                random random random random random random random random
                random random random random random random random</p>
        </div>
    </div>

</section>


<!--footer (ABOUT)-->
<section id="footer">
    <div class="title-text">
        <p>ABOUT US</p>
    <h1>Get To Know Us</h1>
    </div>
    <div class="about">
        <p>random random random random random random random random
            random random random random random random random random
            random random random random random random random random
            random random random random random random random random
            random random random random random random random</p>
    </div>
    <div class="social-link">
        <i class="fa fa-twitter"></i>
        <i class="fa fa-instagram"></i>
        <i class="fa fa-youtube"></i>
        <i class="fa fa-facebook"></i>

    </div>
</section>

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
        menu.src = "images/menu.png";
    }
}

</script>



</body>
</html>