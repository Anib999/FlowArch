let boardGrid;
let columnGrids = [];
let gridCol;
$(document).ready(function(){
  let base_url = $('#base_url').val();

  jobViewCaller();

  function jobViewCaller(){
    $.ajax({
      url: base_url+'Lister/getKanbanDataView',
      dataType: 'json',
      method: 'post'
    }).done(function(res){
      let newCount = '';
      let kanData = res.kandata;
      let kanTitle = res.kantitle;

      $('#loader').hide();
      boardMake(kanTitle);

      for (let resDa in kanData) {
        if(kanData[resDa].job_status != null && kanData[resDa].job_status != 0){
          if(kanData[resDa].status){
            let resItem = generateBoardItem(kanData[resDa]);
            if(columnGrids['g_'+kanData[resDa].status] != undefined){
              columnGrids['g_'+kanData[resDa].status].add([resItem]);
            }
          }
        }
      }
      gridCol = $('.board-column');
      setTimeout(function(){
        var translateXPos = 0;
        gridCol.each(function(i){
          translateXPos += 178;
          this.style.transform = 'translateX('+translateXPos+'px) translateY(0px)';
        })
      },100);

      toastr.options.positionClass = "toast-bottom-right";
      toastr.warning('3','Job pending');
      toastr.error('2','Job Rejected');
    }).fail(function(res){
      console.log('error');
    })
  }

  $(window).on('resize',function(e){
    setTimeout(function(){
      var translateXPos = 0;
      var maxBoardHeight = 0;
      gridCol.each(function(i){
        translateXPos += 178;
        this.style.transform = 'translateX('+translateXPos+'px) translateY(0px)';
        if(maxBoardHeight < this.clientHeight)
          maxBoardHeight = this.clientHeight;
      })
      $('.board.muuri').css('height',(maxBoardHeight+23.5)+'px')
    },300)
  });
  if(window.innerWidth < 720){
    $(window).trigger('resize');
  }

  function boardMake(gridKeysVal){
    boardGrid = new Muuri('.board', {
      items: generateBoards(gridKeysVal),
      layoutDuration: 400,
      layoutEasing: 'ease',
      dragEnabled: false
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
    '<div class="board-item contner '+item.job_priority+'" data-id="'+ item.id + '" data-status="'+item.status+'"  >' +
    '<div class="board-item-content">' +
    '<p class="board-title">' + item.data + '</p>' +
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
    '<div class="board-column '+index.title.toLowerCase() +'">' +
    '<div class="board-column-header">' + index.title.toUpperCase() + '</div>' +
    '<div class="board-column-content" data-id="' + index.id + '"></div>' +
    '</div>';
    itemElem.innerHTML = itemTemplate;
    return itemElem.firstChild;
  }


})
