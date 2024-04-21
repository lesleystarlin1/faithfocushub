<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verse of the Day - FaithFocusHub</title>
    <link rel="stylesheet" href="../css/style2.css">
    <style>
        .verse-container { 
            background-color: #5e9a83; 
            padding: 2rem; text-align: center; 
            margin-top: 2rem;
            margin-bottom: 2rem;
            border-radius: 5px; 
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .verse-container h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .verse-container p {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }

        .verse-container .verse-reference {
            font-style: italic;
            font-size: 1rem;
            margin-top: 1rem;
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

        .verse-highlight {
            background-color: #f9e076;
            padding: 5px;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .verse-note {
            margin-top: 10px;
            padding: 10px;
            background-color: #f9f4ec;
            border-radius: 5px;
        }
        
        .verse-note textarea {
            width: 100%;
            height: 100px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
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
                <li class="dropdown">
                          <a href="#" class="dropbtn">My Account</a>
                            <div class="dropdown-content">
                              <a href="../php/view-soap2.php">Study Entries</a>
                              <a href="../user/discussion.php">Discussions</a>
                              <div class="study-methods-dropdown">
                        <a href="#" class="dropbtn study-method-btn">Study Methods</a>
                        <div class="study-methods-content">
                            <a href="../user/soap-entry.php">SOAP method</a>
                            <a href="../user/sword-entry.php">SWORD method</a>
                            <a href="../user/topic-entry.php">Topical method</a>
                        </div>
                            </div>
              </li>                <li><a href="../php/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <section class="hero">
            <h1>Verse of the Day</h1>
        </section>
        <section class="verse-container">
            <h2>John 3:16</h2>
            <p>"For God so loved the world that he gave his one and only Son, that whoever believes in him shall not perish but have eternal life."</p>
            <p class="verse-reference">- John 3:16 (NIV)</p>
            <div class="result-section">
            <h3>Reflection</h3>
            <p>This verse is one of the most well-known and beloved passages in the Bible. It encapsulates the core message of the Gospel - God's love for humanity and His plan for salvation through Jesus Christ. It reminds us of the incredible sacrifice God made by sending His Son to die for our sins, so that we may have eternal life through faith in Him.</p>
            <p>As you meditate on this verse, consider the depth of God's love for you personally. Reflect on the gift of salvation and the promise of eternal life that is available to all who believe in Jesus. Let this truth fill your heart with gratitude and inspire you to share this message of hope with others.</p>
        </div>
        </section>

      
    </main>

    <footer>
        <p>&copy; 2024 FaithFocusHub</p>
    </footer>

    
</body>
</html>