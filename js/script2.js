// Bible data 
const bibleData = {
    'Genesis': { chapters: 50, verses: { 1: 31, 2: 25, /* ... */ } },
    'Exodus': { chapters: 40, verses: { 1: 22, 2: 25, /* ... */ } },
  };
  
  // this is the function to populate the book dropdown
  function populateBookDropdown() {
    const bookDropdown = document.getElementById('book');
    for (const book in bibleData) {
      const option = document.createElement('option');
      option.value = book;
      option.textContent = book;
      bookDropdown.add(option);
    }
  }
  
  // this is the function to populate the chapter dropdown
  function updateChapters() {
    const bookDropdown = document.getElementById('book');
    const chapterDropdown = document.getElementById('chapter');
    const verseDropdown = document.getElementById('verse');
  
    // this clears existing options
    chapterDropdown.innerHTML = '<option value="">Select a chapter</option>';
    verseDropdown.innerHTML = '<option value="">Select a verse</option>';
  
    const selectedBook = bookDropdown.value;
    if (selectedBook) {
      const numChapters = bibleData[selectedBook].chapters;
      for (let i = 1; i <= numChapters; i++) {
        const option = document.createElement('option');
        option.value = i;
        option.textContent = i;
        chapterDropdown.add(option);
      }
    }
  }
  
  // this is function to populate the verse dropdown
  function updateVerses() {
    const bookDropdown = document.getElementById('book');
    const chapterDropdown = document.getElementById('chapter');
    const verseDropdown = document.getElementById('verse');
  
    // this clears the existing options
    verseDropdown.innerHTML = '<option value="">Select a verse</option>';
  
    const selectedBook = bookDropdown.value;
    const selectedChapter = chapterDropdown.value;
    if (selectedBook && selectedChapter) {
      const numVerses = bibleData[selectedBook].verses[selectedChapter];
      for (let i = 1; i <= numVerses; i++) {
        const option = document.createElement('option');
        option.value = i;
        option.textContent = i;
        verseDropdown.add(option);
      }
    }
  }
  
  // this is the function to search the Bible (you can add your own implementation here)
  function searchBible() {
    const book = document.getElementById('book').value;
    const chapter = document.getElementById('chapter').value;
    const verse = document.getElementById('verse').value;
    const result = document.getElementById('result');
  
    result.innerHTML = `<p>${book} ${chapter}:${verse} </> <p>The Beginning</p> <p>
    1 In the beginning God created the heavens and the earth.</p>`;
  }
  
  populateBookDropdown();