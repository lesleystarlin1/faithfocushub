<html>
<head>
    <title>FaithFocusHub</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <meta name="viewport" content="width = device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
<section id="banner">
    <img src="../images/logo.png" class="logo">
    <div class="banner-text">
        <h1>Faith Focus Hub</h1>
        <p>Welcome to the best bible study site!</p>
    </div>
</section>

<div id="sideNav">
    <nav>
        <ul>
            <li><a href="../user/index-user.php">HOME</a></li>
            <li><a href="../user/bible-user.php">BIBLE</a></li>
            <li><a href="../user/study-user.php">STUDY OPTIONS</a></li>
            <li><a href="../user/about-user.php">ABOUT</a></li>
            <li><a href="../html/index.html">LOG OUT</a></li>
        </ul>
    </nav>
</div>
<div id="menuBtn">
    <img src="../images/menu.png" id="menu">
</div>


<div class="biblepage">
    <div class="container">
        <h1>Bible Lookup</h1>
        <div>
            <label for="book">Book:</label>
            <select id="book"></select>
        </div>
        <div>
            <label for="chapter">Chapter:</label>
            <input type="number" id="chapter" placeholder="Enter chapter...">
        </div>
        <div>
            <label for="verse">Verse:</label>
            <input type="number" id="verse" placeholder="Enter verse...">
        </div>
        <button onclick="lookupVerse()">Lookup Verse</button>
        <div id="result"></div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="../js/script.js"></script>

<script>
    var menuBtn = document.getElementById("menuBtn")
    var sideNav = document.getElementById("sideNav")
    var menu = document.getElementById("menu")
    
    sideNav.style.right = "-250px"
    
    menuBtn.onclick = function(){
        if(sideNav.style.right == "-250px"){
            sideNav.style.right = "0";
            menu.src = "../images/x.png";
        }
        else{
            sideNav.style.right = "-250px";
            menu.src = "../images/menu.png";
        }
    }

    async function populateBooks() {
          

            try {
                const response = await fetch(url, options);
                const books = await response.json();

                const bookDropdown = document.getElementById("book");
                books.forEach(book => {
                    const option = document.createElement("option");
                    option.value = book.id;
                    option.text = book.name;
                    bookDropdown.add(option);
                });
            } catch (error) {
                console.error(error);
            }
        }

        async function lookupVerse() {
            const bookId = document.getElementById("book").value;
            const chapter = document.getElementById("chapter").value;
            const verse = document.getElementById("verse").value;

            const apiKey = 'fc84efead272cce017eaefa41007425a';

            const apiUrl = `https://api.bible/v1/bibles/592420522e16049f-01/passages/${bookId}.${chapter}.${verse}?apiKey=${apiKey}`;

            console.log(apiUrl);

            try {
                const response = await fetch(apiUrl);
                const data = await response.json();

                console.log(data); 
                const resultDiv = document.getElementById('result');
                resultDiv.innerHTML = `<strong>${bookId} ${chapter}:${verse}</strong><br>${data.data.content}`;
            } catch (error) {
                console.error('Error fetching Bible passage:', error);
                const resultDiv = document.getElementById('result');
                resultDiv.innerHTML = 'Error fetching Bible passage. Please try again.';
            }
        }

        window.onload = function () {
            populateBooks();
        };
    
    </script>

       

    </body>
    </html>