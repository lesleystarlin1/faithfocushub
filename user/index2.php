<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - FaithFocusHub</title>
    <link rel="stylesheet" href="../css/style2.css">
    <style>
       .hero {
          background-color: #5e9a83;
          padding: 0rem 2rem;
          text-align: center;
          margin-bottom: 2rem;
        }
      .hero2 {
          background-color: #5e9a83;
          padding: 2rem;
          text-align: center;
          margin-top: 2rem;
          margin-bottom: 2rem;
          border-radius: 5px;
          box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      }

      .hero2 h1 {
          font-size: 2rem;
          margin-bottom: 1rem;
      }

      .hero2 p {
          font-size: 1rem;
          margin-bottom: 1.5rem;
      }

      .hero2 a {
          display: inline-block;
          background-color: #0c726b;
          color: #fff;
          text-decoration: none;
          padding: 0.8rem 1.5rem;
          border-radius: 5px;
          transition: background-color 0.3s ease;
      }

      .hero2 a:hover {
          background-color: #094e48;
      }
      /*dropdown button */
      .dropbtn {
        display: block;
        background-color: #7fb8a5;
        color: #fff;
        text-decoration: none;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        cursor: pointer;
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
        margin-top: 5px;
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
        ackground-color: #0c726b;
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
                  </div>
                </li>
                <li><a href="../php/logout.php">Logout</a></li>
            </ul>
          </nav>
        </header>
    
    <main>

        <section class="hero">
            <h1>FaithFocusHub</h1>
        </section>
        <section class="hero2">
            <h1>About FaithFocusHub</h1>
            <p>Welcome to FaithFocusHub, your dedicated online space for deepening your spiritual journey through insightful Bible study, community engagement, and a commitment to fostering a profound connection with your faith.</p>
            <a href="../user/about2.php">Read More</a>
        </section>
        <section class="vod">
            <ul>
                <li>
                    <img src="../images/vod.jpeg" alt="vod">
                    <h3>Verse of the Day</h3>
                    <p>For God so loved the world that he gave his one and only Son, that whoever believes in him shall not perish but have eternal life. - John 3:16</p>
                    <a href="../user/verseoftheday.php">Read More</a>
                </li>
                <li class="study-resources">
                    <h3>Study Resources</h3>
                    <ul>
                        <li class="dropdown">
                            <a href="#" class="dropbtn">Study Method</a>
                            <div class="dropdown-content">
                              <a href="../user/soap-entry.php">SOAP method</a>
                              <a href="../user/sword-entry.php">SWORD method</a>
                              <a href="../user/topic-entry.php">Topical method</a>
                            </div>
                        </li>

                      <li><a href="../user/comm.php" onclick="">Commentaries</a></li>
                      <li><a href="../user/recommendations.php" onclick="">Recommendations</a></li>
                      <li><a href="../user/discussion.php" onclick="">Discussions</a></li>

                    </ul>
                </li>
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