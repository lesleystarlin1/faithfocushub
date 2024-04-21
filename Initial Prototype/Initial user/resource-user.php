<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resources - FaithFocusHub</title>
    <link rel="stylesheet" href="../css/resource.css">
    <style>
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

    <nav>
        <ul>
            <li><a href="../user/index2.php">Home</a></li>
            <li><a href="../user/about2.php">About</a></li>
            <li><a href="../user/bible2.php">Bible</a></li>
            <li><a href="../user/resource-user.php">Resources</a></li>
            <li><a href="../php/logout.php">Logout</a></li>
        </ul>
    </nav>
    </header>

    <main>
        <section class="resources">
            <ul>
                    <h1>Study Methods</h1>
                    <p>This consist of our main bible study structures to help read and understand the bible.</p>
                    <ul>
                      <li><a href="../user/soap-entry.php">SOAP method</a></li>
                      <li><a href="#">GROW method</a></li>
                      <li><a href="#">WWWWWH</a></li>
                    </ul>
                    
                     </ul>
            </ul>
        </section>

        <section class="study-methods">
            <ul>
                    <h1>Commentaries</h1>
                    <p>This consist of our main bible study structures to help read and understand the bible.</p>
                    <ul>
                      <li><a href="#">SOAP method</a></li>
                      <li><a href="#">GROW method</a></li>
                      <li><a href="#">WWWWWH</a></li>
                    </ul>
            </ul>
        </section>

        <section class="rec">
            <ul>
                    <h1>Recommendations</h1>
                    <p>This consist of FaithFocusHub highly recommended sources.</p>
                    <ul>
                        <li class="dropdown">
                            <a href="#" class="dropbtn">Books</a>
                            <div class="dropdown-content">
                              <a href="../html/study-methods.html">Study Methods</a>
                            </div>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropbtn">Podcasts</a>
                            <div class="dropdown-content">
                              <a href="../html/study-methods.html">Study Methods</a>
                            </div>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropbtn">Sermons</a>
                            <div class="dropdown-content">
                              <a href="../html/study-methods.html">Study Methods</a>
                            </div>
                        </li>
                    </ul>
            
            </ul>
        </section>

        <section class="open">
            <ul>
                    <h1>Open Discussion</h1>
                    <p>This consist of discussions of scriptures.</p>
                    <ul>
                      <li><a href="../user/discussion.php">Discuss with others</a></li>
                    </ul>
            </ul>
        </section>

        

            

      
    </main>
    
    <footer>
        <p>&copy; 2024 FaithFocusHub</p>
    </footer>

    <!-- login popup -->
    <div id="loginPopup">
        <h2>Login Required</h2>
        <p>Please log in to access this feature.</p>
        <button onclick="hideLoginPopup()">Close</button>
        <a href="../html/login2.html">Go to Login</a>

    </div>

    <script src="../js/script2.js"></script>
    <script>
        // javascript functions for the login popup
        function showLoginPopup() {
            document.getElementById('loginPopup').style.display = 'block';
        }

        function hideLoginPopup() {
            document.getElementById('loginPopup').style.display = 'none';
        }
    </script>

</body>
</html>