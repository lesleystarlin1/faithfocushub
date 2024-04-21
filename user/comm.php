<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaries - FaithFocusHub</title>
    <link rel="stylesheet" href="../css/style2.css">
    <style>
        .commentaries {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .commentaries h1 {
            margin-bottom: 0.5rem;
            font-size: 2.5rem;
        }
        .commentaries p {
            margin-bottom: 1rem;
        }


        .commentary-types {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 40px;
        }

        .commentary-type {
            background-color: #5e9a83;
            padding: 30px;
            border-radius: 10px;
        }

        .commentary-type h2 {
            margin-top: 0;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .commentary-type p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .commentary-type ul {
            padding-left: 30px;
            font-size: 16px;
            line-height: 1.5;
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

        <section class="commentaries">
            <h1>Bible Commentaries</h1>
            <p>Explore a variety of Bible commentaries to deepen your understanding of Scripture. Here are some recommended types of commentaries:</p>

            <div class="commentary-types">
                <div class="commentary-type">
                    <h2>Expository Commentaries</h2>
                    <p>Expository commentaries provide a detailed, verse-by-verse explanation of the biblical text. They focus on the original meaning and context of the passage.</p>
                    <ul>
                        <li>The MacArthur New Testament Commentary</li>
                        <li>The New International Commentary on the Old Testament (NICOT)</li>
                        <li>The New International Commentary on the New Testament (NICNT)</li>
                    </ul>
                </div>

                <div class="commentary-type">
                    <h2>Devotional Commentaries</h2>
                    <p>Devotional commentaries offer insights and reflections for personal spiritual growth. They emphasize practical application and encouragement.</p>
                    <ul>
                        <li>Matthew Henry's Commentary on the Whole Bible</li>
                        <li>The Be Series by Warren Wiersbe</li>
                        <li>The Life Application Study Bible</li>
                    </ul>
                </div>

                <div class="commentary-type">
                    <h2>Theological Commentaries</h2>
                    <p>Theological commentaries explore the biblical text from a specific theological perspective. They examine doctrinal themes and theological implications.</p>
                    <ul>
                        <li>The New International Greek Testament Commentary (NIGTC)</li>
                        <li>The Pillar New Testament Commentary</li>
                        <li>The New American Commentary</li>
                    </ul>
                </div>

                <div class="commentary-type">
                    <h2>Historical and Cultural Commentaries</h2>
                    <p>Historical and cultural commentaries provide background information and insights into the historical and cultural context of the biblical text.</p>
                    <ul>
                        <li>The IVP Bible Background Commentary: Old Testament</li>
                        <li>The IVP Bible Background Commentary: New Testament</li>
                        <li>The Zondervan Illustrated Bible Backgrounds Commentary</li>
                    </ul>
                </div>
            </div>

        </section>

    </main>

    <footer>
        <p>&copy; 2024 FaithFocusHub</p>
    </footer>
    
</body>
</html>