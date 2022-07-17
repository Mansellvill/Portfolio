function ListLoad(id, board) {
    /***********Create elements list ***********/
    let boardLists = document.createElement('div');
    boardLists.classList.add('board_lists');
    let boardList = document.createElement('div');
    boardList.classList.add('board_list');
    /*header*/
    let listHeader = document.createElement('div');
    listHeader.classList.add('board_list_header', 'grid');
    let listName = document.createElement('h2');
    listName.classList.add('name_header_list');
    listName.innerHTML = board.listsOfBoard[id].listName;
    let button_pop = document.createElement('a');
    button_pop.href = "#";
    button_pop.classList.add('header_button', 'fa', 'fa-ellipsis-h');
    /*body*/
    let listBody = document.createElement('div');
    listBody.classList.add('board_list_body', 'grid');
    listBody.id = 'board_list_body';
    /*footer*/
    let listFooter = document.createElement('div');
    listFooter.classList.add('board_list_footer');
    let listFooterButton = document.createElement('a');
    listFooterButton.href = "#";
    listFooterButton.innerHTML = "Add a card...";
    listFooterButton.classList.add('board_list_footer_a');


    /******Form add Card********/
    let listAddCard = document.createElement('div');
    listAddCard.classList.add('board_list_add_card', 'grid');
    let listAddCardForm = document.createElement('form');
    listAddCardForm.action = `/addCard/${id}`;
    listAddCardForm.method = `POST`;
    let listAddCardFormTextarea = document.createElement('div');
    listAddCardFormTextarea.classList.add('board_list_add_card_textarea');
    let listAddCardTextarea = document.createElement('textarea');
    listAddCardTextarea.name = 'textarea_add_card';
    listAddCardTextarea.id = 'textarea_add_card';
    let listAddCardSaveMenu = document.createElement('div');
    listAddCardSaveMenu.classList.add('save_cansel', 'grid');
    let listAddCardSaveButton = document.createElement('button');
    listAddCardSaveButton.classList.add('button');
    listAddCardSaveButton.innerHTML = 'Add';
    let listAddCardSaveCansel = document.createElement('a');
    listAddCardSaveCansel.href = "#";
    listAddCardSaveCansel.classList.add('add_list_cansel', 'fa', 'fa-times');



    /*******Pop menu*******/
    let listPopMenu = document.createElement('div');
    listPopMenu.classList.add('pop_task');
    let listPopMenuMain = document.createElement('div');
    listPopMenuMain.classList.add('pop_task_main', 'grid');
    /*Header*/
    let listPopMenuHeader = document.createElement('div');
    listPopMenuHeader.classList.add('pop_task_header', 'grid');
    let listPopMenuHeaderText = document.createElement('span');
    listPopMenuHeaderText.classList.add('pop_task_name');
    listPopMenuHeaderText.innerHTML = 'List Actions';
    let listPopMenuHeaderClose = document.createElement('a');
    listPopMenuHeaderClose.href = "#";
    listPopMenuHeaderClose.classList.add('pop_task_cansell', 'fa', 'fa-times');
    let listPopMenuHeaderBack = document.createElement('a');
    listPopMenuHeaderBack.href = "#";
    listPopMenuHeaderBack.classList.add('pop_task_back', 'fa', 'fa-arrow-left');
    /*Body*/
    let listPopMenuBody = document.createElement('div');
    listPopMenuBody.classList.add('pop_task_body');
    let listPopMenuBodyMenu = document.createElement('ul');
    listPopMenuBodyMenu.classList.add('pop_task_menu');
    /*Copu */
    let listPopMenuBodyMenuLiCopy = document.createElement('li');
    let listPopMenuBodyMenuCopy = document.createElement('a');
    listPopMenuBodyMenuCopy.href = "#";
    listPopMenuBodyMenuCopy.innerHTML = 'Copy List...';
    listPopMenuBodyMenuCopy.classList.add('pop_text_menu');
    /*Move */
    let listPopMenuBodyMenuLiMove = document.createElement('li');
    let listPopMenuBodyMenuMove = document.createElement('a');
    listPopMenuBodyMenuMove.href = "#";
    listPopMenuBodyMenuMove.innerHTML = 'Move List...';
    listPopMenuBodyMenuMove.classList.add('pop_text_menu');
    /*Delete*/
    let listPopMenuBodyMenuLiDelete = document.createElement('li');
    let listPopMenuBodyMenuLiFormDelete = document.createElement('form');
    listPopMenuBodyMenuLiFormDelete.action = `/deleteList/${id}`;
    listPopMenuBodyMenuLiFormDelete.method = `POST`;
    let listPopMenuBodyMenuDelete = document.createElement('a');
    listPopMenuBodyMenuDelete.innerHTML = 'Delete This List';
    listPopMenuBodyMenuDelete.classList.add(`pop_text_menu`);

    listPopMenuBodyMenuDelete.addEventListener('click', function () {
        listPopMenuBodyMenuLiFormDelete.submit();
    });

    function overlay(listId, cardId) {
        /*Window Overlay*/
        let windowTaskOverlayParent = document.createElement(`div`);
        let windowTaskOverlay = document.createElement(`div`);
        windowTaskOverlay.classList.add(`windows_overlay`);
        let windowTask = document.createElement(`div`);
        windowTask.classList.add(`window`);
        let windowTaskPosition = document.createElement(`div`);
        windowTaskPosition.classList.add(`window_position`);
        /*Header window*/
        let windowTaskHeader = document.createElement(`div`);
        windowTaskHeader.classList.add(`window_header`, `grid`);
        let windowTaskHeaderIcon = document.createElement(`span`);
        windowTaskHeaderIcon.classList.add(`window_icon`, `fa`, `fa-tasks`);
        let windowTaskHeaderNameTask = document.createElement(`span`);
        windowTaskHeaderNameTask.classList.add(`window_name_task`);
        windowTaskHeaderNameTask.innerHTML = board.listsOfBoard[listId].listCards[cardId].cardText;
        let windowTaskHeaderClose = document.createElement(`a`);
        windowTaskHeaderClose.href = `#`;
        windowTaskHeaderClose.classList.add(`window_close`, `fa`, `fa-times`);
        let windowTaskHeaderList = document.createElement(`span`);
        windowTaskHeaderList.classList.add(`window_name_list`);
        windowTaskHeaderList.innerHTML = `In list <a href="#">${board.listsOfBoard[listId].listName}</a>`;
        /*Body window*/
        let windowTaskBody = document.createElement(`div`);
        windowTaskBody.classList.add(`window_body`, `grid`);
        /**Main**/
        let windowTaskBodyMain = document.createElement(`form`);
        windowTaskBodyMain.classList.add(`window_main`);
        windowTaskBodyMain.method = `POST`;
        windowTaskBodyMain.action = `/description/${listId}/${cardId}`;
        let windowTaskBodyTextArea = document.createElement(`textarea`);
        windowTaskBodyTextArea.name = `card_description`;
        windowTaskBodyTextArea.innerHTML = board.listsOfBoard[listId].listCards[cardId].cardDescription;
        let windowTaskSaveCansel = document.createElement(`div`);
        windowTaskSaveCansel.classList.add(`save_cansel`, `grid`);
        let windowTaskSave = document.createElement(`button`);
        windowTaskSave.classList.add(`button`);
        windowTaskSave.innerHTML = `Add`;
        let windowTaskCansel = document.createElement(`a`);
        windowTaskCansel.href = `#`;
        windowTaskCansel.classList.add(`add_list_cansel`, `fa`, `fa-times`);
        /**Sidebar**/
        let windowTaskBodySidebar = document.createElement(`div`);
        windowTaskBodySidebar.classList.add(`window_sidebar`, `grid`);
        let windowTaskBodySidebarName = document.createElement(`span`);
        windowTaskBodySidebarName.classList.add(`window_sidebar_name`);
        windowTaskBodySidebarName.innerHTML = `Actions`;
        let windowTaskBodySidebarButtonMove = document.createElement(`a`);
        windowTaskBodySidebarButtonMove.href = `#`;
        windowTaskBodySidebarButtonMove.innerHTML = `&nbsp; Move`
        windowTaskBodySidebarButtonMove.classList.add(`window_sidebar_button`, `fa`, `fa-long-arrow-right`);
        let windowTaskBodySidebarButtonCopy = document.createElement(`a`);
        windowTaskBodySidebarButtonCopy.href = `#`;
        windowTaskBodySidebarButtonCopy.innerHTML = `&nbsp; Copy`
        windowTaskBodySidebarButtonCopy.classList.add(`window_sidebar_button`, `fa`, `fa-clone`);
        let windowTaskBodySidebarButtonDivForm = document.createElement(`div`);
        windowTaskBodySidebarButtonDivForm.classList.add(`window_sidebar_delete`);
        let windowTaskBodySidebarButtonForm = document.createElement(`form`);
        windowTaskBodySidebarButtonForm.action = `/deleteCard/${listId}/${cardId}`;
        windowTaskBodySidebarButtonForm.method = `POST`;
        let windowTaskBodySidebarButtonDelete = document.createElement(`a`);
        windowTaskBodySidebarButtonDelete.href = `#`;
        windowTaskBodySidebarButtonDelete.innerHTML = `&nbsp; Delete`
        windowTaskBodySidebarButtonDelete.classList.add(`window_sidebar_delete_a`, `fa`, `fa-trash`);

        windowTaskCansel.addEventListener('click', function () {
            removeChildren(windowTaskOverlayParent);
        });

        windowTaskHeaderClose.addEventListener('click', function () {
            removeChildren(windowTaskOverlayParent);
        });

        windowTaskBodySidebarButtonDivForm.addEventListener(`click`, function () {
            windowTaskBodySidebarButtonForm.submit();
        });

        windowTaskBodySidebarButtonMove.addEventListener('click', function () {
            windowMoveCards();
        });

        windowTaskBodySidebarButtonCopy.addEventListener('click', function () {
            windowCopyCards();
        });


        function windowMoveCards() {
            let windowMoveCadrsParent = document.createElement(`div`);
            windowMoveCadrsParent.style.position = `absolute`
            let windowMoveCadrs = document.createElement(`div`);
            windowMoveCadrs.classList.add(`move_task_window`);
            let windowMoveCadrsMain = document.createElement(`div`);
            windowMoveCadrsMain.classList.add(`move_copy_task_window_main`, `grid`);
            /*Header*/
            let windowMoveCadrsHeader = document.createElement(`div`);
            windowMoveCadrsHeader.classList.add(`move_copy_task_header`, `grid`);
            let windowMoveCadrsHeaderName = document.createElement(`span`);
            windowMoveCadrsHeaderName.classList.add(`move_copy_task_name`);
            windowMoveCadrsHeaderName.innerHTML = `Move Card`;
            let windowMoveCadrsHeaderClose = document.createElement(`a`);
            windowMoveCadrsHeaderClose.classList.add(`move_copy_task_cansell`, `fa`, `fa-times`);
            /*Body*/
            let windowMoveCadrsBody = document.createElement(`div`);
            windowMoveCadrsBody.classList.add(`move_copy_task_body`);
            let windowMoveCadrsBodyDivForm = document.createElement(`div`);
            windowMoveCadrsBodyDivForm.classList.add(`move_copy_task_form`);
            let windowMoveCadrsBodyForm = document.createElement(`form`);
            windowMoveCadrsBodyForm.classList.add(`task_move_form`, `grid`);
            windowMoveCadrsBodyForm.method = `POST`;
            windowMoveCadrsBodyForm.action = `/moveCard/${listId}/${cardId}`;
            /*Borad*/
            let windowMoveCadrsBodyFormBoard = document.createElement(`div`);
            windowMoveCadrsBodyFormBoard.classList.add(`move_copy_task_from_board`, `grid`);
            let windowMoveCadrsBodyFormBoardLabel = document.createElement(`span`);
            windowMoveCadrsBodyFormBoardLabel.classList.add(`label`);
            windowMoveCadrsBodyFormBoardLabel.innerHTML = `Board`;
            let windowMoveCadrsBodyFormBoardName = document.createElement(`span`);
            windowMoveCadrsBodyFormBoardName.classList.add(`name`);
            windowMoveCadrsBodyFormBoardName.innerHTML = board.boardName;
            let windowMoveCadrsBodyFormBoardSelect = document.createElement(`select`);
            windowMoveCadrsBodyFormBoardSelect.classList.add(`select_boards`);
            let windowMoveCadrsBodyFormBoardOptgroup = document.createElement(`optgroup`);
            windowMoveCadrsBodyFormBoardOptgroup.label = 'Boards';
            let windowMoveCadrsBodyFormBoardOption = document.createElement(`option`);
            windowMoveCadrsBodyFormBoardOption.innerHTML = board.boardName;
            windowMoveCadrsBodyFormBoardOption.value = board.boardID;
            windowMoveCadrsBodyFormBoardOption.selected = true;



            /*List*/
            let windowMoveCadrsBodyFormList = document.createElement(`div`);
            windowMoveCadrsBodyFormList.classList.add(`move_copy_task_from_list`, `grid`);
            let windowMoveCadrsBodyFormListLabel = document.createElement(`span`);
            windowMoveCadrsBodyFormListLabel.classList.add(`label`);
            windowMoveCadrsBodyFormListLabel.innerHTML = `List`;
            let windowMoveCadrsBodyFormListName = document.createElement(`span`);
            windowMoveCadrsBodyFormListName.classList.add('name');
            windowMoveCadrsBodyFormListName.innerHTML = board.listsOfBoard[listId].listName;
            let windowMoveCadrsBodyFormListSelect = document.createElement(`select`);
            windowMoveCadrsBodyFormListSelect.classList.add(`select_boards`);
            windowMoveCadrsBodyFormListSelect.name = 'card_select_list'


            /*Position*/
            let windowMoveCadrsBodyFormPosition = document.createElement(`div`);
            windowMoveCadrsBodyFormPosition.classList.add(`move_copy_task_from_position`, 'grid');
            let windowMoveCadrsBodyFormPositionLabel = document.createElement(`span`);
            windowMoveCadrsBodyFormPositionLabel.classList.add(`label`);
            windowMoveCadrsBodyFormPositionLabel.innerHTML = `Position`;
            let windowMoveCadrsBodyFormPositionName = document.createElement(`span`);
            windowMoveCadrsBodyFormPositionName.classList.add('name');
            windowMoveCadrsBodyFormPositionName.innerHTML = cardId + 1;
            let windowMoveCadrsBodyFormPositionSelect = document.createElement(`select`);
            windowMoveCadrsBodyFormPositionSelect.classList.add(`select_boards`);
            windowMoveCadrsBodyFormPositionSelect.name = 'card_select_position'
            /*Button*/
            let windowMoveCadrsBodyFormDivButton = document.createElement(`div`);
            windowMoveCadrsBodyFormDivButton.classList.add(`move_button`);
            let windowMoveCadrsBodyFormButton = document.createElement(`button`);
            windowMoveCadrsBodyFormButton.classList.add(`button`);
            windowMoveCadrsBodyFormButton.innerHTML = `Move`;




            windowTask.appendChild(windowMoveCadrsParent);
            windowMoveCadrsParent.appendChild(windowMoveCadrs);
            windowMoveCadrs.appendChild(windowMoveCadrsMain);
            windowMoveCadrsMain.appendChild(windowMoveCadrsHeader);
            windowMoveCadrsHeader.appendChild(windowMoveCadrsHeaderName);
            windowMoveCadrsHeader.appendChild(windowMoveCadrsHeaderClose);
            windowMoveCadrsMain.appendChild(windowMoveCadrsBody);
            windowMoveCadrsBody.appendChild(windowMoveCadrsBodyDivForm);
            windowMoveCadrsBodyDivForm.appendChild(windowMoveCadrsBodyForm);

            windowMoveCadrsBodyForm.appendChild(windowMoveCadrsBodyFormBoard);
            windowMoveCadrsBodyFormBoard.appendChild(windowMoveCadrsBodyFormBoardLabel);
            windowMoveCadrsBodyFormBoard.appendChild(windowMoveCadrsBodyFormBoardName);
            windowMoveCadrsBodyFormBoard.appendChild(windowMoveCadrsBodyFormBoardSelect);
            windowMoveCadrsBodyFormBoardSelect.appendChild(windowMoveCadrsBodyFormBoardOptgroup);
            windowMoveCadrsBodyFormBoardOptgroup.appendChild(windowMoveCadrsBodyFormBoardOption);

            windowMoveCadrsBodyForm.appendChild(windowMoveCadrsBodyFormList);
            windowMoveCadrsBodyFormList.appendChild(windowMoveCadrsBodyFormListLabel);
            windowMoveCadrsBodyFormList.appendChild(windowMoveCadrsBodyFormListName);
            windowMoveCadrsBodyFormList.appendChild(windowMoveCadrsBodyFormListSelect);
            for (let i = 0; i < board.listsOfBoard.length; i++) {
                let windowMoveCadrsBodyFormListOption = document.createElement('option');
                if (i == listId) windowMoveCadrsBodyFormListOption.selected = true;
                windowMoveCadrsBodyFormListOption.value = i; //value
                windowMoveCadrsBodyFormListOption.innerHTML = board.listsOfBoard[i].listName;
                windowMoveCadrsBodyFormListSelect.appendChild(windowMoveCadrsBodyFormListOption);
            }




            windowMoveCadrsBodyFormListSelect.addEventListener('input', function () {
                windowMoveCadrsBodyFormListName.innerHTML = windowMoveCadrsBodyFormListSelect[this.value].innerHTML;
                removeChildren(windowMoveCadrsBodyFormPositionSelect);


                if (board.listsOfBoard[windowMoveCadrsBodyFormListSelect.value].listCards.length == 0) {
                    let windowMoveCadrsBodyFormPositionOption = document.createElement('option');
                    windowMoveCadrsBodyFormPositionOption.selected = true;
                    windowMoveCadrsBodyFormPositionOption.value = 1; //value
                    windowMoveCadrsBodyFormPositionOption.innerHTML = windowMoveCadrsBodyFormPositionOption.value;
                    windowMoveCadrsBodyFormPositionName.innerHTML = 1;
                    windowMoveCadrsBodyFormPositionSelect.appendChild(windowMoveCadrsBodyFormPositionOption);
                    windowMoveCadrsBodyFormPositionSelect.value = windowMoveCadrsBodyFormPositionOption.value;
                } else {
                    for (let i = 0; i < board.listsOfBoard[windowMoveCadrsBodyFormListSelect.value].listCards.length; i++) {
                        let windowMoveCadrsBodyFormPositionOption = document.createElement('option');
                        if (i == cardId) windowMoveCadrsBodyFormPositionOption.selected = true;
                        windowMoveCadrsBodyFormPositionOption.value = i + 1; //value
                        windowMoveCadrsBodyFormPositionOption.innerHTML = windowMoveCadrsBodyFormPositionOption.value;
                        windowMoveCadrsBodyFormPositionName.innerHTML = cardId + 1;
                        windowMoveCadrsBodyFormPositionSelect.appendChild(windowMoveCadrsBodyFormPositionOption);
                    }

                    if (listId != windowMoveCadrsBodyFormListSelect.value) {
                        let windowMoveCadrsBodyFormPositionOption = document.createElement('option');
                        windowMoveCadrsBodyFormPositionOption.value = board.listsOfBoard[windowMoveCadrsBodyFormListSelect.value].listCards.length + 1; //value
                        windowMoveCadrsBodyFormPositionOption.innerHTML = windowMoveCadrsBodyFormPositionOption.value; //value+1
                        windowMoveCadrsBodyFormPositionName.innerHTML = windowMoveCadrsBodyFormPositionOption.value;
                        windowMoveCadrsBodyFormPositionSelect.appendChild(windowMoveCadrsBodyFormPositionOption);
                        windowMoveCadrsBodyFormPositionSelect.value = windowMoveCadrsBodyFormPositionOption.value;
                    }

                }
            });

            windowMoveCadrsBodyForm.appendChild(windowMoveCadrsBodyFormPosition);
            windowMoveCadrsBodyFormPosition.appendChild(windowMoveCadrsBodyFormPositionLabel);
            windowMoveCadrsBodyFormPosition.appendChild(windowMoveCadrsBodyFormPositionName);
            windowMoveCadrsBodyFormPosition.appendChild(windowMoveCadrsBodyFormPositionSelect);

            for (let i = 0; i < board.listsOfBoard[listId].listCards.length; i++) {
                let windowMoveCadrsBodyFormPositionOption = document.createElement('option');
                if (i == cardId) windowMoveCadrsBodyFormPositionOption.selected = true;
                windowMoveCadrsBodyFormPositionOption.value = i + 1; //value
                windowMoveCadrsBodyFormPositionOption.innerHTML = windowMoveCadrsBodyFormPositionOption.value;
                windowMoveCadrsBodyFormPositionName.innerHTML = cardId + 1;
                windowMoveCadrsBodyFormPositionSelect.appendChild(windowMoveCadrsBodyFormPositionOption);
            }


            windowMoveCadrsBodyFormPositionSelect.addEventListener('input', function () {
                windowMoveCadrsBodyFormPositionName.innerHTML = windowMoveCadrsBodyFormPositionSelect.value;
            });

            windowMoveCadrsBody.appendChild(windowMoveCadrsBodyFormDivButton);
            windowMoveCadrsBodyFormDivButton.appendChild(windowMoveCadrsBodyFormButton);

            windowMoveCadrsHeaderClose.addEventListener('click', function () {
                removeChildren(windowMoveCadrsParent);
            });

            windowMoveCadrsBodyFormButton.addEventListener('click', function () {
                windowMoveCadrsBodyForm.submit();
            });



        }

        function windowCopyCards() {
            let windowCopyCadrsParent = document.createElement(`div`);
            windowCopyCadrsParent.style.position = `absolute`
            let windowCopyCadrs = document.createElement(`div`);
            windowCopyCadrs.classList.add(`copy_task_window`);
            let windowCopyCadrsMain = document.createElement(`div`);
            windowCopyCadrsMain.classList.add(`move_copy_task_window_main`, `grid`);
            /*Header*/
            let windowCopyCadrsHeader = document.createElement(`div`);
            windowCopyCadrsHeader.classList.add(`move_copy_task_header`, `grid`);
            let windowCopyCadrsHeaderName = document.createElement(`span`);
            windowCopyCadrsHeaderName.classList.add(`move_copy_task_name`);
            windowCopyCadrsHeaderName.innerHTML = `Copy Card`;
            let windowCopyCadrsHeaderClose = document.createElement(`a`);
            windowCopyCadrsHeaderClose.classList.add(`move_copy_task_cansell`, `fa`, `fa-times`);
            /*Body*/
            let windowCopyCadrsBody = document.createElement(`div`);
            windowCopyCadrsBody.classList.add(`move_copy_task_body`);
            let windowCopyCadrsBodyDivForm = document.createElement(`div`);
            windowCopyCadrsBodyDivForm.classList.add(`move_copy_task_form`);
            let windowCopyCadrsBodyForm = document.createElement(`form`);
            windowCopyCadrsBodyForm.classList.add(`task_copy_form`, `grid`);
            windowCopyCadrsBodyForm.method = `POST`;
            windowCopyCadrsBodyForm.action = `/copyCard/${listId}/${cardId}`;
            let windowCopyCadrsBodyFormLabelTextarea = document.createElement(`span`);
            windowCopyCadrsBodyFormLabelTextarea.classList.add(`copy_name_forms`);
            windowCopyCadrsBodyFormLabelTextarea.innerHTML = `Title`;
            let windowCopyCadrsBodyFormTextarea = document.createElement(`textarea`);
            windowCopyCadrsBodyFormTextarea.classList.add(`copy_textarea`);
            windowCopyCadrsBodyFormTextarea.name = `copy_textarea`;
            windowCopyCadrsBodyFormTextarea.innerHTML = board.listsOfBoard[listId].listCards[cardId].cardText;
            let windowCopyCadrsBodyFormLabelPosition = document.createElement(`span`);
            windowCopyCadrsBodyFormLabelPosition.classList.add(`copy_name_forms`);
            windowCopyCadrsBodyFormLabelPosition.innerHTML = `Copy to ...`;


            /*Borad*/
            let windowCopyCadrsBodyFormBoard = document.createElement(`div`);
            windowCopyCadrsBodyFormBoard.classList.add(`move_copy_task_from_board`, `grid`);
            let windowCopyCadrsBodyFormBoardLabel = document.createElement(`span`);
            windowCopyCadrsBodyFormBoardLabel.classList.add(`label`);
            windowCopyCadrsBodyFormBoardLabel.innerHTML = `Board`;
            let windowCopyCadrsBodyFormBoardName = document.createElement(`span`);
            windowCopyCadrsBodyFormBoardName.classList.add(`name`);
            windowCopyCadrsBodyFormBoardName.innerHTML = board.boardName;
            let windowCopyCadrsBodyFormBoardSelect = document.createElement(`select`);
            windowCopyCadrsBodyFormBoardSelect.classList.add(`select_boards`);
            let windowCopyCadrsBodyFormBoardOptgroup = document.createElement(`optgroup`);
            windowCopyCadrsBodyFormBoardOptgroup.label = 'Boards';
            let windowCopyCadrsBodyFormBoardOption = document.createElement(`option`);
            windowCopyCadrsBodyFormBoardOption.innerHTML = board.boardName;
            windowCopyCadrsBodyFormBoardOption.value = board.boardID;
            windowCopyCadrsBodyFormBoardOption.selected = true;

            /*List*/
            let windowCopyCadrsBodyFormList = document.createElement(`div`);
            windowCopyCadrsBodyFormList.classList.add(`move_copy_task_from_list`, `grid`);
            let windowCopyCadrsBodyFormListLabel = document.createElement(`span`);
            windowCopyCadrsBodyFormListLabel.classList.add(`label`);
            windowCopyCadrsBodyFormListLabel.innerHTML = `List`;
            let windowCopyCadrsBodyFormListName = document.createElement(`span`);
            windowCopyCadrsBodyFormListName.classList.add('name');
            windowCopyCadrsBodyFormListName.innerHTML = board.listsOfBoard[listId].listName;
            let windowCopyCadrsBodyFormListSelect = document.createElement(`select`);
            windowCopyCadrsBodyFormListSelect.classList.add(`select_boards`);
            windowCopyCadrsBodyFormListSelect.name = 'card_copy_select_list'
            /*Position*/
            let windowCopyCadrsBodyFormPosition = document.createElement(`div`);
            windowCopyCadrsBodyFormPosition.classList.add(`move_copy_task_from_position`, 'grid');
            let windowCopyCadrsBodyFormPositionLabel = document.createElement(`span`);
            windowCopyCadrsBodyFormPositionLabel.classList.add(`label`);
            windowCopyCadrsBodyFormPositionLabel.innerHTML = `Position`;
            let windowCopyCadrsBodyFormPositionName = document.createElement(`span`);
            windowCopyCadrsBodyFormPositionName.classList.add('name');
            windowCopyCadrsBodyFormPositionName.innerHTML = cardId + 1;
            let windowCopyCadrsBodyFormPositionSelect = document.createElement(`select`);
            windowCopyCadrsBodyFormPositionSelect.classList.add(`select_boards`);
            windowCopyCadrsBodyFormPositionSelect.name = 'card_copy_select_position';
            /*Button*/
            let windowCopyCadrsBodyFormDivButton = document.createElement(`div`);
            windowCopyCadrsBodyFormDivButton.classList.add(`move_button`);
            let windowCopyCadrsBodyFormButton = document.createElement(`button`);
            windowCopyCadrsBodyFormButton.classList.add(`button`);
            windowCopyCadrsBodyFormButton.innerHTML = `Create Card`;


            windowTask.appendChild(windowCopyCadrsParent);
            windowCopyCadrsParent.appendChild(windowCopyCadrs);
            windowCopyCadrs.appendChild(windowCopyCadrsMain);
            windowCopyCadrsMain.appendChild(windowCopyCadrsHeader);
            windowCopyCadrsHeader.appendChild(windowCopyCadrsHeaderName);
            windowCopyCadrsHeader.appendChild(windowCopyCadrsHeaderClose);

            windowCopyCadrsMain.appendChild(windowCopyCadrsBody);
            windowCopyCadrsBody.appendChild(windowCopyCadrsBodyDivForm);
            windowCopyCadrsBodyDivForm.appendChild(windowCopyCadrsBodyForm);
            windowCopyCadrsBodyForm.appendChild(windowCopyCadrsBodyFormLabelTextarea);
            windowCopyCadrsBodyForm.appendChild(windowCopyCadrsBodyFormTextarea);
            windowCopyCadrsBodyForm.appendChild(windowCopyCadrsBodyFormLabelPosition);

            windowCopyCadrsBodyForm.appendChild(windowCopyCadrsBodyFormBoard);
            windowCopyCadrsBodyFormBoard.appendChild(windowCopyCadrsBodyFormBoardLabel);
            windowCopyCadrsBodyFormBoard.appendChild(windowCopyCadrsBodyFormBoardName);
            windowCopyCadrsBodyFormBoard.appendChild(windowCopyCadrsBodyFormBoardSelect);
            windowCopyCadrsBodyFormBoardSelect.appendChild(windowCopyCadrsBodyFormBoardOptgroup);
            windowCopyCadrsBodyFormBoardOptgroup.appendChild(windowCopyCadrsBodyFormBoardOption);

            windowCopyCadrsBodyForm.appendChild(windowCopyCadrsBodyFormList);
            windowCopyCadrsBodyFormList.appendChild(windowCopyCadrsBodyFormListLabel);
            windowCopyCadrsBodyFormList.appendChild(windowCopyCadrsBodyFormListName);
            windowCopyCadrsBodyFormList.appendChild(windowCopyCadrsBodyFormListSelect);
            for (let i = 0; i < board.listsOfBoard.length; i++) {
                let windowCopyCadrsBodyFormListOption = document.createElement('option');
                if (i == listId) windowCopyCadrsBodyFormListOption.selected = true;
                windowCopyCadrsBodyFormListOption.value = i; //value
                windowCopyCadrsBodyFormListOption.innerHTML = board.listsOfBoard[i].listName;
                windowCopyCadrsBodyFormListSelect.appendChild(windowCopyCadrsBodyFormListOption);
            }
            windowCopyCadrsBodyFormListSelect.addEventListener('input', function () {
                windowCopyCadrsBodyFormListName.innerHTML = windowCopyCadrsBodyFormListSelect[this.value].innerHTML;
                removeChildren(windowCopyCadrsBodyFormPositionSelect);


                if (board.listsOfBoard[windowCopyCadrsBodyFormListSelect.value].listCards.length == 0) {
                    let windowCopyCadrsBodyFormPositionOption = document.createElement('option');
                    windowCopyCadrsBodyFormPositionOption.selected = true;
                    windowCopyCadrsBodyFormPositionOption.value = 1; //value
                    windowCopyCadrsBodyFormPositionOption.innerHTML = windowCopyCadrsBodyFormPositionOption.value;
                    windowCopyCadrsBodyFormPositionName.innerHTML = 1;
                    windowCopyCadrsBodyFormPositionSelect.appendChild(windowCopyCadrsBodyFormPositionOption);
                    windowCopyCadrsBodyFormPositionSelect.value = windowCopyCadrsBodyFormPositionOption.value;
                } else {
                    for (let i = 0; i < board.listsOfBoard[windowCopyCadrsBodyFormListSelect.value].listCards.length; i++) {
                        let windowCopyCadrsBodyFormPositionOption = document.createElement('option');
                        if (i == cardId) windowCopyCadrsBodyFormPositionOption.selected = true;
                        windowCopyCadrsBodyFormPositionOption.value = i + 1; //value
                        windowCopyCadrsBodyFormPositionOption.innerHTML = windowCopyCadrsBodyFormPositionOption.value;
                        windowCopyCadrsBodyFormPositionName.innerHTML = windowCopyCadrsBodyFormPositionOption.value;
                        windowCopyCadrsBodyFormPositionSelect.appendChild(windowCopyCadrsBodyFormPositionOption);
                    }

                    if (listId != windowCopyCadrsBodyFormListSelect.value) {
                        let windowCopyCadrsBodyFormPositionOption = document.createElement('option');
                        windowCopyCadrsBodyFormPositionOption.value = board.listsOfBoard[windowCopyCadrsBodyFormListSelect.value].listCards.length + 1; //value
                        windowCopyCadrsBodyFormPositionOption.innerHTML = windowCopyCadrsBodyFormPositionOption.value; //value+1
                        windowCopyCadrsBodyFormPositionName.innerHTML = windowCopyCadrsBodyFormPositionOption.value;
                        windowCopyCadrsBodyFormPositionSelect.appendChild(windowCopyCadrsBodyFormPositionOption);
                        windowCopyCadrsBodyFormPositionSelect.value = windowCopyCadrsBodyFormPositionOption.value;
                    }

                }
            });

            windowCopyCadrsBodyForm.appendChild(windowCopyCadrsBodyFormPosition);
            windowCopyCadrsBodyFormPosition.appendChild(windowCopyCadrsBodyFormPositionLabel);
            windowCopyCadrsBodyFormPosition.appendChild(windowCopyCadrsBodyFormPositionName);
            windowCopyCadrsBodyFormPosition.appendChild(windowCopyCadrsBodyFormPositionSelect);
            for (let i = 0; i < board.listsOfBoard[listId].listCards.length; i++) {
                let windowCopyCadrsBodyFormPositionOption = document.createElement('option');
                if (i == cardId) windowCopyCadrsBodyFormPositionOption.selected = true;
                windowCopyCadrsBodyFormPositionOption.value = i + 1; //value
                windowCopyCadrsBodyFormPositionOption.innerHTML = windowCopyCadrsBodyFormPositionOption.value;
                windowCopyCadrsBodyFormPositionName.innerHTML = cardId + 1;
                windowCopyCadrsBodyFormPositionSelect.appendChild(windowCopyCadrsBodyFormPositionOption);
            }

            windowCopyCadrsBodyFormPositionSelect.addEventListener('input', function () {
                windowCopyCadrsBodyFormPositionName.innerHTML = windowCopyCadrsBodyFormPositionSelect.value;
            });

            windowCopyCadrsBody.appendChild(windowCopyCadrsBodyFormDivButton);
            windowCopyCadrsBodyFormDivButton.appendChild(windowCopyCadrsBodyFormButton);

            windowCopyCadrsHeaderClose.addEventListener('click', function () {
                removeChildren(windowCopyCadrsParent);
            });

            windowCopyCadrsBodyFormButton.addEventListener('click', function () {
                windowCopyCadrsBodyForm.submit();
            });
        }













        document.body.appendChild(windowTaskOverlayParent);
        windowTaskOverlayParent.appendChild(windowTaskOverlay);
        windowTaskOverlay.appendChild(windowTask);
        windowTask.appendChild(windowTaskPosition);

        windowTaskPosition.appendChild(windowTaskHeader);
        windowTaskHeader.appendChild(windowTaskHeaderIcon);
        windowTaskHeader.appendChild(windowTaskHeaderNameTask);
        windowTaskHeader.appendChild(windowTaskHeaderClose);
        windowTaskHeader.appendChild(windowTaskHeaderList);

        windowTaskPosition.appendChild(windowTaskBody);

        windowTaskBody.appendChild(windowTaskBodyMain);
        windowTaskBodyMain.appendChild(windowTaskBodyTextArea);
        windowTaskBodyMain.appendChild(windowTaskSaveCansel);
        windowTaskSaveCansel.appendChild(windowTaskSave);
        windowTaskSaveCansel.appendChild(windowTaskCansel);

        windowTaskBody.appendChild(windowTaskBodySidebar);
        windowTaskBodySidebar.appendChild(windowTaskBodySidebarName);
        windowTaskBodySidebar.appendChild(windowTaskBodySidebarButtonMove);
        windowTaskBodySidebar.appendChild(windowTaskBodySidebarButtonCopy);
        windowTaskBodySidebar.appendChild(windowTaskBodySidebarButtonDivForm);
        windowTaskBodySidebarButtonDivForm.appendChild(windowTaskBodySidebarButtonForm);
        windowTaskBodySidebarButtonForm.appendChild(windowTaskBodySidebarButtonDelete);
    }



    /***Building List***/
    buildingList();
    buildingPopMenu();

    function buildingList() {
        /*Building list*/
        main.insertBefore(boardLists, add_button);
        boardLists.appendChild(boardList);
        /*header*/
        boardList.appendChild(listHeader);
        listHeader.appendChild(listName);
        listHeader.appendChild(button_pop);
        /*body*/
        boardList.appendChild(listBody);
        listBody.appendChild(listAddCard);
        listAddCard.appendChild(listAddCardForm);
        listAddCardForm.appendChild(listAddCardFormTextarea);
        listAddCardFormTextarea.appendChild(listAddCardTextarea);
        listAddCardForm.appendChild(listAddCardSaveMenu);
        listAddCardSaveMenu.appendChild(listAddCardSaveButton);
        listAddCardSaveMenu.appendChild(listAddCardSaveCansel);

        /*Footer*/
        boardList.appendChild(listFooter);
        listFooter.appendChild(listFooterButton);

        /*Event list*/
        listFooterButton.addEventListener('click', function () {
            listAddCard.style.display = 'grid';
            listFooter.style.display = 'none';
        });

        button_pop.addEventListener('click', function () {
            listPopMenu.style.display = 'block';
        });

        listAddCardSaveCansel.addEventListener('click', function () {
            listAddCard.style.display = 'none';
            listFooter.style.display = 'grid';
        });

    }

    function CardLoad(cardId, listCards) {
        let ListCard = document.createElement("div");
        ListCard.classList.add("board_list_card");
        ListCard.innerHTML = listCards[cardId].cardText;
        ListCard.addEventListener('click', function () {
            overlay(id, cardId);
        });

        listBody.insertBefore(ListCard, listAddCard);
    }

    /*Load cards*/
    for (let i = 0; i < board.listsOfBoard[id].listCards.length; i++) {
        new CardLoad(i, board.listsOfBoard[id].listCards);
    }



    function buildingPopMenu() {
        /*******Buldgin Copy Window******/
        let listPopMenuWindowCopy = document.createElement('div');
        listPopMenuWindowCopy.classList.add('pop_task_copy');
        let listPopMenuWindowCopyForm = document.createElement('form');
        listPopMenuWindowCopyForm.classList.add('pop_task_copy_form', 'grid');
        listPopMenuWindowCopyForm.action = `/copyList/${id}`;
        listPopMenuWindowCopyForm.method = 'POST';
        let listPopMenuWindowCopyFormLabel = document.createElement('label');
        listPopMenuWindowCopyFormLabel.classList.add('copy_name_forms');
        listPopMenuWindowCopyFormLabel.innerHTML = 'Name';
        let listPopMenuWindowCopyFormTextarea = document.createElement('textarea');
        listPopMenuWindowCopyFormTextarea.classList.add('copy_textarea');
        listPopMenuWindowCopyFormTextarea.id = 'pop_copy_form_textarea';
        listPopMenuWindowCopyFormTextarea.name = 'pop_copy_form_textarea';
        listPopMenuWindowCopyFormTextarea.innerHTML = board.listsOfBoard[id].listName;
        let listPopMenuWindowFormCopyButton = document.createElement('button');
        listPopMenuWindowFormCopyButton.classList.add('button');
        listPopMenuWindowFormCopyButton.innerHTML = 'Create List';
        /*******Buldgin Move Window******/
        let listPopMenuWindowMove = document.createElement('div');
        listPopMenuWindowMove.classList.add('pop_task_move');
        let listPopMenuWindowMoveForm = document.createElement('form');
        listPopMenuWindowMoveForm.classList.add('pop_task_move_form', 'grid');
        listPopMenuWindowMoveForm.action = `/moveList/${id}`;
        listPopMenuWindowMoveForm.method = 'POST';
        /*Board*/
        let listPopMenuWindowMoveFormBoard = document.createElement('div');
        listPopMenuWindowMoveFormBoard.classList.add('move_copy_task_from_board', 'grid');
        let listPopMenuWindowMoveFormBoardLabel = document.createElement('span');
        listPopMenuWindowMoveFormBoardLabel.classList.add('label');
        listPopMenuWindowMoveFormBoardLabel.innerHTML = 'Board';
        let listPopMenuWindowMoveFormBoardName = document.createElement('span');
        listPopMenuWindowMoveFormBoardName.classList.add('name');
        listPopMenuWindowMoveFormBoardName.innerHTML = board.boardName;
        let listPopMenuWindowMoveFormBoardSelect = document.createElement('select');
        listPopMenuWindowMoveFormBoardSelect.classList.add('select_boards');
        let listPopMenuWindowMoveFormBoardOptgroup = document.createElement('optgroup');
        listPopMenuWindowMoveFormBoardOptgroup.label = 'Boards';

        let listPopMenuWindowMoveFormBoardOption = document.createElement('option');
        listPopMenuWindowMoveFormBoardOption.value = board.boardID;
        listPopMenuWindowMoveFormBoardOption.innerHTML = board.boardName;


        /*Position*/

        let listPopMenuWindowMoveFormPosition = document.createElement('div');
        listPopMenuWindowMoveFormPosition.classList.add('pop_move_list_form_position', 'grid');
        let listPopMenuWindowMoveFormPositionLabel = document.createElement('span');
        listPopMenuWindowMoveFormPositionLabel.classList.add('label');
        listPopMenuWindowMoveFormPositionLabel.innerHTML = 'Position';
        let listPopMenuWindowMoveFormPositionName = document.createElement('span');
        listPopMenuWindowMoveFormPositionName.classList.add('name');
        listPopMenuWindowMoveFormPositionName.innerHTML = id + 1;
        let listPopMenuWindowMoveFormPositionSelect = document.createElement('select');
        listPopMenuWindowMoveFormPositionSelect.name = `list_Position`;
        listPopMenuWindowMoveFormPositionSelect.classList.add('select_boards');



        for (let i = 0; i < board.listsOfBoard.length; i++) {
            let listPopMenuWindowMoveFormPositionOption = document.createElement('option');
            listPopMenuWindowMoveFormPositionOption.value = i + 1; //мб

            listPopMenuWindowMoveFormPositionOption.innerHTML = i + 1;
            listPopMenuWindowMoveFormPositionSelect.appendChild(listPopMenuWindowMoveFormPositionOption);
        }


        let listPopMenuWindowMoveFormDivButton = document.createElement('div');
        listPopMenuWindowMoveFormDivButton.classList.add('move_button');
        let listPopMenuWindowMoveFormButton = document.createElement('button');
        listPopMenuWindowMoveFormButton.classList.add('button');
        listPopMenuWindowMoveFormButton.innerHTML = 'Move';

        listPopMenuWindowMoveFormPositionSelect.addEventListener('input', function () {
            listPopMenuWindowMoveFormPositionName.innerHTML = listPopMenuWindowMoveFormPositionSelect.value;
        });



        boardList.appendChild(listPopMenu);
        listPopMenu.appendChild(listPopMenuMain);
        /*Header*/
        listPopMenuMain.appendChild(listPopMenuHeader);
        listPopMenuHeader.appendChild(listPopMenuHeaderText);
        listPopMenuHeader.appendChild(listPopMenuHeaderClose);
        listPopMenuHeader.appendChild(listPopMenuHeaderBack);
        /*Body*/
        listPopMenuMain.appendChild(listPopMenuBody);
        listPopMenuBody.appendChild(listPopMenuBodyMenu);
        /*Copy*/
        listPopMenuBodyMenu.appendChild(listPopMenuBodyMenuLiCopy);
        listPopMenuBodyMenuLiCopy.appendChild(listPopMenuBodyMenuCopy);
        /*Move*/
        listPopMenuBodyMenu.appendChild(listPopMenuBodyMenuLiMove);
        listPopMenuBodyMenuLiMove.appendChild(listPopMenuBodyMenuMove);
        /*Delite*/
        listPopMenuBodyMenu.appendChild(listPopMenuBodyMenuLiDelete);
        listPopMenuBodyMenuLiDelete.appendChild(listPopMenuBodyMenuLiFormDelete);
        listPopMenuBodyMenuLiFormDelete.appendChild(listPopMenuBodyMenuDelete);


        /*Event list pop menu*/
        listPopMenuHeaderClose.addEventListener('click', function () {
            listPopMenu.style.display = 'none';
            listPopMenuWindowCopy.style.display = 'none';
            listPopMenuWindowMove.style.display = 'none';
            listPopMenuBodyMenu.style.display = 'block'
            listPopMenuHeaderBack.style.display = 'none';
        });

        listPopMenuHeaderBack.addEventListener('click', function () {
            listPopMenuWindowCopy.style.display = 'none';
            listPopMenuWindowMove.style.display = 'none';
            listPopMenuBodyMenu.style.display = 'block'
            listPopMenuHeaderBack.style.display = 'none';
        });

        listPopMenuBodyMenuCopy.addEventListener('click', function () {

            listPopMenuWindowCopy.style.display = 'block';
            listPopMenuWindowMove.style.display = 'none';
            listPopMenuBodyMenu.style.display = 'none'
            listPopMenuHeaderBack.style.display = 'block';


        });

        listPopMenuBodyMenuMove.addEventListener('click', function () {

            listPopMenuWindowCopy.style.display = 'none';
            listPopMenuWindowMove.style.display = 'block';
            listPopMenuBodyMenu.style.display = 'none'
            listPopMenuHeaderBack.style.display = 'block';
        });

        listPopMenuBodyMenuDelete.addEventListener('click', function () {

        });



        openPopWindowCopyMove();

        /*Copy window*/
        function openPopWindowCopyMove() {
            /*Copy window*/
            listPopMenuBody.appendChild(listPopMenuWindowCopy);
            listPopMenuWindowCopy.appendChild(listPopMenuWindowCopyForm);
            listPopMenuWindowCopyForm.appendChild(listPopMenuWindowCopyFormLabel);
            listPopMenuWindowCopyForm.appendChild(listPopMenuWindowCopyFormTextarea);
            listPopMenuWindowCopyForm.appendChild(listPopMenuWindowFormCopyButton);

            /*move window*/
            listPopMenuBody.appendChild(listPopMenuWindowMove);
            listPopMenuWindowMove.appendChild(listPopMenuWindowMoveForm);
            /*Board*/
            listPopMenuWindowMoveForm.appendChild(listPopMenuWindowMoveFormBoard);
            listPopMenuWindowMoveFormBoard.appendChild(listPopMenuWindowMoveFormBoardLabel);
            listPopMenuWindowMoveFormBoard.appendChild(listPopMenuWindowMoveFormBoardName);
            listPopMenuWindowMoveFormBoard.appendChild(listPopMenuWindowMoveFormBoardSelect);
            listPopMenuWindowMoveFormBoardSelect.appendChild(listPopMenuWindowMoveFormBoardOptgroup);


            listPopMenuWindowMoveFormBoardOptgroup.appendChild(listPopMenuWindowMoveFormBoardOption);




            /*Position*/
            listPopMenuWindowMoveForm.appendChild(listPopMenuWindowMoveFormPosition);
            listPopMenuWindowMoveFormPosition.appendChild(listPopMenuWindowMoveFormPositionLabel);
            listPopMenuWindowMoveFormPosition.appendChild(listPopMenuWindowMoveFormPositionName);
            listPopMenuWindowMoveFormPosition.appendChild(listPopMenuWindowMoveFormPositionSelect);

            listPopMenuWindowMoveForm.appendChild(listPopMenuWindowMoveFormDivButton);
            listPopMenuWindowMoveFormDivButton.appendChild(listPopMenuWindowMoveFormButton);

        }




    }

    function removeChildren(elem) {
        while (elem.lastChild) {
            elem.removeChild(elem.lastChild);
        }
    }


}




