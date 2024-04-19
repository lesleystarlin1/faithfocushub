// the function to populate the book dropdown
function populateBookDropdown() {
    const bookDropdown = document.getElementById('book');
    bibleData.books.forEach(book => {
      const option = document.createElement('option');
      option.value = book.name;
      option.textContent = book.name;
      bookDropdown.add(option);
    });
  }
  
// the function to populate the chapter dropdown
function updateChapters() {
  const bookDropdown = document.getElementById('book');
  const chapterDropdown = document.getElementById('chapter');
  const verseDropdown = document.getElementById('verse');

  // this clears existing options
  chapterDropdown.innerHTML = '<option value="">Select a chapter</option>';
  verseDropdown.innerHTML = '<option value="">Select a verse</option>';

  const selectedBook = bookDropdown.value;
  const book = bibleData.books.find(book => book.name === selectedBook);
  if (book) {
    const chapters = new Set(); 
    book.chapters.forEach(chapter => {
      chapters.add(chapter.chapter);
    });

    // this creates options for each unique chapter number
    chapters.forEach(chapterNumber => {
      const option = document.createElement('option');
      option.value = chapterNumber;
      option.textContent = chapterNumber;
      chapterDropdown.add(option);
    });
  }
}
// this calls updateChapters() when the book dropdown is changed
const bookDropdown = document.getElementById('book');
bookDropdown.addEventListener('change', updateChapters);

// this calls updateChapters() when the script loads
updateChapters();
  
  // the function to populate the verse dropdown
  function updateVerses() {
    const bookDropdown = document.getElementById('book');
    const chapterDropdown = document.getElementById('chapter');
    const verseDropdown = document.getElementById('verse');
  
    // this clears existing options
    verseDropdown.innerHTML = '<option value="">Select a verse</option>';
  
    const selectedBook = bookDropdown.value;
    const selectedChapter = parseInt(chapterDropdown.value);
    const book = bibleData.books.find(book => book.name === selectedBook);
    if (book) {
      const chapter = book.chapters.find(chapter => chapter.chapter === selectedChapter);
      if (chapter) {
        chapter.verses.forEach(verse => {
          const option = document.createElement('option');
          option.value = verse.verse;
          option.textContent = verse.verse;
          verseDropdown.add(option);
        });
      }
    }
  }

  
  
  // the function to display the selected book
function displayBook() {
  const bookDropdown = document.getElementById('book');
  const result = document.getElementById('result');

  const selectedBook = bookDropdown.value;
  const book = bibleData.books.find(book => book.name === selectedBook);
  if (book) {
    let bookContent = `<h2>${selectedBook}</h2>`;
    const chaptersSet = new Set();

    book.chapters.forEach(chapter => {
      chaptersSet.add(chapter.chapter); 
    });

    // loops through unique chapter numbers
    chaptersSet.forEach(chapterNumber => {
      bookContent += `<h3>Chapter ${chapterNumber}</h3>`;
      const chapterVerses = book.chapters
        .filter(chapter => chapter.chapter === chapterNumber)
        .flatMap(chapter => chapter.verses);

      chapterVerses.forEach(verse => {
        bookContent += `<p><strong>${verse.verse}</strong> ${verse.text}</p>`;
      });
    });

    result.innerHTML = bookContent;
  } else {
    result.innerHTML = '';
  }

  updateChapters();
}
  
  // the function to display the selected chapter
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
  

  
  // populates the book dropdown on page load
  populateBookDropdown();


function handleVerseInteraction(verseId) {
  const verseElement = document.getElementById(verseId);
  
  if (verseElement.classList.contains('verse-highlight')) {
      verseElement.classList.remove('verse-highlight');
      removeVerseNote(verseId);
  } else {
      verseElement.classList.add('verse-highlight');
      addVerseNote(verseId);
  }
}

// the function to add a verse note
function addVerseNote(verseId) {
  const noteContainer = document.getElementById('verseNotes');
  const newNoteElement = document.createElement('div');
  newNoteElement.id = `note-${verseId}`;
  newNoteElement.classList.add('verse-note');
  newNoteElement.innerHTML = `
      <h4>Notes for ${verseId}:</h4>
      <textarea placeholder="Enter your notes here..."></textarea>
  `;
  noteContainer.appendChild(newNoteElement);
}

// the function to remove a verse note
function removeVerseNote(verseId) {
  const noteElement = document.getElementById(`note-${verseId}`);
  if (noteElement) {
      noteElement.remove();
  }
}

function displayVerse() {
  const bookDropdown = document.getElementById('book');
  const chapterDropdown = document.getElementById('chapter');
  const verseDropdown = document.getElementById('verse');
  const result = document.getElementById('result');

  const selectedBook = bookDropdown.value;
  const selectedChapter = parseInt(chapterDropdown.value);
  const selectedVerse = parseInt(verseDropdown.value);

  const book = bibleData.books.find(book => book.name === selectedBook);
  if (book) {
      const chapter = book.chapters.find(chapter => chapter.chapter === selectedChapter);
      if (chapter) {
          const verse = chapter.verses.find(verse => verse.verse === selectedVerse);
          if (verse) {
              const verseId = `${selectedBook}_${selectedChapter}_${selectedVerse}`;
              result.innerHTML = `
                  <h2>${selectedBook} ${selectedChapter}:${selectedVerse}</h2>
                  <p><span id="${verseId}" class="verse-text" onclick="handleVerseInteraction('${verseId}')">${verse.text}</span></p>
              `;
          } else {
              result.innerHTML = '';
          }
      } else {
          result.innerHTML = '';
      }
  } else {
      result.innerHTML = '';
  }
}

