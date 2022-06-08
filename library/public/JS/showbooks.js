fetch("/json")
  .then(function (response) {
    return response.json();
  })
  .then(function (bookJSON) {
    for (let i = 0; i < bookJSON.length; i++) {
      new Book(
        bookJSON[i].img,
        bookJSON[i].name,
        bookJSON[i].author,
        bookJSON[i].rating
      );
    }
  });

function Book(img, name, author, rating) {
  let book = document.createElement("div");
  let bookCovers = document.createElement("div");
  let bookTitles = document.createElement("div");
  let bookAuthors = document.createElement("div");
  let bookRating = document.createElement("div");
  let bookRatingWrap = document.createElement("div");

  let ratingStarInput = [];
  let ratingStarLabel = [];

  book.id = "book";
  book.classList.add("book", "grid");
  bookCovers.classList.add("book_covers");
  bookTitles.classList.add("book_titles");
  bookAuthors.classList.add("book_authors");
  bookRating.classList.add("book_rating");
  bookRatingWrap.classList.add("book_rating_wrap", "grid");

  for (let i = 1; i <= 5; i++) {
    ratingStarInput[i] = document.createElement("input");
    ratingStarInput[i].classList.add("book_rating_input");
    ratingStarInput[i].id = `star-rating-${i}`;
    ratingStarInput[i].type = "checkbox";
    ratingStarInput[i].name = "rating";
    if (rating >= i) ratingStarInput[i].checked = true;
    ratingStarLabel[i] = document.createElement("label");
    ratingStarLabel[i].classList.add(
      "book_rating_ico",
      "fa",
      "fa-star-o",
      "fa-lg"
    );
    ratingStarLabel[i].setAttribute("for", ratingStarInput[i].id);
    ratingStarLabel[i].title = `${i} out of ${i} stars`;
  }

  //Выводим данные из JSON
  bookCovers.style.backgroundImage = `url(${img})`;
  bookTitles.innerHTML = name;
  bookAuthors.innerHTML = `by ${author}`;

  books.appendChild(book);
  book.appendChild(bookCovers);
  book.appendChild(bookTitles);
  book.appendChild(bookAuthors);
  book.appendChild(bookRating);
  bookRating.appendChild(bookRatingWrap);
  for (let i = 1; i <= 5; i++) {
    bookRatingWrap.insertBefore(ratingStarLabel[i], bookRatingWrap.firstChild);
    bookRatingWrap.insertBefore(ratingStarInput[i], bookRatingWrap.firstChild);
  }
}

most_popular.onclick = function (event) {
  let children = books.childNodes;
  console.log(children.length);
  for (let i = 0; i < children.length; i++) {
    book[i].style.display = "none";
  }

  fetch("/json")
    .then(function (response) {
      return response.json();
    })
    .then(function (bookJSON) {
      for (let i = 0; i < bookJSON.length; i++) {
        if (bookJSON[i].rating === "5") {
          book[i].style.display = "";
        }
      }
    });
};

all_books.onclick = function (event) {
  let children = books.childNodes;
  console.log(children.length);
  for (let i = 0; i < children.length; i++) {
    book[i].style.display = "";
  }
};

function searchBook() {
  let children = books.childNodes;
  console.log(children.length);
  for (let i = 0; i < children.length; i++) {
    book[i].style.display = "none";
  }

  fetch("/json")
    .then(function (response) {
      return response.json();
    })
    .then(function (bookJSON) {
      console.log(search_input.value);

      for (let i = 0; i < bookJSON.length; i++) {
        if (
          bookJSON[i].name
            .toLowerCase()
            .indexOf(search_input.value.toLowerCase()) > -1 ||
          bookJSON[i].author
            .toLowerCase()
            .indexOf(search_input.value.toLowerCase()) > -1
        )
          book[i].style.display = "";
      }
    });
}
