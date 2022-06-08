const express = require("express");
const bodyParser = require("body-parser");
const app = express();
const fs = require("fs");

app.use(bodyParser.json());
let urlencodedParser = bodyParser.urlencoded({ extended: false });

app.use(express.static(__dirname + "/public"));

let booksJSON = fs.readFileSync("books.json", "utf8");
let booksJS = JSON.parse(booksJSON);

app.get("/json", function(req, res) {
  res.send(booksJSON);
});

app.post("", urlencodedParser, function(req, res) {
  
  if(!req .body) return res.sendStatus(400);
  let img = `img/${req.body.popup_img_book_input}`;
  let name = req.body.popup_name_book_input;
  let author = req.body.popup_name_author_input;
  let rating = req.body.rating;
 
  let book = {
    img: img,
    name: name,
    author: author,
    rating: rating
  };

  booksJS.push(book);
  var data = JSON.stringify(booksJS);
  fs.writeFileSync("books.json", data);
  
 res.end();

});

console.log(booksJS);
console.log(booksJS.length);

const port = 8000;
app.listen(port, () => {
  console.log("We are live on " + port);
});
