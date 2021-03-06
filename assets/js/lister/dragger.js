let base_url = $('#base_url').val();
let boardGrid;
let columnGrids = [];
let gridCol;
let url = new URL(window.location.href);
let urlId = url.searchParams.get('dep_type');
depInsData = '';
document.addEventListener('DOMContentLoaded', function () {
  jobCaller();

  // function jobCaller(){
  //   $.ajax({
  //     url : base_url+'Lister/getAllKanbanData',
  //     dataType: 'json',
  //     method: 'post',
  //     success: function(res){
  //       let newCount = '';
  //       let kanData = res.kandata;
  //       let kanTitle = res.kantitle;
  //
  //       boardMake(kanTitle);
  //
  //       for (let resDa in kanData) {
  //         if(kanData[resDa].status){
  //           let resItem = generateBoardItem(kanData[resDa]);
  //           columnGrids['g_'+kanData[resDa].status].add([resItem]);
  //         }
  //       }
  //     },
  //     error: function(err){
  //       console.log('error');
  //     }
  //   });
  // }

  function jobCaller(){
    //needs to be checked
    $('.board').empty();
    $.ajax({
      url : base_url+'Lister/getKanbanDataDep?dep_type='+urlId,
      dataType: 'json',
      method: 'post',
      success: function(res){
        let newCount = '';
        let kanData = res.kandata;
        let kanTitle = res.kantitle;
        let kanDepIns = res.kanstatus;
        depInsData = kanDepIns.id;
        $('#loader').hide();
        boardMake(kanTitle);
        //console.log(kanData);
        for (let resDa in kanData) {
          if(kanData[resDa].job_status != null && kanData[resDa].job_status != 0){
            if(kanData[resDa].status){
              let resItem = generateBoardItem(kanData[resDa]);
              if(columnGrids['g_'+kanData[resDa].status] != undefined){
                columnGrids['g_'+kanData[resDa].status].add([resItem]);

                //for count bages show only on reload
                $('.badge.g_'+kanData[resDa].status).empty();
                $('.badge.g_'+kanData[resDa].status).append(columnGrids['g_'+kanData[resDa].status]._items.length);
                //for count bages show only on reload
              }
            }
          }
        }
        gridCol = $('.board-column');
        setTimeout(function(){
          var translateXPos = 0;
          var maxBoardHeight = 0;
          gridCol.each(function(i){
            translateXPos += 356;
            this.style.transform = 'translateX('+translateXPos+'px) translateY(0px)';
            if(maxBoardHeight < this.clientHeight)
            maxBoardHeight = this.clientHeight;
          })
          $('.board.muuri').css('height',(maxBoardHeight+23.5)+'px')
        },100)

      },
      error: function(err){
        $('#loader').hide();
        Swal.fire({
          icon: 'error',
          title: 'error fetching data'
        })
      }
    });
  }

  $(window).on('resize',function(e){
    setTimeout(function(){
      var translateXPos = 0;
      var maxBoardHeight = 0;
      gridCol.each(function(i){
        //if(i == 0)
        //this.style.transform = 'translateX(0px) translateY(0px)';
        //else {
        translateXPos += 356;
        this.style.transform = 'translateX('+translateXPos+'px) translateY(0px)';
        if(maxBoardHeight < this.clientHeight)
        maxBoardHeight = this.clientHeight;
        //}
      })
      $('.board.muuri').css('height',(maxBoardHeight+23.5)+'px')
    },300)

  })
  if(window.innerWidth < 720){
    $(window).trigger('resize');
  }

  function boardMake(gridKeysVal){
    boardGrid = new Muuri('.board', {
      items: generateBoards(gridKeysVal),
      layoutDuration: 400,
      layoutEasing: 'ease',
      dragEnabled: false,
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

        console.log(currentItem);
        console.log(item.getGrid()._element);
        let currentItemStat = currentItem.dataset.status;
        if(currentItem.dataset.status != headGridItem){
          $.ajax({
            url: base_url+'Lister/updateKanbanData',
            data: {id:itemGrid, status:headGridItem, pre_status: currentItemStat},
            method: 'post',
            success: function(res){
              //console.log('success');

            },
            error: function(res){
              console.log('error');
            }
          });
          currentItem.dataset.status = headGridItem;
        }
        //get and ajax
        // Object.keys(columnGrids).forEach(i=>{
        //   columnGrids[i].refreshItems()
        // });
        /*columnGrids.forEach(function (muuri) {
        muuri.refreshItems();
      });*/
    })
    .on('layoutStart', function () {
      //  boardGrid.refreshItems().layout();
    })
    //columnGrids.push(muuri);

    columnGrids['g_'+container.dataset.id] = muuri;
  });
}

function generateBoardItem(item) {
  let itemElem = document.createElement('div');
  let itemTemplate = '' +
  '<div class="board-item contner" data-id="'+ item.id + '" data-status="'+item.status+'"  >' +
  //data-toggle="modal" data-target="#viewJobModal"
  '<div class="board-item-content">' +
  '<div class="board-head-col '+item.job_priority+'">&nbsp;</div>'+
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
  //console.log('g_'+index.id);
  let itemElem = document.createElement('div');
  let itemTemplate = '' +
  '<div class="board-column '+index.title.toLowerCase() +'">' +
  '<div class="board-column-header"><span class="badge badge-pill badge-secondary pull-left g_'+index.id+'">0</span>' + index.title.toUpperCase() + '<span class="pull-right"><i class="fa fa-trash" id="kan_t_delete" data-id="' + index.id + '"></i></span></div>' +
  '<div class="board-column-content" data-id="' + index.id + '"></div>' +
  // '<div class="board-column-footer"></div>'+
  // '<div class="board-column-footer addJob" data-fid="'+index.id+'"> Add a Job </div>'+
  '</div>';
  itemElem.innerHTML = itemTemplate;
  return itemElem.firstChild;
}

function generateCard(resData){
  //for backlogs only
  let itemElem = document.createElement('div');
  let itemTemplate = '' +
  '<div class="board-items acceptor" data-id="'+resData.id+'" data-status="">' +
  '<div class="board-item-content">' +
  '<p class="board-title">'+resData.data+'</p>' +
  '<div class="board-description">'+resData.job_description+'</div>'+
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

// $('body').on('click', '.addJob', function(e){
//   let status = $(this).attr('data-fid');
//   let cardGen = generateCard('newtitle');
//   columnGrids['g_'+status].add([cardGen]);
//
//   $.ajax({
//     url:base_url+"Lister/insertKanbanData",
//     data: {status:status},
//     method:'post',
//     success: function(res){
//       console.log('success');
//     },
//     error: function(res){
//       console.log('error');
//     }
//   })
//
// })

function addColumn(gridKeysVal){
  console.log(gridKeysVal);
  let board = generateBoard(gridKeysVal);
  boardGrid.add([board]);
  //todo
  columnGrids['g_'+gridKeysVal];
}
$( "#add_job").on('click',function(e){
  $( "#addJobModal").modal('show');
  $('#this_stat').val(depInsData);
})
$('#insertJobData').on('submit',function(e){
  e.preventDefault();
  $('#save_job').attr('disabled',true);
  $('#loader').show();
  $.ajax({
    url: base_url+"Lister/insertKanbanData",
    method: 'post',
    data: $('#insertJobData').serializeArray(),
    success: function(res){
      res = JSON.parse(res);
      $('#addJobModal').modal('hide');

      let cardGen = generateCard(res);
      columnGrids['g_0'].add([cardGen]);

      setTimeout(function(e){
        Swal.fire({
          icon: 'success',
          title: 'Job saved',
          showConfirmButton: false,
          timer: 1500
        });
        $('#save_job').removeAttr('disabled');
        $('#loader').hide();
      },1500);

    },
    error: function(res){
      Swal.fire({
        icon: 'error',
        title: 'Job not saved',
        text: 'Server error',
        showConfirmButton: false,
        timer: 1500
      });
    }
  })
})
selectedDiv = '';
$('body').on('click','.contner',function(e){
  e.preventDefault();
  selectedDiv = this;

  let itemId = this.dataset.id;
  $("#viewJobModal").modal('show');
  $.ajax({
    url: base_url+"Lister/getKanbanDataId",
    dataType: 'json',
    method: 'post',
    data: {itemId: itemId},
    success: function(res){
      for (var response in res) {
        if(response == 'title'){
          $("#viewJobModal .modal-title .modallist_"+response).html(res[response]);
        }
        if(response == 'date_of_completion'){
          let dateSplit = res[response].split(' ');
          $("#viewJobModal .modal-body .modallist_"+response).val(dateSplit[0]);
        }
        else if(res[response] != ''){
          $("#viewJobModal .modal-body .modallist_"+response).val(res[response]);
        }else{
          $("#viewJobModal .modal-body .modallist_"+response).val("N/A");
        }
      }
    },
    error: function(xhr){
      console.log('error');
    }
  })
})

$('#edit_job').on('click',function(e){
  e.preventDefault();

  var _form = $('#editjoblist');
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

  $('#loader').show();
  $.ajax({
    url: base_url+'Lister/updateModalKanData',
    dataType: 'json',
    data: data,
    method: 'post',
    success: function(res){
      $('#viewJobModal').modal('hide');
      //jobCaller();
      let jobPri = selectedDiv.children[0].children[0];
      let jobTit = selectedDiv.children[0].children[1];
      let jobDes = selectedDiv.children[0].children[2];

      console.log(jobTit);

      setTimeout(function(e){
        Swal.fire({
          icon: 'success',
          title: 'Job edited',
          showConfirmButton: false,
          timer: 1500
        });
        $('#loader').hide();
      },1500);

    },
    error: function(xhr){
      Swal.fire({
        icon: 'error',
        title: 'Job editing failed',
        showConfirmButton: false,
        timer: 1500
      })
    }
  })
})
//deleter is still reloading
$('body').on('click','#kan_t_delete',function(e){
  e.preventDefault();

  let kanTitleId = this.dataset.id;
  Swal.fire({
    title: 'Are you sure?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirm'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: base_url+'Department/deleteKanTitleById',
        data: {kanTitleId: kanTitleId},
        method: 'post',
        success: function(res){
          // console.log($(this)[0].offsetParent.offsetParent.setAttribute('style','display:none'));
          jobCaller();
          setTimeout(function(e){
            Swal.fire({
              icon: 'success',
              title: res
            })
          },500);
        },
        error: function(xhr){
          Swal.fire({
            icon: 'error',
            title: 'not deleted'
          })
        }
      })
    }
  });

});


});
