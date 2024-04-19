<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SWORD Method Entry - FaithFocusHub</title>
  <link rel="stylesheet" href="../css/style2.css">

  <style>
    .study-container {
      display: flex;
      justify-content: space-between;
      align-items: stretch;
      margin-top: 20px;
    }

    .bible-section {
      flex-basis: 40%;
      padding: 20px;
      background-color: #7fb8a5;
      border-radius: 5px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      border: 5px solid #0c726b;
    }

    .bible-section h3 {
      margin-bottom: 10px;
    }

    .search-form {
      margin-bottom: 20px;
    }

    .search-form div {
      margin-bottom: 10px;
    }

    .search-form label {
      display: block;
      margin-bottom: 5px;
    }

    .search-form select {
      width: 100%;
      padding: 5px;
    }

    .search-form button {
      padding: 5px 10px;
      background-color: #0c726b;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .search-form button:hover {
      background-color: #094e48;
    }

    .single-study {
      flex-basis: 55%;
      text-align: center;
      border-radius: 7px;
      margin-bottom: 20px;
      color: white;
      position: relative;
      background-color: #7fb8a5;
      padding: 20px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      border: 5px solid #0c726b;
    }

    .single-study h2 {
      color: white;
      text-align: center;
      margin-bottom: 20px;
    }

    .single-study form {
      display: flex;
      flex-direction: column;
    }

    .single-study label {
      margin-top: 10px;
      color: white;
    }

    .single-study textarea {
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #0c726b;
      border-radius: 5px;
      resize: none;
    }

    .single-study button {
      background-color: #0c726b;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    .single-study button:hover {
      background-color: #094e48;
    }

    .single-study p {
      margin-top: 20px;
    }

    .single-study a {
      color: white;
      text-decoration: none;
    }

    .single-study a:hover {
      text-decoration: underline;
    }
    .pagination {
      margin-top: 10px;
      text-align: center;
    }

    .pagination button {
      margin: 0 5px;
      padding: 5px 10px;
      background-color: #0c726b;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .pagination button:hover {
      background-color: #094e48;
    }
    .verse-pagination button:hover {
        background-color: #094e48;
      }

      .verse-pagination button {
        margin: 0 5px;
        padding: 5px 10px;
        background-color: #0c726b;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
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
    margin-bottom: 1px;
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
                    </div>
                </li>            
                                
                
                <li><a href="../php/logout.php">Logout</a></li>
              </ul>
        </nav>
  </header>

  <main>
    <section id="banner">
      <div class="study-container">
        <div class="bible-section">
          <h2>Bible KJV</h2>
          <div class="pagination">
          <button id="prevBtn" onclick="showPreviousContent()">&lt; </button>
          <button id="nextBtn" onclick="showNextContent()"> &gt;</button>
          </div>
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
            <div id="result"></div>

            <div class="verse-pagination">
              <button id="prevVerseBtn" onclick="showPreviousVerse()">&lt; Prev</button>
              <button id="nextVerseBtn" onclick="showNextVerse()">Next &gt;</button>
            </div>
        </div>

        <div class="single-study">
          <h2>SWORD Bible Method</h2>
          <form action="../php/save-sword.php" method="post">
            <label for="scripture">Scripture:</label>
            <textarea id="scripture" name="scripture" rows="5" cols="50"></textarea>

            <label for="writing">Writing:</label>
            <textarea id="writing" name="writing" rows="5" cols="50"></textarea>

            <label for="observation">Observation:</label>
            <textarea id="observation" name="observation" rows="5" cols="50"></textarea>

            <label for="reflection">Reflection:</label>
            <textarea id="reflection" name="reflection" rows="5" cols="50"></textarea>

            <label for="devotion">Devotion:</label>
            <textarea id="devotion" name="devotion" rows="5" cols="50"></textarea>

            <button type="submit">Submit</button>
          </form>
          <p><a href="../php/view-soap2.php">View Your SWORD Entries</a></p>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2024 FaithFocusHub</p>
  </footer>

  <script src="../js/bible-data.js"></script>
  <script src="../js/script3.js"></script>

  <script>
    let currentPage = 1;
    const versesPerPage = 8;

    function showPage(page) {
      const resultDiv = document.getElementById('result');
      const verses = resultDiv.getElementsByTagName('p');
      const numPages = Math.ceil(verses.length / versesPerPage);

      if (page < 1) {
        page = 1;
      } else if (page > numPages) {
        page = numPages;
      }

      currentPage = page;

      for (let i = 0; i < verses.length; i++) {
        if (i >= (page - 1) * versesPerPage && i < page * versesPerPage) {
          verses[i].style.display = 'block';
        } else {
          verses[i].style.display = 'none';
        }
      }

      document.getElementById('prevBtn').disabled = (page === 1);
      document.getElementById('nextBtn').disabled = (page === numPages);
    }

    function showPreviousContent() {
      const bookDropdown = document.getElementById('book');
      const chapterDropdown = document.getElementById('chapter');
      const verseDropdown = document.getElementById('verse');

      const selectedBook = bookDropdown.value;
      const selectedChapter = parseInt(chapterDropdown.value);

      const book = bibleData.books.find(book => book.name === selectedBook);
      if (book) {
        const chapter = book.chapters.find(chapter => chapter.chapter === selectedChapter);
        if (chapter) {
          const verses = chapter.verses;
          const numPages = Math.ceil(verses.length / versesPerPage);

          if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
          } else {
            const previousChapter = book.chapters.find(chapter => chapter.chapter === selectedChapter - 1);
            if (previousChapter) {
              chapterDropdown.value = selectedChapter - 1;
              currentPage = Math.ceil(previousChapter.verses.length / versesPerPage);
              showPage(currentPage);
            }
          }
        }
      }
    }

    function showNextContent() {
      const bookDropdown = document.getElementById('book');
      const chapterDropdown = document.getElementById('chapter');
      const verseDropdown = document.getElementById('verse');

      const selectedBook = bookDropdown.value;
      const selectedChapter = parseInt(chapterDropdown.value);

      const book = bibleData.books.find(book => book.name === selectedBook);
      if (book) {
        const chapter = book.chapters.find(chapter => chapter.chapter === selectedChapter);
        if (chapter) {
          const verses = chapter.verses;
          const numPages = Math.ceil(verses.length / versesPerPage);

          if (currentPage < numPages) {
            currentPage++;
            showPage(currentPage);
          } else {
            const nextChapter = book.chapters.find(chapter => chapter.chapter === selectedChapter + 1);
            if (nextChapter) {
              chapterDropdown.value = selectedChapter + 1;
              currentPage = 1;
              showPage(currentPage);
            }
          }
        }
      }
    }

    function showPreviousVerse() {
      const bookDropdown = document.getElementById('book');
      const chapterDropdown = document.getElementById('chapter');
      const verseDropdown = document.getElementById('verse');

      const selectedBook = bookDropdown.value;
      const selectedChapter = parseInt(chapterDropdown.value);
      const selectedVerse = parseInt(verseDropdown.value);

      const book = bibleData.books.find(book => book.name === selectedBook);
      if (book) {
        const chapter = book.chapters.find(chapter => chapter.chapter === selectedChapter);
        if (chapter) {
          if (selectedVerse > 1) {
            verseDropdown.value = selectedVerse - 1;
            displayVerse();
          }
        }
      }
    }

    function showNextVerse() {
      const bookDropdown = document.getElementById('book');
      const chapterDropdown = document.getElementById('chapter');
      const verseDropdown = document.getElementById('verse');

      const selectedBook = bookDropdown.value;
      const selectedChapter = parseInt(chapterDropdown.value);
      const selectedVerse = parseInt(verseDropdown.value);

      const book = bibleData.books.find(book => book.name === selectedBook);
      if (book) {
        const chapter = book.chapters.find(chapter => chapter.chapter === selectedChapter);
        if (chapter) {
          if (selectedVerse < chapter.verses.length) {
            verseDropdown.value = selectedVerse + 1;
            displayVerse();
          }
        }
      }
    }

    function displayChapter() {
      const bookDropdown = document.getElementById('book');
      const chapterDropdown = document.getElementById('chapter');
      const result = document.getElementById('result');

      const selectedBook = bookDropdown.value;
      const selectedChapter = parseInt(chapterDropdown.value);
      const book = bibleData.books.find(book => book.name === selectedBook);
      if (book) {
        const chapter = book.chapters.find(chapter => chapter.chapter === selectedChapter);
        if (chapter) {
          let chapterContent = `<h2>${selectedBook} - Chapter ${selectedChapter}</h2>`;
          chapter.verses.forEach(verse => {
            chapterContent += `<p><strong>${verse.verse}</strong> ${verse.text}</p>`;
          });
          result.innerHTML = chapterContent;
          showPage(1); 
        } else {
          result.innerHTML = '';
        }
      } else {
        result.innerHTML = '';
      }

      updateVerses();
    }

  </script>
</body>
</html>