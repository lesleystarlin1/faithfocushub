<?php
session_start();
require_once '../php/database.php';

$topicId = $_GET["id"];

// retrieves the topic details from the database
$sql = "SELECT * FROM topics WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $topicId);
$stmt->execute();
$result = $stmt->get_result();
$topic = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $topic["title"]; ?> - FaithFocusHub</title>
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
            color: #666;
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

        .reply-form h3{
            color: #5e9a83;
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
        .welcome-message {
            margin-right: 20px;
            color: #fff;
            font-weight: bold;
            font-size: 18px;
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
            <h2><?php echo $topic["title"]; ?></h2>
            <div class="topic-content">
                <?php echo $topic["content"]; ?>
            </div>

            <div class="replies">
                <?php
                // retrieves the replies for the topic
                $sql = "SELECT replies.*, user.firstname, replies.user_id FROM replies 
                        INNER JOIN user ON replies.user_id = user.id
                        WHERE replies.topic_id = ?
                        ORDER BY replies.created_at ASC";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("i", $topicId);
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
                        echo '<input type="hidden" name="topic_id" value="' . $topicId . '">';
                        echo '<button type="submit">Delete</button>';
                        echo '</form>';
                    }

                    echo '</div>';
                }
                ?>
            </div>

            <div class="reply-form">
                <h3>Add a Comment</h3>
                <form action="submit_reply.php" method="post">
                    <input type="hidden" name="topic_id" value="<?php echo $topicId; ?>">
                    <textarea name="reply_content" placeholder="Write your comment..." required></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
            <a href="../user/discussion.php" class="back-link">Back to Discussions</a>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 FaithFocusHub</p>
    </footer>

</body>
</html>