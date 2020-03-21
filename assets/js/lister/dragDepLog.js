$(document).ready(function(){
  let base_url = $('#base_url').val();

  jobLogCaller();

  function jobLogCaller(){
    $.ajax({
      url: base_url+'Lister/getKanbanDataPendRej',
      dataType: 'json',
      method: 'post'
    }).done(function(res){
      let kanData = res.kandata;

      let kanTitle = [{"id": "0", "title": "BackLogs", "dep_type": "0"}];

      $('#loader').hide();
      boardMake(kanTitle);
      for (let resDa in res) {
        if(res[resDa].job_status == null || res[resDa].job_status == 0){
          let resItem = generateBoardItem(res[resDa]);
          columnGrids['g_'+'0'].add([resItem]);
        }
      }
    }).fail(function(res){
      console.log('error');
    })
  }

  function boardMake(gridKeysVal){
    boardGrid = new Muuri('.boards', {
      items: generateBoards(gridKeysVal),
      layoutDuration: 400,
      layoutEasing: 'ease',
      dragEnabled: false
    });

    let docElem = document.documentElement;
    let kanban = document.querySelector('.kanban-board');
    let board = kanban.querySelector('.boards');
    let itemContainers = Array.prototype.slice.call(kanban.querySelectorAll('.board-column-contents'));
    let dragCounter = 0;

    itemContainers.forEach(function (container) {

      let muuri = new Muuri(container, {
        items: '.board-items',
        layoutDuration: 400,
        layoutEasing: 'ease',
        dragEnabled: false,
      })
      .on('layoutStart', function () {
        boardGrid.refreshItems().layout();
      })
      columnGrids['g_'+container.dataset.id] = muuri;
    });
  }

  function generateBoardItem(item) {
    let itemElem = document.createElement('div');
    let itemTemplate = '' +
    '<div class="board-items acceptor" data-id="'+ item.id + '" data-status="'+item.status+'"  >' +
    '<div class="board-item-content">' +
    '<p class="board-title">' + item.data + '</p>' +
    '<div class="board-description">'+item.job_description+'</div>'+
    '</div>' +
    '</div>';

    itemElem.innerHTML = itemTemplate;
    return itemElem.firstChild;
  }

  function generateBoards(count) {
    let boards = [];
    count.forEach(i=>{
      let board = generateBoard(i);
      boards.push(board);
    })
    return boards;
  }

  function generateBoard(index) {
    let itemElem = document.createElement('div');
    let itemTemplate = '' +
    '<div class="board-columns '+index.title.toLowerCase() +'">' +
    '<div class="board-column-header">' + index.title.toUpperCase() + '</div>' +
    '<div class="board-column-contents" data-id="' + index.id + '"></div>' +
    '</div>';
    itemElem.innerHTML = itemTemplate;
    return itemElem.firstChild;
  }

})
