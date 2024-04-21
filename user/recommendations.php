<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommendations - FaithFocusHub</title>
    <link rel="stylesheet" href="../css/style2.css">
    <style>
        .recommendations { 
            padding: 2rem; 
            background-color: #f9f4ec; 
            border-radius: 5px; 
            margin-bottom: 2rem; 
        }
        .recommendations h2 {
            color: #5e9a83;
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .recommendations ul {
            list-style-type: none;
            padding: 0;
        }

        .recommendations li {
            margin-bottom: 1rem;
        }

        .recommendations a {
            color: #0c726b;
            text-decoration: none;
        }

        .recommendations a:hover {
            text-decoration: underline;
        }

        /*navigation links */
        nav ul li a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #0c726b;
        }

        /*dropdown button */
        .dropdown .dropbtn {
            display: block;
            background-color: transparent;
            color: #fff;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            cursor: pointer;
            border: none;
            font-size: inherit;
            font-family: inherit;
        }

        .dropdown .dropbtn:hover {
            background-color: #0c726b;
        }

        .result-section {
            background-color: #f9f4ec;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .result-section h2 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: #5e9a83;
        }

        .result-section h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: #5e9a83;
        }

        .result-section p {
            font-size: 1rem;
            line-height: 1.4;
            margin-bottom: 0.5rem;
            color: #666;
        }
        /*dropdown button */
        .dropdown2 .dropbtn2 {
            display: block;
            background-color: transparent;
            color: #fff;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            cursor: pointer;
            border: none;
            font-size: inherit;
            font-family: inherit;
        }

        .dropdown2 .dropbtn2:hover {
            background-color: #0c726b;
        }

        /*dropdown content (2)*/
        .dropdown-content2 {
            display: none;
            position: absolute;
            background-color: #5e9a83;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
            padding: 10px;
        }

        .dropdown-content2 a {
            color: #fff;
            padding: 10px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s ease;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .dropdown-content2 a:last-child {
            margin-bottom: 0;
        }

        .dropdown-content2 a:hover {
            background-color: #0c726b;
        }

        .dropdown2:hover .dropdown-content2 {
            display: block;
        }
        
        /*nested dropdown content */
        .study-methods-content {
        display: none;
        position: absolute;
        background-color: #5e9a83;
        min-width: 200px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        border-radius: 5px;
        padding: 10px;
        }

        .study-methods-dropdown:hover .study-methods-content {
        display: block;
        }
        .welcome-message {
            margin-right: 20px;
            color: #fff;
            font-weight: bold;
            font-size: 18px;
        }
    </style>
</head>
<body>
<header>
    <div class="logo">
        <a href="../user/index2.php"><img src="../images/logo.png" class="logo"></a> 
    </div>
    
    <div class="welcome-message">
        <?php
        if (isset($_SESSION["user_id"])) {
        require_once '../php/database.php';

        $user_id = $_SESSION["user_id"];
        
        // retrieves the user's first name from the database
        $sql = "SELECT firstname FROM user WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($firstname);
        $stmt->fetch();
        $stmt->close();
        
        echo "God Bless You " . $firstname . " !";
    }
    ?>
    </div>

<nav>
    <ul>
        <li><a href="../user/index2.php">Home</a></li>
        <li><a href="../user/about2.php">About</a></li>
        <li><a href="../user/bible2.php">Bible</a></li>
        <li class="dropdown2">
            <a href="#" class="dropbtn2">My Account</a>
            <div class="dropdown-content2">
                <a href="../php/view-soap2.php">Study Entries</a>
                <a href="../user/discussion.php">Discussions</a>
                <a href="../user/recommendations.php">Recommendations</a>
                <div class="study-methods-dropdown">
                    <a href="#" class="dropbtn study-method-btn">Study Methods</a>
                    <div class="study-methods-content">
                        <a href="../user/soap-entry.php">SOAP method</a>
                        <a href="../user/sword-entry.php">SWORD method</a>
                        <a href="../user/topic-entry.php">Topical method</a>
                    </div>
                </div>
            </li>
            <li><a href="../php/logout.php">Logout</a></li>
        </ul>
</nav>
</header>
    
    <main>
        <section class="hero">
            <h1>Recommendations</h1>
        </section>

        <section class="recommendations">
            <h2>Recommended Books</h2>
            <ul>
                <li><a href="https://www.purposedriven.com/about">The Purpose Driven Life by Rick Warren</a></li>
                <li><a href="https://www.goodreads.com/book/show/11138.Mere_Christianity">Mere Christianity by C.S. Lewis</a></li>
                <li><a href="https://johnstott.org/work/the-cross-of-christ/">The Cross of Christ by John Stott</a></li>
                <li><a href="https://www.goodreads.com/book/show/8130077-the-screwtape-letters">The Screwtape Letters by C.S. Lewis</a></li>
            </ul>
        </section>

        <section class="recommendations">
            <h2>Recommended Podcasts</h2>
            <ul>
                <li><a href="https://bibleproject.com/podcasts/the-bible-project-podcast/">The Bible Project</a></li>
                <li><a href="https://theologyintheraw.com/podcasts/">Theology in the Raw</a></li>
                <li><a href="https://www.thegospelcoalition.org/podcasts/">The Gospel Coalition Podcast</a></li>
                <li><a href="https://www.podbean.com/podcast-detail/j24am-2b8e0d/Unbelievable-Podcast">Unbelievable?</a></li>
            </ul>
        </section>

        <section class="recommendations">
            <h2>Recommended YouTube Channels</h2>
            <ul>
                <li><a href="https://www.youtube.com/user/jointhebibleproject">BibleProject</a></li>
                <li><a href="https://www.youtube.com/c/thetenminutebiblehour">The Ten Minute Bible Hour</a></li>
                <li><a href="https://www.youtube.com/user/InspiringPhilosophy">Inspiring Philosophy</a></li>
                <li><a href="https://www.youtube.com/user/rzimmedia">Ravi Zacharias International Ministries (RZIM)</a></li>
            </ul>
        </section>
    </main>
    
    <footer>
        <p>&copy; 2024 FaithFocusHub</p>
    </footer>

    
</body>
</html>