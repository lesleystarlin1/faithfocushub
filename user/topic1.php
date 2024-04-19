<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en"> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>The Importance of Prayer in Our Daily Lives - FaithFocusHub</title>
        <link rel="stylesheet" href="../css/style2.css"> 
        <style> 
            .topic {
                background-color: #f9f4ec;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .topic h2 {
                color: #5e9a83;
                font-size: 24px;
                margin-bottom: 20px;
            }

            .topic-content {
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                margin-bottom: 30px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .topic-content p {
                color: #666;
                margin-bottom: 15px;
                line-height: 1.6;
            }

            .topic-content ol {
                margin-left: 20px;
                margin-bottom: 15px;
            }

            .topic-content li {
                color: #666;
                margin-bottom: 10px;
            }

            .topic-content blockquote {
                background-color: #f9f4ec;
                padding: 10px;
                border-left: 4px solid #5e9a83;
                margin-bottom: 15px;
            }

            .topic-content blockquote p {
                margin-bottom: 0;
            }

            .replies h3 {
                color: #5e9a83;
                font-size: 20px;
                margin-bottom: 10px;
            }

            .reply-form {
                margin-bottom: 20px;
            }

            .reply-form textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .reply-form button {
                background-color: #5e9a83;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .reply {
                background-color: #fff;
                padding: 10px;
                border-radius: 5px;
                margin-bottom: 10px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .reply p {
                color: #666;
                margin-bottom: 5px;
            }

            .reply .author {
                font-weight: bold;
                color: #5e9a83;
            }
        
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
        

        /* Style for the navigation links */
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
                
            .welcome-message {
                margin-right: 20px;
                color: #fff;
                font-weight: bold;
            }

            .back-link {
            display: inline-block;
            background-color: #0c726b;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .back-link:hover {
            background-color: #7fb8a5;
            color: #fff;
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
                </div>
            </li>
            <li><a href="../php/logout.php">Logout</a></li>
        </ul>
    </nav>
    </header>

<main>
    <section class="topic">
        <h2>The Importance of Prayer in Our Daily Lives</h2>
        
        <div class="topic-content">
            <p>Prayer is a vital aspect of our spiritual lives, serving as a direct communication line between us and God. It allows us to express our gratitude, seek guidance, and find strength in challenging times. Incorporating prayer into our daily routine can have a profound impact on our relationship with God and our overall well-being.</p>
            
            <blockquote>
                <p>"Rejoice always, pray without ceasing, give thanks in all circumstances; for this is the will of God in Christ Jesus for you." - 1 Thessalonians 5:16-18</p>
            </blockquote>
            
            <p>Here are a few reasons why prayer is so important:</p>
            
            <ol>
                <li>Prayer strengthens our connection with God: By regularly communicating with God through prayer, we deepen our relationship with Him and align our hearts with His will.</li>
                <li>Prayer provides guidance and wisdom: When we seek God's guidance through prayer, He can provide us with the wisdom and direction we need to navigate life's challenges.</li>
                <li>Prayer brings peace and comfort: In times of distress or uncertainty, prayer can bring a sense of peace and comfort, knowing that we can trust in God's love and care for us.</li>
                <li>Prayer transforms our hearts: As we spend time in prayer, God works in our hearts, helping us to grow in faith, love, and obedience to Him.</li>
            </ol>
            
            <p>Incorporating prayer into our daily lives doesn't have to be complicated. It can be as simple as setting aside a few minutes each day to talk to God, expressing our thoughts, concerns, and thankfulness. We can pray in the morning, throughout the day, or before bed. The key is to make prayer a consistent and intentional part of our routine.</p>
            
            <p>Remember, God hears our prayers and desires to have a close relationship with us. Let us prioritize prayer and experience the transformative power it can have in our lives.</p>
        </div>
        
        <div class="replies">

        <?php
        require_once '../php/database.php';

        $topic_id = $_GET["id"];

        $sql = "SELECT replies.*, user.firstname, replies.user_id FROM replies 
                INNER JOIN user ON replies.user_id = user.id
                WHERE replies.topic_id = ?
                ORDER BY replies.created_at ASC";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $topic_id);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            echo '<div class="reply">';
            echo '<p>' . $row["content"] . '</p>';
            echo '<p class="author">- ' . $row["firstname"] . '</p>';
            
            // checks if the current user is the author of the reply
            if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] == $row["user_id"]) {
                echo '<form action="delete_reply.php" method="post">';
                echo '<input type="hidden" name="reply_id" value="' . $row["id"] . '">';
                echo '<input type="hidden" name="topic_id" value="' . $topic_id . '">';
                echo '<button type="submit">Delete</button>';
                echo '</form>';
            }
            
            echo '</div>';
        }
        ?>
        

            <h3>Replies</h3>
            
            <div class="reply-form">
            <form action="submit_reply.php" method="post">
                <input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>">
                <textarea name="reply_content" placeholder="Write your comment..." required></textarea>
                <button type="submit">Submit</button>
            </form>
            </div>
            
            <div class="reply">
                <p>Thank you for this insightful post. Prayer has been a game-changer in my life, helping me find peace and direction during difficult times. It's a reminder that we are never alone and that God is always there for us.</p>
                <p class="author">- Sarah</p>
            </div>
            
            <div class="reply">
                <p>I love the verse you shared from 1 Thessalonians. It's a powerful reminder to make prayer a constant part of our lives, not just something we turn to in times of need. Prayer is a gift and an opportunity to grow closer to God.</p>
                <p class="author">- Michael</p>
            </div>
        </div>
    </section>
    <a href="../user/discussion.php" class="back-link">Back to Discussions</a>

</main>

<footer>
    <p>&copy; 2024 FaithFocusHub</p>
</footer>

</body>
</html>