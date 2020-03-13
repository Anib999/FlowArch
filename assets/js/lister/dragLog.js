seeer = '';
$(document).ready(function(){
  let base_url = $('#base_url').val();

  jobLogCaller();

  function jobLogCaller(){
    $('.boards').empty();
    $.ajax({
      url: base_url+'Department/getKanbanDataDep',
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
        dragSort: false,
      })
      .on('layoutStart', function () {
        // boardGrid.refreshItems().layout();
      })
      .on('dragReleaseStart', function(item){
        let currentItem = item.getElement();
        columnGrids['g_0'].hide([currentItem]);
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

  $('body').on('click','.acceptor',function(e){
    $("#editJobDepModal").modal('show');
    seeer = this;
    $.ajax({
      url: base_url+'Department/getKanbanDataId',
      method: 'post',
      data : {dep_id: this.dataset.id},
      dataType: 'json'
    }).done(function(res){
      for (var resDa in res) {
        if (res.hasOwnProperty(resDa)) {
          $('#editJobDepModal .modal-body .dep_'+resDa).val(res[resDa]);
        }
      }
    }).fail(function(res){
      console.log('error');
    })
  });
  $('.job_bu').on('click',function(e){
    e.preventDefault();
    var _form = $('#editJobDepForm');
    var data = {};
    var formValid = true;
    $('select,input,textarea',_form).each(function(){
      if(!this.checkValidity()){
        formValid = false;
      }
      data[this.name] = this.value;
    });
    if(!formValid){
      return;
    }

    data['status'] = 0;
    if(e.target.name=='acc_job'){
      data.status = 1;
    }
    $.ajax({
      url: base_url+'Department/updateKanbanData',
      data: data,
      method: 'post',
      dataType:'json',
    }).done(function(res){
      if(res.job_status){
        if(data.status == 1){
          Swal.fire({
            icon:'success',
            title: 'Job Accepted',
            showConfirmButton: false,
            timer: 1500
          });
          columnGrids['g_'+'0'].remove([seeer], {removeElements: true});
        }else{
          Swal.fire({
            icon:'error',
            title: 'Job Rejected',
            showConfirmButton: false,
            timer: 1500
          });
        }
      }
    }).fail(function(res){
      console.log('error');
    })
    setTimeout(function(e){
      $('body').css('padding-right','');
    },2500);

  })

  $('#save_job').on('click',function(){
      setTimeout(function(){
        jobLogCaller();
      },300);
  })
})
