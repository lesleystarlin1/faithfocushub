<?php
session_start();

// checks if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/login2.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bible Study Website</title>
    <link rel="stylesheet" href="../css/style2.css">
</head>
<body>
    <header>

        <div class="logo">
            <a href="../user/index2.php"><img src="../images/logo.png" class="logo"></a> 
        </div>

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
        <section class="hero">
            <h1>FaithFocusHub</h1>
            <p>Explore the Word of God and grow in your faith.</p>
            <a href="../html/register.html" class="cta">Join Us</a>
        </section>

        <section class="bible-search">
            <h2>Bible Search</h2>
            <div class="search-form">
              <div>
                <label for="book">Book:</label>
                <select id="book" onchange="updateChapters()">
                  <option value="">Select a book</option>
                </select>
              </div>
              <div>
                <label for="chapter">Chapter:</label>
                <select id="chapter" onchange="updateVerses()">
                  <option value="">Select a chapter</option>
                </select>
              </div>
              <div>
                <label for="verse">Verse:</label>
                <select id="verse">
                  <option value="">Select a verse</option>
                </select>
              </div>
              <button onclick="searchBible()">Search</button>
            </div>
            <div id="result"></div>
          </section>
        
        <section class="vod">
            <ul>
                <li>
                    <img src="../images/vod.jpeg" alt="vod">
                    <h3>Verse of the Day</h3>
                    <p>For God so loved the world that he gave his one and only Son, that whoever believes in him shall not perish but have eternal life. - John 3:16</p>
                    <a href="">Read More</a>
                </li>
                <li class="study-resources">
                    <h3>Study Resources</h3>
                    <ul>
                      <li><a href="#">Study Methods</a></li>
                      <li><a href="#">Commentaries</a></li>
                      <li><a href="#">Recommendations</a></li>
                      <li><a href="../user/discussion.php">Discussions</a></li>

                    </ul>
                </li>
            </ul>
        </section>
    </main>
    
    <footer>
        <p>&copy; 2024 FaithFocusHub</p>
    </footer>

   <!-- Login Popup -->
   <div id="loginPopup">
    <h2>Login Required</h2>
    <p>Please log in to access this feature.</p>
    <button onclick="hideLoginPopup()">Close</button>
    <a href="../html/login2.html">Go to Login</a>

    </div>

    <script src="../js/script2.js"></script>
    <script>
        // JavaScript functions for the login popup
        function showLoginPopup() {
            document.getElementById('loginPopup').style.display = 'block';
        }

        function hideLoginPopup() {
            document.getElementById('loginPopup').style.display = 'none';
        }
    </script>

</body>
</html>