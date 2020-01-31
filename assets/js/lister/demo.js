(function(){
  let base_url = $('#base_url').val();
  let board = $('.board');
  $.ajax({
    url : base_url+'Lister/getAllKanbanData',
    dataType: 'json',
    method: 'post',
    success: function(res){
      let returnBoard = '';
      let returnContent = 'asd';
      for (var v in res) {
        if(res[v].status == 1){
          returnBoard = '<div class="board-column todo">'+
          '<div class="board-column-header">'+res[v].status+'</div>'+
          '<div class="board-column-content-wrapper">'+
          '<div class="board-column-content">'+

          '<div class="board-item">'+
          '<div class="board-item-content">'+
          '<span>'+res[v].data+'</span>'+
          '</div>'+
          '</div>'+

          '</div>'+
          '</div>'+
          '</div>';
        }
      }
      board.append(returnBoard);
    },
    error: function(res){
      console.log('error');
    }
  });

})()
