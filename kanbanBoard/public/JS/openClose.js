function Open(button, modal_window) {
    button.addEventListener('click', function () {
        modal_window.style.display = "block";
    });
}

function Close(button, modal_window) {
    button.addEventListener('click', function () {
        modal_window.style.display = "none";
    });
}

function CloseAll(modal_window) {
    window.addEventListener('click', function (e) {
        if (e.target == modal_window) {
            console.log(e.target);
            modal_window.style.display = "none";
        }
    });
}


/*Rename window*/
let rename = document.getElementById("button_rename");
let closeRename = document.getElementById("button_close_rename");
let renameWindow = document.getElementById("pop_rename");

Open(rename, renameWindow);
Close(closeRename, renameWindow);
CloseAll(renameWindow);


/*Add List*/

let buttonAddList = document.getElementById("button_add_list");
let windowAddList = document.getElementById("window_add_list");
let buttonCanselAddList = document.getElementById("cansell_add_list");

buttonAddList.addEventListener('click', function () {
    windowAddList.style.display = "grid";
    buttonAddList.style.display = "none";
});

buttonCanselAddList.addEventListener('click', function () {
    windowAddList.style.display = "none";
    buttonAddList.style.display = "block";
});


let boardMenu = document.getElementById(`board_menu`);
let boardMenuCloseButton = document.getElementById(`task_copy_close`);

boardMenuCloseButton.addEventListener(`click`, function(){
    document.getElementById(`nav-toggle`).click();
});









