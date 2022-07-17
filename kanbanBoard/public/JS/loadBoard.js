fetch('/json')
    .then((response) => { return response.json(); })
    .then(function (board) {
        document.getElementById('button_rename').innerHTML = board.boardName;

        for (let i = 0; i < board.listsOfBoard.length; i++) {
            new ListLoad(i, board);
        }

        console.log(board.boardActivityList);
        for (let j = 0; j < board.boardActivityList.length; j++) {
            new ListActions(board.boardActivityList[j]);
        }

    });

function ListActions(activityList) {
    let menuActionList = document.getElementById(`action_list`);
    let listActionsItems = document.createElement(`div`);
    listActionsItems.classList.add(`menu_action_list_item`, `grid`);
    let listActionsItemsAvatar = document.createElement(`div`);
    listActionsItemsAvatar.classList.add(`menu_action_list_item_avatar`);
    let listActionsItemsTitle = document.createElement(`div`);
    listActionsItemsTitle.classList.add(`menu_action_list_item_title`);
    let listActionsItemsAction = document.createElement(`div`);
    listActionsItemsAction.classList.add(`menu_action_list_item_action`);
    listActionsItemsAction.innerHTML = activityList.action;
    let listActionsItemsTime = document.createElement(`p`);
    listActionsItemsTime.classList.add(`menu_action_list_item_time`);
    listActionsItemsTime.innerHTML = activityList.time;


    menuActionList.appendChild(listActionsItems);
    listActionsItems.appendChild(listActionsItemsAvatar);
    listActionsItems.appendChild(listActionsItemsTitle);
    listActionsItemsTitle.appendChild(listActionsItemsAction);
    listActionsItemsTitle.appendChild(listActionsItemsTime);
}