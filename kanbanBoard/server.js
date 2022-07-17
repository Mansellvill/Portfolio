const express = require('express');
const bodyParser = require('body-parser');
const app = express();
const fs = require("fs");


const port = 8000;

app.listen(port, () => {
  console.log('We are live on ' + port);
});

app.use(express.static('public'));

let urlencodedParser = bodyParser.urlencoded({ extended: false });
let jsonParser = bodyParser.json();

let data = fs.readFileSync("public/board.json", "utf8");
let board = JSON.parse(data);
console.log(board);

/*rename board*/
app.post("/rename", urlencodedParser, function (request, response) {
  if (!request.body) return response.sendStatus(400);
  let nameBoard = request.body.rename_board;
  board.boardName = nameBoard;

  
  let newAction = {
    action: `${board.boardUser} renamed the board with ${board.boardName} in the ${nameBoard}.`,
    time: `Added by ${new Date().toLocaleString()}`
  }

  board.boardActivityList.push(newAction);

  let newNameBoard = JSON.stringify(board, null, 2);
  fs.writeFileSync('public/board.json', newNameBoard);
  response.redirect('/');
});

app.post("/description/:listId/:cardId", urlencodedParser, function (request, response) {
  if (!request.body) return response.sendStatus(400);
  let descriptionCard = request.body.card_description;  
  let idList = request.params.listId; 
  let idCard= request.params.cardId; 

  board.listsOfBoard[idList].listCards[idCard].cardDescription = descriptionCard;

  let descriptionCardJSON = JSON.stringify(board, null, 2);
  fs.writeFileSync('public/board.json', descriptionCardJSON);

  response.redirect('/');
});

app.get("/json", function (request, response) {
  response.json(board);
});

app.post("/addList", urlencodedParser, function (request, response) {
  if (!request.body) return response.sendStatus(400);
  let nameList = request.body.name_list;
  newList = {

    listName: nameList,
    listCards: []
  }

  board.listsOfBoard.push(newList);

  let newAction = {
    action: `${board.boardUser} added a new list ${nameList}.`,
    time: `Added by ${new Date().toLocaleString()}`
  }

  board.boardActivityList.push(newAction);


  let newListJSON = JSON.stringify(board, null, 2);
  fs.writeFileSync('public/board.json', newListJSON);
  response.redirect('/');
});

app.post("/addCard/:listId", urlencodedParser, function (request, response) {
  if (!request.body) return response.sendStatus(400);
  let card = {};
  let idList = request.params.listId;
  let textCard = request.body.textarea_add_card;
  let cardLength = board.listsOfBoard[idList].listCards.length;

  card = {
    cardText: textCard,
    cardDescription: ""
  }

  board.listsOfBoard[idList].listCards.push(card);

  let newAction = {
    action: `${board.boardUser} added a new card to ${textCard} in ${board.listsOfBoard[idList].listName}.`,
    time: `Added by ${new Date().toLocaleString()}`
  }

  board.boardActivityList.push(newAction);

  let newCardJSON = JSON.stringify(board, null, 2);
  fs.writeFileSync('public/board.json', newCardJSON);

  response.redirect('/');
});

app.post("/copyList/:listId", urlencodedParser, function (request, response) {
  if (!request.body) return response.sendStatus(400);

  let nameList = request.body.pop_copy_form_textarea;  //получаем новое название списка из формы
  let idList = request.params.listId; //получаем id выбраного списка

  //создаем новый объкт списка с получным нахванием
  let copyList = {
    listName: nameList,
    listCards: []
  };
  //копируем карточки в новый объект из выбраного списка
  for (let i = 0; i < board.listsOfBoard[idList].listCards.length; i++) {
    copyList.listCards.push(board.listsOfBoard[idList].listCards[i]);
  }
  //вставляем новый объект в массив списков, в позицию выбраного списка+1
  board.listsOfBoard.splice(idList+1, 0, copyList);
  //записываем действие
  let newAction = {
    action: `${board.boardUser} copied ${board.listsOfBoard[idList].listName} with a new name ${nameList}.`,
    time: `Added by ${new Date().toLocaleString()}`
  }

  board.boardActivityList.push(newAction);

  //записываем изменения в JSON
  let copyListJSON = JSON.stringify(board, null, 2);
  fs.writeFileSync('public/board.json', copyListJSON);
  response.redirect('/');
});

app.post("/copyCard/:listId/:cardId", urlencodedParser, function (request, response) {
  if (!request.body) return response.sendStatus(400);

  let nameCard = request.body.copy_textarea;  
  let idList = request.params.listId;
  let idCard= request.params.cardId; 

  let positionList = request.body.card_copy_select_list;
  let positionCard = request.body.card_copy_select_position;

  let copyCard = {
    cardText: nameCard,
    cardDescription: board.listsOfBoard[idList].listCards[idCard].cardDescription
  };

  board.listsOfBoard[positionList].listCards.splice(positionCard+1, 0, copyCard);

  let newAction = {
    action: `${board.boardUser} copied ${board.listsOfBoard[idList].listCards[idCard].cardText} from ${nameCard} in list ${board.listsOfBoard[idList].listName}.`,
    time: `Added by ${new Date().toLocaleString()}`
  }

  board.boardActivityList.push(newAction);
  
  //записываем изменения в JSON
  let copyCardJSON = JSON.stringify(board, null, 2);
  fs.writeFileSync('public/board.json', copyCardJSON);
  response.redirect('/');
});

app.post("/moveList/:listId", urlencodedParser, function (request, response) {
  if (!request.body) return response.sendStatus(400);
  let positionList = request.body.list_Position;
  let idList = request.params.listId;
  let boardMove = board.listsOfBoard[idList];

  board.listsOfBoard.splice(idList, 1);
  board.listsOfBoard.splice(positionList - 1, 0, boardMove);

  let newAction = {
    action: `${board.boardUser} moved the list ${boardMove.listName}.`,
    time: `Added by ${new Date().toLocaleString()}`
  }

  board.boardActivityList.push(newAction);

  let moveListJSON = JSON.stringify(board, null, 2);
  fs.writeFileSync('public/board.json', moveListJSON);
  response.redirect('/');
});

app.post("/moveCard/:listId/:cardId", urlencodedParser, function (request, response) {
  if (!request.body) return response.sendStatus(400);

  let positionList = request.body.card_select_list;
  let positionCard = request.body.card_select_position;

  let idList = request.params.listId;
  let idCard = request.params.cardId;

  let cardMove = board.listsOfBoard[idList].listCards[idCard];

  if (board.listsOfBoard[positionList].listCards.length < positionCard) {
    board.listsOfBoard[idList].listCards.splice(idCard, 1)
    board.listsOfBoard[positionList].listCards.push(cardMove);
  }
  else {
    board.listsOfBoard[idList].listCards.splice(idCard, 1);
    board.listsOfBoard[positionList].listCards.splice(positionCard - 1, 0, cardMove);
  }

  let newAction = {
    action: `${board.boardUser} moved the ${cardMove.cardText} from ${board.listsOfBoard[idList].listName} to ${board.listsOfBoard[positionList].listName}.`,
    time: `Added by ${new Date().toLocaleString()}`
  }

  board.boardActivityList.push(newAction);

  let moveCardJSON = JSON.stringify(board, null, 2);
  fs.writeFileSync('public/board.json', moveCardJSON);
  response.redirect('/');
});


app.post("/deleteList/:listId", urlencodedParser, function (request, response) {
  if (!request.body) return response.sendStatus(400);
  let idList = request.params.listId;

  let newAction = {
    action: `${board.boardUser} removed the list ${board.listsOfBoard[idList].listName}.`,
    time: `Added by ${new Date().toLocaleString()}`
  }
  
  board.boardActivityList.push(newAction);

  board.listsOfBoard.splice(idList, 1);

  let deleteListJSON = JSON.stringify(board, null, 2);
  fs.writeFileSync('public/board.json', deleteListJSON);
  response.redirect('/');
});

app.post("/deleteCard/:listId/:cardId", urlencodedParser, function (request, response) {
  if (!request.body) return response.sendStatus(400);
  let idList = request.params.listId;
  let idCard = request.params.cardId;
 

  let newAction = {
    action: `${board.boardUser} removed the ${board.listsOfBoard[idList].listCards[idCard].cardText} in the ${board.listsOfBoard[idList].listName}.`,
    time: `Added by ${new Date().toLocaleString()}`
  }
  
  board.boardActivityList.push(newAction);

  board.listsOfBoard[idList].listCards.splice(idCard, 1);
  let deleteCardJSON = JSON.stringify(board, null, 2);
  fs.writeFileSync('public/board.json', deleteCardJSON);
  response.redirect('/');
});