$(document).ready(function(){
  let base_url = $("#base_url").val();
  let tableC = $('#viewCandi').DataTable({
    columns:[
      {'data':'id'},
      {'data':'first_name'},
      {'data':'last_name'},
      // {'data':''},
      // {'data':''},
      // {'data':''}
      {'data':'',render: function(data, meta, row){
        if(row.sort_listed == 0){
          return '<button data-id="'+row.id+'" class="btn btn-success caninfo"><i class="fa fa-plus-square"></i> Add to SortList</button>';
        }else{
          return '<button data-id="'+row.id+'" class="btn btn-danger"><i class="pe-7s-check"></i> Added to SortList</button>';
        }
      }}
    ]
  })
  $.ajax({
    url: base_url+"CandidateList/getAllCandidate",
    method: 'post',
    dataType: 'json',
    data: '',
    success: function(res){
      tableC.clear();
      tableC.rows.add(res).draw();
    },
    error: function(res){
      console.log('error');
    }
  });

  $('body').on('click','.caninfo', function(e){
    let canid =  $(this).data('id');
    $.ajax({
      url: base_url+'CandidateList/getCandidateById',
      data: {canid : canid},
      dataType: 'json',
      method: 'post',
      success: function(res){
        console.log(res);
      },
      error: function(res){
        console.log('error');
      }
    });
  })

})
