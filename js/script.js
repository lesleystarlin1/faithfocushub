// this is the Bible Lookup script
async function populateBooks() {
  const url = 'https://bible-search.p.rapidapi.com/books';
  const options = {
      method: 'GET',
      headers: {
          'X-RapidAPI-Key': 'b175e18129msh8a38f4d417d9ad2p1c2d50jsn3a2d33622c9e',
          'X-RapidAPI-Host': 'bible-search.p.rapidapi.com'
      }
  };

  try {
      const response = await fetch(url, options);
      const books = await response.json();

      const bookDropdown = document.getElementById("book");
      books.forEach(book => {
          const option = document.createElement("option");
          option.value = book.name;
          option.text = book.name;
          bookDropdown.add(option);
      });
  } catch (error) {
      console.error(error);
  }
}

async function lookupVerse() {
  // gets user input
  const book = document.getElementById('book').value;
  const chapter = document.getElementById('chapter').value;
  const verse = document.getElementById('verse').value;

  const apiKey = 'fc84efead272cce017eaefa41007425a	';
  // this is my apiKey

  const apiUrl = `https://api.scripture.api.bible/v1/bibles/592420522e16049f-01/passages/${book}.${chapter}.${verse}?apiKey=${apiKey}`;

  console.log(apiUrl); // Debugging line

  try {
      // makes API request
      const response = await fetch(apiUrl);
      const data = await response.json();

      console.log(data); // logs the entire API response to the console

      // displays the Bible passage
      const resultDiv = document.getElementById('result');
      resultDiv.innerHTML = `<strong>${book} ${chapter}:${verse}</strong><br>${data.data.content}`;
  } catch (error) {
      console.error('Error fetching Bible passage:', error);
      const resultDiv = document.getElementById('result');
      resultDiv.innerHTML = 'Error fetching Bible passage. Please try again.';
  }
}

// populate the books dropdown when the page loads
window.onload = function () {
  populateBooks();
};

function searchBible() {
    const book = document.getElementById('book').value.trim().toLowerCase();
    const chapter = document.getElementById('chapter').value.trim();
    const verse = document.getElementById('verse').value.trim();
    const result = document.getElementById('result');
  
    
    const bibleText = {
      'john': {
        '3': {
          '16': 'For God so loved the world, that he gave his only begotten Son, that whosoever believeth in him should not perish, but have everlasting life.'
        }
      }
    };
  
    if (bibleText[book] && bibleText[book][chapter] && bibleText[book][chapter][verse]) {
      result.innerHTML = `<p>${bibleText[book][chapter][verse]}</p>`;
    } else {
      result.innerHTML = '<p>Bible verse not found.</p>';
    }
  }

  function searchBible() {
    const book = document.getElementById('book').value.trim().toLowerCase();
    const chapter = document.getElementById('chapter').value.trim();
    const verse = document.getElementById('verse').value.trim();
    const result = document.getElementById('result');
  
    const apiUrl = `https://bible-api.com/${book}+${chapter}:${verse}`;
  
    fetch(apiUrl)
      .then(response => response.json())
      .then(data => {
        if (data.text) {
          result.innerHTML = `<p>${data.text}</p>`;
        } else {
          result.innerHTML = '<p>Bible verse not found.</p>';
        }
      })
      .catch(error => {
        result.innerHTML = '<p>Error fetching Bible verse.</p>';
        console.error('Error:', error);
      });
  }