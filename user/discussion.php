<?php
session_start();

require_once '../php/database.php';

$sql = "SELECT topics.*, user.firstname FROM topics 
        INNER JOIN user ON topics.user_id = user.id
        ORDER BY topics.created_at DESC";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion - FaithFocusHub</title>
    <link rel="stylesheet" href="../css/style2.css">
    <style>        
        .discussion {
        background-color: #f9f4ec;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .discussion h2 {
        color: #5e9a83;
        font-size: 24px;
        margin-bottom: 20px;
    }
    
    .new-topic {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        margin-bottom: 30px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .new-topic h3 {
        color: #5e9a83;
        font-size: 20px;
        margin-bottom: 10px;
    }
    
    .new-topic form {
        display: flex;
        flex-direction: column;
    }
    
    .new-topic input[type="text"],
    .new-topic textarea {
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    
    .new-topic button {
        background-color: #5e9a83;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        align-self: flex-start;
    }
    
    .topics h3 {
        color: #5e9a83;
        font-size: 20px;
        margin-bottom: 10px;
    }
    
    .topics ul {
        list-style-type: none;
        padding: 0;
    }
    
    .topics li {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .topic-info {
        display: flex;
        flex-direction: column;
    }
    
    .topic-info h4 {
        color: #5e9a83;
        font-size: 18px;
        margin-bottom: 5px;
    }
    
    .topic-excerpt {
        color: #666;
        margin-bottom: 10px;
    }
    
    .read-more {
        color: #5e9a83;
        text-decoration: none;
        align-self: flex-start;
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
                    </li>                
                    <li><a href="../php/logout.php">Logout</a></li>
            </ul>
        </nav>

    </header>
    
    <main>
        <section class="discussion">
            <h2>Discussion Forum</h2>
            
            <div class="new-topic">
            <h3>Start a New Topic</h3>
            <form action="create_topic.php" method="post">
                <input type="text" id="topic-title" name="topic_title" placeholder="Topic Title" required>
                <textarea id="topic-content" name="topic_content" placeholder="Enter your topic content here..." required></textarea>
                <button type="submit">Submit</button>
            </form>
            </div>
            
            <div class="topics">
                <h3>Recent Topics</h3>
                <ul>
                <?php
                // loops through the retrieved topics and display them
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<li>';
                        echo '<div class="topic-info">';
                        echo '<h4>' . $row["title"] . '</h4>';
                        echo '<p class="topic-excerpt">' . substr($row["content"], 0, 100) . '...</p>';
                        echo '<p class="topic-author">Created by: ' . $row["firstname"] . '</p>';
                        echo '<a href="topic.php?id=' . $row["id"] . '" class="read-more">Read More</a>';

                        // Check if the current user is the author of the topic
                        if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] == $row["user_id"]) {
                            echo '<form action="delete_topic.php" method="post">';
                            echo '<input type="hidden" name="topic_id" value="' . $row["id"] . '">';
                            echo '<button type="submit">Delete</button>';
                            echo '</form>';
                        }

                        echo '</div>';
                        echo '</li>';
                    }
                } else {
                    echo '<li>No topics found.</li>';
                }
                ?>

                <li>
                    <div class="topic-info">
                        <h4>The Importance of Prayer in Our Daily Lives</h4>
                        <p class="topic-excerpt">In this topic, we discuss the significance of prayer and how it can strengthen our relationship with God...</p>
                        <a href="topic1.php?id=1" class="read-more">Read More</a>
                    </div>
                </li>
                
    
                </ul>
            </div>
        </section>
    </main>
    
    <footer>
        <p>&copy; 2024 FaithFocusHub</p>
    </footer>

</body>
</html>