<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - FaithFocusHub</title>
    <link rel="stylesheet" href="../css/style2.css">
    <style>
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

        /*dropdown content */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #5e9a83;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
            padding: 10px;
        }

        .dropdown-content a {
            color: #fff;
            padding: 10px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s ease;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .dropdown-content a:last-child {
            margin-bottom: 0;
        }

        .dropdown-content a:hover {
            background-color: #0c726b;
        }

        .dropdown:hover .dropdown-content {
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
                    
                    // gets user's first name from the database
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
                    <li class="dropdown">
                            <a href="#" class="dropbtn">My Account</a>
                                <div class="dropdown-content">
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
            <h1>About FaithFocusHub</h1>
            <p>Welcome to FaithFocusHub, your dedicated online space for deepening your spiritual journey through insightful Bible study, community engagement, and a commitment to fostering a profound connection with your faith.</p>
            <h2>Our Mission</h2>
            <p>At FaithFocusHub, we believe that a strong foundation in biblical understanding can empower individuals to lead purposeful and fulfilling lives. Our mission is to provide a hub where seekers, believers, and curious minds can come together to explore the profound teachings of the Bible, share their insights, and build a supportive community rooted in faith.</p>
            <h2>What Sets Us Apart</h2>
            <p></p>
            <h3>Comprehensive Bible Studies</h3>
            <p>FaithFocusHub offers a comprehensive collection of Bible studies designed to cater to individuals at various stages of their spiritual journey. Whether you're a seasoned theologian or a newcomer to the Scriptures, our carefully curated study materials are crafted to deepen your understanding and foster meaningful reflections.</p>
            <h3>Engaging Community</h3>
            <p>We understand the importance of community in fostering spiritual growth. FaithFocusHub provides a platform where members can connect, share experiences, and engage in thoughtful discussions. Our community is a diverse and inclusive space, welcoming people from all walks of life to join the conversation.</p>
            <h3>Pratical Applications</h3>
            <p>We believe that the teachings of the Bible should not only be understood but also applied to our daily lives. FaithFocusHub incorporates practical applications of biblical principles, offering insights and guidance on how to integrate faith into your relationships, work, and personal development.</p>
            <h2>Join Us on the Journey</h2>
            <p>Whether you're seeking answers, looking for a supportive community, or eager to deepen your understanding of the Bible, FaithFocusHub is here for you. Join us on this transformative journey of faith, and let's build a community where hearts are inspired, minds are enlightened, and lives are transformed by the power of God's word.</p>
            <p>Thank you for being a part of FaithFocusHub.</p>
            <p>Blessings,</p>
            <p>FaithFocusHub</p>
        </section>

    </main>
    
    <footer>
        <p>&copy; 2024 FaithFocusHub</p>
    </footer>

    <script src="../js/script2.js"></script>

</body>
</html>