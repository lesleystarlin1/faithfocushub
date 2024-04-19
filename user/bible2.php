<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bible Study Website</title>
    <link rel="stylesheet" href="../css/style2.css">
    <style>
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
                              <a href="../user/recommendations.php">Recommendations</a>
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
            <h1>Bible KJV</h1>

            <div class="search-form">
                <div>
                    <label for="book">Book:</label>
                    <select id="book" onchange="displayBook()">
                        <option value="">Select a book</option>
                    </select>
                </div>
                <div>
                    <label for="chapter">Chapter:</label>
                    <select id="chapter" onchange="displayChapter()">
                        <option value="">Select a chapter</option>
                    </select>
                </div>
                <div>
                    <label for="verse">Verse:</label>
                    <select id="verse" onchange="displayVerse()">
                        <option value="">Select a verse</option>
                    </select>
                </div>
            </div>

            <div class="result-section">
                <div id="result"></div>
            </div>  
            <div id="verseNotes"></div>      
        </section>
    </main>

    <footer>
        <p>&copy; 2024 FaithFocusHub</p>
    </footer>

    <script src="../js/bible-data.js"></script>
    <script src="../js/script3.js"></script>
</body>
</html>