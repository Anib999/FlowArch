let base_url = $('#base_url').val();
let boardGrid;
let columnGrids = [];

document.addEventListener('DOMContentLoaded', function () {

  $.ajax({
    url : base_url+'Lister/getAllKanbanData',
    dataType: 'json',
    method: 'post',
    success: function(res){
      let newCount = '';
      let gridKeys = res.map(item => item.status)
      .filter((value, index, self) => self.indexOf(value) === index).sort();
      boardMake(gridKeys);
      //addColumn(gridKeys);
      for (let resDa in res) {
        console.log(res[resDa]);
        if(res[resDa].status){
          let resItem = generateBoardItem(res[resDa]);
          columnGrids['g_'+res[resDa].status].add([resItem]);
          console.log(res[resDa].status);
          console.log('added');
        }
      }
    },
    error: function(err){
      console.log('error');
    }
  });

  function boardMake(gridKeysVal){
    boardGrid = new Muuri('.board', {
      items: generateBoards(gridKeysVal),
      layoutDuration: 400,
      layoutEasing: 'ease',
      dragEnabled: true,
      dragSortInterval: 0,
      dragStartPredicate: {
        handle: '.board-column-header'
      },
      dragReleaseDuration: 400,
      dragReleaseEasing: 'ease'
    });

    let docElem = document.documentElement;
    let kanban = document.querySelector('.kanban-board');
    let board = kanban.querySelector('.board');
    let itemContainers = Array.prototype.slice.call(kanban.querySelectorAll('.board-column-content'));
    let dragCounter = 0;

    itemContainers.forEach(function (container) {

      let muuri = new Muuri(container, {
        items: '.board-item',
        layoutDuration: 400,
        layoutEasing: 'ease',
        dragEnabled: true,
        dragSort: function () {
          return Object.values(columnGrids);
        },
        dragStartPredicate: {
          distance: 10,
          delay: 1,
        },
        dragSortInterval: 0,
        dragContainer: document.body,
        dragReleaseDuration: 400,
        dragReleaseEasing: 'ease',
        dragSortPredicate: {
          action: 'move'
        },
      })
      .on('dragStart', function (item) {
        ++dragCounter;
        docElem.classList.add('dragging');
        item.getElement().style.width = item.getWidth() + 'px';
        item.getElement().style.height = item.getHeight() + 'px';
      })
      .on('dragEnd', function (item) {
        if (--dragCounter < 1) {
          docElem.classList.remove('dragging');
        }
      })
      .on('dragReleaseEnd', function (item) {
        let currentItem = item.getElement();
        item.getElement().style.width = '';
        item.getElement().style.height = '';
        //get id of released grid.item
        let headGridItem = item.getGrid()._element.dataset.id;
        let itemGrid = item.getElement().dataset.id;
        if(currentItem.dataset.status != headGridItem){
          $.ajax({
            url: base_url+'Lister/updateKanbanData',
            data: {id:itemGrid, status:headGridItem},
            method: 'post',
            success: function(res){
              console.log('success');
            },
            error: function(res){
              console.log('error');
            }
          });
          currentItem.dataset.status = headGridItem;
        }
        //get and ajax
        Object.keys(columnGrids).forEach(i=>{
          columnGrids[i].refreshItems()
        });
        /*columnGrids.forEach(function (muuri) {
          muuri.refreshItems();
        });*/
      })
      .on('layoutStart', function () {
        boardGrid.refreshItems().layout();
      })
      //columnGrids.push(muuri);
      columnGrids['g_'+container.dataset.id] = muuri;
    });
  }

  function generateBoardItem(item) {
    //console.log(item);
    let itemElem = document.createElement('div');
    let itemTemplate = '' +
    '<div class="board-item" data-id="'+ item.id + '" data-status="'+item.status+'">' +
    '<div class="board-item-content">' +
    '<p class="board-title">' + item.data + '</p>' +
    '</div>' +
    '</div>';

    itemElem.innerHTML = itemTemplate;
    return itemElem.firstChild;
  }

  function generateBoards(count) {
    let boards = [];
    //console.log(count);
    //for (let i = 0; i < count; i++) {
    count.forEach(i=>{
      //console.log(i);
      let board = generateBoard(i);
      boards.push(board);
    })
    return boards;
  }

  function generateBoard(index) {
    let itemElem = document.createElement('div');
    let itemTemplate = '' +
    '<div class="board-column">' +
    '<div class="board-column-header">' + index + '</div>' +
    '<div class="board-column-content" data-id="' + index + '"></div>' +
    '<div class="board-column-footer addJob" data-fid="'+index+'"> Add a Job </div>'+
    '</div>';
    itemElem.innerHTML = itemTemplate;
    return itemElem.firstChild;
  }

  function generateCard(){
    let itemElem = document.createElement('div');
    let itemTemplate = '' +
    '<div class="board-item" data-id="" data-status="">' +
    '<div class="board-item-content">' +
    '<p class="board-title">Title</p>' +
    '</div>' +
    '</div>';

    itemElem.innerHTML = itemTemplate;
    return itemElem.firstChild;
  }

  $('#addCol').on('click',function(e){
    e.preventDefault();
    var gridKeys = Object.keys(columnGrids);
    var newGridKey = gridKeys[gridKeys.length-1].split('_')[1]+1;

    while(true){
      if(gridKeys['g_'+newGridKey] == undefined){
        break;
      }else{
        newGridKey ++;
      }
    }

    addColumn(newGridKey);
  })

  $('body').on('click', '.addJob', function(e){
    let status = $(this).attr('data-fid');
    let cardGen = generateCard();
    columnGrids['g_'+status].add([cardGen]);

    $.ajax({
      url:base_url+"Lister/insertKanbanData",
      data: {status:status},
      method:'post',
      success: function(res){
        console.log('success');
      },
      error: function(res){
        console.log('error');
      }
    })

  })

  function addColumn(gridKeysVal){
    console.log(gridKeysVal);
    let board = generateBoard(gridKeysVal);

      boardGrid.add([board]);
      //todo
      columnGrids['g_'+gridKeysVal];
  }

});
